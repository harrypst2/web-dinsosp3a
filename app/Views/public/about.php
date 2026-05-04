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
								<li class="breadcrumb-item active" aria-current="page"><?= $page ?></li>
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
		<div class="row justify-content-center">
			<div class="col-md-2 d-none d-md-block">
				<ul class="list-unstyled text-center sticky-bar social-icon mb-0">
					<li class="mb-3 h6">Share</li>
					<li>
						<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?= current_url() ?>" class="rounded">
							<i data-feather="facebook" class="fea icon-sm fea-social"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="http://twitter.com/share?url=<?= current_url() ?>" class="rounded">
							<i data-feather="twitter" class="fea icon-sm fea-social"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?= current_url() ?>" class="rounded">
							<i data-feather="linkedin" class="fea icon-sm fea-social"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="whatsapp://send?text=<?= current_url() ?>" class="rounded">
							<i class="uil uil-whatsapp icon-sm"></i>
						</a>
					</li>
				</ul>
			</div>

			<div class="col-lg-9">
				<div class="card shadow border-0 rounded">
					<div class="card-body">
						<?= $about->content ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>