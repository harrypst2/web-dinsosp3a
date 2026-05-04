<?= $this->extend("public/_layouts/default") ?>

<?= $this->section("hero") ?>
<section class="bg-half bg-light d-table w-100">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 text-center">
				<div class="page-next-level">
					<h4 class="title" style="max-width: 450px; margin: 0 auto;"> <?= $page ?> </h4>
					<div class="page-next">
						<nav aria-label="breadcrumb" class="d-inline-block">
							<ul class="breadcrumb bg-white rounded shadow mb-0">
								<li class="breadcrumb-item"><a href="<?= base_url() ?>">Utama</a></li>
								<li class="breadcrumb-item">Layanan</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="text-center subcribe-form mb-2">
					<form style="max-width: 800px;">
						<input type="text" id="s" name="s" class="rounded-pill shadow" placeholder="Cari layanan..." value="<?= $keywords ?? "" ?>">
						<button type="submit" class="btn btn-pills btn-primary">Cari</button>
					</form>
				</div>

				<?php if (count($services) <= 0) : ?>
					<div class="text-center mt-4 pt-2">
						<img src="<?= base_url("assets/images/404.svg") ?>" class="img-fluid" alt="" style="max-height: 321px;">
						<p class="text-muted para-desc mx-auto">
							Layanan yang kamu cari tidak dapat ditemukan.
						</p>
					</div>
				<?php else : ?>
					<div class="table-responsive bg-white shadow rounded mt-4">
						<table class="table mb-0 table-center">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-bottom" style="min-width: 300px;">Layanan</th>
									<th scope="col" class="border-bottom text-center" style="max-width: 150px;">Berkas</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($services as $service) : ?>
									<tr>
										<td>
											<div class="d-flex">
												<i class="uil uil-award text-muted h5"></i>
												<div class="flex-1 content ms-3">
													<a href="javascript:void(0)" class="forum-title text-primary fw-bold">
														<?= $service->title ?>
													</a>
													<p class="text-muted small mb-0 mt-2">
														<?= $service->content ?>
													</p>
												</div>
											</div>
										</td>
										<td class="text-center small h6">
											<a href="<?= base_url("service/download/" . hashids($service->id)) ?>">Unduh</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				<?php endif ?>

				<?php if ($pager->getPageCount() > 1) : ?>
					<div class="mt-4 pt-2">
						<?= $pager->links("default", "bootstrap") ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>