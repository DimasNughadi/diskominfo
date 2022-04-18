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
	<link href="<?=base_url('assets/')?>css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>css/lib/font-awesome.min.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>css/lib/themify-icons.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>css/lib/owl.carousel.min.css" rel="stylesheet" />
	<link href="<?=base_url('assets/')?>css/lib/owl.theme.default.min.css" rel="stylesheet" />
	<link href="<?=base_url('assets/')?>css/lib/weather-icons.css" rel="stylesheet" />
	<link href="<?=base_url('assets/')?>css/lib/menubar/sidebar.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>css/lib/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>css/lib/helper.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>css/style.css" rel="stylesheet">
</head>

<body>

	<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
		<div class="nano">
			<div class="nano-content">
				<ul>
					<div class="logo"><a href="index.html">
							<!-- <img src="<?=base_url('assets/')?>images/logo.png" alt="" /> --><span>DISKOMINFO</span></a>
					</div>
					<li class="label">Main</li>
					<li><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard</a>
					</li>

					<li class="label">Apps</li>
					<li><a class="sidebar-sub-toggle"><i class="ti-package"></i> Assets </a></li>
					<li><a href="app-profile.html"><i class="ti-user"></i> Account</a></li>
					<li><a href="../documentation/index.html"><i class="ti-file"></i> Report</a></li>
					<li><a><i class="ti-close"></i> Logout</a></li>
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
						<div class="dropdown dib">
							<div class="header-icon" data-toggle="dropdown">
								<i class="ti-bell"></i>
								<div class="drop-down dropdown-menu dropdown-menu-right">
									<div class="dropdown-content-heading">
										<span class="text-left">Recent Notifications</span>
									</div>
									<div class="dropdown-content-body">
										<ul>
											<li>
												<a href="#">
													<img class="pull-left m-r-10 avatar-img"
														src="<?=base_url('assets/')?>images/avatar/3.jpg" alt="" />
													<div class="notification-content">
														<small class="notification-timestamp pull-right">02:34
															PM</small>
														<div class="notification-heading">Mr. John</div>
														<div class="notification-text">5 members joined today </div>
													</div>
												</a>
											</li>
											<li>
												<a href="#">
													<img class="pull-left m-r-10 avatar-img"
														src="<?=base_url('assets/')?>images/avatar/3.jpg" alt="" />
													<div class="notification-content">
														<small class="notification-timestamp pull-right">02:34
															PM</small>
														<div class="notification-heading">Mariam</div>
														<div class="notification-text">likes a photo of you</div>
													</div>
												</a>
											</li>
											<li>
												<a href="#">
													<img class="pull-left m-r-10 avatar-img"
														src="<?=base_url('assets/')?>images/avatar/3.jpg" alt="" />
													<div class="notification-content">
														<small class="notification-timestamp pull-right">02:34
															PM</small>
														<div class="notification-heading">Tasnim</div>
														<div class="notification-text">Hi Teddy, Just wanted to let you
															...</div>
													</div>
												</a>
											</li>
											<li>
												<a href="#">
													<img class="pull-left m-r-10 avatar-img"
														src="<?=base_url('assets/')?>images/avatar/3.jpg" alt="" />
													<div class="notification-content">
														<small class="notification-timestamp pull-right">02:34
															PM</small>
														<div class="notification-heading">Mr. John</div>
														<div class="notification-text">Hi Teddy, Just wanted to let you
															...</div>
													</div>
												</a>
											</li>
											<li class="text-center">
												<a href="#" class="more-link">See All</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="dropdown dib">
							<div class="header-icon" data-toggle="dropdown">
								<i class="ti-email"></i>
								<div class="drop-down dropdown-menu dropdown-menu-right">
									<div class="dropdown-content-heading">
										<span class="text-left">2 New Messages</span>
										<a href="email.html">
											<i class="ti-pencil-alt pull-right"></i>
										</a>
									</div>
									<div class="dropdown-content-body">
										<ul>
											<li class="notification-unread">
												<a href="#">
													<img class="pull-left m-r-10 avatar-img"
														src="<?=base_url('assets/')?>images/avatar/1.jpg" alt="" />
													<div class="notification-content">
														<small class="notification-timestamp pull-right">02:34
															PM</small>
														<div class="notification-heading">Michael Qin</div>
														<div class="notification-text">Hi Teddy, Just wanted to let you
															...</div>
													</div>
												</a>
											</li>
											<li class="notification-unread">
												<a href="#">
													<img class="pull-left m-r-10 avatar-img"
														src="<?=base_url('assets/')?>images/avatar/2.jpg" alt="" />
													<div class="notification-content">
														<small class="notification-timestamp pull-right">02:34
															PM</small>
														<div class="notification-heading">Mr. John</div>
														<div class="notification-text">Hi Teddy, Just wanted to let you
															...</div>
													</div>
												</a>
											</li>
											<li>
												<a href="#">
													<img class="pull-left m-r-10 avatar-img"
														src="<?=base_url('assets/')?>images/avatar/3.jpg" alt="" />
													<div class="notification-content">
														<small class="notification-timestamp pull-right">02:34
															PM</small>
														<div class="notification-heading">Michael Qin</div>
														<div class="notification-text">Hi Teddy, Just wanted to let you
															...</div>
													</div>
												</a>
											</li>
											<li>
												<a href="#">
													<img class="pull-left m-r-10 avatar-img"
														src="<?=base_url('assets/')?>images/avatar/2.jpg" alt="" />
													<div class="notification-content">
														<small class="notification-timestamp pull-right">02:34
															PM</small>
														<div class="notification-heading">Mr. John</div>
														<div class="notification-text">Hi Teddy, Just wanted to let you
															...</div>
													</div>
												</a>
											</li>
											<li class="text-center">
												<a href="#" class="more-link">See All</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="dropdown dib">
							<div class="header-icon" data-toggle="dropdown">
								<span class="user-avatar"><?= $user['username']; ?>
									<i class="ti-angle-down f-s-10"></i>
								</span>
								<div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
									<div class="dropdown-content-heading">
										<span class="text-left">Upgrade Now</span>
										<p class="trial-day">30 Days Trail</p>
									</div>
									<div class="dropdown-content-body">
										<ul>
											<li>
												<a href="#">
													<i class="ti-user"></i>
													<span>Profile</span>
												</a>
											</li>

											<li>
												<a href="#">
													<i class="ti-email"></i>
													<span>Inbox</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="ti-settings"></i>
													<span>Setting</span>
												</a>
											</li>

											<li>
												<a href="#">
													<i class="ti-lock"></i>
													<span>Lock Screen</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="ti-power-off"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="content-wrap">
		<div class="main">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 p-r-0 title-margin-right">
						<div class="page-header">
							<div class="page-title">
								<h1>Hello, <span>Welcome Here</span></h1>
							</div>
						</div>
					</div>
					<!-- /# column -->
					<div class="col-lg-4 p-l-0 title-margin-left">
						<div class="page-header">
							<div class="page-title">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
									<li class="breadcrumb-item active">Home</li>
								</ol>
							</div>
						</div>
					</div>
					<!-- /# column -->
				</div>
				<!-- /# row -->
				<section id="main-content">
					<div class="row">
						<div class="col-lg-3">
							<div class="card">
								<div class="stat-widget-one">
									<div class="stat-icon dib"><i class="ti-package color-success border-success"></i>
									</div>
									<div class="stat-content dib">
										<div class="stat-text">Total Aset</div>
										<div class="stat-digit">...</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card">
								<div class="stat-widget-one">
									<div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
									</div>
									<div class="stat-content dib">
										<div class="stat-text">Total User</div>
										<div class="stat-digit">...</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card">
								<div class="stat-widget-one">
									<div class="stat-icon dib"><i class="ti-pulse color-danger border-danger"></i>
									</div>
									<div class="stat-content dib">
										<div class="stat-text">Aset Kritis</div>
										<div class="stat-digit">...</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card">
								<div class="stat-widget-one">
									<div class="stat-icon dib"><i class="ti-file color-dark border-dark"></i></div>
									<div class="stat-content dib">
										<div class="stat-text">Data Laporan</div>
										<div class="stat-digit">...</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-title">
									<h4>Fee Collections and Expenses</h4>

								</div>
								<div class="card-body">
									<div class="ct-bar-chart m-t-30"></div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="card">

								<div class="card-body">
									<div class="ct-pie-chart"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="card">
								<div class="card-body">
									<div class="year-calendar"></div>
								</div>
							</div>
						</div>
						<!-- /# column -->
						<div class="col-lg-8">
							<div class="card">
								<div class="card-title pr">
									<h4>All Exam Result</h4>

								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table student-data-table m-t-20">
											<thead>
												<tr>
													<th><label><input type="checkbox" value=""></label>Exam Name</th>
													<th>Subject</th>
													<th>Grade Point</th>
													<th>Percent Form</th>
													<th>Percent Upto</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Class Test</td>
													<td>Mathmatics</td>
													<td>
														4.00
													</td>
													<td>
														95.00
													</td>
													<td>
														100
													</td>
													<td>20/04/2017</td>
												</tr>
												<tr>
													<td>Class Test</td>
													<td>Mathmatics</td>
													<td>
														4.00
													</td>
													<td>
														95.00
													</td>
													<td>
														100
													</td>
													<td>20/04/2017</td>
												</tr>
												<tr>
													<td>Class Test</td>
													<td>English</td>
													<td>
														4.00
													</td>
													<td>
														95.00
													</td>
													<td>
														100
													</td>
													<td>20/04/2017</td>
												</tr>
												<tr>
													<td>Class Test</td>
													<td>Bangla</td>
													<td>
														4.00
													</td>
													<td>
														95.00
													</td>
													<td>
														100
													</td>
													<td>20/04/2017</td>
												</tr>
												<tr>
													<td>Class Test</td>
													<td>Mathmatics</td>
													<td>
														4.00
													</td>
													<td>
														95.00
													</td>
													<td>
														100
													</td>
													<td>20/04/2017</td>
												</tr>
												<tr>
													<td>Class Test</td>
													<td>English</td>
													<td>
														4.00
													</td>
													<td>
														95.00
													</td>
													<td>
														100
													</td>
													<td>20/04/2017</td>
												</tr>
												<tr>
													<td>Class Test</td>
													<td>Mathmatics</td>
													<td>
														4.00
													</td>
													<td>
														95.00
													</td>
													<td>
														100
													</td>
													<td>20/04/2017</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- /# column -->
					</div>
					<!-- /# row -->
					<div class="row">
						<div class="col-lg-3">
							<div class="card p-0">
								<div class="stat-widget-three home-widget-three">
									<div class="stat-icon bg-facebook">
										<i class="ti-facebook"></i>
									</div>
									<div class="stat-content">
										<div class="stat-digit">8,268</div>
										<div class="stat-text">Likes</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card p-0">
								<div class="stat-widget-three home-widget-three">
									<div class="stat-icon bg-youtube">
										<i class="ti-youtube"></i>
									</div>
									<div class="stat-content">
										<div class="stat-digit">12,545</div>
										<div class="stat-text">Subscribes</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card p-0">
								<div class="stat-widget-three home-widget-three">
									<div class="stat-icon bg-twitter">
										<i class="ti-twitter"></i>
									</div>
									<div class="stat-content">
										<div class="stat-digit">7,982</div>
										<div class="stat-text">Tweets</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="card p-0">
								<div class="stat-widget-three home-widget-three">
									<div class="stat-icon bg-danger">
										<i class="ti-linkedin"></i>
									</div>
									<div class="stat-content">
										<div class="stat-digit">9,658</div>
										<div class="stat-text">Followers</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			
					<!-- /# row -->	

					<div class="row">
						<div class="col-lg-12">
							<div class="footer">
								<p>2018 © Admin Board. - <a href="#">example.com</a></p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- jquery vendor -->
	<script src="<?=base_url('assets/')?>js/lib/jquery.min.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/jquery.nanoscroller.min.js"></script>
	<!-- nano scroller -->
	<script src="<?=base_url('assets/')?>js/lib/menubar/sidebar.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/preloader/pace.min.js"></script>
	<!-- sidebar -->

	<script src="<?=base_url('assets/')?>js/lib/bootstrap.min.js"></script>
	<script src="<?=base_url('assets/')?>js/scripts.js"></script>
	<!-- bootstrap -->

	<script src="<?=base_url('assets/')?>js/lib/calendar-2/moment.latest.min.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/calendar-2/pignose.calendar.min.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/calendar-2/pignose.init.js"></script>


	<script src="<?=base_url('assets/')?>js/lib/weather/jquery.simpleWeather.min.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/weather/weather-init.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/circle-progress/circle-progress.min.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/circle-progress/circle-progress-init.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/chartist/chartist.min.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/sparklinechart/jquery.sparkline.min.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/sparklinechart/sparkline.init.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/owl-carousel/owl.carousel.min.js"></script>
	<script src="<?=base_url('assets/')?>js/lib/owl-carousel/owl.carousel-init.js"></script>
	<!-- scripit init-->
	<script src="<?=base_url('assets/')?>js/dashboard2.js"></script>
</body>

</html>
