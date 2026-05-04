<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Views extends Migration
{
	private $views = [
		"view_news",
		"view_services",
		"view_orgchart",
	];

	public function up()
	{
		$news = "CREATE VIEW view_news AS SELECT news.id, news.title, news.slug, news.content, news.thumbnail, news.views, categories.name AS category, news.created_at, news.updated_at FROM news JOIN categories ON news.category = categories.id WHERE news.deleted_at IS NULL AND categories.deleted_at IS NULL";
		$this->db->query($news);

		$services = "CREATE VIEW view_services AS SELECT services.id, services.title, services.content, services.file, targets.name AS target, services.created_at, services.updated_at FROM services JOIN targets ON services.target = targets.id WHERE services.deleted_at IS NULL AND targets.deleted_at IS NULL;";
		$this->db->query($services);

		$orgchart = "CREATE VIEW view_orgchart AS SELECT children.id, children.name, children.position, children.nip, children.photo, parent.id AS parent_id, parent.name AS parent FROM orgchart AS children LEFT JOIN orgchart AS parent ON parent.id = children.parent WHERE children.deleted_at IS NULL AND parent.deleted_at IS NULL ORDER BY children.parent, children.id";
		$this->db->query($orgchart);
	}

	public function down()
	{
		// drop all view
		foreach ($this->views as $view) {
			$this->db->query("DROP VIEW IF EXISTS $view");
		}
	}
}
