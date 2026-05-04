<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleriesModel extends Model
{
	protected $table = "galleries";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"title",
		"caption",
		"image",
	];
}
