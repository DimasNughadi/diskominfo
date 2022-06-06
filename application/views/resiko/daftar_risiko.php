<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 p-r-0 title-margin-right">
					<div class="page-header">
						<div class="page-title">
							<h2><?= $judul; ?></h2>
						</div>
					</div>
				</div>
				<!-- /# column -->
				<div class="col-lg-4 p-l-0 title-margin-left">
					<div class="page-header">xxxxxxx`
						<div class="page-title">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="resiko"><?= $judul ?></a></li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>

			<!-- /# row -->
			<div id="main-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="jsgrid-table-panel">
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped" mt_getrandmax>
										<thead>
											<tr>
												<th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
												<th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Aset</th>
												<th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Risiko</th>
												<th rowspan="2" style="text-align: center; vertical-align: middle;">Penyebab</th>
												<th rowspan="2" style="text-align: center; vertical-align: middle;">Dampak</th>
												<th colspan="3" style="text-align: center; vertical-align: middle;">Penilaian Risiko</th>
												<th rowspan="2" style="text-align: center; vertical-align: middle;">Pengendalian</th>
												<th rowspan="2" style="text-align: center; vertical-align: middle;">Keputusan</th>
												<th rowspan="2" style="text-align: center; vertical-align: middle;">Keterangan</th>
											</tr>
											<tr>
												<th style="text-align: center; vertical-align: middle;">SD</th>
												<th style="text-align: center; vertical-align: middle;">SK</th>
												<th style="text-align: center; vertical-align: middle;">TR</th>
											</tr>

										</thead>
										<tbody>
											<?php $noskp = 1;
											$jum = 1; ?>
											<?php foreach ($resiko as $skp) { ?>
												<tr>
													<?php

													if ($jum <= 1) {
														$jmlrow = $skp->rowpk;
														if ($jmlrow == 0) {
															$jmlrow = 1;
														}
													?>
														<td rowspan="<?= $jmlrow ?>"><?= $noskp ?></td>
														<td rowspan="<?= $jmlrow ?>"><?= $skp->nama_aset ?></td>
													<?php
														$jum = $skp->rowpk;
														$noskp++;
													} else {
														$jum = $jum - 1;
													}
													?>
													<td><?= $skp->nama_risiko ?></td>
													<td><?= $skp->penyebab ?></td>
													<td><?= $skp->dampak ?></td>
													<td><?= $skp->skala_dampak ?></td>
													<td><?= $skp->skala_kemungkinan ?></td>
													<td><?= $skp->tingkat_risiko ?></td>
													<td><?= $skp->pengendalian ?></td>
													<td><?= $skp->keputusan ?></td>
													<td>
														<?php

														if ($skp->tingkat_risiko == 0) {
															echo "<small>NULL</small>";
														} elseif ($skp->tingkat_risiko >= 1 && $skp->tingkat_risiko <= 5 && $skp->dampak != 5) {
															echo "<span class='mb-0 badge badge-success'>Sangat Rendah</span>";
														} elseif ($skp->tingkat_risiko >= 6 && $skp->tingkat_risiko <= 11 && $skp->dampak != 5) {
															echo "<span class='mb-0 badge badge-success'>Rendah</span>";
														} elseif ($skp->tingkat_risiko >= 12 && $skp->tingkat_risiko <= 15 && $skp->dampak != 5) {
															echo "<span class='mb-0 badge badge-warning'>Sedang</span>";
														} elseif ($skp->tingkat_risiko >= 16 && $skp->tingkat_risiko <= 19 && $skp->dampak != 5) {
															echo "<span class='mb-0 badge badge-success'>Tinggi</span>";
														} else {
															echo "<span class='mb-0 badge badge-success'>Sangat Tinggi</span>";
														}
														?>
													</td>
												</tr>
											<?php  } ?>

										</tbody>
									</table>
								</div>
							</div>
							<!-- /# card -->
						</div>
						<!-- /# column -->
					</div>
					<!-- /# row -->