<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixViewOrgchart extends Migration
{
    public function up()
    {
        $this->db->query("CREATE OR REPLACE VIEW view_orgchart AS SELECT a.id, a.name, a.position, a.bidang, a.nip, a.photo, a.parent AS parent_id, b.name AS parent FROM orgchart a LEFT JOIN orgchart b ON a.parent = b.id WHERE a.deleted_at IS NULL");
    }

    public function down()
    {
        // No need to drop
    }
}
