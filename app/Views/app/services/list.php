<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("button") ?>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="<?= base_url($settings->panelPrefix . "/service/add") ?>" class="btn btn-primary d-none d-sm-inline-block">
			<?= tabler_icon("plus") ?>
			Tambah Layanan
		</a>
		<a href="<?= base_url($settings->panelPrefix . "/service/add") ?>" class="btn btn-primary d-sm-none btn-icon" aria-label="Tambah Layanan">
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
						<th>Judul</th>
						<th>Berkas</th>
						<th>Kategori</th>
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
<?= $this->include("app/_includes/delete-modal") ?>
<?= $this->endSection() ?>