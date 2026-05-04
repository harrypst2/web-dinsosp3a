<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Informations extends Seeder
{
	private $tableName = "informations";

	public function run()
	{
		// disable foreign key checks
		// prevent error foreign key
		$this->db->disableForeignKeyChecks();

		$dataRecords = [
			[
				"title" => "Target Kota Layak Anak, Dinsos PPA Gelar Sosialisasi Sekolah Ramah Anak",
				"slug" => "target-kota-layak-anak-dinsos-ppa-gelar-sosialisasi-sekolah-ramah-anak",
				"content" => "<p>Target mendapatkan predikat Kota Ramah Anak (KRA) Dinas Sosial, Pemberdayaan, Perlindungan Perempuan dan Anak (P3A) Kabupaten Purwakarta terus lakukan sosialiasasi, diantaranya di di SMA 1 Plered. Jumat (2/8/2019).&nbsp;</p><p>Predikat ramah anak, pun nampaknya menyasar kepada sekolah - sekolah, bagian dari tekad Pemkab Purwakarta untuk mewujudkan Purwakarta sebagai kota layak anak.</p><p>&quot;Bagian dari instrumen Kabupaten atau Kota layak anak salah satunya yang dicanangkan oleh Kementerian Pemberdayaan Perempuan bahwa untuk di Tahun 2030 Indonesia harus layak anak,&quot; ujar Kabid Perlindungan Anak Dinas Sosial Kabupaten Purwakarta Nur Aisah Jamil.</p><p>Apalagi sekolah merupakan rumah kedua bagi anak-anak. Untuk itu, sekolah harus menjadi sarana dan prasarana yang membuat anak nyaman dan betah selain di rumah.</p><p>Pihaknyapun turut menggandeng pihak KPAI dan Unit PPA Polres Purwakarta, Nur Aisah Jamil mengatakan tak hanya di SMA 1 Plered, kegiatan serupa juga bakal digelar di sekolah-sekolah di 17 Kecamatan di Purwakarta.</p><p>&quot;Kecamatan Plered harus menjadi icon sekolah ramah anak, sehingga dapat menciptakan generasi penerus yang berkualitas, jadi bukan hanya di Plered tapi kecamatan lainnya kita menggelar acara serupa,&quot; katanya.</p><p>Lebih jauh ia menjelaskan, sosialisasi ini tak hanya menyasar sekolah-sekolah saja namun juga ke sejumlah instansi, desa dan kampong &ndash; kampong di Purwakarta. Hal tersebut bagian dari upaya target Pemerintah Daerah,menjadi salah satu daerah memiliki predikat ramah anak.</p><p>&quot;Kita juga sudah melakukan Sosialisasi ramah anak di Kecamatan Purwakarta, Bungursari, Campaka, Cibatu Pasawahan, Pondoksalam dan Plered,&quot; katanya.</p><p>Sementara itu, Kepala SMA 1 Plered Ipit Rahmiati mengatakan, sangat mendukung upaya Pemerintah dalam mewujudkan Purwakarta sebagai kota layak anak.</p><p>&quot;Mudah-mudahan dengan adanya kegiatan sosialisasi ini pelajar di sekolah kami menjadi pribadi yang Akhlakul karimah dan bisa menjadikan sekolah tempat yang nyaman untuk anak - anak,&quot; singkatnya.</p><p>Kegiatan deklarasi Sekolah Ramah Anak serta Sosialisasi pengembangan gugus tugas Trafficking tahun 2019. Dilanjutkan dengan pengumpulan tanda tangan sebagai dukungan yang dilakukan oleh pelajar, guru maupun masyarakat sekitar SMAN 1 Plered. (*)</p><p>Source : <a href=\"http://www.purwakartakab.go.id/read/460\">Silahkan Cek Link Asli</a></p>",
				"thumbnail" => "edb268f0297b933bf7d2218475424bdb.jpg",
				"category" => "public"
			]
		];

		// insert data (multiple) into table
		$this->db->table($this->tableName)->insertBatch($dataRecords);

		// enable again foreign key checks
		$this->db->enableForeignKeyChecks();
	}
}
