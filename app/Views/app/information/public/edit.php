<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("body") ?>
<div class="col-12">
	<?= form_open_multipart($settings->panelPrefix . "/information/public/update/" . $article->id, ["class" => "card"]) ?>
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