<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;
use App\Models\AboutModel;

class Contact extends BaseController
{
	protected $about;

	function __construct()
	{
		$this->about = new AboutModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Kelola",
			"page" => "Kontak",
			"phone" => $this->about->get_config("phone"),
			"email" => $this->about->get_config("email"),
			"address" => $this->about->get_config("address"),
			"desc_phone" => $this->about->get_config("description-phone"),
			"desc_email" => $this->about->get_config("description-email"),
			"desc_location" => $this->about->get_config("description-location"),
			"gmaps" => $this->about->get_config("google-maps"),
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/contact/index", $variable);
	}

	public function update()
	{
		$this->validation->setRules([
			"phone" => "required",
			"email" => "required|valid_email",
			"address" => "required",
			"gmaps" => "required",
		]);

		if (!$this->validation->withRequest($this->request)->run()) {
			return redirect()->back()->withInput()->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$data = [
			"phone" => $this->request->getPost("phone"),
			"email" => $this->request->getPost("email"),
			"address" => $this->request->getPost("address"),
			"description-phone" => $this->request->getPost("desc_phone"),
			"description-email" => $this->request->getPost("desc_email"),
			"description-location" => $this->request->getPost("desc_location"),
			"google-maps" => $this->request->getPost("gmaps"),
		];

		foreach ($data as $code => $content) {
			$this->about->where("code", $code)->set(["content" => $content])->update();
		}

		return redirect()->back()->with("success", "Berhasil memperbarui data kontak.");
	}
}
