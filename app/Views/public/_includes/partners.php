<?php if (isset($partners) && count($partners) > 0) : ?>
	<section class="py-5 bg-light">
		<div class="container">
			<div class="row justify-content-center">
				<?php foreach ($partners as $partner) : ?>
					<div class="col-lg-3 col-md-4 col-6 mt-4">
						<a href="<?= $partner->url ?>" target="_blank" class="text-decoration-none">
							<div class="partner-card text-center rounded-4 shadow-sm h-100 d-flex flex-column align-items-center justify-content-center">
								<img src="<?= safe_partner($partner->image) ?>" class="img-fluid" alt="<?= $partner->name ?>">
								<h5 class="partner-name mb-0"><?= $partner->name ?></h5>
								<?php if ($partner->description) : ?>
									<p class="partner-desc mb-0"><?= $article->description ?? $partner->description ?></p>
								<?php endif ?>
							</div>
						</a>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
<?php endif ?>