<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categories extends Seeder
{
	private $tableName = "categories";

	public function run()
	{
		// disable foreign key checks
		// prevent error foreign key
		$this->db->disableForeignKeyChecks();

		$dataRecords = [
			[
				"name" => "Lainnya",
				"slug" => "uncategorized"
			]
		];

		// insert data (multiple) into table
		$this->db->table($this->tableName)->insertBatch($dataRecords);

		// enable again foreign key checks
		$this->db->enableForeignKeyChecks();
	}
}
