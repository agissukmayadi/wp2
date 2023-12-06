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
					<form action="<?= current_url() ?>" method="post" class="col-12">
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="name" class="form-label">Nama Lengkap</label></div>
							<div class="col-9"><input type="text" class="form-control" id="name" name="name"
									value="<?= $user->name ?>">
							</div>
							<?= form_error("name", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="phone" class="form-label">Nomor Handphone</label></div>
							<div class="col-9"><input type="text" class="form-control" id="phone" name="phone"
									value="<?= $user->phone ?>">
							</div>
							<?= form_error("phone", "<small class='col-9 text-danger'>"), "</small>" ?>
						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="address" class="form-label">Alamat</label></div>
							<div class="col-9"><textarea name="address" id="address" cols="100%" class="form-control"
									rows="3"><?= $user->address ?></textarea>
							</div>
							<?= form_error("address", "<small class='col-9 text-danger'>"), "</small>" ?>

						</div>
						<div class="row justify-content-end mb-3">
							<div class="col-3"><label for="email" class="form-label">Email</label></div>
							<div class="col-9"><input type="text" disabled class="form-control" id="email" name="email"
									value="<?= $user->email ?>">
							</div>
						</div>
						<div class="row justify-content-end mb-2">
							<div class="col-3"><label for="password" class="form-label">Password</label></div>
							<div class="col-9">
								<div class="input-group mb-3">
									<input type="text" disabled class="form-control" placeholder="**********"
										aria-describedby="basic-addon2">
									<span class="input-group-text" id="basic-addon2"><a
											href="<?= base_url("employee/edit_password") ?>">Ubah</a></span>
								</div>
							</div>
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
