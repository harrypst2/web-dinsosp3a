<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqsModel extends Model
{
	protected $table = "faqs";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"answer",
		"question",
	];
}
