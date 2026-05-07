<header id="topnav" class="defaultscroll sticky">
	<div class="container">
		<div>
			<a class="logo" href="<?= base_url() ?>">
				<div class="logo-light d-flex align-items-center">
					<span class="logo-blob d-flex align-items-center justify-content-center bg-primary-soft rounded-circle" style="width: 42px; height: 42px;">
						<img src="<?= base_url("assets/images/logo.webp") ?>" class="logo-light-mode" alt="<?= settings()->appName ?>" style="height: 30px; width: auto;">
					</span>
					<img src="<?= base_url("assets/images/logo.webp") ?>" class="logo-dark-mode" alt="<?= settings()->appName ?>">
					<div class="ms-2 d-inline-block text-start lh-1" style="margin-top: 8px;">
						<span class="d-block fw-bold logo-text-main" style="font-size: 11px; text-transform: uppercase; font-weight: 800 !important; font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: 0.5px; color: #374151 !important;">Dinas Sosial P3A</span>
						<span class="d-block text-muted logo-text-sub" style="font-size: 7px; margin-top: 4px; text-transform: uppercase; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 500; letter-spacing: 1px;">Kabupaten Purwakarta</span>
					</div>
				</div>
			</a>
		</div>

		<ul class="buy-button list-inline mb-0 d-none d-lg-flex">
			<li class="list-inline-item mb-0">
				<a href="https://siyansos.purwakartakab.go.id/" target="_blank" class="btn btn-orange d-flex align-items-center">
					<img src="<?= base_url("assets/images/pengaduan.webp") ?>" class="me-2" style="height: 30px; width: auto;" alt="Pengaduan">
					Pengaduan
				</a>
			</li>
		</ul>

		<div class="menu-extras">
			<div class="menu-item">
				<a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
					<div class="lines">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</a>
			</div>
		</div>

		<div id="navigation">
			<ul class="navigation-menu">
				<li><a href="<?= base_url() ?>" class="sub-menu-item">Utama</a></li>
				<li><a href="<?= base_url("news") ?>" class="sub-menu-item">Berita</a></li>
				<li class="has-submenu parent-menu-item">
					<a href="javascript:void(0)">Informasi</a><span class="menu-arrow"></span>
					<ul class="submenu">
						<li><a href="<?= base_url("information/public") ?>" class="sub-menu-item">Publik</a></li>
						<li><a href="<?= base_url("information/agenda") ?>" class="sub-menu-item">Agenda</a></li>
						<li><a href="<?= base_url("information/faqs") ?>" class="sub-menu-item">FAQ's</a></li>
					</ul>
				</li>
				<li><a href="<?= base_url("galleries") ?>" class="sub-menu-item">Galeri</a></li>
				<li><a href="<?= base_url("files") ?>" class="sub-menu-item">Berkas</a></li>
				<li><a href="<?= base_url("contact") ?>" class="sub-menu-item">Kontak</a></li>
				<li class="d-lg-none">
					<a href="https://siyansos.purwakartakab.go.id/" target="_blank" class="sub-menu-item d-flex align-items-center" style="color: #E67E22 !important;">
						<img src="<?= base_url("assets/images/pengaduan.webp") ?>" class="me-2" style="height: 20px; width: auto;" alt="Pengaduan">
						Pengaduan
					</a>
				</li>
			</ul>
		</div>
	</div>
</header>