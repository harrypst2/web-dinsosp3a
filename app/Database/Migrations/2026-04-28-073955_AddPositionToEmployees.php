<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPositionToEmployees extends Migration
{
    public function up()
    {
        $this->forge->addColumn("employees", [
            "position" => [
                "type" => "VARCHAR",
                "constraint" => 128,
                "after" => "nip",
                "null" => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn("employees", "position");
    }
}
