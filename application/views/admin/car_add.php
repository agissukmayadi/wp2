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
							<div class="col-9"><input type="text" class="form-control" id="number_plate"
									name="number_plate" value="<?= set_value("number_plate") ?>">
							</div>
							<?= form_error("number_plate", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="merk" class="form-label">Merk</label></div>
							<div class="col-9"><input type="text" class="form-control" id="merk" name="merk"
									value="<?= set_value("merk") ?>">
							</div>
							<?= form_error("merk", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="type_id" class="form-label">Tipe Mobil</label></div>
							<div class="col-9">
								<select class="form-control" id="type_id" name="type_id">
									<option disabled <?= set_value("type_id") == "" ? "selected" : "" ?>>Pilih Tipe Mobil
									</option>
									<?php
									foreach ($types as $type) {
										?>
										<option value="<?= $type->id ?>" <?= $type->id == set_value("type_id") ? "selected" : "" ?>><?= $type->type ?></option>
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
									<option disabled <?= set_value("transmition") == "" ? "selected" : "" ?>>Pilih
										Transmisi
									</option>
									<option value="AUTOMATIC" <?= $type->id == set_value("transmition") ? "selected" : "" ?>>Otomatis</option>
									<option value="MANUAL" <?= $type->id == set_value("transmition") ? "selected" : "" ?>>
										Manual</option>
								</select>
							</div>
							<?= form_error("transmition", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="seat" class="form-label">Jumlah Kursi</label></div>
							<div class="col-9"><input type="number" min="1" class="form-control" id="seat" name="seat"
									value="<?= set_value("seat") ?>">
							</div>
							<?= form_error("seat", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="year" class="form-label">Tahun</label></div>
							<div class="col-9"><input type="number" class="form-control" min="2000" max="" id="year"
									name="year" value="<?= set_value("year") ?>">
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
										value="<?= set_value("price") ?>" aria-describedby="basic-addon1">
								</div>
							</div>
							<?= form_error("price", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="image" class="form-label">Gambar</label></div>
							<div class="col-9">
								<div class="custom-file">
									<input type="file" class="form-control-file rounded-lg" id="image" name="image"
										style="border:1px solid rgb(209, 211, 226);" required>
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