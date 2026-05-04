<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ServicesModel;
use App\Models\TargetsModel;

use Hashids\Hashids;

class Services extends BaseController
{
	protected $hashids;
	protected $services;
	protected $targets;

	function __construct()
	{
		$this->hashids = new Hashids();
		$this->services = new ServicesModel();
		$this->targets = new TargetsModel();
	}

	public function list($slug)
	{
		$target = $this->targets->where("slug", $slug)->first();
		if ($target === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$services = $this->services;
		$pager = $this->services;

		$keywords = $this->request->getGet("s");
		if (isset($keywords)) {
			$services = $services->like("title", $keywords, "both");
			$pager = $pager->like("title", $keywords, "both");
		}

		$services = $services->where("target", $target->id)->paginate(12);
		$pager = $pager->where("target", $target->id)->pager;

		$variable = [
			"page" => $target->name,
			// ...
			"keywords" => $keywords,
			"services" => $services,
			"pager" => $pager,
			// ...
			"settings" => $this->settings,
		];

		return view("public/services", $variable);
	}

	public function download($hashid)
	{
		$id = @$this->hashids->decode($hashid)[0];
		$service = $this->services->where("id", $id)->first();

		if ($service === null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		return $this->response->download("uploads/files/" . $service->file, null, true);
	}
}
