<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Orgchart extends Seeder
{
	private $tableName = "orgchart";

	public function run()
	{
		// disable foreign key checks
		// prevent error foreign key
		$this->db->disableForeignKeyChecks();

		$dataRecords = [
			[
				"name" => "Amber McKenzie",
				"position" => "CEO",
				"nip" => "123",
				"photo" => "https://cdn.balkan.app/shared/empty-img-white.svg",
				"parent" => null,
			],
			[
				"name" => "Ava Field",
				"position" => "IT Manager",
				"nip" => "456",
				"photo" => "https://cdn.balkan.app/shared/empty-img-white.svg",
				"parent" => 1,
			],
			[
				"name" => "Rhys Harper",
				"position" => "",
				"nip" => "789",
				"photo" => "https://cdn.balkan.app/shared/empty-img-white.svg",
				"parent" => 1,
			],
		];

		// insert data (multiple) into table
		$this->db->table($this->tableName)->insertBatch($dataRecords);

		// enable again foreign key checks
		$this->db->enableForeignKeyChecks();
	}
}
