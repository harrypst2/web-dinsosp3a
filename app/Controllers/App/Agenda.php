<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;
use App\Models\InformationsModel;

use Hermawan\DataTables\DataTable;

class Agenda extends BaseController
{
	protected $informations;

	function __construct()
	{
		$this->informations = new InformationsModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Informasi",
			"page" => "Agenda",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/information/agenda/list", $variable);
	}

	public function datatable()
	{
		$information = $this->informations->agenda()
			->select("id, title, slug, date, created_at, updated_at")
			->where("deleted_at IS NULL", null, false)
			->builder();

		return DataTable::of($information)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$title = $row->title;

				$edit = base_url($this->settings->panelPrefix . "/information/agenda/edit/" . hashids($id));
				$delete = base_url($this->settings->panelPrefix . "/information/agenda/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';
				$html .= '<a href="' . $edit . '" class="text-warning">';
				$html .= tabler_icon("edit");
				$html .= '</a>';
				$html .= '<a href="javascript:void(0)" class="text-danger delete-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-danger" data-name="' . $title . '" data-delete="' . $delete . '">';
				$html .= tabler_icon("trash");
				$html .= '</a>';
				$html .= '</div>';

				return $html;
			})
			->edit("title", function ($row) {
				$agenda = base_url("agenda/" . $row->slug);

				return anchor($agenda, $row->title, [
					"target" => "_blank",
					"class" => "text-decoration-none"
				]);
			})
			->format("date", function ($value) {
				return indonesia_date($value);
			})
			->format("created_at", function ($value) {
				return indonesia_date($value);
			})
			->edit("updated_at", function ($row) {
				return indonesia_date($row->updated_at ?? $row->created_at);
			})
			->postQuery(function ($builder) {
				$builder->orderBy("id", "DESC");
			})
			->hide("id")
			->hide("slug")
			->toJson(true);
	}

	public function add()
	{
		$variable = [
			"parent" => "Informasi",
			"page" => "Tambah Agenda",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/information/agenda/add", $variable);
	}

	public function edit($hashid)
	{
		$id = hashids($hashid, "decode");
		$agenda = $this->informations->agenda()->where("id", $id)->first();
		if ($agenda === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$variable = [
			"parent" => "Berita",
			"page" => "Ubah Agenda",
			// ...
			"article" => $agenda,
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/information/agenda/edit", $variable);
	}

	public function insert()
	{
		// validation
		$this->validation->setRules([
			"title" => [
				"label" => "Judul",
				"rules" => "required|max_length[255]",
			],
			"content" => [
				"label" => "Konten",
				"rules" => "required",
			],
			"date" => [
				"label" => "Tanggal Agenda",
				"rules" => "valid_date[Y-m-d]",
			],
			"thumbnail" => [
				"label" => "Gambar Mini",
				"rules" => "ext_in[thumbnail,jpg,jpeg,png]|max_size[thumbnail,2048]",
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->withInput()->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$content = $this->request->getPost("content");
		$date = $this->request->getPost("date");

		$thumbnail = $this->request->getFile("thumbnail");
		$filename = upload_image($thumbnail, "uploads/thumbnails/");

		$insert = $this->informations->insert([
			"title" => $title,
			"slug" => slugify($title),
			"content" => $content,
			"thumbnail" => $filename ?? null,
			"category" => "agenda",
			"date" => $date,
		], true);

		if ($insert) {
			return redirect()->to($this->settings->panelPrefix . "/information/agenda")
				->with("success", "Berhasil menambahkan data Agenda.");
		}

		return redirect()->back()
			->withInput()->with("failed", "Gagal menambahkan data Agenda.");
	}

	public function update($id)
	{
		$agenda = $this->informations->agenda()->where("id", $id)->first();
		if ($agenda === null) {
			return redirect()->to($this->settings->panelPrefix . "/information/agenda")
				->with("failed", "Gagal mengubah data Agenda.");
		}

		// validation
		$this->validation->setRules([
			"title" => [
				"label" => "Judul",
				"rules" => "required|max_length[255]",
			],
			"content" => [
				"label" => "Konten",
				"rules" => "required",
			],
			"date" => [
				"label" => "Tanggal Agenda",
				"rules" => "valid_date[Y-m-d]",
			],
			"thumbnail" => [
				"label" => "Gambar Mini",
				"rules" => "ext_in[thumbnail,jpg,jpeg,png]|max_size[thumbnail,2048]",
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->withInput()->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$content = $this->request->getPost("content");
		$date = $this->request->getPost("date");

		$thumbnail = $this->request->getFile("thumbnail");
		$filename = upload_image($thumbnail, "uploads/thumbnails/", $agenda->thumbnail);

		$update = $this->informations->update($id, [
			"title" => $title,
			"slug" => slugify($title),
			"content" => $content,
			"thumbnail" => $filename ?? $agenda->thumbnail,
			"date" => $date,
		], true);

		if ($update) {
			return redirect()->to($this->settings->panelPrefix . "/information/agenda")
				->with("success", "Berhasil mengubah data Agenda.");
		}

		return redirect()->back()
			->withInput()->with("failed", "Gagal mengubah data Agenda.");
	}

	public function delete($id)
	{
		$agenda = $this->informations->agenda()->where("id", $id)->first();
		if ($agenda !== null) {
			// unique slug
			$this->informations->update($id, [
				"slug" => hashids($id)
			]);

			$delete = $this->informations->delete($id);
			@unlink("uploads/thumbnails/" . $agenda->thumbnail);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Agenda.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Agenda.");
	}
}
