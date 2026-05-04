<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\CategoriesModel;

use Hermawan\DataTables\DataTable;

class Categories extends BaseController
{
	protected $categories;

	function __construct()
	{
		$this->categories = new CategoriesModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Berita",
			"page" => "Kategori",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/news/categories", $variable);
	}

	public function datatable()
	{
		$categories = $this->categories
			->select("id, name")
			->where("deleted_at IS NULL", null, false)
			->builder();

		return DataTable::of($categories)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$name = $row->name;

				$delete = base_url($this->settings->panelPrefix . "/categories/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';
				$html .= '<a href="javascript:void(0)" class="text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="' . $id . '" data-name="' . $name . '">';
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
				"rules" => "required|max_length[64]"
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$insert = $this->categories->insert([
			"name" => $name,
			"slug" => slugify($name),
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
		$category = $this->categories->agenda()->where("id", $id)->first();
		if ($category === null) {
			return redirect()->to($this->settings->panelPrefix . "/categories")
				->with("failed", "Gagal mengubah data Kategori.");
		}

		// validation
		$this->validation->setRules([
			"name" => [
				"label" => "Nama",
				"rules" => "required|max_length[64]"
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$name = $this->request->getPost("name");
		$update = $this->categories->update($id, [
			"name" => $name,
			"slug" => slugify($name),
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
		if ($id == "1") {
			return redirect()->back()
				->with("failed", "Kategori ini tidak boleh dihapus!");
		}

		$category = $this->categories->where("id", $id)->first();
		if ($category !== null) {
			// unique slug
			$this->categories->update($id, [
				"slug" => hashids($id)
			]);

			$delete = $this->categories->delete($id);
			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Kategori.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Kategori.");
	}
}
