<?php

namespace App\Models;

use CodeIgniter\Model;

class OrgchartModel extends Model
{
	protected $table = "orgchart";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"name",
		"position",
		"gender",
		"bidang",
		"nip",
		"photo",
		"parent",
	];
}
