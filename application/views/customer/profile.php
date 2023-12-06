<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs Section ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Daftar Sewa</h2>
			</div>

		</div>
	</section><!-- Breadcrumbs Section -->

	<!-- ======= Portfolio Details Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
		<div class="container">

			<div class="row gy-4 align-items-center">
				<?= $this->session->flashdata("alert") ?>
				<div class="portfolio-info">
					<div class="row align-items-center">
						<div class="col-2">
							<img src="<?= base_url("assets/img/default.png") ?>" alt="" class=" img-fluid">
						</div>
						<div class="col-10">
							<h3>
								<strong>
									<?= $user->name . " - " . $user->role ?>
								</strong>
							</h3>
							<table>
								<tr>
									<td width="45px"><i class="bi bi-envelope" style="font-size:30px"></i></td>
									<td>
										<?= $user->email ?>
									</td>
								</tr>
								<tr>
									<td width="45px"><i class="bi bi-telephone" style="font-size:30px"></i></td>
									<td>
										<?= $user->phone ?>
									</td>
								</tr>
								<tr>
									<td width="45px"><i class="bi bi-geo-alt" style="font-size:30px"></i></td>
									<td>
										<?= $user->address ?>
									</td>
								</tr>
							</table>
							<div class="d-flex column-gap-2 mt-3">
								<a href="<?= base_url("customer/edit_profile") ?>" class=" btn btn-secondary">Ubah
									Profile <i class="bi bi-pen ms-2"></i></a>
								<a href="<?= base_url() ?>" class=" btn btn-danger">Kembali <i
										class="bi bi-arrow-left ms-2"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
