<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

class NewsModel extends Model
{
	protected $table = "news";
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
	];

	public function related(string $title, int $limit = 2)
	{
		$escaped = $this->db->escape($title);

		$this->select(new RawSql("*, MATCH(title, content) AGAINST({$escaped}) AS score"));
		$this->where(new RawSql("MATCH(title, content) AGAINST({$escaped})"));
		$this->whereNotIn("title", [$title]);
		$this->orderBy("score", "DESC");

		return $this->findAll($limit);
	}
}
