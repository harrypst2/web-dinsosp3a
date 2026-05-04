<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBidangToOrgchart extends Migration
{
    public function up()
    {
        $this->forge->addColumn("orgchart", [
            "bidang" => [
                "type" => "VARCHAR",
                "constraint" => 128,
                "after" => "position",
                "null" => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn("orgchart", "bidang");
    }
}
