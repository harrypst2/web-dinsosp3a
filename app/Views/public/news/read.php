<?= $this->extend("public/_layouts/default") ?>

<?= $this->section("hero") ?>
<section class="bg-half d-table w-100">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 text-center">
				<div class="page-next-level">
					<nav aria-label="breadcrumb" class="d-inline-block">
						<ul class="breadcrumb bg-white rounded-pill shadow-sm px-4 mb-3">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Utama</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url("news") ?>">Berita</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url("category/" . $category["slug"]) ?>"><?= ucwords(strtolower($category["name"])) ?></a></li>
						</ul>
					</nav>
					<h4 class="title" style="max-width: 800px; margin: 0 auto;"> <?= $article->title ?> </h4>
					
					<div class="news-meta mt-4 d-flex justify-content-center align-items-center gap-4 text-muted">
						<div class="d-flex align-items-center">
							<i class="uil uil-user me-2 text-primary"></i> Administrator
						</div>
						<div class="d-flex align-items-center">
							<i class="uil uil-calendar-alt me-2 text-primary"></i> <?= indonesia_date($article->updated_at ?: $article->created_at) ?>
						</div>
						<div class="d-flex align-items-center">
							<i class="uil uil-eye me-2 text-primary"></i> <?= $article->views ?> Kali Dilihat
						</div>
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
		<div class="row g-4">
			<!-- Main Article -->
			<div class="col-lg-8 col-12">
				<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
					<?php if ($article->thumbnail) : ?>
						<img src="<?= safe_thumbnail($article->thumbnail) ?>" class="img-fluid w-100 object-fit-cover" style="max-height: 450px;" alt="<?= $article->title ?>">
					<?php endif ?>

					<div class="card-body p-4 p-lg-5">
						<div class="article-content" style="font-size: 17px; line-height: 1.8; color: #334155;">
							<?= $article->content ?>
						</div>
						
						<div class="mt-5 pt-4 border-top">
							<div class="d-flex align-items-center gap-3">
								<span class="fw-bold text-dark">Bagikan:</span>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank" class="btn btn-icon btn-soft-primary rounded-circle"><i class="uil uil-facebook-f"></i></a>
								<a href="https://twitter.com/intent/tweet?url=<?= current_url() ?>&text=<?= $article->title ?>" target="_blank" class="btn btn-icon btn-soft-primary rounded-circle"><i class="uil uil-twitter"></i></a>
								<a href="https://api.whatsapp.com/send?text=<?= $article->title ?>%20<?= current_url() ?>" target="_blank" class="btn btn-icon btn-soft-primary rounded-circle"><i class="uil uil-whatsapp"></i></a>
							</div>
						</div>
					</div>
				</div>

				<?php if (count($related) > 0) : ?>
					<div class="mt-5">
						<h4 class="fw-bold mb-4">Berita Terkait</h4>
						<div class="row">
							<?php foreach ($related as $rel) : ?>
								<div class="col-lg-6 mb-4">
									<div class="card news-card border-0 shadow-sm rounded-4">
										<div class="news-img-container">
											<img src="<?= safe_thumbnail($rel->thumbnail) ?>" class="card-img-top news-cover" alt="<?= $rel->title ?>">
										</div>
										<div class="card-body p-4">
											<h6 class="mb-3">
												<a href="<?= base_url("news/" . $rel->slug) ?>" class="text-dark text-decoration-none fw-bold">
													<?= (strlen($rel->title) > 60) ? substr($rel->title, 0, 60) . '...' : $rel->title ?>
												</a>
											</h6>
											<div class="news-meta d-flex justify-content-between align-items-center">
												<small><i class="uil uil-calendar-alt me-1"></i> <?= indonesia_date($rel->updated_at ?: $rel->created_at) ?></small>
												<a href="<?= base_url("news/" . $rel->slug) ?>" class="text-primary fw-bold text-decoration-none small">Baca <i class="uil uil-arrow-right align-middle"></i></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif ?>
			</div>

			<!-- Sidebar -->
			<?= $this->include("public/_includes/sidebar") ?>
		</div>
	</div>
</section>
<?= $this->endSection() ?>