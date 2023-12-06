<!-- Page Wrapper -->
<div id="wrapper">
	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("admin") ?>">
			<div class="sidebar-brand-icon">
				<i class="fas fa-car"></i>
			</div>
			<div class="sidebar-brand-text mx-3">Go Drive</div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item <?= $activeLink == "dashboard" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("admin") ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Data
		</div>

		<li class="nav-item <?= $activeLink == "rents" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("admin/rent_list") ?>">
				<i class="fas fa-fw fa-circle"></i>
				<span>Rents</span></a>
		</li>

		<li class="nav-item <?= $activeLink == "users" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("admin/user_list") ?>">
				<i class="fas fa-fw fa-circle"></i>
				<span>Users</span></a>
		</li>

		<li class="nav-item <?= $activeLink == "cars" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("admin/car_list") ?>">
				<i class="fas fa-fw fa-circle"></i>
				<span>Cars</span></a>
		</li>

		<li class="nav-item <?= $activeLink == "roles" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("admin/role_list") ?>">
				<i class="fas fa-fw fa-circle"></i>
				<span>Roles</span></a>
		</li>

		<li class="nav-item <?= $activeLink == "types" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("admin/type_list") ?>">
				<i class="fas fa-fw fa-circle"></i>
				<span>Car Types</span></a>
		</li>

		<li class="nav-item <?= $activeLink == "banks" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("admin/bank_list") ?>">
				<i class="fas fa-fw fa-circle"></i>
				<span>Banks</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<li class="nav-item <?= $activeLink == "profile" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("admin/profile") ?>">
				<i class="fa fa-user"></i>
				<span>Profile</span></a>
		</li>

		<hr class="sidebar-divider d-none d-md-block">


		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul>
	<!-- End of Sidebar -->