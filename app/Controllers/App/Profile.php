<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\UsersModel;

class Profile extends BaseController
{
	protected $users;

	function __construct()
	{
		$this->users = new UsersModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Panel",
			"page" => "Profil & Akun",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/profile", $variable);
	}

	public function save()
	{
		$userdata = user_detail();

		// validation
		$this->validation->setRules([
			"name" => [
				"label" => "Nama",
				"rules" => "required|max_length[64]",
			],
			"email" => [
				"label" => "Surel",
				"rules" => "required|valid_email",
			],
			"avatar" => [
				"label" => "Avatar",
				"rules" => "ext_in[avatar,jpg,jpeg,png]|max_size[avatar,2048]",
			],
			"oldpass" => [
				"label" => "Password Lama",
				"rules" => "required_with[newpass,repass]",
				"errors" => [
					"required_with" => "Bidang {field} diperlukan."
				],
			],
			"newpass" => [
				"label" => "Kata Sandi Baru",
				"rules" => "required_with[oldpass,repass]",
				"errors" => [
					"required_with" => "Bidang {field} diperlukan."
				],
			],
			"repass" => [
				"label" => "Kata Sandi Baru",
				"rules" => "required_with[oldpass,newpass]|matches[newpass]",
				"errors" => [
					"required_with" => "Bidang {field} diperlukan."
				],
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$oldpass = $this->request->getPost("oldpass");
		$repass = $this->request->getPost("repass");

		$hashed = $userdata->password;
		if (!empty($oldpass) && password_verify($oldpass, $hashed) == false) {
			return redirect()->back()
				->with("failed", "Kata sandi lama salah.");
		}

		$name = $this->request->getPost("name");
		$email = $this->request->getPost("email");

		$avatar = $this->request->getFile("avatar");
		$filename = upload_image($avatar, "uploads/avatars/", $userdata->avatar);

		$data = [
			"email" => $email,
			"name" => $name,
		];
		if (isset($filename)) {
			$data["avatar"] = $filename;
		}
		if (isset($repass)) {
			$data["password"] = password_hash($repass, PASSWORD_BCRYPT);
		}
		$update = $this->users->update(user_id(), $data);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil memperbarui profil & akun.");
		}

		return redirect()->back()
			->with("failed", "Gagal memperbarui profil & akun.");
	}
}
