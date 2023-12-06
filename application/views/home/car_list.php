<!-- ======= Hero Section ======= -->
<div class="d-flex py-3 section-bg">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
		<form action="<?= base_url("home/car_list") ?>" method="GET"
			class="d-flex flex-column flex-md-row row-gap-2 row-gap-md-0 column-gap-md-2 align-items-md-center bg-primary p-3 p-md-2 rounded-2 shadow">
			<div class="flex-grow-1">
				<span class="text-white d-block d-md-none">Tanggal sewa : </span>
				<input type="date" name="rent_date" required value="<?= $rent_date ?>" id="rent_date"
					class="form-control form-control-sm" />
			</div>
			<div>
				<span class="text-white font-weight-bold d-none d-md-block">-</span>
			</div>
			<div class="flex-grow-1">
				<span class="text-white d-block d-md-none">Tanggal pengembalian :
				</span>
				<input type="date" name="return_date" required value="<?= $return_date ?>" id="return_date"
					class="form-control form-control-sm" />
			</div>
			<button class="btn btn-primary border btn-sm">
				<i class="bi bi-search"></i> Search
			</button>
		</form>
	</div>
</div>
<!-- End Hero -->

<section id="cars" class="cars " style="padding:20px 0px;">
	<div class="container" data-aos="fade-up">
		<div class="section-title">
			<h3>Car <span>List</span></h3>
		</div>
		<div class="filter-wrap d-flex flex-lg-row flex-column justify-content-lg-center row-gap-2 column-gap-3 mb-4"
			data-aos="zoom-in" data-aos-duration="1000">
			<span class="filter-btn filter-active" data-filter="*">All</span>
			<?php
			foreach ($types as $type) {
				?>
				<span class="filter-btn" data-filter="<?= $type->id ?>"><?= strtoupper($type->type) ?></span>
				<?php
			}
			?>
		</div>
		<div class="row justify-content-end mt-3">
			<form action="" class="text-end">
				<span class=" mx-1">
					<label class="">Transmisi : </label>
					<select class="form-select-sm" aria-label="Default select example" name="transmition_filter"
						id="transmitionFilter">
						<option value="*">All</option>
						<option value="AUTOMATIC">Otomatis</option>
						<option value="MANUAL">Manual</option>
					</select>
				</span>
				<span class="mx-1">
					<label class="">Harga : </label>
					<select class="form-select-sm" aria-label="Default select example" name="price_filter"
						id="priceFilter">
						<option value="ASC">Terendah</option>
						<option value="DESC">Tertinggi</option>
					</select>
				</span>
			</form>
		</div>
		<div class="row cars-container" id="container-cars" data-aos="zoom-in" data-aos-duration="1000">
			<?php
			if ($cars == null) {
				?>
				<div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
					<strong>Maaf,</strong> Mobil tidak tersedia.
				</div>
				<?php
			} else {
				foreach ($cars as $car) {
					?>
					<div class="col-xl-3 col-lg-4 col-md-6 col-12 cars-item d-flex align-items-stretch mt-4">
						<div class="cars-wrap">
							<div class="cars-img">
								<img src="<?= base_url('assets/') ?>img/cars/<?= $car->image ?>" alt="" class="img-fluid">
							</div>
							<hr>
							<div class="cars-info">
								<h4>
									<?= $car->merk ?>
								</h4>
								<table>
									<tr>
										<td width="110px">Transmisi</td>
										<td> : </td>
										<td>
											<?= ucwords(strtolower($car->transmition)) ?>
										</td>
									</tr>
									<tr>
										<td width="110px">Tahun</td>
										<td> : </td>
										<td>
											<?= $car->year ?>
										</td>
									</tr>
									<tr>
										<td width="110px">Jumlah Kursi</td>
										<td> : </td>
										<td>
											<?= $car->seat ?> Seater
										</td>
									</tr>
									<tr>
										<td width="110px">Harga/hari</td>
										<td> : </td>
										<td>
											<?= format_rupiah($car->price) ?>
										</td>
									</tr>
								</table>
								<hr>
								<p class="fw-bold">Harga :
									<?= format_rupiah($car->totalPrice) ?>
								</p>
							</div>
							<hr>
							<form action="<?= base_url("customer/set_rent") ?>" method="post">
								<input type="hidden" name="car_id" value="<?= $car->id ?>">
								<input type="hidden" name="rent_date" value="<?= $rent_date ?>">
								<input type="hidden" name="return_date" value="<?= $return_date ?>">
								<input type="hidden" name="rent_cost" value="<?= $car->totalPrice ?>">
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-outline-primary btn-block">Sewa</button>
								</div>
							</form>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
</section>