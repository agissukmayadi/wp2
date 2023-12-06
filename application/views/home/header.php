<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<title>Go Drive</title>
	<meta content="" name="description" />
	<meta content="" name="keywords" />

	<!-- Favicons -->
	<link href="<?= base_url() ?>assets/img/godrive.png" rel="icon" />

	<!-- Google Fonts -->
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet" />

	<!-- Vendor CSS Files -->
	<link href="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/aos/aos.css" rel="stylesheet" />
	<link href="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/bootstrap/css/bootstrap.min.css"
		rel="stylesheet" />
	<link href="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/bootstrap-icons/bootstrap-icons.css"
		rel="stylesheet" />
	<link href="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/boxicons/css/boxicons.min.css"
		rel="stylesheet" />
	<link href="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/glightbox/css/glightbox.min.css"
		rel="stylesheet" />

	<link href="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

	<!-- Template Main CSS File -->
	<link href="<?= base_url("assets/vendor/BizLand/") ?>assets/css/style.css" rel="stylesheet" />

	<link rel="stylesheet" href="<?= base_url("assets/css/custom.css") ?>">
</head>

<body>
	<!-- ======= Top Bar ======= -->
	<section id="topbar" class="d-flex align-items-center">
		<div class="container d-flex justify-content-center justify-content-md-between">
			<div class="contact-info d-flex align-items-center">
				<i class="bi bi-envelope d-flex align-items-center"><a
						href="mailto:contact@example.com">godrive.official@gmail.com</a></i>
				<i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 851 5613 4922</span></i>
			</div>
			<div class="social-links d-none d-md-flex align-items-center">
				<a href="#" class="twitter"><i class="bi bi-youtube"></i></a>
				<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
				<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
			</div>
		</div>
	</section>

	<!-- ======= Header ======= -->
	<header id="header" class="d-flex align-items-center">
		<div class="container d-flex align-items-center justify-content-between">
			<h1 class="logo">
				<a href="<?= base_url() ?>">GoDrive<span>.</span></a>
			</h1>
			<nav id="navbar" class="navbar">
				<ul>
					<?php
					if (current_url() == site_url() || current_url() == site_url("home")) {
						?>
						<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
						<li><a class="nav-link scrollto" href="#about">About</a></li>
						<li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
						<li><a class="nav-link scrollto" href="#contact">Contact</a></li>
						<?php
					}
					?>

					<?php
					if (isset($user)) {
						?>
						<?php
						if ($user->role_id == 1) {
							?>
							<li class="dropdown">
								<a href="#">
									<i class="bi bi-person-circle text-primary" style="font-size: 30px;"></i>
								</a>
								<ul>
									<li><a href="<?= base_url("admin") ?>">Dashboard <i class="bi bi-speedometer2"
												style="font-size:20px"></i></a></li>
									<li><a href="<?= base_url("admin/profile") ?>">Profile <i class="bi bi-person"
												style="font-size:20px"></i></a></li>
									<li><a href="<?= base_url("admin/logout") ?>">Logout <i class="bi bi-box-arrow-right"
												style="font-size:20px"></i></a></li>
								</ul>
							</li>
							<?php
						} elseif ($user->role_id == 2) {
							?>
							<li class="dropdown"><a href="#">
									<i class="bi bi-person-circle text-primary" style="font-size: 30px;"></i>
								</a>
								<ul>
									<li><a href="<?= base_url("employee") ?>">Dashboard <i class="bi bi-speedometer2">
									<li><a href="<?= base_url("employee/profile") ?>">Profile <i class="bi bi-person"
												style="font-size:20px"></i></a></li>
									<li><a href="<?= base_url("employee/logout") ?>">Logout <i class="bi bi-box-arrow-right"
												style="font-size:20px"></i></a></li>
								</ul>
							</li>
							<?php
						} else {
							?>
							<li class="dropdown">
								<a href="#">
									<i class="bi bi-person-circle text-primary" style="font-size: 30px;"></i>
								</a>
								<ul>
									<li><a href="<?= base_url("customer/rent_list") ?>">Daftar Sewa <i
												class="bi bi-speedometer2" style="font-size:20px"></i></a></li>
									<li><a href="<?= base_url("customer/profile") ?>">Profile <i class="bi bi-person"
												style="font-size:20px"></i></a></li>
									<li><a href="<?= base_url("customer/logout") ?>">Logout <i class="bi bi-box-arrow-right"
												style="font-size:20px"></i></a></li>
								</ul>
							</li>
							<?php
						}
						?>

						<?php
					} else {

						?>
						<li>

							<a href="<?= base_url("auth") ?> "><button type="button" class="btn btn-outline-primary">
									Login
								</button></a>
						</li>
						<?php
					}
					?>
				</ul>

				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>

			<!-- .navbar -->
		</div>
	</header>
	<!-- End Header -->
