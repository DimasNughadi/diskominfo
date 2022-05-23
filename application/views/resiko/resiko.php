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
					<div class="page-header">
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
						<div class="col-md-6"><a href="<?= base_url(); ?>resiko/tambah" class="btn btn-info mb-2">Tambah</a></div>
						<div class="card">
							<div class="jsgrid-table-panel">
								<?= $this->session->flashdata('message'); ?>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped" mt_getrandmax>
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Aset</th>
												<th>Nama Risiko</th>
												<th>Added by</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($resiko as $us) : ?>
												<tr>
													<td><?= $i; ?></td>
													<td>
														<?php foreach ($aset as $ja) : ?>
															<?php if ($us['id_aset'] == $ja['id_aset']) { ?>
																<?= $ja['nama_aset']; ?>
															<?php } ?>
														<?php endforeach; ?>
													</td>
													<td><?= $us['nama_risiko']; ?></td>
													<td>
														<?php foreach ($userdata as $ja) : ?>
															<?php if ($us['id_user'] == $ja['id_user']) { ?>
																<?= $ja['username']; ?>
															<?php } ?>
														<?php endforeach; ?>
													</td>
													<td>
														<button type="button" class="btn btn-success	 btn-sm" <?php echo $us['id_aset']; ?>>
															<i class="ti-pencil"></i>
														</button>
														<button type="button" class="btn btn-danger btn-sm" <?php echo $us['id_aset']; ?>>
															<i class="ti-trash"></i>
														</button>
													</td>
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