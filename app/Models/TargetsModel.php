<?php

namespace App\Models;

use CodeIgniter\Model;

class TargetsModel extends Model
{
	protected $table = "targets";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"name",
		"total",
		"slug"
	];
}
