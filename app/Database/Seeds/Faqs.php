<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Faqs extends Seeder
{
	private $tableName = "faqs";

	public function run()
	{
		// disable foreign key checks
		// prevent error foreign key
		$this->db->disableForeignKeyChecks();

		$dataRecords = [
			[
				"question" => "Peningkatan Kualitas Keluarga",
				"answer" => "Berkaitan dengan Motekar (Motivator Kethanan Keluarga) di usia dini."
			]
		];

		// insert data (multiple) into table
		$this->db->table($this->tableName)->insertBatch($dataRecords);

		// enable again foreign key checks
		$this->db->enableForeignKeyChecks();
	}
}
