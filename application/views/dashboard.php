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
					<!-- /# column -->
				</div>
				<!-- /# row -->
				<section id="main-content">
					<?= $this->session->flashdata('error'); ?>
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
										<div class="stat-text">Penanganan Belum Selesai</div>
										<div class="stat-digit"><?php echo $open ?></div>
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
											var xValues = ["Physical", "Software", "Lisensi"];
											var yValues = [<?php echo $asetP ?>, <?php echo $asetS ?>, <?php echo $asetL ?>];
											var barColors = [
											"#17a2b8",
											"#28a745",
											"#dc3545"
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

					<div class="row">
                    <div class="col-lg-12">
                        
                            <div class="jsgrid-table-panel">
                            </div>
                            <div class="card">
                                <div class="jsgrid-table-panel">
                                    <?= $this->session->flashdata('message'); ?>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pernyataan Risiko</th>
                                                    <th>Penyebab</th>
                                                    <th>Dampak</th>
                                                    <th>Kemungkinan</th>
                                                    <th>Tingkat</th>
													<th>Rencana Penanganan</th>
                                                    <th>Mulai</th>
                                                    <th>Selesai</th>
                                                    <th>PIC</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($realisasi as $us) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $us->nama_risiko ?></td>
                                                        <td><?= $us->penyebab ?></td>
                                                        <td><?= $us->skala_dampak ?></td>
														<td><?= $us->skala_kemungkinan ?></td>
                                                        <td><?= $us->tingkat_risiko ?></td>
                                                        <td><?= $us->deskripsi ?></td>

                                                        <td><?php if (!empty((int)$us->plan_mulai)) {
                                                                echo date('d-m-Y', strtotime($us->plan_mulai));
                                                            } else echo " "; ?></td>
                                                        <td><?php if (!empty((int)$us->plan_selesai)) {
                                                                echo date('d-m-Y', strtotime($us->plan_selesai));
                                                            } else echo " "; ?></td>

                                                        <td><?= $us->pic ?></td>
                                                        <td style="text-align: center;"><?= $us->status ?></td>
                                                        
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /# card -->
                            </div>
                            <!-- /# column -->
                        </div>
                        <!-- /# row -->
                    </div>
                </div>

				<!-- Footer -->
				<footer class="text-center text-lg-start bg-light text-muted">
				<!-- Section: Social media -->
				<section
					class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
				>
					<!-- Left -->
					<div class="me-5 d-none d-lg-block">
						<span>Get connected with us :</span>
						<a href="" class="me-4 text-reset">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="" class="me-4 text-reset">
							<i class="fab fa-youtube"></i>
						</a>
						<!-- <a href="" class="me-4 text-reset">
							<i class="fab fa-google"></i>
						</a> -->
						<a href="" class="me-4 text-reset">
							<i class="fab fa-instagram"></i>
						</a>
					</div>
					<!-- Left -->
				</section>
				<!-- Section: Social media -->

				<!-- Section: Links  -->
				<div class="row">
					<div class="col-lg-3">
						<div class="card">
							<div class="mt-3">
								<p><i class="fas fa-home"></i> Pemerintah Provinsi Riau@2021</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="mt-3">
								<p><i class="fas fa-road"></i> Jl. Diponegoro No. 24 A</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="mt-3">
								<p><i class="fas fa-envelope"></i> diskominfotik@riau.go.id</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="mt-3">
								<p><i class="fas fa-phone"></i> (0761)45505 </p>
							</div>
						</div>
					</div>
				</div>

				<!-- <section class="">
					<div class="container text-center text-md-start mt-5"> -->
					<!-- Grid row -->
					<!-- <div class="row mt-3">
						<div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
							<h6 class="text-uppercase fw-bold mb-4"></h6>
						<p>Pemerintah Provinsi Riau@2021</p>
						</div>
						<div class="col-md-2 col-lg-3 col-xl-2 mx-auto mb-4">
							<h6 class="text-uppercase fw-bold mb-4"></h6>
						<p><i class="fas fa-home me-3"></i> Jl. Diponegoro No. 24 A</p>
						</div>
						<div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">
							<h6 class="text-uppercase fw-bold mb-4"></h6>
						<p><i class="fas fa-envelope me-3"></i> diskominfotik@riau.go.id</p>
						</div>
						<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
							<h6 class="text-uppercase fw-bold mb-4"></h6>
						<p><i class="fas fa-phone me-3"></i> (0761)45505 </p>
						</div>
				</section> -->
				<!-- Section: Links  -->

				<!-- Copyright -->
				<!-- <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
					© 2021 Copyright:
					<a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
				</div> -->
				<!-- Copyright -->
				</footer>
				<!-- Footer -->

					<!--/# row -->
					<!-- <div class="row">
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
						<div class="col-lg-3"> -->
							<!-- <div class="card p-0"> -->
								<!-- <a target="blank" href="#">
									<div class="stat-widget-three home-widget-three">
										<div class="stat-icon bg-youtube">
											<i class="ti-youtube"></i>
										</div>
										<div class="stat-content">
											<div class="stat-digit">12,545</div>
											<div class="stat-text">Subscribes</div>
										</div> -->
									<!-- </div>
								</a> -->
							<!-- </div> -->
						<!-- </div>
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
					</div> -->