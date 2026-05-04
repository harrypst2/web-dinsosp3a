<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;
use App\Models\PartnersModel;
use Hermawan\DataTables\DataTable;

class Partners extends BaseController
{
	protected PartnersModel $partners;

	function __construct()
	{
		$this->partners = new PartnersModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Kelola",
			"page" => "Tautan Eksternal",
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/partners", $variable);
	}

	public function datatable()
	{
		$partners = $this->partners
			->select("id, name, url, image, description")
			->where("deleted_at IS NULL", null, false)
			->builder();

		return DataTable::of($partners)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$image = $row->image;
				$name = $row->name;
				$url = $row->url;
				$description = $row->description;

				$delete = base_url($this->settings->panelPrefix . "/partners/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';

				$html .= '<a href="' . safe_partner($image) . '" class="text-primary show-picture" title="' . $name . '">';
				$html .= tabler_icon("photo");
				$html .= '</a>';

				$html .= '<a href="javascript:void(0)" class="text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="' . $id . '" data-name="' . $name . '" data-url="' . $url . '" data-description="' . $description . '">';
				$html .= tabler_icon("edit");
				$html .= '</a>';

				$html .= '<a href="javascript:void(0)" class="text-danger delete-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-danger" data-name="' . $name . '" data-delete="' . $delete . '">';
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
			"name" => [
				"label" => "Nama Instansi",
				"rules" => "required|max_length[128]"
			],
			"url" => [
				"label" => "URL Tautan",
				"rules" => "required|valid_url"
			],
			"description" => [
				"label" => "Deskripsi",
				"rules" => "permit_empty|max_length[255]"
			],
			"file" => [
				"label" => "Logo",
				"rules" => "uploaded[file]|ext_in[file,png,jpg,jpeg,webp]",
			]
		]);

		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$url = $this->request->getPost("url");
		$description = $this->request->getPost("description");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/partners/");

		$insert = $this->partners->insert([
			"name" => $name,
			"url" => $url,
			"description" => $description ?: null,
			"image" => $filename,
		], true);

		if ($insert) {
			return redirect()->back()
				->with("success", "Berhasil menambahkan data Tautan Eksternal.");
		}

		return redirect()->back()
			->with("failed", "Gagal menambahkan data Tautan Eksternal.");
	}

	public function update(int $id)
	{
		$partner = $this->partners->where("id", $id)->first();
		if ($partner === null) {
			return redirect()->back()
				->with("failed", "Data tidak ditemukan.");
		}

		// validation
		$this->validation->setRules([
			"name" => [
				"label" => "Nama Instansi",
				"rules" => "required|max_length[128]"
			],
			"url" => [
				"label" => "URL Tautan",
				"rules" => "required|valid_url"
			],
			"description" => [
				"label" => "Deskripsi",
				"rules" => "permit_empty|max_length[255]"
			],
			"file" => [
				"label" => "Logo",
				"rules" => "permit_empty|ext_in[file,png,jpg,jpeg,webp]",
			]
		]);

		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$url = $this->request->getPost("url");
		$description = $this->request->getPost("description");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/partners/", $partner->image);

		$update = $this->partners->update($id, [
			"name" => $name,
			"url" => $url,
			"description" => $description ?: null,
			"image" => $filename ?? $partner->image,
		]);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data Tautan Eksternal.");
		}

		return redirect()->back()
			->with("failed", "Gagal mengubah data Tautan Eksternal.");
	}

	public function delete(int $id)
	{
		$partner = $this->partners->where("id", $id)->first();

		if ($partner !== null) {
			$delete = $this->partners->delete($id);
			if ($partner->image) {
				@unlink("uploads/partners/" . $partner->image);
			}

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Tautan Eksternal.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Tautan Eksternal.");
	}
}
