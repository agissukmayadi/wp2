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
				<?php
				if ($rents == null) {
					?>
					<div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
						Daftar Sewa tidak tersedia.
					</div>
					<?php
				}
				foreach ($rents as $rent) {
					?>
					<div class="portfolio-info">
						<div class="row align-items-center">
							<div class="col-4">
								<img src="<?= base_url("assets/img/cars/") . $rent->image ?>" alt="" class=" img-fluid">
							</div>
							<div class="col-8">
								<a href="<?= base_url("customer/rent_detail/$rent->id") ?>">
									<h3>
										<strong>Kode Sewa :
											<?= $rent->id ?>
										</strong>
									</h3>
								</a>
								<table>
									<tr>
										<td width="200px"><strong>Kode Mobil</strong></td>
										<td>:</td>
										<td>
											<?= $rent->car_id ?>
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Merk</strong></td>
										<td>:</td>
										<td>
											<?= $rent->merk ?>
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Harga Sewa/hari</strong></td>
										<td>:</td>
										<td>
											<?= format_rupiah($rent->price) ?>
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Tanggal Sewa</strong></td>
										<td>:</td>
										<td>
											<?= $rent->rent_date ?>
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Tanggal Selesai Sewa</strong></td>
										<td>:</td>
										<td>
											<?= $rent->return_date ?>
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Tanggal Pengembalian</strong></td>
										<td>:</td>
										<td>
											<?= $rent->actual_return_date == null ? "-" : $rent->actual_return_date; ?>
										</td>
									</tr>
								</table>
								<hr>
								<div class="d-flex justify-content-between">
									<h5>Total Biaya Sewa :
										<?= format_rupiah($rent->rent_cost) ?>
									</h5>
									<h5>
										Status :
										<?= ucwords(strtolower($rent->status)) ?>
									</h5>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
				<a href="<?= base_url() ?>" class="btn btn-danger">Kembali</a>
			</div>

		</div>
	</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
