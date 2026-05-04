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
	<?= form_open_multipart($settings->panelPrefix . "/news/insert", ["class" => "card"]) ?>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8">
				<div class="mb-3">
					<label class="form-label">Judul</label>
					<input type="text" name="title" class="form-control" value="<?= old("title") ?>">
				</div>
				<div class="mb-0">
					<label class="form-label">Konten</label>
					<textarea name="content" class="form-control editor"><?= old("content") ?></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Kategori</label>
					<select name="category" class="form-select" id="categories">
						<option value="">-- Pilih Kategori --</option>
						<?php foreach ($categories as $category) : ?>
							<option value="<?= $category->id ?>" <?= old("category") == $category->id ? "selected" : "" ?>><?= $category->name ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-0">
					<label class="form-label">Gambar Mini</label>
					<input type="file" name="thumbnail" class="dropify" data-show-remove="false" data-allowed-file-extensions="png jpg jpeg gif">
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
		window.Choices && (new Choices(el = document.getElementById("categories"), {
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