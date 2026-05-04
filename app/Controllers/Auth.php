<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsersModel;

class Auth extends BaseController
{
	protected $users;

	function __construct()
	{
		$this->users = new UsersModel();
	}

	public function login()
	{
		if (session()->get("logged")) {
			$panelPrefix = $this->settings->panelPrefix;
			return redirect()->to($panelPrefix . "/overview");
		}

		$variable = [
			"page" => "Masuk",
			// ...
			"settings" => $this->settings,
		];

		return view("app/login", $variable);
	}

	public function check()
	{
		$username = $this->request->getPost("username");
		$password = $this->request->getPost("password");
		$remember = $this->request->getPost("remember");

		if ($remember) {
			setcookie("username_saved", $username, time() + (10 * 365 * 24 * 60 * 60));
		} else {
			setcookie("username_saved", null, -1);
		}

		$userData = $this->users->where("username", $username)->first();
		if ($userData) {

			$checkPass = password_verify($password, $userData->password);
			if ($checkPass) {
				$session = [
					"logged" => true,
					"userid" => $userData->id,
				];

				session()->set($session);
				return redirect()->back();
			}

			return redirect()->back()->with("failed", "Kata sandi tidak benar.");
		}

		return redirect()->back()->with("failed", "Nama pengguna tidak dapat ditemukan.");
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to("auth/login");
	}
}
