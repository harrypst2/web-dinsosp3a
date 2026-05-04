<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
	protected $table = "services";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"title",
		"content",
		"file",
		"target",
	];
}
