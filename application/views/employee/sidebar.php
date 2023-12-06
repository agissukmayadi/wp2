<!-- Page Wrapper -->
<div id="wrapper">
	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("employee") ?>">
			<div class="sidebar-brand-icon">
				<i class="fas fa-car"></i>
			</div>
			<div class="sidebar-brand-text mx-3">Go Drive</div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item <?= $activeLink == "dashboard" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("employee") ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<li class="nav-item <?= $activeLink == "profile" ? "active" : "" ?>">
			<a class="nav-link" href="<?= base_url("employee/profile") ?>">
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