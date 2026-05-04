<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\OrgchartModel;
use App\Models\ViewOrgchartModel;
use Hermawan\DataTables\DataTable;

class Orgchart extends BaseController
{
	/** @var OrgchartModel */
	protected $orgchart;
	/** @var ViewOrgchartModel */
	protected $view_orgchart;

	function __construct()
	{
		$this->orgchart = new OrgchartModel();
		$this->view_orgchart = new ViewOrgchartModel();
	}

	public function index()
	{
		$orgchart = $this->orgchart->findAll();

		$variable = [
			"parent" => "Pegawai",
			"page" => "Struktur Organisasi",
			"orgchart" => $orgchart,
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/org-chart", $variable);
	}

	public function datatable()
	{
		$orgchart = $this->view_orgchart
			->select("id, name, position, gender, bidang, nip, photo, parent_id, parent")
			->builder();

		/** @var object $orgchart */
		return DataTable::of($orgchart)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$name = $row->name;
				$position = $row->position;
				$nip = $row->nip;
				$photo = $row->photo;
				$parent =  $row->parent_id;

				$delete = base_url($this->settings->panelPrefix . "/org-chart/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';

				$html .= '<a href="' . safe_photo($photo) . '" class="text-primary show-picture" title="' . $name . '">';
				$html .= tabler_icon("photo");
				$html .= '</a>';

				$html .= '<a href="javascript:void(0)" class="text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="' . $id . '" data-name="' . $name . '" data-position="' . $position . '" data-gender="' . $row->gender . '" data-bidang="' . $row->bidang . '" data-nip="' . $nip . '" data-parent="' . $parent . '">';
				$html .= tabler_icon("edit");
				$html .= '</a>';

				$html .= '<a href="javascript:void(0)" class="text-danger delete-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-danger" data-name="' . $name . '" data-delete="' . $delete . '">';
				$html .= tabler_icon("trash");
				$html .= '</a>';

				$html .= '</div>';

				return $html;
			})
			->format("position", function ($value) {
				return $value ?: "<i>Tanpa Posisi</i>";
			})
			->format("parent", function ($value) {
				return $value ?: "<i>Tanpa Atasan</i>";
			})
			->hide("id")
			->hide("photo")
			->hide("parent_id")
			->toJson(true);
	}

	public function insert()
	{
		// validation
		$this->validation->setRules([
			"name" => [
				"label" => "Nama",
				"rules" => "required|max_length[64]"
			],
			"file" => [
				"label" => "Foto",
				"rules" => "uploaded[file]|ext_in[file,jpg,jpeg,png]|max_size[file,2048]"
			],
			"position" => [
				"label" => "Posisi",
				"rules" => "required|max_length[64]"
			],
			"gender" => [
				"label" => "Jenis Kelamin",
				"rules" => "required|in_list[Laki-Laki,Perempuan]"
			],
			"nip" => [
				"label" => "NIP",
				"rules" => "required|is_natural"
			],
			"parent" => [
				"label" => "Atasan",
				"rules" => "permit_empty|is_not_unique[orgchart.id]"
			]
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$position = $this->request->getPost("position");
		$nip = $this->request->getPost("nip");
		$parent = $this->request->getPost("parent");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/photos/");

		$insert = $this->orgchart->insert([
			"name" => $name,
			"position" => $position,
			"gender" => $this->request->getPost("gender"),
			"bidang" => $this->request->getPost("bidang"),
			"nip" => $nip,
			"photo" => $filename,
			"parent" => $parent ?: null,
		], true);

		if ($insert) {
			return redirect()->back()
				->with("success", "Berhasil menambahkan data Pegawai.");
		}

		return redirect()->back()
			->with("failed", "Gagal menambahkan data Pegawai.");
	}

	public function update(int $id)
	{
		$detail = $this->orgchart->where("id", $id)->first();
		if ($detail === null) {
			return redirect()->back()
				->with("failed", "Gagal mengubah data Pegawai.");
		}

		// validation
		$this->validation->setRules([
			"name" => [
				"label" => "Nama",
				"rules" => "required|max_length[64]"
			],
			"file" => [
				"label" => "Foto",
				"rules" => "ext_in[file,jpg,jpeg,png]|max_size[file,2048]"
			],
			"position" => [
				"label" => "Posisi",
				"rules" => "required|max_length[64]"
			],
			"gender" => [
				"label" => "Jenis Kelamin",
				"rules" => "required|in_list[Laki-Laki,Perempuan]"
			],
			"nip" => [
				"label" => "NIP",
				"rules" => "required|is_natural|max_length[18]"
			],
			"parent" => [
				"label" => "Atasan",
				"rules" => "permit_empty|is_not_unique[orgchart.id]"
			]
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$position = $this->request->getPost("position");
		$nip = $this->request->getPost("nip");
		$parent = $this->request->getPost("parent");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/photos/", $detail->photo);

		$update = $this->orgchart->update($id, [
			"name" => $name,
			"position" => $position,
			"gender" => $this->request->getPost("gender"),
			"bidang" => $this->request->getPost("bidang"),
			"nip" => $nip,
			"photo" => $filename ?? $detail->photo,
			"parent" => $parent ?: null,
		]);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data Pegawai.");
		}

		return redirect()->back()
			->with("failed", "Gagal mengubah data Pegawai.");
	}

	public function delete(int $id)
	{
		$file = $this->orgchart->where("id", $id)->first();

		if ($file !== null) {
			$delete = $this->orgchart->delete($id);
			@unlink("uploads/photos/" . $file->photo);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Pegawai.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Pegawai.");
	}
}
