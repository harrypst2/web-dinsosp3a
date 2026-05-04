<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeesModel extends Model
{
	protected $table = "employees";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"name",
		"nip",
		"position",
		"parent",
		"gender",
		"photo",
	];
}
