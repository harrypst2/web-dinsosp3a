<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PartnersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'LPSE Kabupaten Purwakarta',
                'url'         => 'http://lpse.purwakartakab.go.id/eproc4',
                'image'       => 'lpse.png',
                'description' => null,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'LAPOR!',
                'url'         => 'https://lapor.go.id/',
                'image'       => 'lapor.png',
                'description' => 'Layanan Aspirasi dan Pengaduan Online Rakyat',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Ogan Lopian',
                'url'         => 'http://oganlopian.purwakartakab.go.id/',
                'image'       => 'oganlopian.png',
                'description' => 'Purwakarta Smart City',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'PPID',
                'url'         => 'http://ppid.purwakartakab.go.id/',
                'image'       => 'ppid.png',
                'description' => 'Diskominfo Kabupaten Purwakarta',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('partners')->insertBatch($data);
    }
}
