<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\GalleriesModel;

class Galleries extends BaseController
{
	protected $galleries;

	function __construct()
	{
		$this->galleries = new GalleriesModel();
	}

	public function index()
	{
		$galleries = $this->galleries->orderBy("id", "DESC")->paginate(12);
		$pager = $this->galleries->orderBy("id", "DESC")->pager;

		$offset = function () use ($pager) {
			$current = $pager->getCurrentPage();
			$perpage = $pager->getPerPage();

			$offset = ($perpage * $current) - $perpage;
			return $offset + 1;
		};
		$limit = function () use ($offset, $galleries) {
			$ofset = $offset();
			$total = count($galleries);

			$limit = ($ofset + $total) - 1;
			return $limit;
		};
		$total = $pager->getTotal();

		$variable = [
			"parent" => "",
			"page" => "Galeri",
			// ...
			"gallery" => true,
			"galleries" => $galleries,
			"pager" => $pager,
			"offset" => $offset(),
			"limit" => $limit(),
			"total" => $total,
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/galleries", $variable);
	}

	public function insert()
	{
		// validation
		$this->validation->setRules([
			"title" => [
				"label" => "Judul",
				"rules" => "required|max_length[64]"
			],
			"caption" => [
				"label" => "Keterangan",
				"rules" => "permit_empty"
			],
			"file" => [
				"label" => "Gambar",
				"rules" => "uploaded[file]|ext_in[file,jpg,jpeg,png]",
			]
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$caption = $this->request->getPost("caption");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/galleries/");

		$insert = $this->galleries->insert([
			"title" => $title,
			"caption" => $caption ?: null,
			"image" => $filename,
		], true);

		if ($insert) {
			return redirect()->back()
				->with("success", "Berhasil menambahkan data Galeri.");
		}

		return redirect()->back()
			->with("failed", "Gagal menambahkan data Galeri.");
	}

	public function update($id)
	{
		$gallery = $this->galleries->where("id", $id)->first();
		if ($gallery === null) {
			return redirect()->back()
				->with("failed", "Gagal mengubah data Galeri.");
		}

		// validation
		$this->validation->setRules([
			"title" => [
				"label" => "Judul",
				"rules" => "required|max_length[64]"
			],
			"caption" => [
				"label" => "Keterangan",
				"rules" => "permit_empty"
			],
			"file" => [
				"label" => "Gambar",
				"rules" => "ext_in[file,jpg,jpeg,png]",
			]
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$title = $this->request->getPost("title");
		$caption = $this->request->getPost("caption");

		$file = $this->request->getFile("file");
		$filename = upload_image($file, "uploads/galleries/", $gallery->image);

		$update = $this->galleries->update($id, [
			"title" => $title,
			"caption" => $caption ?: null,
			"image" => $filename ?? $gallery->image,
		]);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data Galeri.");
		}

		return redirect()->back()
			->with("failed", "Gagal mengubah data Galeri.");
	}

	public function delete($id)
	{
		$gallery = $this->galleries->where("id", $id)->first();

		if ($gallery !== null) {
			$delete = $this->galleries->delete($id);
			@unlink("uploads/galleries/" . $gallery->image);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data Galeri.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data Galeri.");
	}
}
