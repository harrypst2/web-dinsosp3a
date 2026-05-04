<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<?= set_title($page) ?>
	
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

</head>

<body class="antialiased d-flex flex-column">
	<?= $this->renderSection("login") ?>

	<!-- JS -->
	<script src="<?= base_url("js/tabler.min.js") ?>"></script>
	<!-- JQuery -->
	<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Libraries -->
	<script src="//cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
	<!-- Custom JS -->
	<script src="<?= base_url("js/custom.js") ?>"></script>
</body>

</html>