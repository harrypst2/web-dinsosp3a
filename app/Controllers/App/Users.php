<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\UsersModel;

use Hermawan\DataTables\DataTable;

class Users extends BaseController
{
	protected $users;

	function __construct()
	{
		$this->users = new UsersModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Kelola",
			"page" => "Pengguna",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/users", $variable);
	}

	public function datatable()
	{
		$users = $this->users
			->select("id, name, username, email")
			->where("deleted_at IS NULL", null, false)
			->whereNotIn("id", [user_detail("id")])
			->builder();

		return DataTable::of($users)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$name = $row->name;
				$username = $row->username;
				$email = $row->email;

				$delete = base_url($this->settings->panelPrefix . "/users/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';
				$html .= '<a href="javascript:void(0)" class="text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="' . $id . '" data-name="' . $name . '" data-username="' . $username . '" data-email="' . $email . '" data-readonly="username">';
				$html .= tabler_icon("edit");
				$html .= '</a>';
				$html .= '<a href="javascript:void(0)" class="text-danger delete-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-danger" data-name="' . $name . '" data-delete="' . $delete . '">';
				$html .= tabler_icon("trash");
				$html .= '</a>';
				$html .= '</div>';

				return $html;
			})
			->postQuery(function ($builder) {
				$builder->orderBy("id", "DESC");
			})
			->hide("id")
			->toJson(true);
	}

	public function insert()
	{
		// validation
		$this->validation->setRules([
			"username" => [
				"label" => "Nama Pengguna",
				"rules" => "required|max_length[32]|is_unique[users.username]|alpha_numeric"
			],
			"password" => [
				"label" => "Kata Sandi",
				"rules" => "required"
			],
			"name" => [
				"label" => "Nama",
				"rules" => "required|max_length[64]"
			],
			"email" => [
				"label" => "Surel",
				"rules" => "required|valid_email"
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$username = $this->request->getPost("username");
		$password = $this->request->getPost("password");
		$name = $this->request->getPost("name");
		$email = $this->request->getPost("email");

		$insert = $this->users->insert([
			"email" => $email,
			"username" => $username,
			"password" => password_hash($password, PASSWORD_BCRYPT),
			"name" => $name,
		], true);

		if ($insert) {
			return redirect()->back()
				->with("success", "Berhasil menambahkan data Pengguna.");
		}

		return redirect()->back()
			->with("failed", "Gagal menambahkan data Pengguna.");
	}

	public function update($id)
	{
		$user = $this->users->where("id", $id)->first();
		if ($user === null) {
			return redirect()->back()
				->with("failed", "Gagal mengubah data Kategori.");
		}

		// validation
		$this->validation->setRules([
			"name" => [
				"label" => "Nama",
				"rules" => "required|max_length[64]"
			],
			"email" => [
				"label" => "Surel",
				"rules" => "required|valid_email"
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$password = $this->request->getPost("password");
		$name = $this->request->getPost("name");
		$email = $this->request->getPost("email");

		$data = [
			"email" => $email,
			"name" => $name,
		];
		if ($password) {
			$data["password"] = password_hash($password, PASSWORD_BCRYPT);
		}
		$update = $this->users->update($id, $data);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data Pengguna.");
		}

		return redirect()->back()
			->with("failed", "Gagal mengubah data Pengguna.");
	}

	public function delete($id)
	{
		$user = $this->users->where("id", $id)->first();
		if ($user !== null) {
			$delete = $this->users->delete($id);
			@unlink("uploads/avatars/" . $user->avatar);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Pengguna.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Pengguna.");
	}
}
