<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("stylesheet") ?>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css">
<?= $this->endSection() ?>

<?= $this->section("button") ?>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="javascript:void(0)" class="add-button btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form">
			<?= tabler_icon("plus") ?>
			Tambah Pegawai
		</a>
		<a href="javascript:void(0)" class="add-button btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-backdrop="static" data-bs-target="#modal-form" aria-label="Tambah Pegawai">
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
						<th>No</th>
						<th>Nama</th>
						<th>NIP</th>
						<th>JK</th>
						<th>Jabatan</th>
						<th></th>
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
		<?= form_open_multipart(current_url() . "/insert", ["class" => "modal-content", "data-page" => "Pegawai"]) ?>
		<div class="modal-header">
			<h5 class="modal-title">Tambah Pegawai</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="mb-3">
				<label class="form-label">Foto</label>
				<input type="file" name="file" class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">NIP</label>
				<input type="text" class="form-control" name="nip">
			</div>
			<div class="mb-3">
				<label class="form-label">Jenis Kelamin</label>
				<select name="gender" class="form-control">
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Jabatan</label>
				<input type="text" class="form-control" name="position">
			</div>
			<div class="mb-0">
				<label class="form-label">Atasan (Parent)</label>
				<select name="parent" class="form-select">
					<option value="">-- Tanpa Atasan (Kepala) --</option>
					<?php $employees = $employees ?? []; ?>
					<?php foreach ($employees as $parent) : ?>
						<option value="<?= $parent->id ?>"><?= $parent->name ?> (<?= $parent->position ?>)</option>
					<?php endforeach ?>
				</select>
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

		$(document).on("click", ".edit-button", function() {
			const id = $(this).data("id");
			const name = $(this).data("name");
			const nip = $(this).data("nip");
			const gender = $(this).data("gender");
			const position = $(this).data("position");
			const parent = $(this).data("parent");

			const modal = $("#modal-form");
			modal.find(".modal-title").text("Ubah Pegawai");
			modal.find("form").attr("action", "<?= current_url() ?>/update/" + id);
			modal.find("input[name='name']").val(name);
			modal.find("input[name='nip']").val(nip);
			modal.find("select[name='gender']").val(gender);
			modal.find("input[name='position']").val(position);
			modal.find("select[name='parent']").val(parent);
		});

		$(document).on("click", ".add-button", function() {
			const modal = $("#modal-form");
			modal.find(".modal-title").text("Tambah Pegawai");
			modal.find("form").attr("action", "<?= current_url() ?>/insert");
			modal.find("form")[0].reset();
		});
	});
</script>
<?= $this->endSection() ?>