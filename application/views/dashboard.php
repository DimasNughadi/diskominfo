	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<div class="content-wrap">
		<div class="main">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 p-r-0 title-margin-right">
						<div class="page-header">
							<div class="page-title">
								<h2><?=$judul;?></h2>
							</div>
						</div>
					</div>
					<!-- /# column -->
					<div class="col-lg-4 p-l-0 title-margin-left">
						<div class="page-header">
							<div class="page-title">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">Home</li>
								</ol>
							</div>
						</div>
					</div>
					<?= $this->session->flashdata('error'); ?>
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
										<div class="stat-digit"><?php echo $aset ?></div>
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
										<div class="stat-digit"><?php echo $usercount ?></div>
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
										<div class="stat-digit"><?php echo $tinggi + $sangattinggi ?></div>
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
						<div class="col-lg-4">
							<div class="card">
								<div class="card-body">
									<div class="ct-pie-chart">
										<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
											<script>
											var xValues = ["Sangat Rendah", "Rendah", "Sedang", "Tinggi", "Sangat Tinggi"];
											var yValues = [<?php echo $sangatrendah ?>, <?php echo $rendah ?>, <?php echo $sedang ?>, <?php echo $tinggi ?>, <?php echo $sangattinggi ?>];
											var barColors = [
											"#17a2b8",
											"#28a745",
											"#ffc107",
											"#ff8800",
											"#dc3545"
											];

											new Chart("myChart", {
											type: "pie",
											data: {
												labels: xValues,
												datasets: [{
												backgroundColor: barColors,
												data: yValues
												}]
											},
											options: {
												title: {
												display: true,
												text: "Tingkat Risiko"
												}
											}
											});
											</script>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="card">
								<div class="card-body">
									<div class="ct-pie-chart">
										<canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
											<script>
											var xValues = ["Open", "Close"];
											var yValues = [<?php echo $open ?>, <?php echo $close ?>];
											var barColors = [
											"#17a2b8",
											"#28a745",
											"#ffc107",
											"#ff8800",
											"#dc3545"
											];

											new Chart("myChart2", {
											type: "pie",
											data: {
												labels: xValues,
												datasets: [{
												backgroundColor: barColors,
												data: yValues
												}]
											},
											options: {
												title: {
												display: true,
												text: "Status Penanganan Risiko"
												}
											}
											});
											</script>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="card">
								<div class="card-body">
									<div class="ct-pie-chart">
										<canvas id="myChart3" style="width:100%;max-width:600px"></canvas>
											<script>
											var xValues = ["Physical", "Software"];
											var yValues = [<?php echo $asetP ?>, <?php echo $asetS ?>];
											var barColors = [
											"#17a2b8",
											"#28a745"
											];

											new Chart("myChart3", {
											type: "pie",
											data: {
												labels: xValues,
												datasets: [{
												backgroundColor: barColors,
												data: yValues
												}]
											},
											options: {
												title: {
												display: true,
												text: "Perbandingan Jenis Aset"
												}
											}
											});
											</script>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- <div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-body">
									<div class="ct-line-chart">
										<canvas id="barChart" style="width:100%;max-width:900px"></canvas>
											<script>
											var xValues = ["Sangat Rendah", "Rendah"];
											var yValues = [1, 3];
											var barColors = [
											"#17a2b8",
											"#28a745"
											];

											new Chart("barChart", {
											type: "line",
											data: {
												labels: xValues,
												datasets: [{
												backgroundColor: barColors,
												data: yValues
												}]
											},
											options: {
												title: {
												display: true,
												text: "Tingkat Risiko"
												}
											}
											});
											</script>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="year-calendar"></div>
                                </div>
                            </div>
                        </div>

					</div> -->

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