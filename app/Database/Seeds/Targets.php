<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Targets extends Seeder
{
	private $tableName = "targets";

	public function run()
	{
		// disable foreign key checks
		// prevent error foreign key
		$this->db->disableForeignKeyChecks();

		$dataRecords = [
			[
				"name" => "Anak Jalanan",
				"total" => 0,
				"slug" => "anak-jalanan"
			],
			[
				"name" => "Anak Balita Terlantar",
				"total" => 26,
				"slug" => "anak-balita-terlantar"
			],
			[
				"name" => "Anak Berhadapan Dengan Hukum",
				"total" => 42,
				"slug" => "anak-berhadapan-dengan-hukum"
			],
			[
				"name" => "Anak Terlantar",
				"total" => 153,
				"slug" => "anak-terlantar"
			],
			[
				"name" => "Anak Dengan Disabilitas",
				"total" => 33,
				"slug" => "anak-dengan-disabilitas"
			],
			[
				"name" => "Lansia Terlantar",
				"total" => 162,
				"slug" => "lansia-terlantar"
			],
			[
				"name" => "Penyandang Disabilitas",
				"total" => 3174,
				"slug" => "penyandang-disabilitas"
			],
			[
				"name" => "Tuna Susila",
				"total" => 12,
				"slug" => "tuna-susila"
			],
			[
				"name" => "Pemulung",
				"total" => 38,
				"slug" => "pemulung"
			],
			[
				"name" => "Bekas Warga Binaan LP",
				"total" => 200,
				"slug" => "bekas-warga-binaan-lp"
			],
			[
				"name" => "Pekerja Migran Bermasalah Sosial",
				"total" => 107,
				"slug" => "pekerja-migran-bermasalah-sosial"
			],
			[
				"name" => "Korban Bencana Alam",
				"total" => 172,
				"slug" => "korban-bencana-alam"
			],
			[
				"name" => "Korban Bencana Sosial",
				"total" => 32,
				"slug" => "korban-bencana-sosial"
			],
			[
				"name" => "Wanita Rawan Sosial Ekonomi",
				"total" => 1713,
				"slug" => "wanita-rawan-sosial-ekonomi"
			],
			[
				"name" => "Fakir Miskin",
				"total" => 36699,
				"slug" => "fakir-miskin"
			],
			[
				"name" => "Keluarga Bermasalah Sosial Psikologis",
				"total" => 144,
				"slug" => "keluarga-bermasalah-sosial-psikologis"
			],
			[
				"name" => "Orang Dengan HIV/AIDS",
				"total" => 759,
				"slug" => "orang-dengan-hiv-aids"
			],
			[
				"name" => "Lembaga Kesejahteraan Sosial",
				"total" => 34,
				"slug" => "lembaga-kesejahteraan-sosial"
			],
		];

		// insert data (multiple) into table
		$this->db->table($this->tableName)->insertBatch($dataRecords);

		// enable again foreign key checks
		$this->db->enableForeignKeyChecks();
	}
}
