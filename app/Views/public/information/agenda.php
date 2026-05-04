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
								<li class="breadcrumb-item"><a href="javascript:void(0)">Informasi</a></li>
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
		<div class="row">
			<div class="col-12">
				<div class="text-center subcribe-form">
					<form style="max-width: 800px;">
						<input type="text" id="s" name="s" class="rounded-pill shadow" placeholder="Cari agenda..." value="<?= $keywords ?>">
						<button type="submit" class="btn btn-pills btn-primary">Cari</button>
					</form>
				</div>
			</div>

			<?php if (count($articles) <= 0) : ?>
				<div class="col-12 text-center mt-4 pt-2">
					<img src="<?= base_url("assets/images/404.svg") ?>" class="img-fluid" alt="" style="max-height: 321px;">
					<p class="text-muted para-desc mx-auto">
						Agenda yang kamu cari tidak dapat ditemukan.
					</p>
				</div>
			<?php else : ?>
				<?php foreach ($articles as $article) : ?>
					<div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 picture-item">
						<div class="card blog border-0 work-container work-classic shadow rounded-md overflow-hidden">
							<img src="<?= safe_thumbnail($article->thumbnail) ?>" class="img-fluid work-image news-cover" alt="<?= $article->title ?>">
							<div class="card-body">
								<div class="content">
									<span class="badge badge-link bg-success"><?= indonesia_date($article->date) ?></span>
									<h5 class="mt-3 mb-3"><a href="<?= base_url("agenda/" . $article->slug) ?>" class="text-dark title"><?= $article->title ?></a></h5>
									<a href="<?= base_url("agenda/" . $article->slug) ?>" class="text-primary h6">Baca <i class="uil uil-angle-right-b align-middle"></i></a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>

			<?php if ($pager->getPageCount() > 1) : ?>
				<div class="col-12">
					<?= $pager->links("default", "bootstrap") ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</section>
<?= $this->endSection() ?>