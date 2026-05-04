<?= $this->extend("public/_layouts/default") ?>

<?= $this->section("hero") ?>
<section class="bg-half bg-light d-table w-100">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 text-center">
				<div class="page-next-level">
					<h4 class="title" style="max-width: 450px; margin: 0 auto;"> <?= $page ?> </h4>
					<ul class="list-unstyled mt-4">
						<li class="list-inline-item h6 date text-muted">
							<i class="mdi mdi-calendar-check"></i>
							<?= indonesia_date($article->date) ?>
						</li>
					</ul>
					<div class="page-next">
						<nav aria-label="breadcrumb" class="d-inline-block">
							<ul class="breadcrumb bg-white rounded shadow mb-0">
								<li class="breadcrumb-item"><a href="<?= base_url() ?>">Utama</a></li>
								<li class="breadcrumb-item"><a href="javascript:void(0)">Informasi</a></li>
								<li class="breadcrumb-item"><a href="<?= base_url("information/" . $type["slug"]) ?>"><?= ucwords(strtolower($type["name"])) ?></a></li>
								<li class="breadcrumb-item active" aria-current="page">Baca</li>
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
			<div class="col-lg-10">
				<div class="row">
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

					<div class="col-md-10">
						<ul class="list-unstyled d-flex justify-content-between">
							<li class="list-inline-item user me-2">
								<a href="javascript:void(0)" class="text-muted">
									<i class="uil uil-user text-dark"></i>
									Administrator
								</a>
							</li>
							<li class="list-inline-item date text-muted">
								<i class="uil uil-calendar-alt text-dark"></i>
								<?= indonesia_date($article->updated_at ?: $article->created_at) ?>
							</li>
						</ul>

						<?php if ($article->thumbnail) : ?>
							<img src="<?= safe_thumbnail($article->thumbnail) ?>" class="img-fluid w-100 rounded-md shadow" alt="<?= $article->title ?>">
						<?php endif ?>

						<div class="mt-4 article-content">
							<?= $article->content ?>
						</div>

						<!-- <h5 class="mt-4">Komentar :</h5> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>