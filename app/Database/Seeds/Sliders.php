<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Sliders extends Seeder
{
	private $tableName = "sliders";

	public function run()
	{
		// disable foreign key checks
		// prevent error foreign key
		$this->db->disableForeignKeyChecks();

		$dataRecords = [
			[
				"image" => "dummy1.jpg",
				"title" => "Lorem ipsum satu",
				"description" => "Lorem ipsum dolor sit amet satu",
			],
			[
				"image" => "dummy2.jpg",
				"title" => "Lorem ipsum dua",
				"description" => "Lorem ipsum dolor sit amet dua",
			],
			[
				"image" => "dummy3.jpg",
				"title" => "Lorem ipsum tiga",
				"description" => "Lorem ipsum dolor sit amet tiga",
			],
		];

		// insert data (multiple) into table
		$this->db->table($this->tableName)->insertBatch($dataRecords);

		// enable again foreign key checks
		$this->db->enableForeignKeyChecks();
	}
}
