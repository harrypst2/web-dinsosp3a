<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AboutModel;
use App\Models\EmployeesModel;
use App\Models\SlidersModel;
use App\Models\TargetsModel;
use App\Models\FaqsModel;
use App\Models\GalleriesModel;
use App\Models\NewsModel;
use App\Models\OrgchartModel;
use App\Models\PartnersModel;

class Home extends BaseController
{
	/** @var SlidersModel */
	protected $sliders;
	/** @var TargetsModel */
	protected $targets;
	/** @var FaqsModel */
	protected $faqs;
	/** @var NewsModel */
	protected $news;
	/** @var AboutModel */
	protected $about;
	/** @var EmployeesModel */
	protected $employees;
	/** @var GalleriesModel */
	protected $galleries;
	/** @var OrgchartModel */
	protected $orgchart;
	/** @var PartnersModel */
	protected $partners;

	function __construct()
	{
		$this->sliders = new SlidersModel();
		$this->targets = new TargetsModel();
		$this->faqs = new FaqsModel();
		$this->news = new NewsModel();
		$this->about = new AboutModel();
		$this->employees = new EmployeesModel();
		$this->galleries = new GalleriesModel();
		$this->orgchart = new OrgchartModel();
		$this->partners = new PartnersModel();
	}

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		log_visitor();
	}

	public function index()
	{
		$sliders = $this->sliders->select("image")->orderBy("id", "ASC")->findAll();
		$targets = $this->targets->select("name, total, slug")->orderBy("id", "DESC")->findAll();
		$faqs = $this->faqs->select("question, answer")->orderBy("id", "DESC")->findAll(3);
		$news = $this->news->select("title, slug, thumbnail, views, updated_at, created_at")->orderBy("id", "DESC")->findAll(3);
		$partners = $this->partners->select("name, url, image, description")->findAll();
		$gmaps = $this->about->google_maps();

		$variable = [
			"page" => "",
			"sliders" => $sliders,
			"targets" => $targets,
			"faqs" => $faqs,
			"news" => $news,
			"partners" => $partners,
			"gmaps" => $gmaps,
			"settings" => $this->settings,
		];

		return view("public/landing", $variable);
	}

	public function about()
	{
		$about = $this->about->where("code", "about")->first();

		$variable = [
			"page" => "Tentang",
			"about" => $about,
			"settings" => $this->settings,
		];

		return view("public/about", $variable);
	}

	public function vision_mission()
	{
		$about = $this->about->where("code", "vision-mission")->first();

		$variable = [
			"page" => "Visi dan Misi",
			"about" => $about,
			"settings" => $this->settings,
		];

		return view("public/about", $variable);
	}

	private function children_chart($id)
	{
		$charts = [];
		$orgs = $this->orgchart->where("parent", $id)->findAll();

		foreach ($orgs as $human) {
			array_push($charts, [
				"id" => $human->id,
				"pid" => $id,
				"Nama Lengkap" => $human->name,
				"Posisi" => $human->position,
				"img" => safe_photo($human->photo),
			]);

			array_push($charts, ...$this->children_chart($human->id));
		}

		return $charts;
	}

	public function org_chart()
	{
		$allOrgs = $this->orgchart->where("deleted_at IS NULL", null, false)->findAll();
		$orgsTree = $this->buildTree($allOrgs);

		// Custom Sort: Move 'P3A' bidang to the bottom
		if (!empty($orgsTree)) {
			foreach ($orgsTree as $root) {
				if (isset($root->children)) {
					usort($root->children, function ($a, $b) {
						$target = 'Bidang Pemberdayaan Perempuan dan Perlindungan Anak';
						if ($a->bidang === $target) return 1;
						if ($b->bidang === $target) return -1;
						return 0;
					});
				}
			}
		}

		$variable = [
			"page" => "Struktur Organisasi",
			"orgsTree" => $orgsTree,
			"settings" => $this->settings,
		];

		return view("public/org-chart", $variable);
	}

	public function employees()
	{
		$allEmployees = $this->employees->where("deleted_at IS NULL", null, false)->findAll();
		
		// Build tree
		$employeesTree = $this->buildTree($allEmployees);

		$variable = [
			"page" => "Kepegawaian",
			"employeesTree" => $employeesTree,
			"settings" => $this->settings,
		];

		return view("public/employees", $variable);
	}

	private function buildTree(array $elements, $parentId = null)
	{
		$branch = [];
		static $grouped = null;

		if ($grouped === null) {
			$grouped = [];
			foreach ($elements as $element) {
				$grouped[$element->parent][] = $element;
			}
		}

		if (isset($grouped[$parentId])) {
			foreach ($grouped[$parentId] as $element) {
				$children = $this->buildTree($elements, $element->id);
				if ($children) {
					$element->children = $children;
				}
				$branch[] = $element;
			}
		}

		return $branch;
	}

	public function tasks()
	{
		$about = $this->about->where("code", "tasks")->first();

		$variable = [
			"page" => "Tugas Pokok dan Fungsi",
			"about" => $about,
			"settings" => $this->settings,
		];

		return view("public/about", $variable);
	}

	public function galleries()
	{
		$galleries = $this->galleries->orderBy("id", "DESC")->paginate(9);
		$pager = $this->galleries->orderBy("id", "DESC")->pager;

		$variable = [
			"page" => "Galeri",
			"galleries" => $galleries,
			"pager" => $pager,
			"settings" => $this->settings,
		];

		return view("public/galleries", $variable);
	}

	public function contact()
	{
		$gmaps = $this->about->google_maps();

		$variable = [
			"page" => "Hubungi Kami",
			"gmaps" => $gmaps,
			"phone" => $this->about->get_config("phone"),
			"email" => $this->about->get_config("email"),
			"address" => $this->about->get_config("address"),
			"desc_phone" => $this->about->get_config("description-phone"),
			"desc_email" => $this->about->get_config("description-email"),
			"desc_location" => $this->about->get_config("description-location"),
			"settings" => $this->settings,
		];

		return view("public/contact", $variable);
	}

	public function override()
	{
		$variable = [
			"page" => "Halaman Tidak Ditemukan",
			"settings" => $this->settings,
		];

		echo view("public/override", $variable);
	}
}
