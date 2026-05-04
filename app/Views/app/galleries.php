<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("stylesheet") ?>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css">
<style>
	.gallery-image {
		width: 100%;
		height: 240px;
		object-fit: cover;
	}

	.mfp-with-zoom .mfp-container,
	.mfp-with-zoom.mfp-bg {
		opacity: 0;
		-webkit-transition: all 0.3s ease-out;
		-moz-transition: all 0.3s ease-out;
		-o-transition: all 0.3s ease-out;
		transition: all 0.3s ease-out;
	}

	.mfp-with-zoom.mfp-ready .mfp-container {
		opacity: 1;
	}

	.mfp-with-zoom.mfp-ready.mfp-bg {
		opacity: 0.8;
	}

	.mfp-with-zoom.mfp-removing .mfp-container,
	.mfp-with-zoom.mfp-removing.mfp-bg {
		opacity: 0;
	}
</style>
<?= $this->endSection() ?>

<?= $this->section("button") ?>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="javascript:void(0)" class="add-button btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form">
			<?= tabler_icon("plus") ?>
			Tambah Galeri
		</a>
		<a href="javascript:void(0)" class="add-button btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" aria-label="Tambah Galeri">
			<?= tabler_icon("plus") ?>
		</a>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section("body") ?>
<?php foreach ($galleries as $gallery) : ?>
	<div class="col-sm-6 col-lg-4">
		<div class="card card-sm">
			<div class="skeleton-image gallery-image">
				<a href="<?= safe_gallery($gallery->image) ?>" title="<?= $gallery->title ?: $gallery->caption ?>" class="d-block">
					<img src="<?= safe_gallery($gallery->image) ?>" class="card-img-top gallery-image">
				</a>
			</div>
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<?php if ($gallery->title) : ?>
							<div class="card-title mb-0"><?= $gallery->title ?></div>
						<?php endif ?>
						<?php if ($gallery->caption) : ?>
							<div class="text-muted"><?= $gallery->caption ?></div>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="d-flex">
				<a href="javascript:void(0)" class="card-btn text-warning edit-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" data-id="<?= $gallery->id ?>" data-title="<?= $gallery->title ?>" data-caption="<?= $gallery->caption ?>">
					<?= tabler_icon("edit") ?>
					<span class="ms-1">Ubah</span>
				</a>
				<a href="javascript:void(0)" class="card-btn text-danger delete-button" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-danger" data-name="<?= $gallery->title ?: $gallery->caption ?>" data-delete="<?= base_url($settings->panelPrefix . "/galleries/delete/" . $gallery->id) ?>">
					<?= tabler_icon("trash") ?>
					<span class="ms-1">Hapus</span>
				</a>
			</div>
		</div>
	</div>
<?php endforeach ?>
<?= $this->endSection() ?>

<?= $this->section("pagination") ?>
<div class="d-flex mt-3">
	<?= $pager->links("default", "panel") ?>
</div>
<?= $this->endSection() ?>

<?= $this->section("modal") ?>
<div class="modal modal-blur fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<?= form_open_multipart(current_url() . "/insert", ["class" => "modal-content", "data-page" => "$page"]) ?>
		<div class="modal-header">
			<h5 class="modal-title">Tambah Galeri</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="mb-3">
				<label class="form-label">Judul</label>
				<input type="text" class="form-control" name="title">
			</div>
			<div class="mb-3">
				<label class="form-label">Keterangan</label>
				<textarea name="caption" class="form-control"></textarea>
			</div>
			<div class="mb-0">
				<label class="form-label">Gambar</label>
				<input type="file" name="file" class="form-control">
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
<script src="//cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"></script>
<script>
	$(document).ready(function() {
		$('.skeleton-image.gallery-image').magnificPopup({
			delegate: 'a',
			type: 'image',
			closeOnContentClick: false,
			closeBtnInside: false,
			mainClass: 'mfp-with-zoom mfp-img-mobile',
			image: {
				verticalFit: true
			},
			gallery: {
				enabled: true
			},
			zoom: {
				enabled: true,
				duration: 300,
				opener: function(element) {
					return element.find('img');
				}
			}
		});
	});
</script>
<?= $this->endSection() ?>