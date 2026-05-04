<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\TargetsModel;
use Hermawan\DataTables\DataTable;

class Targets extends BaseController
{
	protected $targets;

	function __construct()
	{
		$this->targets = new TargetsModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Pelayanan",
			"page" => "Kategori Layanan",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/services/targets", $variable);
	}

	public function datatable()
	{
		$targets = $this->targets
			->select("id, name, total")
			->where("deleted_at IS NULL", null, false)
			->builder();

		return DataTable::of($targets)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$name = $row->name;
				$total = $row->total;

				$delete = base_url($this->settings->panelPrefix . "/service/category/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';
				$html .= '<a href="javascript:void(0)" class="text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="' . $id . '" data-name="' . $name . '" data-total="' . $total . '">';
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
			"name" => [
				"label" => "Nama",
				"rules" => "required"
			],
			"total" => [
				"label" => "Total",
				"rules" => "required|is_natural",
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$total = $this->request->getPost("total");

		$insert = $this->targets->insert([
			"name" => $name,
			"slug" => slugify($name),
			"total" => $total,
		], true);

		if ($insert) {
			return redirect()->back()
				->with("success", "Berhasil menambahkan data Kategori.");
		}

		return redirect()->back()
			->with("failed", "Gagal menambahkan data Kategori.");
	}

	public function update($id)
	{
		$target = $this->targets->where("id", $id)->first();
		if ($target === null) {
			return redirect()->back()
				->with("failed", "Gagal mengubah data Kategori.");
		}

		// validation
		$this->validation->setRules([
			"name" => [
				"label" => "Nama",
				"rules" => "required"
			],
			"total" => [
				"label" => "Total",
				"rules" => "required|is_natural",
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$total = $this->request->getPost("total");

		$update = $this->targets->update($id, [
			"name" => $name,
			"slug" => slugify($name),
			"total" => $total,
		]);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data Kategori.");
		}

		return redirect()->back()
			->with("failed", "Gagal mengubah data Kategori.");
	}

	public function delete($id)
	{
		$target = $this->targets->where("id", $id)->first();
		if ($target !== null) {
			// unique slug
			$this->targets->update($id, [
				"slug" => hashids($id)
			]);

			$delete = $this->targets->delete($id);
			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Kategori.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Kategori.");
	}
}
