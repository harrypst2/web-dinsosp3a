<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
	protected $table = "about";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"code",
		"content",
	];

	public function google_maps()
	{
		return $this->get_config("google-maps");
	}

	public function get_config($code)
	{
		$data = $this->where("code", $code)->first();
		return $data ? $data->content : "";
	}
}
