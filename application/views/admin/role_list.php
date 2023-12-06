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
				<a href="<?= base_url("admin/role_add") ?>" class="btn btn-primary btn-sm">Tambah <i
						class="fas fa-plus pl-3"></i></a>
			</div>
			<?= $this->session->flashdata("alert") ?>
			<div class="table-responsive">

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Role</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($roles as $role) {
							?>
							<tr>
								<td>
									<?= $no ?>
								</td>
								<td>
									<?= $role->role ?>
								</td>
								<td class=" text-center">
									<a href="<?= base_url("admin/role_edit/") . $role->id ?>" class="btn btn-sm btn-info"><i
											class="fas fa-pen"></i></a>
									<a href="<?= base_url("admin/role_delete/") . $role->id ?>"
										class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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