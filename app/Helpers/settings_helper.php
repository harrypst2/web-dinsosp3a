<?php

use Config\Site;

/**
 * Get all settings
 * 
 * @return object
 */
function settings()
{
	$settings = new Site();
	return $settings;
}

/**
 * Get spesific setting
 * 
 * @param string $key
 * 
 * @return mixed
 */
function setting($key)
{
	$setting = settings()->{$key} ?? null;
	return $setting;
}

/**
 * Create a title with the format
 * Generate HTML title tag
 * 
 * @param string $page
 * @param bool $appName
 * 
 * @return string
 */
function set_title($page = "", $appName = true)
{
	$title = "<title>";

	if ($appName) {
		$pageTitle = esc($page);
		$pageTitle .= " - ";
		$pageTitle .= setting("appName");
	} else {
		$pageTitle = esc($page);
	}

	$title .= $page ? $pageTitle : setting("appTitle");
	$title .= "</title>";

	return $title;
}

/**
 * Create a title with the format
 * Generate HTML title tag
 * FOR PANEL
 * 
 * @param string $page
 * 
 * @return string
 */
function set_panel_title($page)
{
	$current = current_url();
	$uri = new \CodeIgniter\HTTP\URI($current);
	$slug = $uri->getSegments();

	if ($slug[count($slug) - 1] !== "overview") {
		$page = "Kelola " . $page;
	}

	$title = "<title>";
	$title .= esc($page);
	$title .= " - ";
	$title .= setting("appName");
	$title .= "</title>";

	return $title;
}

/**
 * Get array sidebar menu
 * 
 * @return object
 */
function sidebars()
{
	$current = current_url();
	$uri = new \CodeIgniter\HTTP\URI($current);
	$slug = $uri->getSegments();
	$slug[0] = "";
	$slug = implode("/", $slug);
	$slug = preg_replace("/\/(add|edit\/([a-zA-Z0-9]+))$/", "", $slug);

	// rewrite to add or edit services
	$slug = $slug == "/service" ? "/service/list" : $slug;

	$menus = [
		[
			"name" => "Ikhtisar",
			"link" => "/overview",
			"icon" => "home",
			"active" => "",
			"children" => [],
		],
		[
			"name" => "Berita",
			"link" => 0,
			"icon" => "news",
			"active" => "",
			"children" => [
				[
					"name" => "Kategori",
					"link" => "/categories",
					"active" => "",
				],
				[
					"name" => "Artikel",
					"link" => "/news",
					"active" => "",
				],
			],
		],
		[
			"name" => "Informasi",
			"link" => 0,
			"icon" => "info-circle",
			"active" => "",
			"children" => [
				[
					"name" => "Publik",
					"link" => "/information/public",
					"active" => "",
				],
				[
					"name" => "Agenda",
					"link" => "/information/agenda",
					"active" => "",
				],
				[
					"name" => "FAQ's",
					"link" => "/information/faqs",
					"active" => "",
				],
			],
		],
		[
			"name" => "Pelayanan",
			"link" => 0,
			"icon" => "apps",
			"active" => "",
			"children" => [
				[
					"name" => "Kategori",
					"link" => "/service/category",
					"active" => "",
				],
				[
					"name" => "Layanan",
					"link" => "/service/list",
					"active" => "",
				],
			],
		],
		[
			"name" => "Media",
			"link" => 0,
			"icon" => "upload",
			"active" => "",
			"children" => [
				[
					"name" => "Berkas",
					"link" => "/files",
					"active" => "",
				],
				[
					"name" => "Galeri",
					"link" => "/galleries",
					"active" => "",
				],
			],
		],
		[
			"name" => "Pegawai",
			"link" => 0,
			"icon" => "users",
			"active" => "",
			"children" => [
				[
					"name" => "Struktur Organisasi",
					"link" => "/org-chart",
					"active" => "",
				],
				[
					"name" => "Kepegawaian",
					"link" => "/employees",
					"active" => "",
				],
			],
		],
		[
			"name" => "Kelola",
			"link" => 0,
			"icon" => "adjustments-horizontal",
			"active" => "",
			"children" => [
				[
					"name" => "Tentang",
					"link" => "/about",
					"active" => "",
				],
				[
					"name" => "Kontak",
					"link" => "/contact",
					"active" => "",
				],
				[
					"name" => "Slider",
					"link" => "/sliders",
					"active" => "",
				],
				[
					"name" => "Tautan Eksternal",
					"link" => "/partners",
					"active" => "",
				],
				[
					"name" => "Pengguna",
					"link" => "/users",
					"active" => "",
				],
			],
		]
	];

	foreach ($menus as $key => $menu) {
		if (count($menu["children"]) > 0) {
			foreach ($menu["children"] as $index => $children) {
				if ($children["link"] == $slug) {
					$menus[$key]["active"] = "active";
					$menus[$key]["children"][$index]["active"] = "active";
				}
			}
		} else {
			if ($menu["link"] == $slug) {
				$menus[$key]["active"] = "active";
			}
		}
	}

	return array2object($menus);
}
