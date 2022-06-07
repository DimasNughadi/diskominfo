<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manajemen Aset: Dashboard</title>
	<!-- ================= Favicon ================== -->
	<!-- Standard -->
	<link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
	<!-- Retina iPad Touch Icon-->
	<link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
	<!-- Retina iPhone Touch Icon-->
	<link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
	<!-- Standard iPad Touch Icon-->
	<link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
	<!-- Standard iPhone Touch Icon-->
	<link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
	<!-- Styles -->
	<link href="<?= base_url('assets/') ?>css/lib/chartist/chartist.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">

	<link href="<?= base_url('assets/') ?>css/lib/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/lib/themify-icons.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/') ?>css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
	<link href="<?= base_url('assets/') ?>css/lib/owl.carousel.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/') ?>css/lib/owl.theme.default.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/') ?>css/lib/weather-icons.css" rel="stylesheet" />
	<link href="<?= base_url('assets/') ?>css/lib/menubar/sidebar.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/lib/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/lib/helper.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/lib/slider/slider.css" rel="stylesheet">

	<link href="<?= base_url('assets/') ?>css/lib/toastr/toastr.min.css" rel="stylesheet">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

	<!-- Common -->
	<link href="<?= base_url('assets/') ?>css/lib/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/lib/themify-icons.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/lib/menubar/sidebar.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/lib/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/lib/helper.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">

	<link href="<?= base_url('assets/') ?>css/lib/barRating/barRating.css" rel="stylesheet">
</head>

<body>

	<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
		<div class="nano">
			<div class="nano-content">
				<ul>
					<div class="logo"><a href="<?= site_url('dashboard') ?>">
							<span>Diskominfotik Riau</span></a></div>
					<li class="label">Main</li>
					<li><a href="<?= site_url('dashboard') ?>"><i class="ti-home"></i> Dashboard</a>
					</li>

					<li class="label">Apps</li>
					<li><a class="sidebar-sub-toggle"><i class="nav-icon fas fa-database"></i> Data Master <span class="sidebar-collapse-icon ti-angle-down"></span></a>
						<ul>

							<li><a href="<?= site_url('aset') ?>"><i class="ti-control-record "></i>Data Aset</a></li>
							<li><a href="<?= site_url('jenisaset') ?>"><i class="ti-control-record"></i>Data Jenis Aset</a></li>
							<li><a href="<?= site_url('akun') ?>"><i class="ti-control-record"></i>Data User</a></li>
							<li><a href="<?= site_url('bidang') ?>"><i class="ti-control-record"></i>Data Bidang</a></li>
						</ul>
					</li>
					<li><a class="sidebar-sub-toggle"><i class="nav-icon fas fa-server"></i></i> Manajemen Risiko <span class="sidebar-collapse-icon ti-angle-down"></span></a>
						<ul>

							<li><a href="<?= site_url('resiko') ?>"><i class="ti-control-record"></i>Identifikasi Risiko</a></li>
							<li><a href="<?= site_url('resiko/daftar') ?>"><i class="ti-control-record"></i>Daftar Risiko</a></li>
							<li><a href="<?= site_url('#') ?>"><i class="ti-control-record"></i>Rencana Penanganan</a></li>
							<li><a href="<?= site_url('#') ?>"><i class="ti-control-record"></i>Realisasi Penangan</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="ti-id-badge"></i> Account</a></li>
					<li><a href="#"><i class="ti-file"></i> Report</a></li>
					<li><a href="<?= site_url('auth/logout') ?>"><i class="ti-close"></i> Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /# sidebar -->

	<div class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="float-left">
						<div class="hamburger sidebar-toggle">
							<span class="line"></span>
							<span class="line"></span>
							<span class="line"></span>
						</div>
					</div>
					<div class="float-right">
						<!-- <div class="dropdown dib">
							<div class="header-icon" data-toggle="dropdown">
								<span class="user-avatar"><?= $user['username']; ?>
									<i class="ti-angle-down f-s-10"></i>
								</span>

							</div>
						</div> -->
						<div class="user-panel mt-3  d-flex">
							<div class="info">
								<p><span class="mb-0 badge badge-dark"><?= ucwords($this->session->userdata('username')) ?></span>
									<span class="mb-0 badge badge-dark"><?= ucwords($this->session->userdata('id_bidang')) ?></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>