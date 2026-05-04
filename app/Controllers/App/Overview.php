<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\ServicesModel;
use App\Models\FilesModel;
use App\Models\GalleriesModel;
use App\Models\VisitorModel;

class Overview extends BaseController
{
	public function index()
	{
		$session = session();
		$ipinfo = $session->get('ipinfo');

		if (!$ipinfo) {
			$ip_address = $this->request->getIPAddress();
			$ipinfo = ip_info(
				$ip_address !== "127.0.0.1" &&
					$ip_address !== "0.0.0.0" &&
					$ip_address !== "::1" ?
					$ip_address :
					"180.252.123.41"
			);
			$session->set('ipinfo', $ipinfo);
		}

		// Monthly Stats for Chart
		$db = \Config\Database::connect();
		$currentYear = date('Y');

		// 1. Visitor Stats
		$visitorData = array_fill(1, 12, 0);
		$visitors = $db->table('visitors')
			->select('MONTH(created_at) as month, COUNT(*) as count')
			->where('YEAR(created_at)', $currentYear)
			->groupBy('MONTH(created_at)')
			->get()->getResult();
		foreach ($visitors as $v) $visitorData[(int)$v->month] = (int)$v->count;

		// 2. Content Update Stats (News + Services + Galleries)
		$contentData = array_fill(1, 12, 0);

		$tables = ['news', 'services', 'galleries'];
		foreach ($tables as $table) {
			$stats = $db->table($table)
				->select('MONTH(created_at) as month, COUNT(*) as count')
				->where('YEAR(created_at)', $currentYear)
				->where('deleted_at IS NULL', null, false)
				->groupBy('MONTH(created_at)')
				->get()->getResult();
			foreach ($stats as $s) $contentData[(int)$s->month] += (int)$s->count;
		}

		$variable = [
			"parent" => "Panel",
			"page" => "Ikhtisar",
			"city" => $ipinfo["city"] ?? "-",
			"state" => $ipinfo["state"] ?? "-",
			"country_code" => strtolower($ipinfo["country_code"] ?? ""),
			"country" => $ipinfo["country"] ?? "-",
			"ip" => $this->request->getIPAddress(),
			"agent" => $this->request->getUserAgent(),
			"userdata" => user_detail(),
			"settings" => $this->settings,
			"counts" => (object) [
				"news"      => $db->table('news')->where('deleted_at', null)->countAllResults(),
				"services"  => $db->table('services')->where('deleted_at', null)->countAllResults(),
				"files"     => $db->table('files')->where('deleted_at', null)->countAllResults(),
				"galleries" => $db->table('galleries')->where('deleted_at', null)->countAllResults(),
			],
			"chart_visitors" => array_values($visitorData),
			"chart_content"  => array_values($contentData),
		];

		return view("app/overview", $variable);
	}
}
