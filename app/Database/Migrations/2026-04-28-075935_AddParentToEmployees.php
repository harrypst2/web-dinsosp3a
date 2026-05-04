<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddParentToEmployees extends Migration
{
    public function up()
    {
        $this->forge->addColumn("employees", [
            "parent" => [
                "type" => "INT",
                "constraint" => 11,
                "after" => "id",
                "null" => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn("employees", "parent");
    }
}
