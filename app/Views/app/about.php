<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("body") ?>
<div class="page-body">
	<div class="container-xl">
		<div class="row gx-lg-4">
			<div class="col-lg-3 mb-3">
				<ul class="nav nav-pills nav-vertical">
					<?php foreach ($menus as $menu) : ?>
						<li class="nav-item">
							<a href="<?= base_url($settings->panelPrefix . $menu["link"]) ?>" class="nav-link <?= $menu["active"] ?>">
								<?= $menu["name"] ?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			<?= form_open(current_url() . "/save", ["class" => "col-lg-9"]) ?>
			<div class="card shadow-sm border-0">
				<div class="card-body p-0">
					<input type="hidden" name="code" value="<?= $slug ?>">
					<textarea name="content" class="form-control editor" id="editor"><?= $content ?></textarea>
				</div>
				<div class="card-footer bg-white text-end">
					<button type="submit" class="btn btn-primary px-4">
						<?= tabler_icon("device-floppy") ?> Simpan Perubahan
					</button>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section("javascript") ?>
<script src="<?= base_url("libs/ckeditor5/build/ckeditor.js") ?>"></script>
<script>
	$(document).ready(function() {
		if ($('#editor').length) {
			ClassicEditor
				.create(document.querySelector('#editor'), {
					toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo'],
				})
				.catch(error => {
					console.error(error);
				});
		}
	});
</script>
<?= $this->endSection() ?>