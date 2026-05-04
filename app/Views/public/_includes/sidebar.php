<div class="col-lg-4 col-md-12 col-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
	<div class="sidebar sticky-bar">
		<?php if (isset($categories)) : ?>
			<div class="card border-0 shadow-sm rounded-4 mb-4">
				<div class="card-body p-4">
					<h5 class="widget-title">Kategori Berita</h5>
					<ul class="list-unstyled mb-0 blog-categories">
						<?php foreach ($categories as $category) : ?>
							<li class="d-flex justify-content-between align-items-center">
								<a href="<?= $category->url ?>" class="text-decoration-none">
									<?= $category->name ?>
								</a>
								<span class="badge rounded-pill"><?= $category->total ?></span>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		<?php endif ?>

		<?php if (isset($latest)) : ?>
			<div class="card border-0 shadow-sm rounded-4">
				<div class="card-body p-4">
					<h5 class="widget-title">Berita Terpopuler</h5>
					<div class="mt-4">
						<?php foreach ($latest as $article) : ?>
							<div class="d-flex align-items-center mb-3 pb-3 border-bottom-light">
								<div class="flex-shrink-0">
									<a href="<?= base_url("news/" . $article->slug) ?>">
										<img src="<?= safe_thumbnail($article->thumbnail) ?>" class="rounded-3 object-fit-cover" style="width: 70px; height: 70px;" alt="<?= $article->title ?>">
									</a>
								</div>
								<div class="flex-grow-1 ms-3">
									<a href="<?= base_url("news/" . $article->slug) ?>" class="text-dark fw-bold d-block mb-1 text-decoration-none" style="font-size: 14px; line-height: 1.3;">
										<?= (strlen($article->title) > 50) ? substr($article->title, 0, 50) . '...' : $article->title ?>
									</a>
									<span class="text-muted" style="font-size: 12px;">
										<i class="uil uil-calendar-alt me-1"></i> <?= indonesia_date($article->updated_at ?: $article->created_at) ?>
									</span>
								</div>
							</div>
						<?php endforeach ?>
					</div>
					
					<a href="<?= base_url("news") ?>" class="btn btn-soft-primary w-100 mt-2">Lihat Semua Berita</a>
				</div>
			</div>
		<?php endif ?>
	</div>
</div>

<style>
	.border-bottom-light {
		border-bottom: 1px solid #f1f5f9;
	}
	.border-bottom-light:last-child {
		border-bottom: none;
		margin-bottom: 0 !important;
		padding-bottom: 0 !important;
	}
	.btn-soft-primary {
		background-color: rgba(47, 85, 212, 0.1);
		color: #2f55d4;
		border: none;
		font-weight: 600;
	}
	.btn-soft-primary:hover {
		background-color: #2f55d4;
		color: #fff;
	}
</style>