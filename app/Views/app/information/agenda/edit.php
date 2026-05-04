<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("body") ?>
<div class="col-12">
	<?= form_open_multipart($settings->panelPrefix . "/information/agenda/update/" . $article->id, ["class" => "card"]) ?>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8">
				<div class="mb-3">
					<label class="form-label">Judul</label>
					<input type="text" name="title" class="form-control" value="<?= $article->title ?>">
				</div>
				<div class="mb-0">
					<label class="form-label">Konten</label>
					<textarea name="content" class="form-control editor"><?= $article->content ?></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Tanggal Agenda</label>
					<div class="input-icon mb-2">
						<input type="text" name="date" class="form-control" id="datepicker" value="<?= $article->date ?: date("Y-m-d") ?>" />
						<span class="input-icon-addon">
							<?= tabler_icon("calendar") ?>
						</span>
					</div>
				</div>
				<div class="mb-0">
					<label class="form-label">Gambar Mini</label>
					<input type="file" name="thumbnail" data-default-file="<?= safe_thumbnail($article->thumbnail) ?>" class="dropify" data-show-remove="false" data-allowed-file-extensions="png jpg jpeg gif">
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Simpan</button>
	</div>
</div>
<?= form_close() ?>
</div>
<?= $this->endSection() ?>

<?= $this->section("javascript") ?>
<script src="//cdn.jsdelivr.net/npm/litepicker@2.0.11/dist/litepicker.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		window.Litepicker && (new Litepicker({
			element: document.getElementById("datepicker"),
			buttonText: {
				previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>`,
				nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>`,
			},
		}));
	});
</script>
<?= $this->endSection() ?>