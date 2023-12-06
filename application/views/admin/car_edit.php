<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			<?= $title ?>
		</h1>
	</div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data
			</h6>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<div class="row align-items-center">
					<?= $this->session->flashdata("alert") ?>
					<form action="<?= current_url() ?>" method="post" class="col-12" enctype="multipart/form-data">
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="number_plate" class="form-label">Plat Nomor</label></div>
							<div class="col-9"><input type="text" disabled class="form-control" id="number_plate"
									name="number_plate" value="<?= $car->number_plate ?>">
							</div>
							<?= form_error("number_plate", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="merk" class="form-label">Merk</label></div>
							<div class="col-9"><input type="text" class="form-control" id="merk" name="merk"
									value="<?= $car->merk ?>">
							</div>
							<?= form_error("merk", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="type_id" class="form-label">Tipe Mobil</label></div>
							<div class="col-9">
								<select class="form-control" id="type_id" name="type_id">
									<option disabled <?= $car->type_id == "" ? "selected" : "" ?>>Pilih Tipe Mobil
									</option>
									<?php
									foreach ($types as $type) {
										?>
										<option value="<?= $type->id ?>" <?= $type->id == $car->type_id ? "selected" : "" ?>>
											<?= $type->type ?></option>
										<?php
									}
									?>
								</select>
							</div>
							<?= form_error("type_id", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="transmition" class="form-label">Transmisi</label></div>
							<div class="col-9">
								<select class="form-control" id="transmition" name="transmition">
									<option disabled <?= $car->transmition == "" ? "selected" : "" ?>>Pilih
										Transmisi
									</option>
									<option value="AUTOMATIC" <?= $type->id == $car->transmition ? "selected" : "" ?>>
										Otomatis</option>
									<option value="MANUAL" <?= $type->id == $car->transmition ? "selected" : "" ?>>
										Manual</option>
								</select>
							</div>
							<?= form_error("transmition", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="seat" class="form-label">Jumlah Kursi</label></div>
							<div class="col-9"><input type="number" min="1" class="form-control" id="seat" name="seat"
									value="<?= $car->seat ?>">
							</div>
							<?= form_error("seat", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="year" class="form-label">Tahun</label></div>
							<div class="col-9"><input type="number" class="form-control" min="2000" max="" id="year"
									name="year" value="<?= $car->year ?>">
							</div>
							<?= form_error("year", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="price" class="form-label">Harga sewa/hari</label></div>
							<div class="col-9">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="number" min="0" class="form-control" name="price" id="price"
										value="<?= $car->price ?>" aria-describedby="basic-addon1">
								</div>
							</div>
							<?= form_error("price", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="image" class="form-label">Gambar</label></div>
							<div class="col-9">
								<a href="" class="" data-toggle="modal" data-target="#imageModal">Lihat foto</a>
								<div class="custom-file">
									<input type="file" class="form-control-file rounded-lg" id="image" name="image"
										style="border:1px solid rgb(209, 211, 226);" value="">
								</div>
							</div>
							<?php if (isset($error["image"])) {
								echo $error["image"];
							} ?>
							<?= form_error("image", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-9">
								<button type="submit" class="btn btn-primary">Simpan</button>
								<a href="<?= base_url("admin/car_list") ?>" class="btn btn-danger">Kembali</a>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>
<!-- MODAL IMAGE -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="imageLabel">Foto Mobil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<img src="<?= base_url("assets/img/cars/$car->image") ?>" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</div>