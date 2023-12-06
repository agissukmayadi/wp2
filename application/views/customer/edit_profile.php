<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs Section ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Ubah Profil</h2>
			</div>

		</div>
	</section><!-- Breadcrumbs Section -->

	<!-- ======= Portfolio Details Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
		<div class="container">

			<div class="row gy-4 align-items-center">
				<?= $this->session->flashdata("alert") ?>
				<form action="<?= base_url("customer/edit_profile") ?>" method="post">
					<div class="row justify-content-end mb-3">
						<div class="col-3"><label for="name" class="form-label">Nama Lengkap</label></div>
						<div class="col-9"><input type="text" class="form-control" id="name" name="name"
								value="<?= $user->name ?>">
						</div>
						<?= form_error("name", "<small class='col-9 text-danger'>"), "</small>" ?>
					</div>
					<div class="row justify-content-end mb-3">
						<div class="col-3"><label for="phone" class="form-label">Nomor Handphone</label></div>
						<div class="col-9"><input type="text" class="form-control" id="phone" name="phone"
								value="<?= $user->phone ?>">
						</div>
						<?= form_error("phone", "<small class='col-9 text-danger'>"), "</small>" ?>
					</div>
					<div class="row justify-content-end mb-3">
						<div class="col-3"><label for="address" class="form-label">Alamat</label></div>
						<div class="col-9"><textarea name="address" id="address" cols="100%" class="form-control"
								rows="3"><?= $user->address ?></textarea>
						</div>
						<?= form_error("address", "<small class='col-9 text-danger'>"), "</small>" ?>

					</div>
					<div class="row justify-content-end mb-3">
						<div class="col-3"><label for="email" class="form-label">Email</label></div>
						<div class="col-9"><input type="text" disabled class="form-control" id="email" name="email"
								value="<?= $user->email ?>">
						</div>
					</div>
					<div class="row justify-content-end mb-2">
						<div class="col-3"><label for="password" class="form-label">Password</label></div>
						<div class="col-9">
							<div class="input-group mb-3">
								<input type="text" disabled class="form-control" placeholder="**********"
									aria-describedby="basic-addon2">
								<span class="input-group-text" id="basic-addon2"><a
										href="<?= base_url("customer/edit_password") ?>">Ubah</a></span>
							</div>
						</div>
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
