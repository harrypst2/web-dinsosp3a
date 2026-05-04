<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\SlidersModel;

use Hermawan\DataTables\DataTable;

class Sliders extends BaseController
{
	protected $sliders;

	function __construct()
	{
		$this->sliders = new SlidersModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Kelola",
			"page" => "Slider",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/sliders", $variable);
	}

	public function datatable()
	{
		$sliders = $this->sliders
			->select("id, title, description, image")
			->where("deleted_at IS NULL", null, false)
			->builder();

		return DataTable::of($sliders)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$image = $row->image;
				$title = $row->title;
				$description = $row->description;

				$delete = base_url($this->settings->panelPrefix . "/sliders/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';

				$html .= '<a href="' . safe_slider($image) . '" class="text-primary show-picture" title="' . $title . '">';
				$html .= tabler_icon("photo");
				$html .= '</a>';

				$html .= '<a href="javascript:void(0)" class="text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="' . $id . '" data-title="' . $title . '" data-description="' . $description . '">';
				$html .= tabler_icon("edit");
				$html .= '</a>';

				$html .= '<a href="javascript:void(0)" class="text-danger delete-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-danger" data-name="' . $title . '" data-delete="' . $delete . '">';
				$html .= tabler_icon("trash");
				$html .= '</a>';

				$html .= '</div>';

				return $html;
			})
			->hide("id")
			->hide("image")
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
				"rules" => "permit_empty|max_length[128]"
			],
			"file" => [
				"label" => "Slider",
				"rules" => "uploaded[file]|ext_in[file,png,jpg,jpeg]",
			]
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$description = $this->request->getPost("description");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/sliders/");

		$insert = $this->sliders->insert([
			"title" => $title,
			"description" => $description ?: null,
			"image" => $filename,
		], true);

		if ($insert) {
			return redirect()->back()
				->with("success", "Berhasil menambahkan data Slider.");
		}

		return redirect()->back()
			->with("failed", "Gagal menambahkan data Slider.");
	}

	public function update($id)
	{
		$slider = $this->sliders->where("id", $id)->first();
		if ($slider === null) {
			return redirect()->back()
				->with("failed", "Gagal mengubah data Slider.");
		}

		// validation
		$this->validation->setRules([
			"title" => [
				"label" => "Judul",
				"rules" => "required|max_length[64]"
			],
			"description" => [
				"label" => "Deskripsi",
				"rules" => "permit_empty|max_length[128]"
			],
			"file" => [
				"label" => "Slider",
				"rules" => "ext_in[file,png,jpg,jpeg]",
			]
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$description = $this->request->getPost("description");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/sliders/", $slider->image);

		$update = $this->sliders->update($id, [
			"title" => $title,
			"description" => $description ?: null,
			"image" => $filename ?? $slider->image,
		]);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data Slider.");
		}

		return redirect()->back()
			->with("failed", "Gagal mengubah data Slider.");
	}

	public function delete($id)
	{
		$file = $this->sliders->where("id", $id)->first();

		if ($file !== null) {
			$delete = $this->sliders->delete($id);
			@unlink("uploads/sliders/" . $file->image);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Slider.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Slider.");
	}
}
