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
				<?= $this->session->flashdata("alert") ?>
				<div class="row align-items-center">
					<form action="<?= current_url() ?>" method="post" class="col-12">
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="oldPassword" class="form-label">Password Lama</label></div>
							<div class="col-9"><input type="password" class="form-control" id="oldPassword"
									name="oldPassword">
							</div>
							<?= form_error("oldPassword", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="newPassword" class="form-label">Password Baru</label></div>
							<div class="col-9"><input type="password" class="form-control" id="newPassword"
									name="newPassword">
							</div>
							<?= form_error("newPassword", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="passwordConfirmation" class="form-label">Password
									Konfirmasi</label>
							</div>
							<div class="col-9"><input type="password" class="form-control" id="passwordConfirmation"
									name="passwordConfirmation">
							</div>
							<?= form_error("passwordConfirmation", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-9">
								<button type="submit" class="btn btn-primary">Simpan</button>
								<a href="<?= base_url("employee/profile") ?>" class="btn btn-danger">Kembali</a>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>