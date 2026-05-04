<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CategoriesModel;
use App\Models\NewsModel;
use App\Models\ViewNewsModel;

class News extends BaseController
{
	/** @var \App\Models\NewsModel */
	protected $news;
	/** @var \App\Models\ViewNewsModel */
	protected $view_news;
	/** @var \App\Models\CategoriesModel */
	protected $categories;

	function __construct()
	{
		$this->news = new NewsModel();
		$this->view_news = new ViewNewsModel();
		$this->categories = new CategoriesModel();
	}

	public function index()
	{
		$news = $this->view_news;
		$pager = $this->view_news;

		$keyword = $this->request->getGet("s");
		if (isset($keyword)) {
			$news = $news->like("title", $keyword, "both");
			$pager = $news->like("title", $keyword, "both");
		}

		$news = $news->orderBy("id", "DESC")->paginate(6);
		$pager = $pager->orderBy("id", "DESC")->pager;

		$categories = array_map(function ($row) {
			$total = $this->news->where("category", $row->id)->countAllResults();

			return [
				"name" => $row->name,
				"url" => base_url("category/" . $row->slug),
				"total" => $total,
			];
		}, $this->categories->findAll());
		$categories = array2object($categories);

		$latest = $this->news->orderBy("id", "DESC")->findAll(3);

		$variable = [
			"page" => "Berita Terbaru",
			// ...
			"news" => $news,
			"pager" => $pager,
			"keywords" => $keyword,
			"categories" => $categories,
			"latest" => $latest,
			// ...
			"settings" => $this->settings,
		];

		return view("public/news/list", $variable);
	}

	public function category(string $slug)
	{
		$news = $this->view_news;
		$pager = $this->view_news;

		$keyword = $this->request->getGet("s");
		if (isset($keyword)) {
			$news = $news->like("title", $keyword, "both");
			$pager = $pager->like("title", $keyword, "both");
		}

		$category = $this->categories->where("slug", $slug)->first();
		if ($category === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$news = $news->where("category", $category->id)->orderBy("id", "DESC")->paginate(6);
		$pager = $pager->where("category", $category->id)->orderBy("id", "DESC")->pager;

		$categories = array_map(function ($row) {
			$total = $this->news->where("category", $row->id)->countAllResults();

			return [
				"name" => $row->name,
				"url" => base_url("category/" . $row->slug),
				"total" => $total,
			];
		}, $this->categories->findAll());
		$categories = array2object($categories);

		$latest = $this->news->orderBy("id", "DESC")->findAll(3);

		$variable = [
			"page" => "Kategori: " . $category->name,
			// ...
			"category" => $category->name,
			"news" => $news,
			"pager" => $pager,
			"keywords" => $keyword,
			"categories" => $categories,
			"latest" => $latest,
			// ...
			"settings" => $this->settings,
		];

		return view("public/news/list", $variable);
	}

	public function read(string $slug)
	{
		$article = $this->news->where("slug", $slug)->first();
		if ($article === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$related = $this->news->related($article->title);
		$category = $this->categories->where("id", $article->category)->first();

		$categories = array_map(function ($row) {
			$total = $this->news->where("category", $row->id)->countAllResults();

			return [
				"name" => $row->name,
				"url" => base_url("category/" . $row->slug),
				"total" => $total,
			];
		}, $this->categories->findAll());
		$categories = array2object($categories);

		$latest = $this->news->orderBy("id", "DESC")->findAll(3);

		$variable = [
			"page" => $article->title,
			// ...
			"article" => $article,
			"category" => [
				"name" => $category->name,
				"slug" => $category->slug,
			],
			"related" => $related,
			"categories" => $categories,
			"latest" => $latest,
			// ...
			"settings" => $this->settings,
		];

		// increase article view
		setcookie("read_news", $slug, time() + (10 * 365 * 24 * 60 * 60));
		$previous_read = get_cookie("read_news");
		if ($previous_read !== $slug) {
			$this->news->where("slug", $slug)->increment("views");
		}

		return view("public/news/read", $variable);
	}
}
