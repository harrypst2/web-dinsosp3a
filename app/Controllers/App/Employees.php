<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\EmployeesModel;

use Hermawan\DataTables\DataTable;

class Employees extends BaseController
{
	/** @var EmployeesModel */
	protected $employees;

	function __construct()
	{
		$this->employees = new EmployeesModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Pegawai",
			"page" => "Kepegawaian",
			"userdata" => user_detail(),
			"settings" => $this->settings,
			"employees" => $this->employees->where("deleted_at IS NULL", null, false)->orderBy("name", "ASC")->findAll(),
		];

		return view("app/employees", $variable);
	}

	public function datatable()
	{
		$employees = $this->employees
			->select("id, name, nip, gender, position, parent, photo")
			->where("deleted_at IS NULL", null, false)
			->builder();

		/** @var object $employees */
		return DataTable::of($employees)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$name = $row->name;
				$nip = $row->nip;
				$photo = $row->photo;

				$delete = base_url($this->settings->panelPrefix . "/employees/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';

				$html .= '<a href="' . safe_photo($photo) . '" class="text-primary show-picture" title="' . $name . '">';
				$html .= tabler_icon("photo");
				$html .= '</a>';

				$html .= '<a href="javascript:void(0)" class="text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="' . $id . '" data-name="' . $name . '" data-nip="' . $nip . '" data-gender="' . $row->gender . '" data-position="' . $row->position . '" data-parent="' . $row->parent . '">';
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
			->hide("photo")
			->toJson(true);
	}

	public function insert()
	{
		// validation
		$this->validation->setRules([
			"name" => [
				"label" => "Nama",
				"rules" => "required|max_length[64]"
			],
			"file" => [
				"label" => "Foto",
				"rules" => "uploaded[file]|ext_in[file,jpg,jpeg,png]|max_size[file,2048]"
			],
			"nip" => [
				"label" => "NIP",
				"rules" => "required|is_natural"
			],
			"gender" => [
				"label" => "Jenis Kelamin",
				"rules" => "required|in_list[Laki-Laki,Perempuan]"
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$nip = $this->request->getPost("nip");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/photos/");

		$insert = $this->employees->insert([
			"name" => $name,
			"nip" => $nip,
			"position" => $this->request->getPost("position"),
			"gender" => $this->request->getPost("gender"),
			"parent" => $this->request->getPost("parent") ?: null,
			"photo" => $filename,
		], true);

		if ($insert) {
			return redirect()->back()
				->with("success", "Berhasil menambahkan data Pegawai.");
		}

		return redirect()->back()
			->with("failed", "Gagal menambahkan data Pegawai.");
	}

	public function update(int $id)
	{
		$employee = $this->employees->where("id", $id)->first();
		if ($employee === null) {
			return redirect()->back()
				->with("failed", "Gagal mengubah data Pegawai.");
		}

		// validation
		$this->validation->setRules([
			"name" => [
				"label" => "Nama",
				"rules" => "required|max_length[64]"
			],
			"file" => [
				"label" => "Foto",
				"rules" => "ext_in[file,jpg,jpeg,png]|max_size[file,2048]"
			],
			"nip" => [
				"label" => "NIP",
				"rules" => "required|is_natural|max_length[18]"
			],
			"gender" => [
				"label" => "Jenis Kelamin",
				"rules" => "required|in_list[Laki-Laki,Perempuan]"
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$nip = $this->request->getPost("nip");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/photos/", $employee->photo);

		$update = $this->employees->update($id, [
			"name" => $name,
			"nip" => $nip,
			"position" => $this->request->getPost("position"),
			"gender" => $this->request->getPost("gender"),
			"parent" => $this->request->getPost("parent") ?: null,
			"photo" => $filename ?? $employee->photo,
		]);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data Pegawai.");
		}

		return redirect()->back()
			->with("failed", "Gagal mengubah data Pegawai.");
	}

	public function delete(int $id)
	{
		$employee = $this->employees->where("id", $id)->first();

		if ($employee !== null) {
			$delete = $this->employees->delete($id);
			@unlink("uploads/photos/" . $employee->photo);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Pegawai.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Pegawai.");
	}
}
