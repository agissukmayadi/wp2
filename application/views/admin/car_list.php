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
			<div class="d-flex justify-content-end mr-1 mb-2">
				<a href="<?= base_url("admin/car_add") ?>" class="btn btn-primary btn-sm">Tambah <i
						class="fas fa-plus pl-3"></i></a>
			</div>
			<?= $this->session->flashdata("alert") ?>
			<div class="table-responsive">

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Mobil</th>
							<th>Plat Nomor</th>
							<th>Merk</th>
							<th>Tipe</th>
							<th>Transmisi</th>
							<th>Jumlah Kursi</th>
							<th>Tahun</th>
							<th>Harga/hari</th>
							<td>Foto</td>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($cars as $car) {
							?>
							<tr>
								<td>
									<?= $no ?>
								</td>
								<td>
									<?= $car->id ?>
								</td>
								<td>
									<?= $car->number_plate ?>
								</td>
								<td>
									<?= $car->merk ?>
								</td>
								<td>
									<?= $car->type ?>
								</td>
								<td>
									<?= ucwords(strtolower($car->transmition)) ?>
								</td>
								<td>
									<?= $car->seat ?>
								</td>
								<td>
									<?= $car->year ?>
								</td>
								<td>
									<?= format_rupiah($car->price) ?>
								</td>
								<td>
									<a href="" class="" data-toggle="modal" data-target="#carImage<?= $no ?>">Lihat foto</a>
								</td>
								<td class=" text-center">
									<a href="<?= base_url("admin/car_edit/") . $car->id ?>" class="btn btn-sm btn-info"><i
											class="fas fa-pen"></i></a>
									<a href="<?= base_url("admin/car_delete/") . $car->id ?>"
										class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
							<!-- MODAL IMAGE -->
							<div class="modal fade" id="carImage<?= $no ?>" tabindex="-1"
								aria-labelledby="carImage<?= $no ?>Label" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="carImage<?= $no ?>Label">Foto Mobil</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body text-center">
											<img src="<?= base_url("assets/img/cars/$car->image") ?>" alt=""
												class="img-fluid">
										</div>
									</div>
								</div>
							</div>
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