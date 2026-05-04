<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("body") ?>
<div class="col-md-6 col-lg-3">
	<div class="card">
		<div class="card-body p-4 text-center">
			<span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url(<?= avatar(null, $userdata) ?>)"></span>
			<h3 class="m-0 mb-1">
				<a href="javascript:void(0)"><?= $userdata->name ?></a>
			</h3>
			<div class="text-muted">Administrator</div>
			<div class="mt-3">
				<span class="badge bg-purple-lt">Admin</span>
			</div>
		</div>
		<div class="d-flex">
			<a href="<?= base_url("logout") ?>" class="card-btn">
				<?= tabler_icon("logout") ?>
				Keluar
			</a>
		</div>
	</div>
</div>

<div class="col-md-6 col-lg-9">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Profil & Akun</h3>
		</div>
		<div class="card-body">
			<?= form_open_multipart($settings->panelPrefix . "/profile/save") ?>
			<div class="form-group mb-3">
				<label class="form-label">Nama Pengguna</label>
				<input type="text" class="form-control" value="<?= $userdata->username ?>" readonly="">
			</div>
			<div class="form-group mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control" name="name" value="<?= $userdata->name ?>">
			</div>
			<div class="form-group mb-3">
				<label class="form-label">Surel</label>
				<input type="email" class="form-control" name="email" value="<?= $userdata->email ?>">
			</div>
			<div class="mb-3">
				<div class="form-label">Avatar</div>
				<input type="file" class="form-control" name="avatar" />
			</div>

			<div class="hr-text">KATA SANDI</div>

			<div class="alert alert-info" role="alert">
				<div class="d-flex">
					<?= tabler_icon("info-circle") ?>
					<div class="text-muted">Abaikan bagian ini jika tidak ingin mengubah kata sandi</div>
				</div>
			</div>

			<div class="form-group mb-3">
				<label class="form-label">Kata sandi lama</label>
				<input type="password" class="form-control" name="oldpass">
			</div>
			<div class="form-group mb-3">
				<label class="form-label">Kata sandi baru</label>
				<input type="password" class="form-control" name="newpass">
			</div>
			<div class="form-group mb-0">
				<label class="form-label">Ulangi kata sandi baru</label>
				<input type="password" class="form-control" name="repass">
			</div>

			<div class="form-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<?= $this->endSection() ?>