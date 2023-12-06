<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs Section ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Sewa</h2>
			</div>

		</div>
	</section><!-- Breadcrumbs Section -->

	<!-- ======= Portfolio Details Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
		<div class="container">

			<div class="row gy-4 align-items-center">

				<div class="col-4">
					<img src="<?= base_url("assets/img/cars/") . $car->image ?>" alt="" class=" img-fluid">
				</div>

				<div class="col-8">
					<div class="portfolio-info">
						<div class="row">
							<h3>
								<?= $car->merk ?>
							</h3>
							<div class="col-6">
								<table>
									<tr>
										<td width="180px"><strong>Tipe</strong></td>
										<td>:</td>
										<td>
											<?= $car->type ?>
										</td>
									</tr>
									<tr>
										<td width="180px"><strong>Transmisi</strong></td>
										<td>:</td>
										<td>
											<?= ucwords(strtolower($car->transmition)) ?>
										</td>
									</tr>
									<tr>
										<td width="180px"><strong>Jumlah Kursi</strong></td>
										<td>:</td>
										<td>
											<?= $car->seat ?> Seater
										</td>
									</tr>
									<tr>
										<td width="180px"><strong>Tahun</strong></td>
										<td>:</td>
										<td>
											<?= $car->year ?>
										</td>
									</tr>
									<tr>
										<td width="180px"><strong>Harga Sewa/hari</strong></td>
										<td>:</td>
										<td>
											<?= format_rupiah($car->price) ?>
										</td>
									</tr>
								</table>
							</div>
							<div class="col-6">
								<table>
									<tr>
										<td width="180px"><strong>Tanggal Sewa</strong></td>
										<td>:</td>
										<td>
											<?= $rent_date ?>
										</td>
									</tr>
									<tr>
										<td width="180px"><strong>Tanggal Selesai Sewa</strong></td>
										<td>:</td>
										<td>
											<?= $return_date ?>
										</td>
									</tr>
								</table>
							</div>
							<hr class="my-2">
							<div class="col d-flex justify-content-end">
								<h5>
									<strong>TOTAL :
										<?= format_rupiah($rent_cost) ?>
									</strong>
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
					<form action="<?= base_url("customer/rent") ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="car_id" value="<?= $car->id ?>">

						<input type="hidden" name="rent_date" value="<?= $rent_date ?>">
						<input type="hidden" name="return_date" value="<?= $return_date ?>">
						<input type="hidden" name="rent_cost" value="<?= $rent_cost ?>">

						<div class="mb-3">
							<div class="mb-2">Pilih akun bank tujuan :</div>
							<?php
							foreach ($banks as $bank) {
								?>
								<div class="form-check">
									<input class="form-check-input" type="radio" value="<?= $bank->id ?>" name="bank_id"
										id="<?= $bank->id ?>?" <?php
										  if (set_value('bank_id') == $bank->id) {
											  echo "checked";
										  }
										  ?>>
									<label class="form-check-label" for="<?= $bank->id ?>?">
										<?= "$bank->bank - $bank->number ($bank->name)" ?>
									</label>
								</div>
								<?php
							}
							?>
							<?= form_error("bank_id", "<small class=' text-danger'>"), "</small>" ?>
						</div>
						<div class="mb-3">
							<label for="payment_number" class="form-label">Nomor Rekening :</label>
							<input type="text" class="form-control" name="payment_number" id="payment_number"
								value="<?= set_value("payment_number") ?>">
							<?= form_error("payment_number", "<small class=' text-danger'>"), "</small>" ?>
						</div>
						<div class=" mb-3">
							<label for="payment_name" class="form-label">Atas Nama Rekening :</label>
							<input type="text" class="form-control" name="payment_name" id="payment_name"
								value="<?= set_value("payment_name") ?>">
							<?= form_error("payment_name", "<small class=' text-danger'>"), "</small>" ?>
						</div>
						<div class="mb-3">
							<label for="amount" class="form-label">Total Pembayaran : </label>
							<input type="number" class="form-control" value="<?= $rent_cost ?>" readonly name="amount"
								id="amount">
						</div>
						<div class="mb-3">
							<label for="payment_attachment" class="form-label">Bukti Pembayaran :</label>
							<input required class="form-control" type="file" name="payment_attachment"
								id="payment_attachment">
							<?php if (isset($error["payment_attachment"])) {
								echo $error["payment_attachment"];
							} ?>

						</div>
				</div>
				<div class="col-6">
					<h5>
						<strong>Jaminan (SIM)</strong>
					</h5>
					<div class="mb-3">
						<label for="license_number" class="form-label">Nomor SIM :</label>
						<input type="text" class="form-control" name="license_number" id="license_number"
							value="<?= set_value("license_number") ?>">
						<?= form_error("license_number", "<small class=' text-danger'>"), "</small>" ?>

					</div>
					<div class="mb-3">
						<label for="license_attachment" class="form-label">Bukti Jaminan :</label>
						<input required class="form-control" type="file" name="license_attachment"
							id="license_attachment">
						<?php if (isset($error["license_attachment"])) {
							echo $error["license_attachment"];
						} ?>

					</div>
					<div class="mb-3">
						<input class="" type="checkbox" required id="valid">
						<label class="ms-1" for="valid">Saya menyetujui syarat dan ketentuan yang berlaku</label>
					</div>
					<div class="d-grid gap-2">
						<button class="btn btn-primary" type="submit">Submit</button>
						<a href="<?= base_url("home/car_list?rent_date=$rent_date&return_date=$return_date") ?>"
							class="btn btn-primary" type="button">Kembali</a>
					</div>
				</div>
				</form>
			</div>
		</div>
	</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
