<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\FaqsModel;
use App\Models\InformationsModel;

class Information extends BaseController
{
	protected $informations;
	protected $faqs;

	function __construct()
	{
		$this->informations = new InformationsModel();
		$this->faqs = new FaqsModel();
	}

	public function public()
	{
		$public = $this->informations->public();
		$pager = $this->informations->public();

		$keyword = $this->request->getGet("s");
		if (isset($keyword)) {
			$public = $public->like("title", $keyword, "both");
			$pager = $pager->like("title", $keyword, "both");
		}

		$public = $public->orderBy("id", "DESC")->paginate(6);
		$pager = $pager->orderBy("id", "DESC")->pager;

		$variable = [
			"page" => "Informasi Publik",
			// ...
			"type" => "Publik",
			"keywords" => $keyword,
			"articles" => $public,
			"pager" => $pager,
			// ...
			"settings" => $this->settings,
		];

		return view("public/information/public", $variable);
	}

	public function read_public($slug)
	{
		$article = $this->informations->public()->where("slug", $slug)->first();
		if ($article === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$variable = [
			"page" => $article->title,
			// ...
			"type" => [
				"name" => "Publik",
				"slug" => "public",
			],
			"article" => $article,
			// ...
			"settings" => $this->settings,
		];

		// increase article view
		setcookie("read_public", $slug, time() + (10 * 365 * 24 * 60 * 60));
		$previous_read = get_cookie("read_public");
		if ($previous_read !== $slug) {
			$this->informations->where("slug", $slug)->increment("views");
		}

		return view("public/information/read-public", $variable);
	}

	public function agenda()
	{
		$agenda = $this->informations->agenda();
		$pager = $this->informations->agenda();

		$keyword = $this->request->getGet("s");
		if (isset($keyword)) {
			$agenda = $agenda->like("title", $keyword, "both");
			$pager = $pager->like("title", $keyword, "both");
		}

		$agenda = $agenda->orderBy("id", "DESC")->paginate(6);
		$pager = $pager->orderBy("id", "DESC")->pager;

		$variable = [
			"page" => "Agenda",
			// ...
			"keywords" => $keyword,
			"articles" => $agenda,
			"pager" => $pager,
			// ...
			"settings" => $this->settings,
		];

		return view("public/information/agenda", $variable);
	}

	public function read_agenda($slug)
	{
		$article = $this->informations->agenda()->where("slug", $slug)->first();
		if ($article === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$variable = [
			"page" => $article->title,
			// ...
			"type" => [
				"name" => "Agenda",
				"slug" => "agenda",
			],
			"article" => $article,
			// ...
			"settings" => $this->settings,
		];

		// increase article view
		setcookie("read_agenda", $slug, time() + (10 * 365 * 24 * 60 * 60));
		$previous_read = get_cookie("read_agenda");
		if ($previous_read !== $slug) {
			$this->informations->where("slug", $slug)->increment("views");
		}

		return view("public/information/read-agenda", $variable);
	}

	public function faqs()
	{
		$faqs = $this->faqs->findAll();

		$variable = [
			"page" => "Pertanyaan Sering Muncul",
			// ...
			"type" => "FAQ's",
			"faqs" => $faqs,
			// ...
			"settings" => $this->settings,
		];

		return view("public/information/faqs", $variable);
	}
}
