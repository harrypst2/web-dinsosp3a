<?php

namespace App\Models;

use CodeIgniter\Model;

class SlidersModel extends Model
{
	protected $table = "sliders";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"image",
		"title",
		"description"
	];
}
