<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("stylesheet") ?>
<style>
	.choices.is-focused .form-select {
		border-color: #90b5e2 !important;
		box-shadow: unset !important;
	}
</style>
<?= $this->endSection() ?>

<?= $this->section("body") ?>
<div class="col-12">
	<?= form_open_multipart($settings->panelPrefix . "/service/update/" . $service->id, ["class" => "card"]) ?>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8">
				<div class="mb-3">
					<label class="form-label">Judul</label>
					<input type="text" name="title" class="form-control" value="<?= $service->title ?>">
				</div>
				<div class="mb-0">
					<label class="form-label">Konten</label>
					<textarea name="content" class="form-control small-editor"><?= $service->content ?></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Kategori</label>
					<select name="target" class="form-select" id="targets">
						<option value="">-- Pilih Kategori --</option>
						<?php foreach ($targets as $target) : ?>
							<option value="<?= $target->id ?>" <?= $service->target == $target->id ? "selected" : "" ?>><?= $target->name ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-0">
					<label class="form-label">Berkas</label>
					<input type="file" name="file" data-default-file="<?= safe_file($service->file) ?>" class="dropify" data-show-remove="false" data-allowed-file-extensions="pdf zip rar doc docx xls xlsx pdf ppt pptx png jpg jpeg gif">
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
<script src="//cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		let el;
		window.Choices && (new Choices(el = document.getElementById("targets"), {
			classNames: {
				containerInner: el.className,
				input: "form-control",
				inputCloned: "form-control-sm",
				listDropdown: "dropdown-menu",
				itemChoice: "dropdown-item",
				activeState: "show",
				selectedState: "active",
			},
			shouldSort: false,
			searchEnabled: false,
		}));
	});
</script>
<?= $this->endSection() ?>