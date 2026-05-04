<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Run extends Seeder
{
	public function run()
	{
		$this->call("Users");
		$this->call("Sliders");
		$this->call("Files");
		$this->call("Categories");
		$this->call("News");
		$this->call("Faqs");
		$this->call("Galleries");
		$this->call("Employees");
		$this->call("Targets");
		$this->call("Informations");
		$this->call("Orgchart");
		$this->call("About");
	}
}
