<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs Section ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Ubah Password</h2>
			</div>

		</div>
	</section><!-- Breadcrumbs Section -->

	<!-- ======= Portfolio Details Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
		<div class="container">

			<div class="row gy-4 align-items-center">
				<?= $this->session->flashdata("alert") ?>
				<form action="<?= base_url("customer/edit_password") ?>" method="post">
					<div class="row justify-content-end mb-3">
						<div class="col-3"><label for="oldPassword" class="form-label">Password Lama</label></div>
						<div class="col-9"><input type="password" class="form-control" id="oldPassword"
								name="oldPassword">
						</div>
						<?= form_error("oldPassword", "<small class='col-9 text-danger'>"), "</small>" ?>
					</div>
					<div class="row justify-content-end mb-3">
						<div class="col-3"><label for="newPassword" class="form-label">Password Baru</label></div>
						<div class="col-9"><input type="password" class="form-control" id="newPassword"
								name="newPassword">
						</div>
						<?= form_error("newPassword", "<small class='col-9 text-danger'>"), "</small>" ?>
					</div>
					<div class="row justify-content-end mb-3">
						<div class="col-3"><label for="passwordConfirmation" class="form-label">Password
								Konfirmasi</label>
						</div>
						<div class="col-9"><input type="password" class="form-control" id="passwordConfirmation"
								name="passwordConfirmation">
						</div>
						<?= form_error("passwordConfirmation", "<small class='col-9 text-danger'>"), "</small>" ?>
					</div>
					<div class="row justify-content-end mb-3">
						<div class="col-9">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?= base_url("customer/profile") ?>" class="btn btn-danger">Kembali</a>
						</div>
					</div>
				</form>
			</div>

		</div>
	</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
