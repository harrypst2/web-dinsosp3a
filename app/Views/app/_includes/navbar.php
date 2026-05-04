<div class="navbar-expand-md">
	<div class="collapse navbar-collapse" id="navbar-menu">
		<div class="navbar navbar-light">
			<div class="container-xl">
				<ul class="navbar-nav">
					<?php foreach (sidebars() as $sidebar) : ?>
						<?php if (count($sidebar->children) > 0) : ?>
							<li class="nav-item dropdown <?= $sidebar->active ?>">
								<a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button" aria-expanded="false">
									<span class="nav-link-icon d-md-none d-lg-inline-block">
										<?= tabler_icon($sidebar->icon) ?>
									</span>
									<span class="nav-link-title">
										<?= $sidebar->name ?>
									</span>
								</a>
								<div class="dropdown-menu">
									<?php foreach ($sidebar->children as $child) : ?>
										<a class="dropdown-item <?= $child->active ?>" href="<?= base_url($settings->panelPrefix . $child->link) ?>">
											<?= $child->name ?>
										</a>
									<?php endforeach ?>
								</div>
							</li>
						<?php else : ?>
							<li class="nav-item <?= $sidebar->active ?>">
								<a class="nav-link" href="<?= base_url($settings->panelPrefix . $sidebar->link) ?>">
									<span class="nav-link-icon d-md-none d-lg-inline-block">
										<?= tabler_icon($sidebar->icon) ?>
									</span>
									<span class="nav-link-title">
										<?= $sidebar->name ?>
									</span>
								</a>
							</li>
						<?php endif ?>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
</div>