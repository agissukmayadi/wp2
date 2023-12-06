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
			<h6 class="m-0 font-weight-bold text-primary">Data</h6>
		</div>
		<div class="card-body">
			<div class="row align-items-center">
				<div class="col-12">
					<?= $this->session->flashdata("alert") ?>
				</div>
				<div class="col-2">
					<img src="<?= base_url("assets/img/default.png") ?>" alt="" class=" img-fluid">
				</div>
				<div class="col-10">
					<h3>
						<strong>
							<?= $user->name . " - " . $user->role ?>
						</strong>
					</h3>
					<table>
						<tr>
							<td width="40px"><i class="fa fa-envelope" style="font-size:20px"></i></td>
							<td>
								<?= $user->email ?>
							</td>
						</tr>
						<tr>
							<td width="40px"><i class="fa fa-phone" style="font-size:20px"></i></td>
							<td>
								<?= $user->phone ?>
							</td>
						</tr>
						<tr>
							<td width="40px"><i class="fa fa-map-marker-alt" style="font-size:20px"></i></td>
							<td>
								<?= $user->address ?>
							</td>
						</tr>
					</table>
					<div class="d-flex column-gap-2 mt-3">
						<a href="<?= base_url("employee/edit_profile") ?>" class=" btn btn-secondary">Ubah
							Profile <i class="fa fa-pen ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
