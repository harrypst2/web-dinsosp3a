<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\ServicesModel;
use App\Models\TargetsModel;
use App\Models\ViewServicesModel;

use Hermawan\DataTables\DataTable;

class Services extends BaseController
{
	protected $targets;
	protected $services;
	protected $view_services;

	function __construct()
	{
		$this->targets = new TargetsModel();
		$this->services = new ServicesModel();
		$this->view_services = new ViewServicesModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Pelayanan",
			"page" => "Layanan",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/services/list", $variable);
	}

	public function datatable()
	{
		$services = $this->view_services
			->select("id, title, target")
			->builder();

		return DataTable::of($services)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$title = $row->title;

				$edit = base_url($this->settings->panelPrefix . "/service/edit/" . hashids($id));
				$delete = base_url($this->settings->panelPrefix . "/service/delete/" . $id);

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
			->add("file", function ($row) {
				$hashid = hashids($row->id);
				$download = base_url("service/download/" . $hashid);

				return anchor($download, "Unduh Berkas", [
					"target" => "_blank",
					"class" => "text-decoration-none"
				]);
			})
			->postQuery(function ($builder) {
				$builder->orderBy("id", "DESC");
			})
			->hide("id")
			->toJson(true);
	}

	public function add()
	{
		$targets = $this->targets
			->orderBy("id", "DESC")
			->findAll();

		$variable = [
			"parent" => "Pelayanan",
			"page" => "Tambah Layanan",
			// ...
			"targets" => $targets,
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/services/add", $variable);
	}

	public function edit($hashid)
	{
		$id = hashids($hashid, "decode");
		$service = $this->services->where("id", $id)->first();
		if ($service === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$targets = $this->targets
			->orderBy("id", "DESC")
			->findAll();

		$variable = [
			"parent" => "Pelayanan",
			"page" => "Ubah Layanan",
			// ...
			"service" => $service,
			"targets" => $targets,
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/services/edit", $variable);
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
			"target" => [
				"label" => "Kategori",
				"rules" => "required|is_not_unique[targets.id]",
			],
			"file" => [
				"label" => "Berkas",
				"rules" => "uploaded[file]|ext_in[file,pdf,zip,rar,doc,docx,xls,xlsx,pdf,ppt,pptx,png,jpg,jpeg,gif]",
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->withInput()->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$content = $this->request->getPost("content");
		$target = $this->request->getPost("target");

		$file = $this->request->getFile("file");
		$filename = $file->getRandomName();
		$file->move("uploads/files/", $filename);

		$insert = $this->services->insert([
			"title" => $title,
			"content" => $content,
			"file" => $filename,
			"target" => $target,
		], true);

		if ($insert) {
			return redirect()->to($this->settings->panelPrefix . "/service/list")
				->with("success", "Berhasil menambahkan data Layanan.");
		}

		return redirect()->back()
			->withInput()->with("failed", "Gagal menambahkan data Layanan.");
	}

	public function update($id)
	{
		$service = $this->services->where("id", $id)->first();
		if ($service === null) {
			return redirect()->to($this->settings->panelPrefix . "/service/list")
				->with("failed", "Gagal mengubah data Layanan.");
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
			"target" => [
				"label" => "Kategori",
				"rules" => "required|is_not_unique[targets.id]",
			],
			"file" => [
				"label" => "Berkas",
				"rules" => "ext_in[file,pdf,zip,rar,doc,docx,xls,xlsx,pdf,ppt,pptx,png,jpg,jpeg,gif]",
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->withInput()->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$content = $this->request->getPost("content");
		$target = $this->request->getPost("target");

		$file = $this->request->getFile("file");
		if ($file->getSize() > 0) {
			$filename = $file->getRandomName();
			$file->move("uploads/files/", $filename);

			@unlink("uploads/files/" . $service->file);
		}

		$update = $this->services->update($id, [
			"title" => $title,
			"content" => $content,
			"file" => $filename ?? $service->file,
			"target" => $target,
		], true);

		if ($update) {
			return redirect()->to($this->settings->panelPrefix . "/service/list")
				->with("success", "Berhasil mengubah data Layanan.");
		}

		return redirect()->back()
			->withInput()->with("failed", "Gagal mengubah data Layanan.");
	}

	public function delete($id)
	{
		$service = $this->services->where("id", $id)->first();
		if ($service !== null) {
			$delete = $this->services->delete($id);
			@unlink("uploads/files/" . $service->file);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Layanan.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Layanan.");
	}
}
