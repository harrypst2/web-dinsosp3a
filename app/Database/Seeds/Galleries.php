<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Galleries extends Seeder
{
	private $tableName = "galleries";

	public function run()
	{
		// disable foreign key checks
		// prevent error foreign key
		$this->db->disableForeignKeyChecks();

		$dataRecords = [
			[
				"title" => "Sosialisasi Website DINSOSP3a",
				"image" => "7ae1fee3d03dfe0fd83dbf2158df4fdb.jpeg",
				"created_at" => "2019-11-20 03:19:12",
				"updated_at" => "2019-11-20 03:19:12"
			],
			[
				"title" => "Sosialisasi Aplikasi Pengelolaan Data Dinas Sosial P3a",
				"image" => "98140f20e31d4191cb79c0372c974ab6.jpeg",
				"created_at" => "2019-11-20 03:19:42",
				"updated_at" => "2019-11-20 03:19:42"
			],
			[
				"title" => "Monitoring dan Evaluasi kesatuan Gerak PKK Tk.Provinsi Jawa Barat di Desa KarangMukti Kec.Bungursari",
				"image" => "b7af4d1620641cd36b50125d4d39aca4.jpg",
				"created_at" => "2019-11-20 04:29:53",
				"updated_at" => "2019-11-20 04:29:53"
			],
			[
				"title" => "Pelepasan balon pada peringatan HUT KORPRI ke-48 oleh Bupati, Sekda dan Kepala Dinas Sosial P3A  di Bale Maya Datar",
				"image" => "6277806637f89f120e628d33bfcc5107.jpg",
				"created_at" => "2019-11-29 05:52:35",
				"updated_at" => "2019-11-29 05:52:35"
			],
			[
				"title" => "Capacity Building Dinas Sosial P3A Kab.Purwakarta ke Pangandaran 29 Nov 2019",
				"image" => "a71e4ea3cb47c27ade8038668b725f2c.jpg",
				"created_at" => "2019-12-03 02:01:35",
				"updated_at" => "2019-12-03 02:01:35"
			],
			[
				"title" => "Senin, 09122019 penyerahan bantuan ke warga korban bencana kebakaran di Kp.Sukamulya Rt.003/02 Ds.Karangmukti Kec.Bungur",
				"image" => "1613c78548665ea26f68eb1075880631.jpg",
				"created_at" => "2019-12-10 02:07:42",
				"updated_at" => "2019-12-10 02:07:42"
			],
			[
				"title" => "28/01/2020 Penyerahan bantuan logistik korban kebakaran di Ds.TaringgulLandeuh Kec.Kiarapedes",
				"image" => "f3c89ac27b50a14123066f60d56033fa.jpeg",
				"created_at" => "2020-01-31 08:29:50",
				"updated_at" => "2020-01-31 08:29:50"
			],
			[
				"title" => "30/01/2020 Koordinasi ke Dinas Sosial Kab.Karawang Perihal SLRT, Penanganan OT dan PUB",
				"image" => "2bc70f7c5268d3d8ebab50cb426bbff2.jpeg",
				"created_at" => "2020-01-31 08:34:16",
				"updated_at" => "2020-01-31 08:34:16"
			],
			[
				"title" => "17/02/2020 Monev ke LKSA baetul ulum Jl. Ahmad Yani gg.Sukarata kel.Cipaisan",
				"image" => "9ce1e32c271e85c043f2162cab397fd0.jpeg",
				"created_at" => "2020-02-18 06:51:26",
				"updated_at" => "2020-02-18 06:51:26"
			],
			[
				"title" => "17/02/2020 Monev ke Karang Taruna Binangkit  Ds.Cibinong Kec.Jatiluhur",
				"image" => "78e588b01a0663b27a5097d7bcdb9d9b.jpeg",
				"created_at" => "2020-02-18 07:28:02",
				"updated_at" => "2020-02-18 07:28:02"
			],
			[
				"title" => "Alur Penanganan Gelandangan dan Pengemis",
				"image" => "085e1e657fbdc317aefe5070d1d3d979.jpg",
				"created_at" => "2020-07-07 14:26:36",
				"updated_at" => "2020-07-07 14:26:36"
			],
			[
				"title" => "Kunjungan kerja forum anak Kabupaten Purwakarta dan penyampaian aspirasi ke PT East West abupaten Purwakarta,  Rabu, 1 j",
				"image" => "687087ce613972448399a0f72bcdfa8c.jpg",
				"created_at" => "2020-07-08 14:05:58",
				"updated_at" => "2020-07-08 14:05:58"
			],
			[
				"title" => "Kunjungan kerja forum anak Kabupaten Purwakarta dan penyampaian aspirasi ke Kemenag  Kabupaten Purwakarta, Jumat, 3 juli",
				"image" => "6fa669217a93dff38fc3438c0420403f.jpg",
				"created_at" => "2020-07-08 14:06:32",
				"updated_at" => "2020-07-08 14:06:32"
			],
			[
				"title" => "Kunjungan kerja forum anak Kabupaten Purwakarta dan penyampaian aspirasi ke Kecamatan Purwakarta, Jumat, 3 juli 2020",
				"image" => "17310dfa78a59ec0e86ae24c739dca48.jpg",
				"created_at" => "2020-07-08 14:06:59",
				"updated_at" => "2020-07-08 14:06:59"
			],
			[
				"title" => "Kunjungan kerja forum anak Kabupaten Purwakarta dan penyampaian aspirasi ke Kelurahan nagri kaler, Jumat, 3 juli 2020",
				"image" => "18663fb35cd196325c6ead0a67ee3e0b.jpg",
				"created_at" => "2020-07-08 14:09:40",
				"updated_at" => "2020-07-08 14:09:40"
			],
			[
				"title" => "Kunjungan kerja forum anak Kabupaten Purwakarta dan penyampaian aspirasi ke Satpol PP Purwakarta, senin , 6 juli 2020",
				"image" => "d78b2b37bae61e7c5ec62feec367eae7.jpg",
				"created_at" => "2020-07-08 14:10:17",
				"updated_at" => "2020-07-08 14:10:17"
			],
			[
				"title" => "Kunjungan kerja forum anak Kabupaten Purwakarta dan penyampaian aspirasi ke Samsat Prov Jabar wil  Purwakarta, senin , 6",
				"image" => "c1df3f85e382f3e77833fc32a10b17fb.jpg",
				"created_at" => "2020-07-08 14:15:02",
				"updated_at" => "2020-07-08 14:15:02"
			],
			[
				"title" => "Kunjungan kerja forum anak Kabupaten Purwakarta dan penyampaian aspirasi ke DPMPTSP Kab Purwakarta, senin , 6 juli 2020",
				"image" => "9820e8b18021e289dc875170ec5ca330.jpg",
				"created_at" => "2020-07-08 14:15:25",
				"updated_at" => "2020-07-08 14:15:25"
			],
			[
				"title" => "Survey dan Verifikasi pengajuan SIOP LKS Disabilitas ke yayasan Bina Potensi sbg dasar penerbitan rekomendasi..",
				"image" => "754a7f757e9220fd1e69b27f0f37ba9c.jpg",
				"created_at" => "2020-07-08 14:15:48",
				"updated_at" => "2020-07-08 14:15:48"
			],
			[
				"title" => "Kunjungan kerja forum anak Kabupaten Purwakarta dan penyampaian aspirasi ke Hotel Harper  Purwakarta, Rabu, 8 Juli 2020",
				"image" => "e23cf6302e73e2ccdf5be705e7fcd0ea.jpg",
				"created_at" => "2020-07-08 14:16:32",
				"updated_at" => "2020-07-08 14:16:32"
			],
			[
				"title" => "Monev penyaluran Bantuan Sosial Sembako di Kecamatan Cibatu oleh Kasi PFM",
				"image" => "29b326b2ecd385b1d9b67d1db609822e.jpeg",
				"created_at" => "2020-07-15 15:24:41",
				"updated_at" => "2020-07-15 15:24:41"
			],
			[
				"title" => "Penyaluran Bantuan Bagi Anak Berkebutuhan Khusus (ABK) di Yayasan Bina Potensi Disabilitas dan Yatim Piatu Jln. Kapten H",
				"image" => "ff0b18f7b7bb93a80248c51aa261a6c6.jpeg",
				"created_at" => "2020-07-30 14:43:36",
				"updated_at" => "2020-07-30 14:43:36"
			],
			[
				"title" => "Penjangkauan penderita Tuna Grahita oleh Kasi Disabilitas di Kecamatan Kiarapedes",
				"image" => "69b37eb1a390aad33a74aa6d41dae531.jpeg",
				"created_at" => "2020-08-03 15:11:49",
				"updated_at" => "2020-08-03 15:11:49"
			],
			[
				"title" => "Penjangkauan Anak Berkebutuhan Khusus di Kec. Bojong",
				"image" => "38f43d5ed3ce34478fe62eeb29ea3c6b.jpeg",
				"created_at" => "2020-08-18 15:06:07",
				"updated_at" => "2020-08-18 15:06:07"
			],
			[
				"title" => "Serah Terima Sembako ASN ke Kecamatan Wanayasa",
				"image" => "2201696c5af747e4f6234cdb492f331c.jpg",
				"created_at" => "2020-08-31 14:01:10",
				"updated_at" => "2020-08-31 14:01:10"
			],
			[
				"title" => "Kegiatan Parenting Skill bersama Balai Rehabilitasi Sosial Penyandang Disabilitas Sensorik Netra",
				"image" => "4729136fc73a246a488957b0879769ae.jpg",
				"created_at" => "2020-09-08 14:47:36",
				"updated_at" => "2020-09-08 08:22:33"
			],
			[
				"title" => "Kegiatan Pelatihan Peningkatan Pengolahan Sampah Rumah Tangga Bagi Organisasi Wanita di Kabupaten Purwakarta",
				"image" => "25235d68c2e7547d5b47d62cf257ce63.jpeg",
				"created_at" => "2020-09-09 10:18:07",
				"updated_at" => "2020-09-09 10:18:07"
			],
			[
				"title" => "Rapat Pembahasan RAPERDA Tentang Kota Layak Anak Bersama DPRD Kabupaten Purwakarta",
				"image" => "4428809d155495c7c49d0979887522a1.jpg",
				"created_at" => "2020-09-14 13:40:18",
				"updated_at" => "2020-09-14 13:40:18"
			],
			[
				"title" => "Launching Bantuan Sosial Beras untuk KPM PKH Kabupaten Purwakarta dari Kemensos",
				"image" => "4dc844fc4065efacf22c36416e8276b7.jpg",
				"created_at" => "2020-09-16 13:30:46",
				"updated_at" => "2020-09-16 13:30:46"
			],
			[
				"title" => "Penyerahan Bantuan Kepada Korban Kebakaran di Desa Cisaat Kecamatan Campaka",
				"image" => "393f875b70265cc5e1dd696730d53b72.jpg",
				"created_at" => "2020-09-24 13:25:59",
				"updated_at" => "2020-09-24 13:25:59"
			],
			[
				"title" => "Penyuluhan Sosial Masyarakat di Desa Cilingga Kec. Darangdan bersama Puspensos Kemensos dan Kadinsos Prov. Jawa Barat",
				"image" => "5ca45bb886213a3e69d137b8d2c52d44.jpg",
				"created_at" => "2020-10-02 13:36:29",
				"updated_at" => "2020-10-02 07:14:30"
			],
			[
				"title" => "Sosialisasi Pekerja Sosial Masyarakat (PSM) di Kelurahan Sindangkasih",
				"image" => "6402edf18b0e7f67797d629e4a19b6ea.jpg",
				"created_at" => "2020-10-02 14:07:57",
				"updated_at" => "2020-10-02 14:07:57"
			],
			[
				"title" => "Bantuan Kursi Roda Kepada Warga Penderita Lumpuh di Kp. Sukamaju Kel.Ciseureuh",
				"image" => "7faee34f55845600546835c3ff57e9f2.jpg",
				"created_at" => "2020-10-06 14:30:28",
				"updated_at" => "2020-10-06 07:32:02"
			],
			[
				"title" => "Kegiatan Sosialisasi Pengembangan Sekolah Ramah Anak di SMPN 3 Purwakarta",
				"image" => "c568c938a3b2d0c199534dc49adcc430.jpg",
				"created_at" => "2020-10-06 15:31:02",
				"updated_at" => "2020-10-09 07:24:43"
			],
			[
				"title" => "Kegiatan Sosialisasi Pengembangan Sekolah Ramah Anak di Madrasah Aliyah KHEZ MUTTAQIEN Purwakarta",
				"image" => "9f05dd1e706d6adbb19a259e43eb47f3.jpg",
				"created_at" => "2020-10-09 14:25:52",
				"updated_at" => "2020-10-09 14:25:52"
			],
			[
				"title" => "Memberikan Alat Kesenian Kegiatan Kearifan Lokal di Desa Karyamekar Kec.Cibatu",
				"image" => "8497a80977a1b1ac96dd0c212f2fd5cc.jpg",
				"created_at" => "2020-10-12 15:07:55",
				"updated_at" => "2020-10-12 15:07:55"
			],
			[
				"title" => "Selasa, 13 oktober  2020 Kegiatan pengembangan sekolah ramah anak di MAN Kab Purwakarta",
				"image" => "7c7047006c337c21392ad22567638221.jpeg",
				"created_at" => "2020-10-13 15:22:51",
				"updated_at" => "2020-10-13 15:22:51"
			],
			[
				"title" => "Jum'at, 23 Oktober 2020 Pemberian Bantuan Bagi Orang Berkebutuhan Khusus di Citalang",
				"image" => "3cfafc1a553526779403d0004a462ffb.jpg",
				"created_at" => "2020-10-23 16:22:16",
				"updated_at" => "2020-10-23 16:22:16"
			],
			[
				"title" => "Senin, 26 Oktober 2020 Survey Lokasi ke Yayasan Madinah Darul Barokah di Ds. Dangdeur Kec. Bungursari",
				"image" => "78c713ce54d77a6daf8fc51a9c5076b7.jpg",
				"created_at" => "2020-10-26 11:55:01",
				"updated_at" => "2020-10-26 04:56:18"
			],
			[
				"title" => "Senin, 26 Oktober 2020 Home Visit ke Calon Orang Tua Asuh di Komp. Munjul Jaya Permai",
				"image" => "116dece85a6945b01b7de2f83b213f40.jpg",
				"created_at" => "2020-10-26 13:42:53",
				"updated_at" => "2020-10-26 13:42:53"
			],
			[
				"title" => "Senin, 02 November 2020 Kegiatan Pembinaan Ketahanan Keluarga Tingkat Desa Tahun 2020 di Aula Ds Babakan Cikao",
				"image" => "f5c46ffad5717e86dd9a1d944139ae82.jpg",
				"created_at" => "2020-11-02 15:02:38",
				"updated_at" => "2020-11-02 15:02:38"
			],
			[
				"title" => "Senin, 02 November 2020 Sosialisasi Pengembangan/Pembentukan Kabupaten Layak Anak Tahun 2020 di Kecamatan Purwakarta",
				"image" => "bcd0225b9a237924a25b4a7768364b8e.jpg",
				"created_at" => "2020-11-02 15:04:17",
				"updated_at" => "2020-11-02 15:04:17"
			],
			[
				"title" => "Selasa, 03 November 2020 Menerima 3 Orang Terlantar di Kantor DinsosP3A",
				"image" => "8f9bad6f43d4b31746adc96bf55b8e6e.jpg",
				"created_at" => "2020-11-05 13:47:00",
				"updated_at" => "2020-11-05 13:47:00"
			],
			[
				"title" => "Selasa, 03 November 2020 Sosialisasi Pengembangan/Pembentukan Kabupaten Layak Anak Tahun 2020 di Aula Kecamatan BBC",
				"image" => "d9458a6e32dc2b8355da76331cc1545b.jpg",
				"created_at" => "2020-11-05 13:55:53",
				"updated_at" => "2020-11-05 06:56:25"
			],
			[
				"title" => "Selasa, 03 November 2020 Kegiatan Pembinaan Ketahanan Keluarga Tahun 2020 di Desa Maracang",
				"image" => "0921db03723eaf2b0836fa3792d348de.jpg",
				"created_at" => "2020-11-05 14:01:00",
				"updated_at" => "2020-11-05 14:01:00"
			],
			[
				"title" => "Rabu, 04 November 2020 Rapat Kerja Pengurus KPPI (Kaukus Perempuan Politik Indonesia Cab. Purwakarta) di Aula DinsosP3A",
				"image" => "e34580cac722fe7c169872026e01b862.jpg",
				"created_at" => "2020-11-05 14:02:52",
				"updated_at" => "2020-11-05 14:02:52"
			],
			[
				"title" => "Rabu, 04 November 2020 Sosialisasi Pengembangan/ Pembentukan Kabupaten Layak Anak Tahun 2020 di Aula Kecamatan Jatiluhur",
				"image" => "f91f53a712aec7947e89306bdb8c62be.jpg",
				"created_at" => "2020-11-05 14:03:47",
				"updated_at" => "2020-11-05 07:04:07"
			],
			[
				"title" => "Rabu, 04 November 2020 Kegiatan Pembinaan Ketahanan Keluarga Tahun 2020 di Aula Desa Ciwareng",
				"image" => "2436bfe217547d8574ed7e97a8127e20.jpg",
				"created_at" => "2020-11-05 14:05:39",
				"updated_at" => "2020-11-05 14:05:39"
			],
			[
				"title" => "Kamis, 05 November 2020 Kegiatan Pembinaan Ketahanan Keluarga Tahun 2020 di Desa Mulyamekar",
				"image" => "3e20b526a2c64e3a9c7af9fa80621fd7.jpg",
				"created_at" => "2020-11-05 14:07:01",
				"updated_at" => "2020-11-05 14:07:01"
			],
			[
				"title" => "Kamis, 05 November 2020 Sosialisasi Pengembangan/ Pembentukan Kabupaten Layak Anak Tahun 2020 di Kecamatan Sukatani",
				"image" => "be6b11ec0eb2d8718bef8a46e28d2bcd.png",
				"created_at" => "2020-11-06 13:13:39",
				"updated_at" => "2020-11-06 13:13:39"
			],
			[
				"title" => "Jum'at, 06 November 2020 Sosialisasi Pengembangan/ Pembentukan Kabupaten Layak Anak Tahun 2020 Kecamatan Pondoksalam",
				"image" => "6090a33280a5567d1a9f919ba9e31be7.jpg",
				"created_at" => "2020-11-06 13:18:37",
				"updated_at" => "2020-11-06 06:22:21"
			],
			[
				"title" => "Jum'at, 06 November 2020 Koordinasi Persiapan Kegiatan Pembinaan Praktek untuk Warga Binaan di Lapas Kelas IIB Purawakar",
				"image" => "cd675f615953af7cdcf911189cd60512.jpg",
				"created_at" => "2020-11-06 13:21:50",
				"updated_at" => "2020-11-06 06:22:34"
			],
			[
				"title" => "Senin, 09 November 2020 Sosialisasi Pengembangan/ Pembentukan Kabupaten Layak Anak Tahun 2020 di Kecamatan Pasawahan",
				"image" => "9b05a57c6b47f8fc3b3f0b23efc8c2ca.jpg",
				"created_at" => "2020-11-09 14:34:03",
				"updated_at" => "2020-11-09 07:35:28"
			],
			[
				"title" => "Senin, 09 November 2020 Koordinasi Pelaksanaan Kegiatan Pembinaan Praktek untuk Warga Binaan di Lapas Purwakarta",
				"image" => "2c47413580eba16f5a9c541f0395568a.jpg",
				"created_at" => "2020-11-09 15:21:25",
				"updated_at" => "2020-11-09 08:22:37"
			],
			[
				"title" => "Selasa, 10 November 2020 Pelatihan Persiapan Reintegrasi Sosial Bagi Warga Binaan di Lapas Kelas IIB Purwakarta",
				"image" => "9ab98f09c51e5731825a0fc782230a6f.png",
				"created_at" => "2020-11-12 09:12:54",
				"updated_at" => "2020-11-12 09:12:54"
			],
			[
				"title" => "Rabu, 11 November 2020 Sosialisasi Pengembangan/ Pembentukan Kabupaten Layak Anak Tahun 2020 di Kecamatan Kiarapedes",
				"image" => "0d5f3617eeedbaa4c93edc807e93b3fc.jpg",
				"created_at" => "2020-11-12 09:13:57",
				"updated_at" => "2020-11-12 09:13:57"
			],
			[
				"title" => "Kamis, 12 November 2020 Sosialisasi Pengembangan/ Pembentukan Kabupaten Layak Anak Tahun 2020 di Kecamatan Bungursari",
				"image" => "f92d3d62394db238a24f6d3dbf218bb1.jpg",
				"created_at" => "2020-11-12 11:49:19",
				"updated_at" => "2020-11-12 11:49:19"
			],
			[
				"title" => "Kamis, 12 November 2020 Pendistribusian Bantuan Barang Keserasian Sosial Tahun 2020",
				"image" => "a955becbee5c76863aaa5f4f234acfb6.jpg",
				"created_at" => "2020-11-12 14:57:30",
				"updated_at" => "2020-11-12 14:57:30"
			],
			[
				"title" => "Kamis, 12 November 2020 Pendistribusian Bantuan Barang Keserasian Sosial Tahun 2020 di Desa Karyamekar Kecamatan Cibatu.",
				"image" => "b3bfbee4ca863d9d894bf21297a8b078.jpg",
				"created_at" => "2020-11-12 14:59:34",
				"updated_at" => "2020-11-12 14:59:34"
			],
			[
				"title" => "Jum'at, 13 November 2020 Pelantikan Pengurus Gabungan Organisasi Wanita (GOW) Masa Bhakti 2020-2024 di Bale Maya Datar",
				"image" => "bf22e07dbb998bd7be02a9c09d6a66ad.jpg",
				"created_at" => "2020-11-13 09:42:30",
				"updated_at" => "2020-11-13 09:42:30"
			],
			[
				"title" => "Jum'at, 13 November 2020 Monitoring dan Evaluasi Bantuan KUBE dari Kementrian Sosial di Kecamatan Maniis",
				"image" => "277cc58f18edeb4802aed21f4d7c52e0.jpg",
				"created_at" => "2020-11-16 09:30:57",
				"updated_at" => "2020-11-16 02:33:49"
			],
			[
				"title" => "Jum'at, 13 November 2020 Pemberian Bantuan kepada Masyarakat Korban Angin di Kecamatan Darangdan",
				"image" => "fbcb584bc9e64207e340c107ca2fe0ed.jpg",
				"created_at" => "2020-11-16 09:34:41",
				"updated_at" => "2020-11-16 09:34:41"
			],
			[
				"title" => "Jum'at, 13 November 2020 Bimbingan Teknis Evaluasi Implementasi RKPD Kabupaten Purwakarta di Sari Ater Hotel & Resort",
				"image" => "585588935a740ebbea076b32d3d100df.png",
				"created_at" => "2020-11-16 09:41:58",
				"updated_at" => "2020-11-16 09:41:58"
			],
			[
				"title" => "Senin, 16 November 2020 Pelatihan Perempuan Kepala Keluarga (PEKKA) di Desa Cikao Bandung Kecamatan Jalituhur",
				"image" => "7c842d7f1703b9e648753ed2fd584609.jpg",
				"created_at" => "2020-11-16 12:29:12",
				"updated_at" => "2020-11-16 12:29:12"
			],
			[
				"title" => "Senin, 16 November 2020 Rapat Evaluasi dan Penyusunan Naskah Perjanjian Kerjasama dengan BPJS di Ruang Ogan Lopian",
				"image" => "46e9441c06503bf9ac769df303601615.jpg",
				"created_at" => "2020-11-16 12:31:11",
				"updated_at" => "2020-11-16 05:33:05"
			],
			[
				"title" => "Senin, 16 November 2020 Sosialisasi Pengembangan/ Pembentukan Kampung Ramah Anak di Desa Parakan Garokgek",
				"image" => "d1e3aed9a2ab9e4d4e81b59e46e674a9.jpg",
				"created_at" => "2020-11-16 13:14:40",
				"updated_at" => "2020-11-16 06:15:02"
			],
			[
				"title" => "Selasa, 17 November 2020 Pemberian Bantuan Sembako Bagi Lanjut Usia Terlantar di Desa Cipicung Kecamatan Sukatani",
				"image" => "870cdaa81282003a623670a24a6938b7.png",
				"created_at" => "2020-11-17 11:31:44",
				"updated_at" => "2020-11-17 04:32:10"
			],
			[
				"title" => "Selasa, 17 November 2020 Pelatihan Perempuan Kepala Keluarga (PEKKA) di Desa CikaoBandung Kec. Jatiluhur",
				"image" => "505c149b554a583dfd5c7ddc7dc67c67.jpg",
				"created_at" => "2020-11-18 12:05:59",
				"updated_at" => "2020-11-18 12:05:59"
			],
			[
				"title" => "Selasa, 17 November 2020 Sosialisasi Pengembangan/ Pembentukan Kampung Ramah Anak di Desa Bunder Kec.Jatiluhur",
				"image" => "0dc3e596af336d0382bdfbf07e25bd70.jpg",
				"created_at" => "2020-11-18 12:08:55",
				"updated_at" => "2020-11-18 05:09:32"
			],
			[
				"title" => "Selasa, 17 November 2020 Pelatihan Pembinaan Teknis Peningkatan Kompetensi Pekerja Sosial di Dinsos Jabar",
				"image" => "b6923ad7c970cdf67b80288c257eafba.jpg",
				"created_at" => "2020-11-18 13:23:07",
				"updated_at" => "2020-11-18 06:25:10"
			],
			[
				"title" => "Rabu, 18 November 2020 Sosialisasi dan Pembentukan PATBM Tk Kecamatan dan Desa/Kelurahan Tahun 2020 di Desa Kutamanah",
				"image" => "6eef90ae368075d1eb69fc4759751f21.jpg",
				"created_at" => "2020-11-18 13:45:49",
				"updated_at" => "2020-11-18 06:46:44"
			],
			[
				"title" => "Rabu, 18 November 2020 Pemberian Bantuan Kepada Orang Terlantar di Kantor DinsosP3A",
				"image" => "6a713061435c78961a584c092df9d036.png",
				"created_at" => "2020-11-18 13:53:53",
				"updated_at" => "2020-11-20 07:38:37"
			],
			[
				"title" => "Rabu, 18 November 2020 Penyaluran Bantuan Kursi Roda bagi Penyandang Disabilitas di Desa Kiarapedes dan Desa Depok",
				"image" => "34f603df2416ed9100eade2cc36142c2.png",
				"created_at" => "2020-11-20 14:47:54",
				"updated_at" => "2020-11-20 14:47:54"
			],
			[
				"title" => "Kamis, 19 November 2020 Penyerahan Bantuan Sosial Paket Sembako bagi Lanjut Usia di Desa Tegalmunjul Kec. Purwakarta",
				"image" => "aa6dd13db23edf5960c4037cee4b8df2.png",
				"created_at" => "2020-11-20 14:57:37",
				"updated_at" => "2020-11-20 07:58:43"
			],
			[
				"title" => "Rabu, 18 November 2020 Sosialisasi Pengembangan/ Pembentukan Kampung Ramah Anak di Desa Cihanjawar Kecamatan Bojong",
				"image" => "03dfa94a13ada9faf4942c82796b4f5b.png",
				"created_at" => "2020-11-20 15:26:36",
				"updated_at" => "2020-11-20 15:26:36"
			],
			[
				"title" => "Kamis, 19 November 2020 Sosialisasi Pengembangan/ Pembentukan Kampung Ramah Anak di Desa Cikaobandung Kec.Jatiluhur",
				"image" => "72e744c2440c0a8f9e06aaa471fa011a.png",
				"created_at" => "2020-11-20 15:39:32",
				"updated_at" => "2020-11-20 08:40:01"
			],
			[
				"title" => "Jum'at, 20 November 2020 Sosialisasi Pengembangan/ Pembentukan Kampung Ramah Anak di Desa Pasawahan",
				"image" => "1b87ea4c8e5c9aea7428c3ff7317ff5e.png",
				"created_at" => "2020-11-20 15:42:08",
				"updated_at" => "2020-11-20 15:42:08"
			],
			[
				"title" => "Senin, 23 November 2020 Pemberian Alat Bantu Kursi Roda Bagi Lanjut Usia di Kelurahan Nagri Tengah",
				"image" => "bc5b71b42d4ea31017eafa526ccb45ee.jpg",
				"created_at" => "2020-11-23 15:41:20",
				"updated_at" => "2020-11-23 15:41:20"
			],
			[
				"title" => "Senin, 23 November 2020 Sosialisasi Pengembangan/ Pembentukan Kampung Ramah Anak Tahun 2020 di Desa Pasawahan Kidul",
				"image" => "33e9ef25de3db17282f3653d439cd463.jpg",
				"created_at" => "2020-11-24 10:10:40",
				"updated_at" => "2020-11-24 10:10:40"
			],
			[
				"title" => "Selasa, 24 November 2020 Sosialisasi Pengembangan/ Pembentukan Kampung Ramah Anak Tahun 2020 di Desa Salem",
				"image" => "9c89d666ef2602194e0976980094afd2.jpg",
				"created_at" => "2020-11-24 14:28:17",
				"updated_at" => "2020-11-24 07:29:45"
			],
			[
				"title" => "Kamis, 26 November 2020 Penyaluran Alat Bantu Usaha Bagi Keluarga Penyandang Disabilitas di Desa Linggasari",
				"image" => "7389d73e18832253e195d6da4d7ae808.jpg",
				"created_at" => "2020-11-26 10:47:45",
				"updated_at" => "2020-11-26 03:48:34"
			],
			[
				"title" => "Kamis, 26 November 2020 Rapat Diseminasi Peraturan Bupati Juknis & Standar Belanja Tahun Anggaran 2021 di Hotel Harper",
				"image" => "081ad1500a35397e99fccdb35108e4de.jpg",
				"created_at" => "2020-11-26 10:55:03",
				"updated_at" => "2020-11-26 03:55:36"
			],
			[
				"title" => "Selasa, 01 Desember 2020 Saresehan Keserasian Sosial di Desa Warung Jeruk Kecamatan Tegalwaru",
				"image" => "91bc9980d1b5812b28bc98534da15814.png",
				"created_at" => "2021-02-01 13:39:42",
				"updated_at" => "2021-02-01 13:39:42"
			],
			[
				"title" => "Selasa, 01 Desember 2020 Peresmian Tugu Keserasian Sosial di Desa Warung Jeruk Kecamatan Tegalwaru",
				"image" => "03e38a79e3e0ef2f840de61211683b81.png",
				"created_at" => "2021-02-01 13:40:51",
				"updated_at" => "2021-02-01 13:40:51"
			],
			[
				"title" => "Kamis, 03 Desember 2020 Pemberian Bantuan Kepada Korban Kebakaran di Desa Sawah Kulon Kec.Pasawahan",
				"image" => "7c3c9bc9f0c44c118e39582a35d375d3.jpg",
				"created_at" => "2021-02-01 13:58:39",
				"updated_at" => "2021-02-01 06:59:16"
			],
			[
				"title" => "Kamis, 03 Desember 2020 Pemberian Bantuan Kepada Korban Kebakaran di Desa Sukamukti Kecamatan Maniis",
				"image" => "4ffba4a27138a4c33db45eff1436f871.jpg",
				"created_at" => "2021-02-01 14:04:21",
				"updated_at" => "2021-02-01 14:04:21"
			],
			[
				"title" => "Selasa, 08 Desember 2020 Peresmian Tugu Keserasian Sosial di Desa Sindangpanon Kecamatan Bojong",
				"image" => "eb4555b140844cd52143c35c3f643bf8.png",
				"created_at" => "2021-02-01 14:14:05",
				"updated_at" => "2021-02-01 14:14:05"
			],
			[
				"title" => "Selasa, 08 Desember 2020 Penganugrahan Piala Bupati Purwakarta Kegiatan Lomba Menyanyi Sekolah Ramah Anak di BalePaseban",
				"image" => "85654d5122d1697136e7de1ae7efe9e5.png",
				"created_at" => "2021-02-01 14:22:32",
				"updated_at" => "2021-02-01 07:24:44"
			],
			[
				"title" => "Senin, 14 Desember 2020 Pengambilan Pasien Orang Terlantar di Rumah Sakit Siloam",
				"image" => "3265ba0a5dc65faa8566f1f5ee5ed2d9.jpg",
				"created_at" => "2021-02-01 14:34:19",
				"updated_at" => "2021-02-01 14:34:19"
			],
			[
				"title" => "Selasa, 15 Desember 2020 Live Interaktif Talk Show Kampung Ramah Anak di Radio 93.10 FM",
				"image" => "4a5d214654c0dc81646fac8cfd929384.jpg",
				"created_at" => "2021-02-01 14:40:09",
				"updated_at" => "2021-02-01 14:40:09"
			],
			[
				"title" => "Rabu, 16 Desember 2020 Saksi Dalam Acara Live Pengundian Simpedes BRI Purwakarta di BRI Kanca Purwakarta",
				"image" => "02e840b00116a80bc950fba11ce0ecb5.jpg",
				"created_at" => "2021-02-01 14:46:30",
				"updated_at" => "2021-02-01 14:46:30"
			],
			[
				"title" => "Senin, 21 Desember 2020 Pemberian Bantuan Kepada Orang Terlantar di Kantor DinsosP3A Kabupaten Purwakarta",
				"image" => "f8e4fdcd3083f4ee14e4ccd64c449a64.jpg",
				"created_at" => "2021-02-01 14:57:50",
				"updated_at" => "2021-02-01 14:57:50"
			],
			[
				"title" => "Selasa, 08 Desember 2020 Sosialisasi Pembentukan Tim Evaluasi dan Identifikasi Data Kabupaten Layak Anak Tahun 2020",
				"image" => "6b73ac29f353eed0173bdb5d6b487f66.jpg",
				"created_at" => "2021-02-01 15:10:22",
				"updated_at" => "2021-02-01 08:10:50"
			],
			[
				"title" => "Selasa, 22 Desember 2020 Wisuda Sekoper Cinta Angkatan Kedua Tahun 2020 di Desa Cikao Bandung Kecamatan Jatiluhur",
				"image" => "3db9a1e7054f691021e8751be442ed6b.jpg",
				"created_at" => "2021-02-01 15:14:31",
				"updated_at" => "2021-02-01 15:14:31"
			],
			[
				"title" => "Senin, 5 Januari 2021 Pemberian Bantuan Kepada Korban Bencana Alam di Kecamatan Darangdan",
				"image" => "2a8f93bbaebe00ebfdad8be5ad1d6b24.jpg",
				"created_at" => "2021-02-01 15:26:21",
				"updated_at" => "2021-02-01 15:26:21"
			],
			[
				"title" => "Jum'at, 22 Januari 2021 Pemberian Bantuan Kepada Warga Korban Kebakaran di Desa Pasirmunjul Kecamatan Sukatani",
				"image" => "c9783c2745a77a3b3bc67a51a0d52d4c.jpg",
				"created_at" => "2021-02-01 15:42:56",
				"updated_at" => "2021-02-01 15:42:56"
			],
			[
				"title" => "Selasa, 26 Januari 2021 Sosialisasi PERDA Kabupaten Layak Anak (KLA) bersama Ketua Pansus di Radio 93.10 FM",
				"image" => "c2aa015ea3213fe396f588754539d416.jpg",
				"created_at" => "2021-02-01 15:54:10",
				"updated_at" => "2021-02-01 09:20:07"
			],
			[
				"title" => "Rabu, 27 Januari 2021 Serah Terima Gelandangan dan Pengemis Calon Peserta Pelatihan di Bale Rehabilitasi Sosial Bekasi",
				"image" => "4b1354a54ffd0e0d2dc87a24fcf2b366.png",
				"created_at" => "2021-02-01 16:06:08",
				"updated_at" => "2021-02-01 09:06:52"
			],
			[
				"title" => "Jum'at, 29 Janurai 2021 Serah Terima Orang Terlantar dengan Pihak Keluarga di Serang",
				"image" => "fb484253b173adb69de1c79f18dfbbff.jpg",
				"created_at" => "2021-02-01 16:09:32",
				"updated_at" => "2021-02-01 16:09:32"
			],
			[
				"title" => "Jum'at, 29 Januari 2021 Rapat Koordinasi terkait PBI APBD bersama BPJS Kesehatan di Aula DPMD",
				"image" => "ce381382db3d0cf927a5c18d7ca22c6a.png",
				"created_at" => "2021-02-01 16:17:09",
				"updated_at" => "2021-02-01 16:17:09"
			],
			[
				"title" => "Selasa, 26 Januari 2021 Penyerahan Bantuan Sosial Alat Kesehatan Dalam Rangka HUT GOW ke-65 di Puskesmas",
				"image" => "9fac46590f77ee7f4e19433520cb8c64.jpg",
				"created_at" => "2021-02-01 16:19:54",
				"updated_at" => "2021-02-01 16:19:54"
			],
			[
				"title" => "Senin, 01 Februari 2021 Serah Terima Bantuan Alat Bantu Penyandang Disabilitas dari Dinas Sosial Provinsi Jawa Barat",
				"image" => "77c9668e5a069c380e73a9029d3ea39c.jpg",
				"created_at" => "2021-02-01 16:22:53",
				"updated_at" => "2021-02-01 16:22:53"
			],
			[
				"title" => "Selasa, 02 Februari 2021 Penyerahan Bantuan Sosial Alat Kesehatan Dalam Rangka HUT GOW ke-65 di Puskesmas Bojong",
				"image" => "ea7688a088f96ba887537b481b185c46.jpg",
				"created_at" => "2021-02-02 15:49:25",
				"updated_at" => "2021-02-02 15:49:25"
			],
			[
				"title" => "Selasa, 02 Februari 2021 Penyerahan Bantuan Alat Kesehatan Dalam Rangka HUT GOW ke-65 di Puskesmas Kiarapedes",
				"image" => "252f180fa194bfb4872cb81fbaf4e357.jpg",
				"created_at" => "2021-02-02 15:50:20",
				"updated_at" => "2021-02-02 15:50:20"
			],
			[
				"title" => "Rabu, 03 Februari 2021 Rapat Koordinasi Pelaksanaan Transaksi Non Tunai (TNT) di Aula BKAD",
				"image" => "8d887d8d927305d02bf14b9547eb150e.png",
				"created_at" => "2021-02-03 11:47:55",
				"updated_at" => "2021-02-03 11:47:55"
			],
			[
				"title" => "Rabu, 03 Februari 2021 Kunjungan Kerja Komisi IV DPRD Kabupaten Purwakarta di Kantor DinsosP3A",
				"image" => "6528b615a22e5e6c8e5c5cd056d03c33.jpg",
				"created_at" => "2021-02-03 11:53:54",
				"updated_at" => "2021-02-03 05:03:30"
			],
			[
				"title" => "Rabu, 03 Februari 2021 Kunjungan Kerja Dinas Sosial Provinsi Jawa Barat di Kantor DinsosP3A",
				"image" => "2474d986da7322062c95d2b27e7285ef.jpg",
				"created_at" => "2021-02-04 09:08:24",
				"updated_at" => "2021-02-04 09:08:24"
			],
			[
				"title" => "Jum'at, 29 Januari 2021 Kunjungan Kerja Kepala Lapas Kelas II B Purwakarta di Kantor DinsosP3A",
				"image" => "29197371661f60ec2ea7c7b828351a12.jpg",
				"created_at" => "2021-02-04 10:14:28",
				"updated_at" => "2021-02-04 10:14:28"
			],
			[
				"title" => "Senin, 08 Februari 2021 Pemberian Bantuan Kepada Korban Bencana Alam di Desa Cirende Kecamatan Campaka",
				"image" => "b29d6792a91a0b0bc8ee7483fd873552.jpg",
				"created_at" => "2021-02-08 11:21:44",
				"updated_at" => "2021-02-08 06:33:37"
			],
			[
				"title" => "Selasa, 09 Februari 2021 Menerima Kunjungan Kerja Komisi V DPRD Provinsi Jawa Barat di Bale Titirah P2TP2A",
				"image" => "6ac9911ccd6c017d668df4604240856d.jpg",
				"created_at" => "2021-02-09 16:23:25",
				"updated_at" => "2021-02-11 07:59:07"
			],
			[
				"title" => "Selasa, 09 Februari 2021 Pemberian Bantuan Sosial Kepada Korban Bencana Alam di Desa Pasanggrahan",
				"image" => "c842a5c18ab3d22ebb73ceb7ce982a7d.png",
				"created_at" => "2021-02-09 16:26:30",
				"updated_at" => "2021-02-09 16:26:30"
			],
			[
				"title" => "Kamis, 11 Februari 2021 Pemberian Bantuan Sosial Kepada Warga Korban Bencana Alam di Desa Cirende Kec.Campaka",
				"image" => "28780178622a1c6ef7b37b0de04980b1.jpg",
				"created_at" => "2021-02-11 16:08:14",
				"updated_at" => "2021-02-11 16:08:14"
			],
			[
				"title" => "Kamis, 11 Februari 2021 Pemberian Bantuan Sosial Kepada Warga Korban Bencana Alam di Kelurahan Nagri Kidul",
				"image" => "7e4380da70266c53e6bfe5c2a14a6279.jpg",
				"created_at" => "2021-02-11 16:08:53",
				"updated_at" => "2021-02-11 16:08:53"
			],
			[
				"title" => "Kamis, 11 Februari 2021 Pemberian Bantuan Sosial Kepada Warga Korban Bencana Alam di Kelurahan Cipaisan",
				"image" => "869ebfb2cc8657f6f8142c43f1564499.jpg",
				"created_at" => "2021-02-11 16:09:55",
				"updated_at" => "2021-02-11 16:09:55"
			],
			[
				"title" => "Kamis, 11 Februari 2021 Pemberian Bantuan Sosial Kepada Warga Korban Bencana Alam di Kelurahan Sindangkasih",
				"image" => "3ccbc03efb1f76cad69c1388a609c507.jpg",
				"created_at" => "2021-02-11 16:11:28",
				"updated_at" => "2021-02-11 16:11:28"
			],
			[
				"title" => "Kamis, 11 Februari 2021 Menerima Kunjungan Kerja Komisi II DPRD Kota Tangerang ke Bale Titirah P2TP2A",
				"image" => "26430dc48b6bba1c224e5fb63fc8bf82.jpg",
				"created_at" => "2021-02-15 07:23:13",
				"updated_at" => "2021-02-15 07:23:13"
			],
			[
				"title" => "Selasa, 16 Februari 2021 Sosialisasi Tahap II PERDA Kabupaten Layak Anak di Radio 93.1 FM",
				"image" => "cb314fb400f73acd5ca0e6b928f4d3de.jpg",
				"created_at" => "2021-02-16 16:58:34",
				"updated_at" => "2021-02-16 16:58:34"
			],
			[
				"title" => "Selasa, 16 Februari 2021 Survey Lokasi Kegiatan P2WKSS di Desa Cilangkap Kecamatan Babakan Cikao",
				"image" => "827f41ddbdb5f14d0bd68664fe29376e.jpg",
				"created_at" => "2021-02-16 17:00:57",
				"updated_at" => "2021-02-16 17:00:57"
			],
			[
				"title" => "Rabu, 17 Februari 2021 Rapat Evaluasi AKI dan AKB di Ruang Rapat Dinas Kesehatan Kabupaten Purwakarta",
				"image" => "df6593a7e52e9571abbdcf216a5d08fa.png",
				"created_at" => "2021-02-18 15:06:04",
				"updated_at" => "2021-02-18 15:06:04"
			],
			[
				"title" => "Rabu, 17 Februari 2021 Pembahasan Draf Raperda Penyelenggaraan Perlindungan Perempuan dan Anak bersama DPRD Komisi C",
				"image" => "b3e91d4e011d46f469f1b1fa1a8556c2.jpg",
				"created_at" => "2021-02-18 15:21:34",
				"updated_at" => "2021-02-18 08:22:18"
			],
			[
				"title" => "Kamis, 18 Februari 2021 Monev Ngabaso (Ngabaturan Barudak Sakola Online) oleh DP3AKB Prov. Jabar di SDN 2 Ciwareng",
				"image" => "c1d161bc85e46fe8a57db52dc3510c91.jpg",
				"created_at" => "2021-02-18 15:33:31",
				"updated_at" => "2021-02-18 08:35:07"
			],
			[
				"title" => "Senin, 22 Februari 2021 Launching Command Center PURBAKESA di Dinas Kesehatan",
				"image" => "4f68c3023b0cd965132c8f0fbb3af35f.jpg",
				"created_at" => "2021-02-24 15:05:07",
				"updated_at" => "2021-02-24 15:05:07"
			],
			[
				"title" => "Selasa, 23 Februari 2021 Launching Penyaluran Bantuan Non Tunai Berupa Voucher Belanja Senilai Rp.500.000 di Kec.Cibatu",
				"image" => "8d18114a3e9239332a38f1c62facf6a3.jpg",
				"created_at" => "2021-02-24 15:06:17",
				"updated_at" => "2021-02-24 15:06:17"
			],
			[
				"title" => "Rabu, 24 Februari 2021 Monitoring dan Evaluasi ke Desa Pasanggrahan Kecamatan Tegalwaru",
				"image" => "71b54efbb6465747b4f789534bdbc811.jpg",
				"created_at" => "2021-02-24 15:07:06",
				"updated_at" => "2021-02-24 15:07:06"
			],
			[
				"title" => "Kamis, 25 Februari 2021 Rapat Forum Konsultasi Publik RKPD Kabupaten Purwakarta Tahun 2022 di Ruang Janaka Setda Pwk",
				"image" => "b670b2cdcc5c2099386c2f8cfd8c379c.png",
				"created_at" => "2021-03-01 15:01:31",
				"updated_at" => "2021-03-01 08:02:10"
			]
		];
		$dataRecords = array_map(function ($item) {
			if (strlen($item["title"]) > 60) {
				$title = "";
				$caption = $item["title"];
			} else {
				$title = $item["title"];
				$caption = null;
			}

			return [
				"title" => $title,
				"caption" => $caption,
				"image" => $item["image"],
				"created_at" => $item["created_at"],
				"updated_at" => $item["updated_at"],
			];
		}, $dataRecords);

		// insert data (multiple) into table
		$this->db->table($this->tableName)->insertBatch($dataRecords);

		// enable again foreign key checks
		$this->db->enableForeignKeyChecks();
	}
}
