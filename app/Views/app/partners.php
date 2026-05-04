<?php

/**
 * @var \App\Models\PartnersModel $partners
 */
?>

<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("stylesheet") ?>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css">
<?= $this->endSection() ?>

<?= $this->section("button") ?>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="javascript:void(0)" class="add-button btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form">
			<?= tabler_icon("plus") ?>
			Tambah Tautan
		</a>
		<a href="javascript:void(0)" class="add-button btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" aria-label="Tambah Tautan">
			<?= tabler_icon("plus") ?>
		</a>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section("body") ?>
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered datatable" data-serverside="<?= current_url() . "/datatable" ?>" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Instansi</th>
							<th>URL Tautan</th>
							<th>Deskripsi</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section("modal") ?>
<div class="modal modal-blur fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<?= form_open_multipart(current_url() . "/insert", ["class" => "modal-content", "data-page" => "Tautan Eksternal"]) ?>
		<div class="modal-header">
			<h5 class="modal-title">Tambah Tautan Eksternal</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="mb-3">
				<label class="form-label">Logo</label>
				<input type="file" name="file" class="form-control" accept="image/*">
				<small class="text-muted">Gunakan gambar dengan latar belakang transparan (PNG/WebP) untuk hasil terbaik.</small>
			</div>
			<div class="mb-3">
				<label class="form-label">Nama Instansi</label>
				<input type="text" class="form-control" name="name" required placeholder="Contoh: LPSE Kabupaten Purwakarta">
			</div>
			<div class="mb-3">
				<label class="form-label">URL Tautan</label>
				<input type="url" class="form-control" name="url" required placeholder="Contoh: https://lpse.purwakartakab.go.id">
			</div>
			<div class="mb-0">
				<label class="form-label">Deskripsi</label>
				<textarea name="description" class="form-control" placeholder="Deskripsi singkat (opsional)"></textarea>
			</div>
		</div>
		<div class="modal-footer">
			<a href="javascript:void(0)" class="btn btn-link link-secondary" data-bs-dismiss="modal">
				Batal
			</a>
			<button type="submit" class="btn btn-primary ms-auto">
				Simpan
			</button>
		</div>
		<?= form_close() ?>
	</div>
</div>

<?= $this->include("app/_includes/delete-modal") ?>
<?= $this->endSection() ?>

<?= $this->section("javascript") ?>
<script src="//cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"></script>
<script>
	$(document).ready(function() {
		$(document).on("click", ".show-picture", function(evt) {
			evt.preventDefault();

			$(this).magnificPopup({
				type: 'image',
				closeOnContentClick: false,
				closeBtnInside: false,
				image: {
					verticalFit: true
				},
				gallery: {
					enabled: false
				},
				zoom: {
					enabled: false
				}
			}).magnificPopup('open');
		});
	});
</script>
<?= $this->endSection() ?>
