<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			<?= $title ?>
		</h1>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
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
									<a href="<?= base_url("admin/rent_detail/") . $rent->id ?>"
										class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
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
