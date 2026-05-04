<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<?= set_title("Halaman Tidak Ditemukan") ?>
	
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	
	<style>
		:root {
			--primary-color: #2f55d4;
			--bg-warm: #faebe3;
		}

		body {
			font-family: 'Plus Jakarta Sans', sans-serif;
			background: var(--bg-warm);
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			margin: 0;
			overflow: hidden;
		}

		.error-wrapper {
			position: relative;
			z-index: 1;
			max-width: 550px;
			width: 90%;
			text-align: center;
			padding: 50px 40px;
			background: rgba(255, 255, 255, 0.4);
			backdrop-filter: blur(15px);
			border: 1px solid rgba(255, 255, 255, 0.6);
			border-radius: 30px;
			box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
			animation: fadeIn 0.8s ease-out;
		}

		@keyframes fadeIn {
			from { opacity: 0; transform: translateY(20px); }
			to { opacity: 1; transform: translateY(0); }
		}

		/* Pure CSS Illustration */
		.illustration-container {
			position: relative;
			height: 180px;
			margin-bottom: 30px;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.circle-bg {
			position: absolute;
			width: 150px;
			height: 150px;
			background: linear-gradient(135deg, rgba(47, 85, 212, 0.1) 0%, rgba(47, 85, 212, 0.2) 100%);
			border-radius: 50%;
			animation: pulse 4s ease-in-out infinite;
		}

		@keyframes pulse {
			0%, 100% { transform: scale(1); opacity: 0.5; }
			50% { transform: scale(1.1); opacity: 0.8; }
		}

		.icon-404 {
			font-size: 80px;
			color: var(--primary-color);
			position: relative;
			animation: float 4s ease-in-out infinite;
			text-shadow: 0 10px 20px rgba(47, 85, 212, 0.2);
		}

		@keyframes float {
			0%, 100% { transform: translateY(0); }
			50% { transform: translateY(-15px); }
		}

		h1 {
			font-weight: 800;
			color: #1e293b;
			margin-bottom: 15px;
			font-size: 32px;
			letter-spacing: -0.5px;
		}

		p {
			color: #64748b;
			font-size: 16px;
			line-height: 1.6;
			margin-bottom: 35px;
		}

		.btn-home {
			background: var(--primary-color);
			color: white !important;
			padding: 14px 35px;
			border-radius: 14px;
			font-weight: 600;
			text-decoration: none;
			display: inline-flex;
			align-items: center;
			gap: 12px;
			transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
			box-shadow: 0 10px 20px -5px rgba(47, 85, 212, 0.4);
		}

		.btn-home:hover {
			transform: scale(1.05) translateY(-3px);
			box-shadow: 0 15px 30px -5px rgba(47, 85, 212, 0.5);
		}

		.bg-blobs {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 0;
		}

		.blob {
			position: absolute;
			width: 500px;
			height: 500px;
			filter: blur(120px);
			opacity: 0.12;
			border-radius: 50%;
			animation: move 25s infinite alternate;
		}

		.blob-1 { top: -150px; right: -150px; background: var(--primary-color); }
		.blob-2 { bottom: -150px; left: -150px; background: #f39c12; }

		@keyframes move {
			from { transform: translate(0, 0) rotate(0deg); }
			to { transform: translate(120px, 120px) rotate(30deg); }
		}
	</style>
</head>

<body>
	<div class="bg-blobs">
		<div class="blob blob-1"></div>
		<div class="blob blob-2"></div>
	</div>

	<div class="error-wrapper">
		<div class="illustration-container">
			<div class="circle-bg"></div>
			<div class="icon-404">
				<i class="uil uil-search-minus"></i>
			</div>
		</div>
		
		<h1>Halaman Tidak Ditemukan</h1>
		<p>Maaf, sepertinya halaman yang Anda cari telah dipindahkan atau tidak lagi tersedia di server kami.</p>
		
		<a href="<?= base_url() ?>" class="btn-home">
			<i class="uil uil-arrow-left"></i> Kembali ke Beranda
		</a>
	</div>

	<!-- JS -->
	<script src="<?= base_url("js/bootstrap.bundle.min.js") ?>"></script>
</body>

</html>