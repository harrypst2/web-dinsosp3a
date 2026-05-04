<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\FilesModel;

use Hermawan\DataTables\DataTable;

class Files extends BaseController
{
	protected $files;

	function __construct()
	{
		$this->files = new FilesModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Media",
			"page" => "Berkas",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/files", $variable);
	}

	public function datatable()
	{
		$files = $this->files
			->select("id, title, description, file, downloaded, active")
			->where("deleted_at IS NULL", null, false)
			->builder();

		return DataTable::of($files)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$title = $row->title;
				$description = $row->description;
				$active = $row->active;

				$delete = base_url($this->settings->panelPrefix . "/files/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';
				$html .= '<a href="javascript:void(0)" class="text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="' . $id . '" data-title="' . $title . '" data-description="' . $description . '" data-active="' . $active . '">';
				$html .= tabler_icon("edit");
				$html .= '</a>';
				$html .= '<a href="javascript:void(0)" class="text-danger delete-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-danger" data-name="' . $title . '" data-delete="' . $delete . '">';
				$html .= tabler_icon("trash");
				$html .= '</a>';
				$html .= '</div>';

				return $html;
			})
			->edit("file", function ($row) {
				$hashid = hashids($row->id);
				$download = base_url("download/" . $hashid);

				return anchor($download, "Unduh Berkas", ["target" => "_blank"]);
			})
			->format("downloaded", function ($value) {
				return $value . "x";
			})
			->format("active", function ($value) {
				return strval($value) === "1" ? "Aktif" : "Tidak Aktif";
			})
			->postQuery(function ($builder) {
				$builder->orderBy("id", "DESC");
			})
			->hide("id")
			->toJson(true);
	}

	public function insert()
	{
		// validation
		$this->validation->setRules([
			"title" => [
				"label" => "Judul",
				"rules" => "required|max_length[64]"
			],
			"description" => [
				"label" => "Deskripsi",
				"rules" => "permit_empty"
			],
			"file" => [
				"label" => "Berkas",
				"rules" => "uploaded[file]|ext_in[file,pdf,zip,rar,doc,docx,xls,xlsx,pdf,ppt,pptx]",
			]
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$description = $this->request->getPost("description");
		$active = $this->request->getPost("active");

		$file = $this->request->getFile("file");
		$filename = $file->getRandomName();
		$file->move("uploads/files/", $filename);

		$insert = $this->files->insert([
			"title" => $title,
			"description" => $description ?: null,
			"file" => $filename,
			"active" => isset($active) ? true : false
		], true);

		if ($insert) {
			return redirect()->back()
				->with("success", "Berhasil menambahkan data Berkas.");
		}

		return redirect()->back()
			->with("failed", "Gagal menambahkan data Berkas.");
	}

	public function update($id)
	{
		$detail = $this->files->where("id", $id)->first();
		if ($detail === null) {
			return redirect()->back()
				->with("failed", "Gagal mengubah data Berkas.");
		}

		// validation
		$this->validation->setRules([
			"title" => [
				"label" => "Judul",
				"rules" => "required|max_length[64]"
			],
			"description" => [
				"label" => "Deskripsi",
				"rules" => "permit_empty"
			],
			"file" => [
				"label" => "Berkas",
				"rules" => "ext_in[file,pdf,zip,rar,doc,docx,xls,xlsx,pdf,ppt,pptx]",
			]
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$description = $this->request->getPost("description");
		$active = $this->request->getPost("active");

		$file = $this->request->getFile("file");
		if ($file->getSize() > 0) {
			$filename = $file->getRandomName();
			$file->move("uploads/files/", $filename);

			@unlink("uploads/files/" . $detail->file);
		}

		$update = $this->files->update($id, [
			"title" => $title,
			"description" => $description ?: null,
			"file" => $filename ?? $detail->file,
			"active" => isset($active) ? true : false
		]);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data Berkas.");
		}

		return redirect()->back()
			->with("failed", "Gagal mengubah data Berkas.");
	}

	public function delete($id)
	{
		$file = $this->files->where("id", $id)->first();

		if ($file !== null) {
			$delete = $this->files->delete($id);
			@unlink("uploads/files/" . $file->file);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Berkas.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Berkas.");
	}
}
