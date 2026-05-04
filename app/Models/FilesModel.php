<?php

namespace App\Models;

use CodeIgniter\Model;

class FilesModel extends Model
{
	protected $table = "files";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"title",
		"description",
		"file",
		"downloaded",
		"active",
	];
}
