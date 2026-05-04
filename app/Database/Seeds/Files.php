<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Files extends Seeder
{
	private $tableName = "files";

	public function run()
	{
		// disable foreign key checks
		// prevent error foreign key
		$this->db->disableForeignKeyChecks();

		$dataRecords = [
			[
				"title" => "Target dan realisasi dinsosp3a triwulan II tahun 2019",
				"file" => "08ad2ba7ba3366d3634e553cf209ec85.pdf",
				"active" => "0",
				"created_at" => "2019-11-20 03:14:44",
				"updated_at" => "2019-11-20 03:15:55"
			],
			[
				"title" => "Usulan Penyempurnaan SOTK",
				"file" => "73e03f3a48a0954b15b3a6a9143c2ecc.pdf",
				"active" => "0",
				"created_at" => "2019-12-04 07:38:40",
				"updated_at" => "2019-12-04 07:38:40"
			],
			[
				"title" => "Format Capaian Kinerja",
				"file" => "d438bf33c960323aaad99611a01be89c.pdf",
				"active" => "0",
				"created_at" => "2019-12-05 03:07:03",
				"updated_at" => "2019-12-05 03:07:03"
			],
			[
				"title" => "Rekapitulasi Kegiatan Mingguan",
				"file" => "29caad9fd1060fed30acb88832aa9947.pdf",
				"active" => "0",
				"created_at" => "2019-12-05 07:04:21",
				"updated_at" => "2019-12-05 07:04:21"
			],
			[
				"title" => "Rintug DinsosP3A",
				"file" => "b58e7ed5bbf4cbe8c73d4eb266db6790.pdf",
				"active" => "0",
				"created_at" => "2019-12-05 07:10:19",
				"updated_at" => "2019-12-05 07:10:19"
			],
			[
				"title" => "Tagana 2019",
				"file" => "ada2acf30f49dced2ac344f75ef79756.pdf",
				"active" => "0",
				"created_at" => "2020-05-15 06:49:55",
				"updated_at" => "2020-05-15 06:49:55"
			],
			[
				"title" => "DTKS Kabupaten Purwakarta",
				"file" => "5d92e9f3b8d5bffd1880633e1461113b.pdf",
				"active" => "0",
				"created_at" => "2020-05-29 07:06:32",
				"updated_at" => "2020-05-29 07:06:32"
			],
			[
				"title" => "Kriteria PMKS",
				"file" => "d27db779e1526f830d44a42189d2b860.pdf",
				"active" => "1",
				"created_at" => "2020-09-21 11:29:43",
				"updated_at" => "2020-09-21 04:29:55"
			],
			[
				"title" => "SOP PEMBUATAN RENSTRA",
				"file" => "ccfa4067b7629a3f10a15abb86acfea9.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 08:27:20",
				"updated_at" => "2020-09-22 05:17:03"
			],
			[
				"title" => "SOP PEMBUATAN RENJA",
				"file" => "40ff8eceefcedfaa4e61ad573b33dce9.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:27:06",
				"updated_at" => "2020-09-22 05:17:02"
			],
			[
				"title" => "SOP PEMBUATAN LPPD",
				"file" => "0d25cf50ba28393d1a8c502b4054fe7d.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:28:34",
				"updated_at" => "2020-09-22 05:17:03"
			],
			[
				"title" => "SOP PEMBUATAN LAKIP",
				"file" => "f4394c8cf9ac989dd9f4aeae6fa8144a.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:30:23",
				"updated_at" => "2020-09-22 05:16:18"
			],
			[
				"title" => "SOP PEMBUATAN RKA",
				"file" => "af1511c91783d10679e5b8112d72c152.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:31:57",
				"updated_at" => "2020-09-22 05:16:05"
			],
			[
				"title" => "SOP PEMBUATAN DPA",
				"file" => "f9c451656e2d56320fc60cc116d912a2.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:33:22",
				"updated_at" => "2020-09-22 05:15:40"
			],
			[
				"title" => "SOP PENGELOLAAN DATA DAN INFORMASI",
				"file" => "93428ef0374a6942bba940d4ae95ae59.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:35:44",
				"updated_at" => "2020-09-22 05:15:16"
			],
			[
				"title" => "SOP PENYUSUNAN LAPORAN TAHUNAN",
				"file" => "e8c5448d0cc85e10866c2a8ff3ae61d6.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:37:19",
				"updated_at" => "2020-09-22 05:15:10"
			],
			[
				"title" => "SOP PELAKSANAAN PEMUTAKHIRAN DUK",
				"file" => "d062a5088daa65dc0cee1939334dcdd0.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:39:25",
				"updated_at" => "2020-09-22 05:15:05"
			],
			[
				"title" => "SOP PELAKSANAAN PEMUKTAHIRAN DATA PENGELOLAAN KEPEGAWAIAN",
				"file" => "541580c810f2c1ceec35ed705d3ef2a1.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:40:41",
				"updated_at" => "2020-09-22 05:15:05"
			],
			[
				"title" => "SOP PELAKSANAAN PEMUKTAHIRAN BAZETING PEGAWAI",
				"file" => "3c46b1bd02a2c43b845f6e27c4325490.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:42:03",
				"updated_at" => "2020-09-22 05:15:54"
			],
			[
				"title" => "SOP PENERBITAN DOKUMEN KGB",
				"file" => "aed9c2fd448e4b400240e389c24347ac.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:43:33",
				"updated_at" => "2020-09-22 05:14:48"
			],
			[
				"title" => "SOP PEMBUATAN SURAT KETERANGAN UNTUK MENDAPATKAN PEMBAYARAN TUNJANGAN KELUARGA (SKUMPTK)",
				"file" => "ea56a92a5964eface6580b9af460bd6c.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:44:52",
				"updated_at" => "2020-09-22 05:14:44"
			],
			[
				"title" => "SOP PELAKSANAAN HUKUMAN DISIPLIN RINGAN PEGAWAI",
				"file" => "da053775b44c05424dee706f51f2d65a.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:46:15",
				"updated_at" => "2020-09-22 05:14:32"
			],
			[
				"title" => "SOP PELAKSANAAN HUKUMAN DISIPLIN SEDANG DAN BERAT PEGAWAI",
				"file" => "38c019cbb781b7289fac9aa02d71854c.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:47:58",
				"updated_at" => "2020-09-22 05:14:28"
			],
			[
				"title" => "SOP PEMBUATAN SURAT KETERANGAN CUTI",
				"file" => "556a2db8ad1c67af691e0d97943fa059.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:49:12",
				"updated_at" => "2020-09-22 05:13:27"
			],
			[
				"title" => "SOP PELAKSANAAN CUTI TAHUNAN",
				"file" => "fbb7d46f3656ef7f36241e47930e75e3.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:50:32",
				"updated_at" => "2020-09-22 05:11:05"
			],
			[
				"title" => "SOP PEMBUATAN REKOMENDASI CUTI DI LUAR TANGGUNGAN NEGARA (CLTN)",
				"file" => "f86b0caf5cd53e65c9f49d369e221d0d.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:52:25",
				"updated_at" => "2020-09-22 05:13:11"
			],
			[
				"title" => "SOP PEMBUATAN  REKOMENDASI SURAT KETERANGAN TUGAS IZIN BELAJAR",
				"file" => "6e14e64d95d8dcea048049f0184c71d2.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:53:53",
				"updated_at" => "2020-09-22 05:13:00"
			],
			[
				"title" => "SOP PEMROSESAN SURAT MASUK",
				"file" => "904c1cebf0dfa30fffb9df154df2c6de.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:54:47",
				"updated_at" => "2020-09-22 05:12:48"
			],
			[
				"title" => "SOP PELAYANAN DAN PEMROSESAN SURAT KELUAR",
				"file" => "0644ead510b2f2b25ca236032083ba4c.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:57:05",
				"updated_at" => "2020-09-22 05:12:37"
			],
			[
				"title" => "SOP PELAYANAN PEMINJAMAN ARSIP DI SEKRETARIAT",
				"file" => "e51eb93932c842b52b25f1283bdbd196.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:58:00",
				"updated_at" => "2020-09-22 05:12:27"
			],
			[
				"title" => "SOP PEMBUATAN REKOMENDASI IJIN PERCERAIAN BAGI PNS",
				"file" => "e3d1c701c81840303da4c079ae0424b0.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 09:59:41",
				"updated_at" => "2020-09-22 05:12:10"
			],
			[
				"title" => "SOP PENGAJUAN SPP LS BARANG DAN JASA",
				"file" => "c3d12a36a1b820986393fed83c989d35.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:00:39",
				"updated_at" => "2020-09-22 05:11:49"
			],
			[
				"title" => "PENGAJUAN SPP LS GAJI",
				"file" => "afd115ac2e557cb111119db1d2f8c270.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:04:47",
				"updated_at" => "2020-09-22 05:11:24"
			],
			[
				"title" => "SOP PENGAJUAN SPP TU GU",
				"file" => "f2eb71508611537d1706b31746b2752d.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:07:38",
				"updated_at" => "2020-09-22 05:11:16"
			],
			[
				"title" => "SOP PEMBUATAN BAHAN USULAN PENSIUN PEGAWAI",
				"file" => "25513dddb49a835395afcabcaf797a54.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:09:19",
				"updated_at" => "2020-09-22 05:10:30"
			],
			[
				"title" => "SOP REHABILITASI ANAK TERLANTAR",
				"file" => "d786d5eb9682b2b8ccb33017d26bae86.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:25:55",
				"updated_at" => "2020-09-22 05:10:22"
			],
			[
				"title" => "SOP REHABILITASI GELANDANG DAN PENGEMIS",
				"file" => "b3af2bfa39e184d30a67265a40858ccb.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:27:14",
				"updated_at" => "2020-09-22 05:10:04"
			],
			[
				"title" => "SOP REHABILITASI SOSIAL BAGI TUNA SUSILA",
				"file" => "b73ed4fa4494a248e4fbef8ce5889661.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:28:32",
				"updated_at" => "2020-09-22 05:09:55"
			],
			[
				"title" => "SOP REHABILITASI KETUNAAN",
				"file" => "948c5161cecea1725cd1bc65f326a029.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:31:31",
				"updated_at" => "2020-09-22 05:09:43"
			],
			[
				"title" => "SOP PENANGANAN DAN PELAYANAN GELANDANG DAN PENGEMIS",
				"file" => "12a5ad9b0322dcad6342cd0c45515191.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:44:51",
				"updated_at" => "2020-09-22 05:09:23"
			],
			[
				"title" => "SOP PENANGANAN ORANG DENGAN GANGGUAN JIWA (ODGJ)",
				"file" => "9d756e662953cdf0d4fcc3981c901173.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:45:58",
				"updated_at" => "2020-09-22 05:09:07"
			],
			[
				"title" => "SOP PENGELOLAAN DATA PMKS",
				"file" => "42e28d3293b5fc760e03b76e295edf78.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:48:39",
				"updated_at" => "2020-09-22 05:08:55"
			],
			[
				"title" => "SOP PENGUMPULAN UANG ATAU BARANG SERTA UNDIAN GRATIS BERHADIAH",
				"file" => "86c652be3fbac4449f6e4b940ec15f54.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:50:14",
				"updated_at" => "2020-09-22 05:07:22"
			],
			[
				"title" => "SOP PEMBERDAYAAN LEMBAGA KONSULTASI KESEJAHTERAAN KELUARGA (LK3)",
				"file" => "3355b14fbe0bc2857d233695b8340063.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:53:05",
				"updated_at" => "2020-09-22 05:06:39"
			],
			[
				"title" => "SOP PEMBERIAN ALAT BANTU DISABILITAS",
				"file" => "f69dd4d1adb7549500fd906fda296a91.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:57:51",
				"updated_at" => "2020-09-22 05:02:38"
			],
			[
				"title" => "SOP PEMBERIAN BANTUAN BAGI TUNA SUSILA",
				"file" => "fef6755dec03ea956f94e0cae85f7553.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 10:59:39",
				"updated_at" => "2020-09-22 05:02:37"
			],
			[
				"title" => "SOP PENINGKATAN KETERAMPILAN EX PSK",
				"file" => "2101af800de90e502c03eee9dabcb6b1.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:00:39",
				"updated_at" => "2020-09-22 05:02:04"
			],
			[
				"title" => "SOP PEMBERIAN BANTUAN BAGI KORBAN BENCANA SOSIAL DAN ALAM",
				"file" => "dd68c33926f830d3957577366e4abc3b.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:11:56",
				"updated_at" => "2020-09-22 05:01:38"
			],
			[
				"title" => "SOP PERLINDUNGAN KORBAN BENCANA SOSIAL DAN ALAM",
				"file" => "060e92b6b436a81a3cc9466cb570c8a9.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:12:52",
				"updated_at" => "2020-09-22 05:01:11"
			],
			[
				"title" => "SOP PERLINDUNGAN TERHADAP PENYANDANG MASALAH SOSIAL (PBIJKN)",
				"file" => "e2eb3b53f96fc5c269f69a4cf4bba140.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:14:12",
				"updated_at" => "2020-09-22 05:01:00"
			],
			[
				"title" => "SOP PEMBERIAN BANTUAN SOSIAL KEPADA ORANG TERLANTAR DAN KEHABISAN BEKAL",
				"file" => "5a61a27c7b1a353ceef06672b95d2aaa.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:16:05",
				"updated_at" => "2020-09-22 05:00:53"
			],
			[
				"title" => "SOP PEMBERDAYAAN KUBE BAGI KELUARGA MISKIN",
				"file" => "adcac4d012c5b125a8387e64b94c0c7c.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:16:59",
				"updated_at" => "2020-09-22 05:00:44"
			],
			[
				"title" => "SOP PEMBERIAN BANTUAN NON TUNAI (BPNT)",
				"file" => "ff54c096c7cf3f2a226d874f03f9ffaa.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:18:14",
				"updated_at" => "2020-09-22 05:00:40"
			],
			[
				"title" => "SOP PENANGANAN PENGADUAN BAGI PEREMPUAN DAN ANAK KORBAN KEKERASAN",
				"file" => "d751a6d555e9eb2892be1875e5e30049.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:22:46",
				"updated_at" => "2020-09-22 05:00:25"
			],
			[
				"title" => "SOP PELAYANAN KESEHATAN BAGI PEREMPUAN KORBAN KEKERASAN",
				"file" => "20e514409014800c71550a53a883cf00.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:23:30",
				"updated_at" => "2020-09-22 05:00:18"
			],
			[
				"title" => "SOP REHABILITASI SOSIAL BAGI PEREMPUAN DAN ANAK KORBAN KEKERASAN",
				"file" => "7514a9d3b473b2793a421fbc9d5649a9.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:24:23",
				"updated_at" => "2020-09-22 05:00:12"
			],
			[
				"title" => "SOP PEMBINAAN KETAHANAN KELUARGA",
				"file" => "555438b77af7ba06fd48ab6e31de55f0.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:27:07",
				"updated_at" => "2020-09-22 05:00:06"
			],
			[
				"title" => "SOP PEMBENTUKAN PENGEMBANGAN KOTA LAYAK ANAK",
				"file" => "bccbe259fdfbee1e0cfe887c0fdf5c79.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:29:26",
				"updated_at" => "2020-09-22 04:59:41"
			],
			[
				"title" => "SOP PEMBENTUKAN PENGEMBANGAN KAMPUNG RAMAH ANAK",
				"file" => "ba30425e27d3f27344378cda55db11e1.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:37:20",
				"updated_at" => "2020-09-22 04:59:31"
			],
			[
				"title" => "SOP PEMBINAAN P2WKSS",
				"file" => "ee29fdeec79d0a77dec450b93d71210c.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:40:24",
				"updated_at" => "2020-09-22 04:59:13"
			],
			[
				"title" => "SOP PENYEDIAAN DATA PILAH DAN SISTEM INFORMASI GENDER (SIGA)",
				"file" => "dc24c56e3691c59d2993c40a2d33a44d.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:41:25",
				"updated_at" => "2020-09-22 04:59:06"
			],
			[
				"title" => "SOP PEMBINAAN PEREMPUAN KEPALA KELUARGA (PEKKA)",
				"file" => "ac57b8e0b7fceb30bb43942ebbbd7166.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:44:40",
				"updated_at" => "2020-09-22 04:57:37"
			],
			[
				"title" => "SOP PEMBINAAN USAHA EKONOMI PRODUKTIF (UEP) PEREMPUAN",
				"file" => "5af75a6e029b7d31fd133bd9740563d9.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:46:40",
				"updated_at" => "2020-09-22 04:56:55"
			],
			[
				"title" => "SOP PEMBINAAN ORGANISASI PEREMPUAN",
				"file" => "325f95f64dba4236ed0c84221be15a6c.pdf",
				"active" => "1",
				"created_at" => "2020-09-22 11:51:40",
				"updated_at" => "2020-09-22 04:56:40"
			]
		];

		// insert data (multiple) into table
		$this->db->table($this->tableName)->insertBatch($dataRecords);

		// enable again foreign key checks
		$this->db->enableForeignKeyChecks();
	}
}
