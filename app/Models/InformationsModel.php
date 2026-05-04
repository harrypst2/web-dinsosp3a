<?php

namespace App\Models;

use CodeIgniter\Model;

class InformationsModel extends Model
{
	protected $table = "informations";
	protected $returnType = "object";
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $allowedFields = [
		"title",
		"slug",
		"content",
		"thumbnail",
		"views",
		"category",
		"date",
	];

	public function public()
	{
		return $this->where("category", "public");
	}

	public function public_related($title, $limit = 2)
	{
		$related = $this->select("*, MATCH(title, content) AGAINST('$title') AS score");
		$related->where("MATCH(title, content) AGAINST('$title')");
		$related->whereNotIn("title", [$title]);
		$related->orderBy("score", "DESC");

		return $related->findAll($limit);
	}

	public function agenda()
	{
		return $this->where("category", "agenda");
	}

	public function agenda_related($title, $limit = 2)
	{
		$related = $this->select("*, MATCH(title, content) AGAINST('$title') AS score");
		$related->where("MATCH(title, content) AGAINST('$title')");
		$related->whereNotIn("title", [$title]);
		$related->orderBy("score", "DESC");

		return $related->findAll($limit);
	}
}
