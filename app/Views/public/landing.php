<?php
/**
 * @var array $sliders
 * @var array $targets
 * @var array $faqs
 * @var array $news
 * @var array $partners
 * @var string $gmaps
 * @var \Config\Site $settings
 */
?>
<?= $this->extend("public/_layouts/default") ?>

<?= $this->section("hero") ?>
<style>
	/* ── Slider Elegant Frame ── */
	.slider-frame-wrapper {
		padding: 6px;
		border-radius: 14px;
		background: linear-gradient(135deg, rgba(255,255,255,0.55) 0%, rgba(200,210,230,0.25) 100%);
		box-shadow:
			0 4px 6px -1px rgba(0,0,0,0.06),
			0 20px 50px -10px rgba(0,0,0,0.18),
			inset 0 0 0 1px rgba(255,255,255,0.6);
		backdrop-filter: blur(4px);
	}
	.slider-frame-wrapper::before {
		content: '';
		position: absolute;
		inset: 0;
		border-radius: 14px;
		padding: 1px;
		background: linear-gradient(135deg, rgba(255,255,255,0.8), rgba(180,200,230,0.3), rgba(255,255,255,0.1));
		-webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
		mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
		-webkit-mask-composite: xor;
		mask-composite: exclude;
		pointer-events: none;
	}
	.slider-glass-content {
		background: rgba(255, 255, 255, 0.1);
		backdrop-filter: blur(10px);
		border: 1px solid rgba(255, 255, 255, 0.2);
		padding: 3rem;
		border-radius: 20px;
		box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
	}
	.swiper-button-next, .swiper-button-prev {
		width: 50px !important;
		height: 50px !important;
		background: rgba(255, 255, 255, 0.1) !important;
		backdrop-filter: blur(5px);
		border: 1px solid rgba(255, 255, 255, 0.3) !important;
		border-radius: 50% !important;
		color: white !important;
		transition: all 0.3s ease !important;
		z-index: 10 !important;
	}
	.swiper-button-next:after, .swiper-button-prev:after {
		font-size: 20px !important;
	}
	.swiper-button-next:hover, .swiper-button-prev:hover {
		background: var(--primary) !important;
		border-color: var(--primary) !important;
		transform: scale(1.1);
	}
	.heading {
		text-shadow: 0 2px 10px rgba(0,0,0,0.3);
	}
	/* Aesthetic Slider Improvements */
	.swiper-slide-active .slide-inner {
		animation: kenburns 15s ease-in-out infinite alternate;
	}
	@keyframes kenburns {
		0% { transform: scale(1); }
		100% { transform: scale(1.15); }
	}
	.slide-inner::after {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: radial-gradient(circle, rgba(0,0,0,0) 0%, rgba(0,0,0,0.4) 100%);
		z-index: 1;
	}
	.features-absolute {
		margin-top: -140px;
		position: relative;
		z-index: 2;
	}
	@media (max-width: 768px) {
		.features-absolute {
			margin-top: -40px;
		}
	}
	.swiper-pagination {
		bottom: 40px !important;
	}
	/* Hide Slider Numbers and show dots */
	.swiper-pagination-bullet {
		width: 12px !important;
		height: 12px !important;
		background: rgba(255, 255, 255, 0.5) !important;
		opacity: 1 !important;
		border: 1px solid rgba(255, 255, 255, 0.3);
		text-indent: -9999px; /* Hide numbers */
		display: inline-block;
		margin: 0 6px !important;
		transition: all 0.3s ease;
		border-radius: 50% !important;
	}
	.swiper-pagination-bullet-active {
		background: var(--primary) !important;
		border-color: var(--primary);
		width: 30px !important; /* Elongated dot for active state */
		border-radius: 20px !important;
	}
	/* ── Premium Feature Cards ── */
	.explore-feature {
		transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
		background: rgba(255, 255, 255, 0.7) !important;
		backdrop-filter: blur(10px);
		border: 1px solid rgba(255, 255, 255, 0.5) !important;
		box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03) !important;
	}
	.explore-feature:hover {
		transform: translateY(-10px);
		background: rgba(255, 255, 255, 0.9) !important;
		box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08) !important;
	}
	.explore-feature .icons {
		width: 65px;
		height: 65px;
		line-height: 65px;
		background: linear-gradient(135deg, rgba(47, 85, 212, 0.1) 0%, rgba(47, 85, 212, 0.05) 100%);
		border-radius: 15px;
		transition: all 0.3s ease;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.explore-feature:hover .icons {
		background: var(--primary);
		transform: rotate(10deg) scale(1.1);
	}
	.explore-feature:hover .icons i {
		color: white !important;
	}
	.explore-feature .title {
		font-weight: 700 !important;
		letter-spacing: 0.5px;
	}
	.explore-feature a.text-primary i {
		transition: transform 0.3s ease;
	}
	.explore-feature:hover a.text-primary i {
		transform: translateX(5px);
	}
</style>

<section class="section pt-5 pb-0" style="margin-top: 40px; background: transparent !important;">
	<div class="container">
		<div class="position-relative slider-frame-wrapper">
			<div class="swiper-container rounded-3 overflow-hidden" style="width: 100%; aspect-ratio: 16 / 9; height: auto;">
				<div class="swiper-wrapper">
					<?php foreach ($sliders as $slider) : ?>
						<div class="swiper-slide d-flex align-items-center overflow-hidden">
							<div class="slide-inner slide-bg-image d-flex align-items-center" style="background-position: center center; background-size: cover; width: 100%; aspect-ratio: 16 / 9; height: auto;" data-background="<?= safe_slider($slider->image) ?>">
								<div class="bg-overlay" style="background: rgba(0,0,0,0.1)"></div>
							</div>
						</div>
					<?php endforeach ?>
				</div>

				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>
</section>


<?= $this->endSection() ?>

<?= $this->section("features") ?>
<section class="section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="features-absolute">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center h-100">
								<div class="icons text-primary text-center mx-auto">
									<i class="uil uil-info-circle d-block rounded h3 mb-0"></i>
								</div>
								<div class="card-body p-0 content d-flex flex-column">
									<h5 class="mt-4"><a href="<?= base_url("about") ?>" class="title text-dark">Tentang</a></h5>
									<p class="text-muted flex-grow-1">Tentang <?= $settings->appTitle ?></p>
									<div class="mt-auto">
										<a href="<?= base_url("about") ?>" class="text-primary">Lihat <i class="uil uil-angle-right-b align-middle"></i></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-12 mt-2 mt-md-0 pt-2 pt-md-0">
							<div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center h-100">
								<div class="icons text-primary text-center mx-auto">
									<i class="uil uil-clipboard-alt d-block rounded h3 mb-0"></i>
								</div>
								<div class="card-body p-0 content d-flex flex-column">
									<h5 class="mt-4"><a href="<?= base_url("vision-mission") ?>" class="title text-dark">Visi dan Misi</a></h5>
									<p class="text-muted flex-grow-1">Visi dan misi <?= $settings->appTitle ?></p>
									<div class="mt-auto">
										<a href="<?= base_url("vision-mission") ?>" class="text-primary">Lihat <i class="uil uil-angle-right-b align-middle"></i></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-12 mt-2 mt-lg-0 pt-2 pt-lg-0">
							<div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center h-100">
								<div class="icons text-primary text-center mx-auto">
									<i class="uil uil-channel d-block rounded h3 mb-0"></i>
								</div>
								<div class="card-body p-0 content d-flex flex-column">
									<h5 class="mt-4"><a href="<?= base_url("org-chart") ?>" class="title text-dark">Struktur Organisasi</a></h5>
									<p class="text-muted flex-grow-1">Struktur organisasi <?= $settings->appTitle ?></p>
									<div class="mt-auto">
										<a href="<?= base_url("org-chart") ?>" class="text-primary">Lihat <i class="uil uil-angle-right-b align-middle"></i></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-12 mt-2 mt-lg-0 pt-2 pt-lg-0">
							<div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center h-100">
								<div class="icons text-primary text-center mx-auto">
									<i class="uil uil-users-alt d-block rounded h3 mb-0"></i>
								</div>
								<div class="card-body p-0 content d-flex flex-column">
									<h5 class="mt-4"><a href="<?= base_url("employees") ?>" class="title text-dark">Kepegawaian</a></h5>
									<p class="text-muted flex-grow-1">Daftar pegawai <?= $settings->appTitle ?></p>
									<div class="mt-auto">
										<a href="<?= base_url("employees") ?>" class="text-primary">Lihat <i class="uil uil-angle-right-b align-middle"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container" style="margin-top: 60px;">
		<div class="row align-items-center">
			<div class="col-lg-5 col-md-6 mt-4 pt-2">
				<img src="<?= base_url("assets/images/tasks.svg") ?>" class="img-fluid border-0" alt="">
			</div>

			<div class="col-lg-7 col-md-6 mt-4 pt-2">
				<div class="section-title ms-lg-5">
					<h5 class="title mb-4">Tugas Pokok dan Fungsi</h5>
					<p class="text-muted">Tugas Pokok dan Fungsi <?= $settings->appTitle ?></p>
					<a href="<?= base_url("tasks") ?>" class="text-primary">Lihat <i class="uil uil-angle-right-b align-middle"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>

<?= $this->section("services") ?>
<section class="section">
	<div class="container">
		<div class="row justify-content-center mb-2">
			<div class="col-12">
				<div class="section-title text-center">
					<h4 class="title mb-4">Pelayanan Dinas Sosial</h4>
				</div>
			</div>
		</div>

		<div class="row" id="counter">
			<?php foreach ($targets as $target) : ?>
				<div class="col-lg-3 col-md-6 col-12 mt-2 pt-2">
					<div class="card explore-feature border-0 shadow rounded text-center bg-white h-100">
						<div class="card-body d-flex">
							<div class="content justify-content-center align-self-center w-100">
								<h4 class="mb-0">
									<span class="counter-value" data-target="<?= $target->total ?>">0</span><?= $target->total <= 0 ? "" : "+" ?>
								</h4>
								<h6 class="mb-3 text-muted">
									<?= $target->name ?>
								</h6>
								<a href="<?= base_url("service/" . $target->slug) ?>" class="btn btn-icon btn-pills btn-outline-primary"><i class="uil uil-angle-right-b"></i></a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>

	<div class="container mt-100 mt-60">
		<div class="row align-items-center">
			<div class="col-lg-5 col-md-6 order-1 order-md-2">
				<img src="<?= base_url("assets/images/faqs.svg") ?>" class="img-fluid" alt="">
			</div>

			<div class="col-lg-7 col-md-6 order-2 order-md-1 mt-4 mt-sm-0 pt-2 pt-sm-0">
				<div class="section-title me-lg-5">
					<h4 class="title mb-4">Pertanyaan Sering Muncul</h4>
				</div>

				<div class="accordion mt-4 pt-2 mb-3" id="accordionExample">
					<?php foreach ($faqs as $index => $faq) : ?>
						<?php if ($index == 0) : ?>
							<div class="accordion-item rounded shadow">
								<h2 class="accordion-header" id="heading<?= $index ?>">
									<button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="true" aria-controls="collapse<?= $index ?>">
										<?= $faq->question ?>
									</button>
								</h2>
								<div id="collapse<?= $index ?>" class="accordion-collapse border-0 collapse show" aria-labelledby="heading<?= $index ?>" data-bs-parent="#accordionExample">
									<div class="accordion-body text-muted bg-white">
										<?= $faq->answer ?>
									</div>
								</div>
							</div>
						<?php else : ?>
							<div class="accordion-item rounded shadow mt-2">
								<h2 class="accordion-header" id="heading<?= $index ?>">
									<button class="accordion-button border-0 bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>">
										<?= $faq->question ?>
									</button>
								</h2>
								<div id="collapse<?= $index ?>" class="accordion-collapse border-0 collapse" aria-labelledby="heading<?= $index ?>" data-bs-parent="#accordionExample">
									<div class="accordion-body text-muted bg-white">
										<?= $faq->answer ?>
									</div>
								</div>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				</div>

				<a href="<?= base_url("information/faqs") ?>" class="h6 text-primary">Lihat Semua <i class="uil uil-angle-right-b"></i></a>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>

<?= $this->section("content") ?>


<section class="section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 text-center">
				<div class="section-title">
					<h4 class="title">Berita Terbaru</h4>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<?php foreach ($news as $article) : ?>
				<div class="col-lg-4 col-md-6 mt-4 pt-2">
					<div class="card blog rounded border-0 shadow">
						<div class="position-relative">
							<img src="<?= safe_thumbnail($article->thumbnail) ?>" class="card-img-top rounded-top news-cover" alt="<?= $article->title ?>">
							<div class="overlay rounded-top bg-dark"></div>
						</div>
						<div class="card-body content">
							<h5><a href="<?= base_url("news/" . $article->slug) ?>" class="card-title title text-dark"><?= $article->title ?></a></h5>
							<div class="post-meta d-flex justify-content-between mt-3">
								<ul class="list-unstyled mb-0">
									<li class="list-inline-item me-2 mb-0">
										<a href="<?= base_url("news/" . $article->slug) ?>" class="text-muted like">
											<i class="uil uil-eye me-1"></i>
											<?= $article->views ?>
										</a>
									</li>

								</ul>
								<a href="<?= base_url("news/" . $article->slug) ?>" class="text-muted readmore">Baca <i class="uil uil-angle-right-b align-middle"></i></a>
							</div>
						</div>
						<div class="author">
							<small class="text-light user d-block"><i class="uil uil-user"></i> Administrator</small>
							<small class="text-light date"><i class="uil uil-calendar-alt"></i> <?= indonesia_date($article->updated_at ?: $article->created_at) ?></small>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>

		<a href="<?= base_url("news") ?>" class="h6 text-primary">Lihat Semua <i class="uil uil-angle-right-b"></i></a>
	</div>
</section>
<?= $this->endSection() ?>



<?= $this->section("javascript") ?>
<script>
	// Change Swiper effect to fade
	$(document).ready(function() {
		if (typeof Swiper !== 'undefined') {
			// Destroy previous instance to apply new effect
			$('.swiper-container').each(function() {
				if (this.swiper) {
					this.swiper.destroy();
				}
			});

			new Swiper(".swiper-container", {
				loop: true,
				effect: 'fade',
				fadeEffect: {
					crossFade: true
				},
				speed: 1000,
				autoplay: {
					delay: 5000,
					disableOnInteraction: false,
				},
				pagination: {
					el: '.swiper-pagination',
					clickable: true,
				},
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
			});
		}
	});
</script>
<?= $this->endSection() ?>