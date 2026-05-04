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
								<li class="breadcrumb-item active" aria-current="page"><?= ucwords(strtolower($type)) ?></li>
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
			<div class="col-lg-4 col-md-5 col-12 d-none d-md-block">
				<div class="rounded shadow p-4 sticky-bar">
					<ul class="list-unstyled sidebar-nav mb-0 py-0" id="navmenu-nav">
						<li class="navbar-item mb-2 px-0"><a href="#general" class="h6 text-dark navbar-link">Pertanyaan Umum</a></li>
					</ul>
					<img src="<?= base_url("assets/images/faqs.svg") ?>" class="img-fluid my-2 px-0" alt="">
				</div>
			</div>

			<div class="col-lg-8 col-md-7 col-12">
				<div class="section-title" id="general">
					<h4>Pertanyaan Umum</h4>
				</div>

				<div class="accordion mt-4 pt-2" id="generalquestion">
					<?php foreach ($faqs as $index => $faq) : ?>
						<?php if ($index == 0) : ?>
							<div class="accordion-item rounded">
								<h2 class="accordion-header" id="heading<?= $index ?>">
									<button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="true" aria-controls="collapse<?= $index ?>">
										<?= $faq->question ?>
									</button>
								</h2>
								<div id="collapse<?= $index ?>" class="accordion-collapse border-0 collapse show" aria-labelledby="heading<?= $index ?>" data-bs-parent="#generalquestion">
									<div class="accordion-body text-muted bg-white">
										<?= $faq->answer ?>
									</div>
								</div>
							</div>
						<?php else : ?>
							<div class="accordion-item rounded mt-2">
								<h2 class="accordion-header" id="heading<?= $index ?>">
									<button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>">
										<?= $faq->question ?>
									</button>
								</h2>
								<div id="collapse<?= $index ?>" class="accordion-collapse border-0 collapse" aria-labelledby="heading<?= $index ?>" data-bs-parent="#generalquestion">
									<div class="accordion-body text-muted bg-white">
										<?= $faq->answer ?>
									</div>
								</div>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>

	<div class="container mt-100 mt-60">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="d-flex align-items-center features feature-clean shadow rounded p-4">
					<div class="icons text-primary text-center">
						<i class="uil uil-envelope-check d-block rounded h3 mb-0"></i>
					</div>
					<div class="flex-1 content ms-4">
						<h5 class="mb-1"><a href="javascript:void(0)" class="text-dark">Berhubungan !</a></h5>
						<p class="text-muted mb-0">Ini diperlukan ketika, untuk teks belum tersedia.</p>
						<div class="mt-2">
							<a href="javascript:void(0)" class="btn btn-sm btn-soft-primary">Mengajukan permohonan</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
				<div class="d-flex align-items-center features feature-clean shadow rounded p-4">
					<div class="icons text-primary text-center">
						<i class="uil uil-webcam d-block rounded h3 mb-0"></i>
					</div>
					<div class="flex-1 content ms-4">
						<h5 class="mb-1"><a href="javascript:void(0)" class="text-dark">Mulai Rapat</a></h5>
						<p class="text-muted mb-0">Ini diperlukan ketika, untuk teks belum tersedia.</p>
						<div class="mt-2">
							<a href="javascript:void(0)" class="btn btn-sm btn-soft-primary">Mulai Obrolan Video</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>