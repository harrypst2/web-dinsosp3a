<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use Config\Site;

class Maintenance implements FilterInterface
{
	private $config;

	function __construct()
	{
		// get sites config
		$this->config = new Site();

		// load custom helper
		helper("settings");
		helper("icons");
	}

	public function before(RequestInterface $request, $arguments = null)
	{
		// if maintenance mode is true
		if ($this->config->maintenanceMode == true) {

			// declare variable to be passed to view
			$variable = [
				"page" => "Dalam Perbaikan",
				// ...
				"settings" => $this->config,
			];

			// then show maintenance view
			echo view("public/maintenance", $variable);
			exit();
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
	}
}
