<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs Section ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2 class=" fw-bold">Detail Sewa -
					<?= $rent->id . " ($rent->status)" ?>
				</h2>
			</div>

		</div>
	</section><!-- Breadcrumbs Section -->

	<!-- ======= Portfolio Details Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
		<div class="container">

			<div class="row gy-4 align-items-center">

				<div class="col-4">
					<img src="<?= base_url("assets/img/cars/") . $rent->image ?>" alt="" class=" img-fluid">
				</div>

				<div class="col-8">
					<div class="portfolio-info">
						<div class="row">

							<div class="col-6">
								<h3>
									Detail Mobil
								</h3>
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
										<td width="200px"><strong>Tipe</strong></td>
										<td>:</td>
										<td>
											<?= $rent->type ?>
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Transmisi</strong></td>
										<td>:</td>
										<td>
											<?= ucwords(strtolower($rent->transmition)) ?>
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Jumlah Kursi</strong></td>
										<td>:</td>
										<td>
											<?= $rent->seat ?> Seater
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Tahun</strong></td>
										<td>:</td>
										<td>
											<?= $rent->year ?>
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Harga Sewa/hari</strong></td>
										<td>:</td>
										<td>
											<?= format_rupiah($rent->price) ?>
										</td>
									</tr>
								</table>
							</div>
							<div class="col-6">
								<h3>
									Detail Sewa
								</h3>
								<table>
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
									<tr>
										<td width="200px"><strong>Biaya Sewa</strong></td>
										<td>:</td>
										<td>
											<?= format_rupiah($rent->rent_cost) ?>
										</td>
									</tr>
									<tr>
										<td width="200px"><strong>Biaya Keterlambatan</strong></td>
										<td>:</td>
										<td>
											<?= format_rupiah($rent->late_cost) ?>
										</td>
									</tr>
								</table>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<h5>Total Biaya :
									<?= format_rupiah($rent->total_cost) ?>
								</h5>
							</div>
						</div>
					</div>
				</div>

			</div>

			<hr>
			<div class="row">
				<div class="col-6">
					<h5>
						<strong>Pembayaran</strong>
					</h5>
					<table>
						<tr>
							<td width="180px"><strong>Bank Tujuan</strong></td>
							<td>:</td>
							<td>
								<?= $rent->bank . " - " . $rent->bank_number . " ($rent->bank_name)" ?>
							</td>
						</tr>
						<tr>
							<td width="180px"><strong>Nomor Rekening</strong></td>
							<td>:</td>
							<td>
								<?= $rent->payment_number ?>
							</td>
						</tr>
						<tr>
							<td width="180px"><strong>Atas Nama</strong></td>
							<td>:</td>
							<td>
								<?= $rent->payment_name ?>
							</td>
						</tr>
						<tr>
							<td width="180px"><strong>Total Pembayaran</strong></td>
							<td>:</td>
							<td>
								<?= format_rupiah($rent->amount) ?>
							</td>
						</tr>
						<tr>
							<td width="180px"><strong>Bukti Pembayaran</strong></td>
							<td>:</td>
							<td>
								<a href="#" data-bs-toggle="modal" data-bs-target="#payment_attachment">Lihat Foto</a>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-6">
					<h5>
						<strong>Jaminan (SIM)</strong>
					</h5>
					<table>
						<tr>
							<td width="180px"><strong>Nomor SIM</strong></td>
							<td>:</td>
							<td>
								<?= $rent->license_number ?>
							</td>
						</tr>
						<tr>
							<td width="180px"><strong>Bukti Jaminan (SIM)</strong></td>
							<td>:</td>
							<td>
								<a href="#" data-bs-toggle="modal" data-bs-target="#license_attachment">Lihat Foto</a>
							</td>
						</tr>
					</table>
					<div class="d-grid gap-2 mt-2">
						<a href="<?= base_url("customer/rent_list") ?>" class="btn btn-danger" type="button">Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Portfolio Details Section -->
	<div class="modal fade" id="payment_attachment" tabindex="-1" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img src="<?= base_url("assets/img/payments/$rent->payment_attachment") ?>" alt=""
						class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="license_attachment" tabindex="-1" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img src="<?= base_url("assets/img/licenses/$rent->license_attachment") ?>" alt=""
						class="img-fluid">
				</div>
			</div>
		</div>
	</div>

</main><!-- End #main -->