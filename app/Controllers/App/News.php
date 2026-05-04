<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use App\Models\NewsModel;
use App\Models\ViewNewsModel;

use Hermawan\DataTables\DataTable;

class News extends BaseController
{
	protected $news;
	protected $categories;
	protected $view_news;

	function __construct()
	{
		$this->news = new NewsModel();
		$this->categories = new CategoriesModel();
		$this->view_news = new ViewNewsModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Berita",
			"page" => "Artikel",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/news/article", $variable);
	}

	public function datatable()
	{
		$news = $this->view_news
			->select("id, title, slug, category, created_at, updated_at")
			->builder();

		return DataTable::of($news)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$title = $row->title;

				$edit = base_url($this->settings->panelPrefix . "/news/edit/" . hashids($id));
				$delete = base_url($this->settings->panelPrefix . "/news/delete/" . $id);

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
				$article = base_url("news/" . $row->slug);

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
		$categories = $this->categories
			->orderBy("id", "DESC")
			->findAll();

		$variable = [
			"parent" => "Berita",
			"page" => "Tambah Artikel",
			// ...
			"categories" => $categories,
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/news/add", $variable);
	}

	public function edit($hashid)
	{
		$id = hashids($hashid, "decode");
		$article = $this->news->where("id", $id)->first();
		if ($article === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$categories = $this->categories
			->orderBy("id", "DESC")
			->findAll();

		$variable = [
			"parent" => "Berita",
			"page" => "Ubah Artikel",
			// ...
			"article" => $article,
			"categories" => $categories,
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/news/edit", $variable);
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
			"category" => [
				"label" => "Kategori",
				"rules" => "required|is_not_unique[categories.id]",
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
		$category = $this->request->getPost("category");

		$thumbnail = $this->request->getFile("thumbnail");
		$filename = upload_image($thumbnail, "uploads/thumbnails/");

		$insert = $this->news->insert([
			"title" => $title,
			"slug" => slugify($title),
			"content" => $content,
			"thumbnail" => $filename ?? null,
			"category" => $category,
		], true);

		if ($insert) {
			return redirect()->to($this->settings->panelPrefix . "/news")
				->with("success", "Berhasil menambahkan data Artikel.");
		}

		return redirect()->back()
			->withInput()->with("failed", "Gagal menambahkan data Artikel.");
	}

	public function update($id)
	{
		$article = $this->news->where("id", $id)->first();
		if ($article === null) {
			return redirect()->to($this->settings->panelPrefix . "/news")
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
			"category" => [
				"label" => "Kategori",
				"rules" => "required|is_not_unique[categories.id]",
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
		$category = $this->request->getPost("category");

		$thumbnail = $this->request->getFile("thumbnail");
		$filename = upload_image($thumbnail, "uploads/thumbnails/", $article->thumbnail);

		$update = $this->news->update($id, [
			"title" => $title,
			"slug" => slugify($title),
			"content" => $content,
			"thumbnail" => $filename ?? $article->thumbnail,
			"category" => $category,
		], true);

		if ($update) {
			return redirect()->to($this->settings->panelPrefix . "/news")
				->with("success", "Berhasil mengubah data Artikel.");
		}

		return redirect()->back()
			->withInput()->with("failed", "Gagal mengubah data Artikel.");
	}

	public function delete($id)
	{
		$article = $this->news->where("id", $id)->first();
		if ($article !== null) {
			// unique slug
			$this->news->update($id, [
				"slug" => hashids($id)
			]);

			$delete = $this->news->delete($id);
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
