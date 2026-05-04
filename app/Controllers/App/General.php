<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;
use App\Models\InformationsModel;

use Hermawan\DataTables\DataTable;

class General extends BaseController
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
			"page" => "Informasi Publik",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/information/public/list", $variable);
	}

	public function datatable()
	{
		$information = $this->informations->public()
			->select("id, title, slug, created_at, updated_at")
			->where("deleted_at IS NULL", null, false)
			->builder();

		return DataTable::of($information)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$title = $row->title;

				$edit = base_url($this->settings->panelPrefix . "/information/public/edit/" . hashids($id));
				$delete = base_url($this->settings->panelPrefix . "/information/public/delete/" . $id);

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
				$article = base_url("public/" . $row->slug);

				return anchor($article, $row->title, [
					"target" => "_blank",
					"class" => "text-decoration-none"
				]);
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
			"page" => "Tambah Artikel",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/information/public/add", $variable);
	}

	public function edit($hashid)
	{
		$id = hashids($hashid, "decode");
		$article = $this->informations->public()->where("id", $id)->first();
		if ($article === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$variable = [
			"parent" => "Berita",
			"page" => "Ubah Artikel",
			// ...
			"article" => $article,
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/information/public/edit", $variable);
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

		$thumbnail = $this->request->getFile("thumbnail");
		$filename = upload_image($thumbnail, "uploads/thumbnails/");

		$insert = $this->informations->insert([
			"title" => $title,
			"slug" => slugify($title),
			"content" => $content,
			"thumbnail" => $filename ?? null,
			"category" => "public",
		], true);

		if ($insert) {
			return redirect()->to($this->settings->panelPrefix . "/information/public")
				->with("success", "Berhasil menambahkan data Artikel.");
		}

		return redirect()->back()
			->withInput()->with("failed", "Gagal menambahkan data Artikel.");
	}

	public function update($id)
	{
		$article = $this->informations->public()->where("id", $id)->first();
		if ($article === null) {
			return redirect()->to($this->settings->panelPrefix . "/information/public")
				->with("failed", "Gagal mengubah data Artikel.");
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

		$thumbnail = $this->request->getFile("thumbnail");
		$filename = upload_image($thumbnail, "uploads/thumbnails/", $article->thumbnail);

		$update = $this->informations->update($id, [
			"title" => $title,
			"slug" => slugify($title),
			"content" => $content,
			"thumbnail" => $filename ?? $article->thumbnail,
		], true);

		if ($update) {
			return redirect()->to($this->settings->panelPrefix . "/information/public")
				->with("success", "Berhasil mengubah data Artikel.");
		}

		return redirect()->back()
			->withInput()->with("failed", "Gagal mengubah data Artikel.");
	}

	public function delete($id)
	{
		$article = $this->informations->public()->where("id", $id)->first();
		if ($article !== null) {
			// unique slug
			$this->informations->update($id, [
				"slug" => hashids($id)
			]);

			$delete = $this->informations->delete($id);
			@unlink("uploads/thumbnails/" . $article->thumbnail);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Artikel.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Artikel.");
	}
}
