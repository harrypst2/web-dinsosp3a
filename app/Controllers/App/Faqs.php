<?php

namespace App\Controllers\App;

use App\Controllers\BaseController;

use App\Models\FaqsModel;

use Hermawan\DataTables\DataTable;

class Faqs extends BaseController
{
	protected $faqs;

	function __construct()
	{
		$this->faqs = new FaqsModel();
	}

	public function index()
	{
		$variable = [
			"parent" => "Informasi",
			"page" => "FAQ's",
			// ...
			"userdata" => user_detail(),
			"settings" => $this->settings,
		];

		return view("app/information/faqs", $variable);
	}

	public function datatable()
	{
		$faqs = $this->faqs
			->select("id, answer, question")
			->where("deleted_at IS NULL", null, false)
			->builder();

		return DataTable::of($faqs)
			->addNumbering("no")
			->add("action", function ($row) {
				$id = $row->id;
				$question = $row->question;
				$answer = $row->answer;

				$delete = base_url($this->settings->panelPrefix . "/information/faqs/delete/" . $id);

				$html = '<div class="btn-list flex-nowrap">';
				$html .= '<a href="javascript:void(0)" class="text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="' . $id . '" data-question="' . $question . '" data-answer="' . $answer . '">';
				$html .= tabler_icon("edit");
				$html .= '</a>';
				$html .= '<a href="javascript:void(0)" class="text-danger delete-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-danger" data-name="' . $question . '" data-delete="' . $delete . '">';
				$html .= tabler_icon("trash");
				$html .= '</a>';
				$html .= '</div>';

				return $html;
			})
			->postQuery(function ($builder) {
				$builder->orderBy("id", "DESC");
			})
			->hide("id")
			->toJson(true);
	}

	public function insert()
	{
		// validation
		$this->validation->setRules([
			"question" => [
				"label" => "Pertanyaan",
				"rules" => "required"
			],
			"answer" => [
				"label" => "Jawaban",
				"rules" => "required",
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$question = $this->request->getPost("question");
		$answer = $this->request->getPost("answer");

		$insert = $this->faqs->insert([
			"question" => $question,
			"answer" => $answer,
		], true);

		if ($insert) {
			return redirect()->back()
				->with("success", "Berhasil menambahkan data FAQ.");
		}

		return redirect()->back()
			->with("failed", "Gagal menambahkan data FAQ.");
	}

	public function update($id)
	{
		$faq = $this->faqs->where("id", $id)->first();
		if ($faq === null) {
			return redirect()->back()
				->with("failed", "Gagal mengubah data FAQ.");
		}

		// validation
		$this->validation->setRules([
			"question" => [
				"label" => "Pertanyaan",
				"rules" => "required"
			],
			"answer" => [
				"label" => "Jawaban",
				"rules" => "required",
			],
		]);
		$isInvalid = !$this->validation->withRequest($this->request)->run();

		if ($isInvalid) {
			return redirect()->back()
				->with("failed", implode(" ", $this->validation->getErrors()));
		}

		$question = $this->request->getPost("question");
		$answer = $this->request->getPost("answer");

		$update = $this->faqs->update($id, [
			"question" => $question,
			"answer" => $answer,
		]);

		if ($update) {
			return redirect()->back()
				->with("success", "Berhasil mengubah data FAQ.");
		}

		return redirect()->back()
			->with("failed", "Gagal mengubah data FAQ.");
	}

	public function delete($id)
	{
		$faq = $this->faqs->where("id", $id)->first();

		if ($faq !== null) {
			$delete = $this->faqs->delete($id);

			if ($delete) {
				return redirect()->back()
					->with("success", "Berhasil menghapus data FAQ.");
			}
		}

		return redirect()->back()
			->with("failed", "Gagal menghapus data FAQ.");
	}
}
