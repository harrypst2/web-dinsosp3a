<!DOCTYPE html>
<?php
/**
 * @var string $page
 * @var \Config\Site $settings
 */
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?= set_title($page) ?>

	<meta name="description" content="<?= $settings->appDescription ?>">
	<meta name="keywords" content="<?= $settings->appKeywords ?>">
	<meta name="subject" content="Government">

	<link rel="canonical" href="<?= current_url() ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('favicon/apple-touch-icon.png?v=kZjrwwa195') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon/favicon-32x32.png?v=kZjrwwa195') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon/favicon-16x16.png?v=kZjrwwa195') ?>">
    <link rel="manifest" href="<?= base_url('favicon/site.webmanifest?v=kZjrwwa195') ?>">
    <link rel="mask-icon" href="<?= base_url('favicon/safari-pinned-tab.svg?v=kZjrwwa195') ?>" color="#5bbad5">
    <link rel="shortcut icon" href="<?= base_url('favicon/favicon.ico?v=kZjrwwa195') ?>">
    <meta name="apple-mobile-web-app-title" content="Dinas Sosial P3A">
    <meta name="application-name" content="Dinas Sosial P3A">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="<?= base_url('favicon/browserconfig.xml?v=kZjrwwa195') ?>">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Montserrat:wght@700;800;900&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css") ?>">
	<link rel="stylesheet" href="<?= base_url("assets/css/tobii.min.css") ?>">
	<link rel="stylesheet" href="<?= base_url("assets/css/materialdesignicons.min.css") ?>">
	<link rel="stylesheet" href="//unicons.iconscout.com/release/v3.0.6/css/line.css">
	<link href="<?= base_url("assets/css/swiper.min.css") ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url("assets/css/style.min.css") ?>" rel="stylesheet" id="theme-opt">
	<link href="<?= base_url("assets/css/color.css") ?>" rel="stylesheet" id="color-opt">
	<link href="<?= base_url("assets/css/custom.css?v=" . time()) ?>" rel="stylesheet">
	<style>
		html, body {
			height: 100%;
			min-height: 100%;
			margin: 0;
			padding: 0;
		}
		body {
			position: relative;
			overflow-x: hidden;
			background: #ffffff;
		}
		#topnav {
			background: transparent !important;
			transition: all 0.3s ease;
			height: 80px;
			padding: 10px 0;
			box-shadow: none !important;
			border: none !important;
		}
		#topnav .navigation-menu {
			background: transparent !important;
		}
		#topnav .logo {
			margin-top: 8px;
		}
		#topnav .logo img {
			height: 42px;
			transition: all 0.3s ease;
		}
		#topnav.nav-sticky {
			background-color: rgba(255, 255, 255, 0.7) !important;
			backdrop-filter: blur(10px);
			height: 65px;
			padding: 5px 0;
			box-shadow: 0 0 3px rgba(60, 72, 88, 0.15) !important;
		}
		#topnav.nav-sticky .logo img {
			height: 35px;
			margin-top: 8px;
		}
		#topnav .navigation-menu > li > a {
			padding-top: 25px;
			padding-bottom: 25px;
			transition: all 0.3s ease;
		}
		#topnav.nav-sticky .navigation-menu > li > a {
			padding-top: 18px;
			padding-bottom: 18px;
		}
		#topnav.nav-sticky .navigation-menu .has-submenu .menu-arrow {
			top: 23px;
		}
		#topnav.nav-sticky .navigation-menu > .has-submenu:hover .menu-arrow {
			top: 26px !important;
		}
		#topnav .buy-button {
			display: flex;
			align-items: center;
			height: 60px;
			margin-bottom: 0;
			float: right;
			transition: all 0.3s ease;
		}
		#topnav .buy-button .btn {
			transition: all 0.3s ease;
		}
		#topnav.nav-sticky .buy-button {
			height: 55px;
		}
		#topnav.nav-sticky .buy-button .btn {
			padding: 5px 14px;
			font-size: 13px;
		}
		.btn-orange {
			background: linear-gradient(135deg, #E67E22 0%, #D35400 100%) !important;
			border: none !important;
			color: #fff !important;
			border-radius: 50px !important;
			font-weight: 600 !important;
			box-shadow: 0 4px 15px rgba(230, 126, 34, 0.3) !important;
			transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
		}
		.btn-orange:hover, .btn-orange:focus, .btn-orange:active {
			transform: translateY(-2px) scale(1.03);
			background: linear-gradient(135deg, #F39C12 0%, #E67E22 100%) !important;
			box-shadow: 0 8px 25px rgba(230, 126, 34, 0.4) !important;
			color: #fff !important;
		}

		/* ── Blob Background Effect (Ported from SvelteKit) ── */
		@keyframes blob-downward {
			0% { transform: translateY(0); }
			100% { transform: translateY(5000px); }
		}

		.blob-background-container {
			position: fixed;
			width: 100%;
			top: 0;
			bottom: 0;
			left: 0;
			overflow: hidden;
			z-index: -1;
			pointer-events: none;
		}

		.blob-2 {
			position: absolute;
			background: linear-gradient(to bottom, transparent 0%, #f7dacb 35%, #f7dacb 65%, transparent 100%);
			top: -2500px;
			width: 150%;
			left: -25%;
			height: 2700px;
			animation: blob-downward 20s linear infinite;
		}

		.bg-overlay {
			background: linear-gradient(45deg, rgba(47, 85, 212, 0.4) 0%, rgba(30, 48, 80, 0.7) 100%) !important;
		}

		/* Global Header Background */
		section.bg-half.bg-light {
			background-color: #faebe3 !important;
		}

		/* Accessibility Widget */
		.accessibility-btn {
			position: fixed;
			bottom: 80px;
			left: 20px;
			width: 50px;
			height: 50px;
			background: #2f55d4;
			color: white;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 24px;
			cursor: pointer;
			z-index: 999;
			box-shadow: 0 4px 10px rgba(0,0,0,0.2);
			transition: all 0.3s ease;
		}
		.accessibility-btn:hover {
			transform: scale(1.1);
			background: #2444ad;
		}
		.accessibility-menu {
			position: fixed;
			bottom: 140px;
			left: 20px;
			background: white;
			border-radius: 12px;
			box-shadow: 0 10px 30px rgba(0,0,0,0.15);
			padding: 15px;
			z-index: 998;
			display: none;
			width: 220px;
			border: 1px solid #eee;
		}
		.accessibility-menu.active {
			display: block;
			animation: fadeInUp 0.3s ease;
		}
		.accessibility-item {
			margin-bottom: 15px;
		}
		.accessibility-item:last-child {
			margin-bottom: 0;
		}
		.accessibility-item label {
			display: block;
			font-size: 13px;
			font-weight: 600;
			margin-bottom: 8px;
			color: #333;
		}
		.accessibility-controls {
			display: flex;
			gap: 8px;
		}
		.accessibility-controls button {
			flex: 1;
			border: 1px solid #ddd;
			background: #f8f9fa;
			padding: 8px;
			border-radius: 6px;
			font-size: 14px;
			cursor: pointer;
			transition: all 0.2s;
		}
		.accessibility-controls button:hover {
			background: #eee;
		}
		.grayscale {
			filter: grayscale(100%) !important;
		}
		@keyframes fadeInUp {
			from { opacity: 0; transform: translateY(10px); }
			to { opacity: 1; transform: translateY(0); }
		}
	</style>
	<?= $this->renderSection("stylesheet") ?>
</head>

	<!-- Blob Background -->
	<div class="blob-background-container">
		<div class="blob-2"></div>
	</div>

	<!-- <div id="preloader">
		<div id="status">
			<div class="spinner">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>
	</div> -->

	<?= $this->include("public/_includes/navbar") ?>

	<?= $this->renderSection("hero") ?>
	<?= $this->renderSection("features") ?>
	<?= $this->renderSection("services") ?>
	<?= $this->renderSection("content") ?>
	<?= $this->renderSection("contact") ?>

	<?= view_cell('App\Cells\PartnersCell::display') ?>
	<?= $this->include("public/_includes/footer") ?>

	<!-- Accessibility Widget -->
	<div class="accessibility-btn" id="accBtn" title="Aksesibilitas">
		<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="currentColor" style="color: white;">
			<path d="M12,2C13.1,2 14,2.9 14,4C14,5.1 13.1,6 12,6C10.9,6 10,5.1 10,4C10,2.9 10.9,2 12,2M21,9H15V22H13V16H11V22H9V9H3V7H21V9Z" />
		</svg>
	</div>
	<div class="accessibility-menu" id="accMenu">
		<div class="accessibility-item">
			<label>Ukuran Teks</label>
			<div class="accessibility-controls">
				<button onclick="changeFontSize(-1)">A-</button>
				<button onclick="resetFontSize()">Reset</button>
				<button onclick="changeFontSize(1)">A+</button>
			</div>
		</div>
		<div class="accessibility-item">
			<label>Tampilan</label>
			<div class="accessibility-controls">
				<button onclick="toggleGrayscale()">Hitam Putih</button>
			</div>
		</div>
	</div>

	<a href="javascript:void(0)" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top">
		<i data-feather="arrow-up" class="icons"></i>
	</a>

	<script src="//cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script>
		// Accessibility Script
		const accBtn = document.getElementById('accBtn');
		const accMenu = document.getElementById('accMenu');
		let fontSize = 100;

		accBtn.addEventListener('click', () => {
			accMenu.classList.toggle('active');
		});

		function changeFontSize(delta) {
			fontSize += delta * 10;
			if (fontSize < 80) fontSize = 80;
			if (fontSize > 150) fontSize = 150;
			document.body.style.fontSize = fontSize + '%';
		}

		function resetFontSize() {
			fontSize = 100;
			document.body.style.fontSize = '100%';
		}

		function toggleGrayscale() {
			document.body.classList.toggle('grayscale');
		}

		// Close menu when clicking outside
		document.addEventListener('click', (e) => {
			if (!accBtn.contains(e.target) && !accMenu.contains(e.target)) {
				accMenu.classList.remove('active');
			}
		});
	</script>
	<script src="<?= base_url("assets/js/bootstrap.bundle.min.js") ?>"></script>
	<script src="<?= base_url("assets/js/swiper.min.js") ?>"></script>
	<script src="<?= base_url("assets/js/tobii.min.js") ?>"></script>
	<script src="<?= base_url("assets/js/feather.min.js") ?>"></script>
	<script src="<?= base_url("assets/js/app.js") ?>"></script>
	<script src="<?= base_url("assets/js/plugins.init.js") ?>"></script>
	<script src="<?= base_url("assets/js/custom.js") ?>"></script>

	<?= $this->renderSection("javascript") ?>
</body>

</html>