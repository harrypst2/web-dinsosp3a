<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddContactSettings extends Migration
{
    public function up()
    {
        $data = [
            [
                'code'    => 'phone',
                'content' => '+628xxxxxxxxxx',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'code'    => 'email',
                'content' => 'dinsosp3a@purwakartakab.go.id',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'code'    => 'address',
                'content' => 'Jl. Taman Pahlawan No. 9, Purwamekar, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41119',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'code'    => 'description-phone',
                'content' => 'Hubungi kami melalui nomor telepon resmi untuk layanan cepat.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'code'    => 'description-email',
                'content' => 'Kirimkan surat elektronik untuk pengaduan atau pertanyaan resmi.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'code'    => 'description-location',
                'content' => 'Kunjungi kantor kami pada jam kerja untuk layanan tatap muka.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('about')->insertBatch($data);
    }

    public function down()
    {
        $this->db->table('about')->whereIn('code', ['phone', 'email', 'address', 'description-phone', 'description-email', 'description-location'])->delete();
    }
}
