<?php

namespace App\Controllers;

ini_set('max_execution_time', 0);
ini_set('memory_limit', '2G');

use App\Controllers\BaseController;
use Config\Services;

use App\Models\EmployeesModel;
use App\Models\FilesModel;
use App\Models\GalleriesModel;
use App\Models\InformationsModel;
use App\Models\NewsModel;

class Download extends BaseController
{
	protected $curl;
	protected $employees;
	protected $files;
	protected $galleries;
	protected $informations;
	protected $news;

	function __construct()
	{
		$this->curl = Services::curlrequest();
		$this->employees = new EmployeesModel();
		$this->files = new FilesModel();
		$this->galleries = new GalleriesModel();
		$this->informations = new InformationsModel();
		$this->news = new NewsModel();
	}

	public function photo()
	{
	    die();
		foreach ($this->employees->findAll() as $employee) {
			$url = "https://dinsosp3a.purwakartakab.go.id/assets/dashboard/images/" . $employee->photo;
			$data = $this->curl->request("GET", $url, ["timeout" => 0])->getBody();

			$write = write_file("uploads/photos/" . $employee->photo, $data);
			echo $write ? "Sukses<br/>" : "Terjadi Kesalahan<br/>";
		}
	}

	public function file()
	{
	    die();
		foreach ($this->files->findAll() as $file) {
			$url = "https://dinsosp3a.purwakartakab.go.id/assets/upload/files/" . $file->file;
			$data = $this->curl->request("GET", $url, ["timeout" => 0])->getBody();

			$write = write_file("uploads/files/" . $file->file, $data);
			echo $write ? "Sukses<br/>" : "Terjadi Kesalahan<br/>";
		}
	}

	public function gallery()
	{
	    die();
		foreach ($this->galleries->findAll() as $gallery) {
			$url = "https://dinsosp3a.purwakartakab.go.id/assets/upload/gallery/" . $gallery->image;
			$data = $this->curl->request("GET", $url, ["timeout" => 0])->getBody();

			$write = write_file("uploads/galleries/" . $gallery->image, $data);
			echo $write ? "Sukses<br/>" : "Terjadi Kesalahan<br/>";
		}
	}

	public function thumbnail()
	{
	    die();
		foreach ($this->news->findAll() as $news) {
			$url = "https://dinsosp3a.purwakartakab.go.id/assets/upload/images/" . $news->thumbnail;
			$data = $this->curl->request("GET", $url, ["timeout" => 0])->getBody();

			$write = write_file("uploads/thumbnails/" . $news->thumbnail, $data);
			echo $write ? "Sukses<br/>" : "Terjadi Kesalahan<br/>";
		}
	}
}
