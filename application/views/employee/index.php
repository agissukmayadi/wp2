<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			<?= $title ?>
		</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-3">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Jumlah Sewa Menunggu Verifikasi</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= $rentPendingCount ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-spinner fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-3">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Jumlah Sewa Sedang Berjalan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= $rentPickUpCount ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-car fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-3">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
								Jumlah Sewa Invalid</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= $rentInvalidCount ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-times fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-3">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Jumlah Sewa Selesai</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= $rentSuccessCount ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-car fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card shadow mb-4 mt-5">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<?= $this->session->flashdata("alert") ?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Sewa</th>
							<th>Kode Mobil</th>
							<th>Merk Mobil</th>
							<th>Nama Pelanggan</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($rents as $rent) {
							?>
							<tr>
								<td>
									<?= $no ?>
								</td>
								<td>
									<?= $rent->id ?>
								</td>
								<td>
									<?= $rent->car_id ?>
								</td>
								<td>
									<?= $rent->merk ?>
								</td>
								<td>
									<?= $rent->name ?>
								</td>
								<td>
									<?= $rent->status ?>
								</td>
								<td class=" text-center">
									<?php if ($rent->status == "PENDING") {
										?>
										<a href="<?= base_url("employee/rent_verification/") . $rent->id ?>"
											class="btn btn-sm btn-primary">VERIFICATION</a>
										<?php
									} elseif ($rent->status == "PAID") {
										?>
										<a href="<?= base_url("employee/rent_pickup/") . $rent->id ?>"
											class="btn btn-sm btn-primary">PICK UP</a>
										<?php
									} elseif ($rent->status == "PICKED UP") {
										?>
										<a href="<?= base_url("employee/rent_return/") . $rent->id ?>"
											class="btn btn-sm btn-primary">RETURN</a>
										<?php
									} else {
										?>
										<a href="<?= base_url("employee/rent_detail/") . $rent->id ?>"
											class="btn btn-sm btn-primary">DETAIL</a>
										<?php
									}
									?>
								</td>
							</tr>
							<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
