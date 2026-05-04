<?php
/**
 * @var string $page
 * @var array $news
 * @var \CodeIgniter\Pager\Pager $pager
 * @var string|null $keywords
 * @var string|null $category
 */
?>
<?= $this->extend("public/_layouts/default") ?>

<?= $this->section("hero") ?>
<section class="bg-half d-table w-100">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 text-center">
				<div class="page-next-level">
					<h4 class="title"> <?= $page ?> </h4>
					<p class="text-muted mb-0">Temukan berita terbaru dan informasi terkini seputar layanan kami.</p>
					
					<div class="hero-search">
						<form role="search" method="get">
							<div class="input-group">
								<input type="text" name="s" class="form-control" placeholder="Cari berita atau artikel..." value="<?= $keywords ?? "" ?>">
								<button type="submit" class="btn btn-search">
									<i class="uil uil-search me-1"></i> Cari
								</button>
							</div>
						</form>
					</div>

					<div class="page-next mt-4">
						<nav aria-label="breadcrumb" class="d-inline-block">
							<ul class="breadcrumb bg-white rounded-pill shadow-sm px-4 mb-0">
								<li class="breadcrumb-item"><a href="<?= base_url() ?>">Utama</a></li>
								<?php if (isset($category)) : ?>
									<li class="breadcrumb-item"><a href="<?= base_url("news") ?>">Berita</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?= ucwords(strtolower($category)) ?></li>
								<?php else : ?>
									<li class="breadcrumb-item active" aria-current="page">Berita</li>
								<?php endif ?>
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
		<div class="row align-items-start">
			<div class="col-lg-8 col-md-12">
				<?php if (count($news) <= 0) : ?>
					<div class="row justify-content-center py-5">
						<div class="col-lg-8 col-md-12 text-center">
							<div class="mb-4">
								<i class="uil uil-search-minus text-primary display-1"></i>
							</div>
							<h4>Oops! Berita tidak ditemukan</h4>
							<p class="text-muted para-desc mx-auto">
								Maaf, kami tidak dapat menemukan berita yang Anda cari. Coba gunakan kata kunci lain.
							</p>
							<a href="<?= base_url("news") ?>" class="btn btn-primary mt-3">Tampilkan Semua Berita</a>
						</div>
					</div>
				<?php else : ?>
					<div class="row">
						<?php foreach ($news as $article) : ?>
							<div class="col-lg-6 col-md-6 col-12 mb-4 pb-2">
								<div class="card news-card border-0 shadow-sm rounded-4">
									<div class="news-img-container">
										<img src="<?= safe_thumbnail($article->thumbnail) ?>" class="card-img-top news-cover" alt="<?= $article->title ?>">
										<?php if(isset($article->category)): ?>
											<span class="badge-category"><?= $article->category ?></span>
										<?php endif; ?>
									</div>
									<div class="card-body content">
										<h5 class="card-title">
											<a href="<?= base_url("news/" . $article->slug) ?>" class="text-dark text-decoration-none">
												<?= $article->title ?>
											</a>
										</h5>
										
										<div class="news-meta mt-3 d-flex justify-content-between align-items-center">
											<div class="d-flex align-items-center">
												<i class="uil uil-calendar-alt me-1"></i>
												<?= indonesia_date($article->updated_at ?: $article->created_at) ?>
											</div>
											<div class="d-flex align-items-center">
												<i class="uil uil-eye me-1"></i>
												<?= $article->views ?>
											</div>
										</div>
										
										<div class="mt-3 pt-3 border-top">
											<a href="<?= base_url("news/" . $article->slug) ?>" class="btn btn-link p-0 text-primary fw-bold text-decoration-none">
												Baca Selengkapnya <i class="uil uil-arrow-right align-middle"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>

						<?php if ($pager->getPageCount() > 1) : ?>
							<div class="col-12 mt-4">
								<div class="d-flex justify-content-center">
									<?= $pager->links("default", "bootstrap") ?>
								</div>
							</div>
						<?php endif ?>
					</div>
				<?php endif ?>
			</div>

			<?= $this->include("public/_includes/sidebar") ?>
		</div>
	</div>
</section>
<?= $this->endSection() ?>