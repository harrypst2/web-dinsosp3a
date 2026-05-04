<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\AboutModel;

class About extends BaseController
{
	protected $about;

	function __construct()
	{
		$this->about = new AboutModel();
	}

	public function index()
	{
		$page = $this->request->getGet("page");
		switch ($page) {
			case "vision-mission":
				$title = "Visi & Misi";
				$status_vm = "active";

				$content = $this->about
					->where("code", "vision-mission")
					->first()->content;
				break;

			case "tasks":
				$title = "Tupoksi";
				$status_task = "active";

				$content = $this->about
					->where("code", "tasks")
					->first()->content;
				break;

			case "about":
			default:
				$title = "Tentang";
				$status_about = "active";

				$content = $this->about
					->where("code", "about")
					->first()->content;
				break;
		}

		$menus = [
			[
				"name" => "Tentang",
				"link" => "/about",
				"active" => $status_about ?? ""
			],
			[
				"name" => "Visi & Misi",
				"link" => "/about?page=vision-mission",
				"active" => $status_vm ?? ""
			],
			[
				"name" => "Tupoksi",
				"link" => "/about?page=tasks",
				"active" => $status_task ?? ""
			]
		];

		$variable = [
			"parent" => "Kelola",
			"page" => $title,
			// ...
			"slug" => $page ?: "about",
			"menus" => $menus,
			"content" => $content,
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/about", $variable);
	}

	public function save()
	{
		// validation
		$this->validation->setRules([
			"code" => [
				"label" => "Kode",
				"rules" => "required|is_not_unique[about.code]"
			],
			"content" => [
				"label" => "Konten",
				"rules" => "required"
			]
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->withInput()->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$code = $this->request->getPost("code");
		$content = $this->request->getPost("content");

		switch ($code) {
			case "vision-mission":
				$title = "Visi & Misi";
				break;

			case "tasks":
				$title = "Tupoksi";
				break;

			case "about":
			default:
				$title = "Tentang";
				break;
		}

		$about = $this->about->where("code", $code)->first();
		$id = $about->id;

		$update = $this->about->update($id, [
			"content" => $content
		]);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data $title.");
		}

		return redirect()->back()
			->withInput()->with("failed", "Gagal mengubah data $title.");
	}
}
