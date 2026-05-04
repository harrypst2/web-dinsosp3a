<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Employees extends Seeder
{
	private $tableName = "employees";

	public function run()
	{
		// disable foreign key checks
		// prevent error foreign key
		$this->db->disableForeignKeyChecks();

		$dataRecords = [
			[
				"name" => "ASEP SURYA KOMARA, SH. M.SI",
				"nip" => "196506121987031007",
				"photo" => "182a7f7b0791bed3d68913cf1dcbdde0.jpg",
			],
			[
				"name" => "NENENG MARYAMAH, S.ST., M.Kes",
				"nip" => "197104041993022002",
				"photo" => "89ebc536282c95febc50f9b6752c4de4.jpg",
			],
			[
				"name" => "RESOD EDION",
				"nip" => "198310192009011002",
				"photo" => "325c9f46c35839ccce290b60bf5df521.jpg",
			],
			[
				"name" => "NINA SYAHRIANI, SE",
				"nip" => "197002191993122001",
				"photo" => "f0e8ba4ead28b2673e5ec0aefb0ec3e1.JPG",
			],
			[
				"name" => "ASIH MURTININGSIH, SE",
				"nip" => "197010312007012004",
				"photo" => "5a13349a4c0d78bd7594a216bd973e65.jpg",
			],
			[
				"name" => "ARIP RAHMAN, SE",
				"nip" => "197111112009061006",
				"photo" => "6aa9fdf105ccdc7f24a7062c4bb644fb.JPG",
			],
			[
				"name" => "TEDY RIYADI",
				"nip" => "197012022005011007",
				"photo" => "e41b0506bc9d695b8fbeafdb57767c56.JPG",
			],
			[
				"name" => "DEWI SARAH NURWIYANTI, SH",
				"nip" => "197806262007012008",
				"photo" => "77ad88c29f9ff8b6b2e43cc7f2b35d3b.JPG",
			],
			[
				"name" => "Yeni Heryani, SE",
				"nip" => "19770618 200901 2 002",
				"photo" => "3a94614f00733ee3e127d3a6b48d097f.jpg",
			],
			[
				"name" => "DR. Hj. Nur Aisah Jamil, M.Pd",
				"nip" => "19740525 200801 2 002",
				"photo" => "b3b87da0d382bba59251663a0fb9ca37.jpg",
			],
			[
				"name" => "Hj. Rochmawati, S.Pd, M.Pd",
				"nip" => "19700923 199601 2 001",
				"photo" => "f5899a5d66375037e03e58517f9bb7f1.jpg",
			],
			[
				"name" => "Rahayuana Setiawan, S.Pd, MM",
				"nip" => "19640110 198803 1 009",
				"photo" => "90c564d9f57b998ba6ee5b7786edc992.JPG",
			],
			[
				"name" => "Tedi Kustiadi, SE",
				"nip" => "19641227 198503 1 005",
				"photo" => "bc3f261927d92f5ef13fbcad9525110c.JPG",
			],
			[
				"name" => "Dra. Yuyun Hasanah",
				"nip" => "19670615 199303 2 004",
				"photo" => "f598a0e7ed832fd3360224ef4bc7dc8a.jpg",
			],
			[
				"name" => "Masudah, SE",
				"nip" => "19630801 198503 2 004",
				"photo" => "c56fbed6a4bccab21e001df3c5c3494f.JPG",
			],
			[
				"name" => "Susanti laela, SE",
				"nip" => "19811001 200901 1 003",
				"photo" => "d015abb8ccfbee6aba19686a8d6942ae.jpg",
			],
			[
				"name" => "Yadi Mulyadi",
				"nip" => "19750716 200801 1 003",
				"photo" => "e0da3ec604e752a2dd184ded74d1a578.jpg",
			],
			[
				"name" => "Didin Dimyati",
				"nip" => "19750920 201001 1 001",
				"photo" => "b0f3e7dc1c404ec945a381464ca52777.jpg",
			],
			[
				"name" => "Lilis Rinawati, SH",
				"nip" => "19631208 198901 2 001",
				"photo" => "9a8aa19e4925faef5946325107328edb.JPG",
			],
			[
				"name" => "Mulyana",
				"nip" => "19651212 199003 1 015",
				"photo" => "952f3971ac2befa16a87bf4947a050fc.jpg",
			],
			[
				"name" => "Susy Susanty Sanusi, SP",
				"nip" => "19711008 201412 2 001",
				"photo" => "240bf1c12612448d8534edd63ff1434d.JPG",
			],
			[
				"name" => "Jejen Adipidiana, A.Md",
				"nip" => "19830107 200901 1 002",
				"photo" => "f923f287d2658c55c621b96867ebdf80.JPG",
			],
			[
				"name" => "Endang",
				"nip" => "19761114 200701 1 006",
				"photo" => "a1b0d8be737e6dabc629006f92ceb057.JPG",
			],
			[
				"name" => "Asep Heri Sutisna",
				"nip" => "19670225 200701 1 002",
				"photo" => "e8fc8dacf8d48fb17e1b5cae5526441c.JPG",
			],
			[
				"name" => "Efendi, SE, M.Si",
				"nip" => "19660210 199601 1 001",
				"photo" => "66ed457f81002b5c9600540cb0d88190.JPG",
			],
			[
				"name" => "tedi Sutedi",
				"nip" => "19641010 198903 1 009",
				"photo" => "a9915a0858edb4bd5d71c5ea7f09f7dd.JPG",
			],
			[
				"name" => "Dian Herdiana",
				"nip" => "19850415 200801 1 001",
				"photo" => "798e25e020b54d760c808e3427f0b420.JPG",
			],
			[
				"name" => "Asep Yudi Fauzi",
				"nip" => "19680121 200701 1 001",
				"photo" => "8d79a19cb4ce93b5a0209c580f5045b8.JPG",
			],
			[
				"name" => "Yayat Sumirat UP",
				"nip" => "19720215 200901 1 002",
				"photo" => "591be0e8d95a805647ebfec112faa4a0.JPG",
			],
			[
				"name" => "Widya Anggraini, SE",
				"nip" => "19840414 200901 2 001",
				"photo" => "0e21a763249d0ec43e5551e136b6420f.jpg",
			],
			[
				"name" => "Mochamad Kusmurhadi, ST",
				"nip" => "19651222 198603 1 007",
				"photo" => "ba9955f7b50a43a5f4a3d03fbe86d1c1.jpg",
			],
			[
				"name" => "Drs. Agus Syamsu Rizal",
				"nip" => "19660506 199603 1 005",
				"photo" => "b386f83e6a423b091fe3b6055d3a83fe.jpg",
			]
		];

		// insert data (multiple) into table
		$this->db->table($this->tableName)->insertBatch($dataRecords);

		// enable again foreign key checks
		$this->db->enableForeignKeyChecks();
	}
}
