<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\FilesModel;

use Hashids\Hashids;

class Files extends BaseController
{
	protected $hashids;
	protected $files;

	function __construct()
	{
		$this->hashids = new Hashids();
		$this->files = new FilesModel();
	}

	public function index()
	{
		$files = $this->files;
		$pager = $this->files;

		$keywords = $this->request->getGet("s");
		if ($keywords) {
			$files = $files->like("title", $keywords, "both");
			$pager = $pager->like("title", $keywords, "both");
		}

		$files = $files->orderBy("id", "DESC")->where("active", "1")->paginate(12);
		$pager = $pager->orderBy("id", "DESC")->where("active", "1")->pager;
		$latest = $this->files->orderBy("id", "DESC")->findAll(5);

		$variable = [
			"page" => "Unduh Berkas",
			// ...
			"keywords" => $keywords,
			"files" => $files,
			"pager" => $pager,
			"latest" => $latest,
			// ...
			"settings" => $this->settings,
		];

		return view("public/files", $variable);
	}

	public function download($hashid)
	{
		$id = @$this->hashids->decode($hashid)[0];
		$file = $this->files->where("id", $id)->first();

		if ($file === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$this->files->where("id", $id)->increment("downloaded");
		return $this->response->download("uploads/files/" . $file->file, null, true);
	}
}
