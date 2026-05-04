<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<?= set_panel_title($page) ?>
	
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

	<!-- CSS -->
	<link rel="stylesheet" href="<?= base_url("css/tabler.min.css") ?>">
	<link rel="stylesheet" href="<?= base_url("css/tabler-flags.min.css") ?>">
	<link rel="stylesheet" href="<?= base_url("css/tabler-payments.min.css") ?>">
	<link rel="stylesheet" href="<?= base_url("css/tabler-vendors.min.css") ?>">
	<!-- Libraries -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css">
	<style>
		*:focus {
			outline: none !important;
			box-shadow: none !important;
		}

		.dropify-message>.file-icon>p {
			font-size: 15px !important;
		}

		.dataTables_wrapper.dt-bootstrap5.no-footer .row:nth-child(2),
		.dataTables_wrapper.dt-bootstrap5.no-footer .row:last-child {
			margin-top: 0.5rem;
		}
	</style>
	<?= $this->renderSection("stylesheet") ?>

</head>

<body class="antialiased">
	<div class="wrapper">
		<div class="sticky-top">
			<?= $this->include("app/_includes/header") ?>

			<?= $this->include("app/_includes/navbar") ?>
		</div>

		<?= $this->include("app/_includes/failed-alert") ?>
		<?= $this->include("app/_includes/success-alert") ?>

		<div class="page-wrapper">
			<?= $this->include("app/_includes/page-header") ?>

			<div class="page-body">
				<div class="container-xl">
					<div class="row row-cards" data-masonry='{ "percentPosition": true }'>
						<?= $this->renderSection("body") ?>
					</div>

					<?= $this->renderSection("pagination") ?>
				</div>
			</div>

			<?= $this->include("app/_includes/footer") ?>
		</div>
	</div>

	<?= $this->renderSection("modal") ?>

	<!-- JS -->
	<script src="<?= base_url("js/tabler.min.js") ?>"></script>
	<!-- JQuery -->
	<script src="//cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<!-- Libraries -->
	<script src="//cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
	<script src="//cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
	<script src="<?= base_url("libs/ckeditor5/build/ckeditor.js") ?>"></script>
	<script src="//cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
	<!-- Custom JS -->
	<?= $this->renderSection("javascript") ?>
	<script src="<?= base_url("js/custom.js") ?>"></script>
</body>

</html>