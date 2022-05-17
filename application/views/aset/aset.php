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
			</div>
			<!-- /# row -->
			<div id="main-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-md-6"><a href="<?= base_url(); ?>Aset/tambah" class="btn btn-info mb-2">Tambah Aset</a></div>
						<div class="card">
							<div class="jsgrid-table-panel">
								<?= $this->session->flashdata('message'); ?>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>No Aset</th>
												<th>Nama Aset</th>
												<th>Jenis</th>
												<th>Lokasi</th>
												<th>Owner</th>
												<th>Subclass</th>
												<th>Used By</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($aset as $us) : ?>
												<tr>
													<td><?= $i; ?></td>
													<td><?= $us['no_aset']; ?></td>
													<td><?= $us['nama_aset']; ?></td>
													<td><?= $us['jenis_aset']; ?></td>
													<td><?= $us['owner_aset']; ?></td>
													<td><?= $us['lokasi_aset']; ?></td>
													<td><?= $us['subclass_aset']; ?></td>
													<td><?= $us['used_by']; ?></td>
													<td>

														<!-- Trigger Detail -->
														<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-default<?php echo $us['id_aset'] ?>">Detail</a>
														<!-- Modal -->
														<div class="modal fade" id="modal-default<?php echo $us['id_aset'] ?>">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Detail Pesanan</h4>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<!-- Profile Image -->
																		<div class="card card-primary card-outline">
																			<div class="card-body box-profile">

																				<h3 class="profile-username text-center"><?php echo $us['nama_aset']; ?></h3>

																				<p class="text-muted text-center">
																					<?php echo $us['jenis_aset']; ?></h3>
																				</p>

																				<ul class="list-group list-group-unbordered mb-3">
																					<li class="list-group-item">
																						<b>Nama Aset</b> <a class="float-right"><?= $us['nama_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b>Nomor Aset</b> <a class="float-right"><?= $us['no_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b>Owner</b> <a class="float-right"><?= $us['owner_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b>Lokasi</b> <a class="float-right"><?= $us['lokasi_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b>Subclass</b> <a class="float-right"><?= $us['subclass_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b>Used by</b> <a class="float-right"><?= $us['used_by']; ?></a>
																					</li>
																				</ul>
																			</div>
																			<!-- /.card-body -->
																		</div>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	</div>
																</div>
																<!-- /.modal-content -->
															</div>
															<!-- /.modal-dialog -->
														</div>
														<!-- /.modal -->
														<button type="button" class="btn btn-success sbtn-sm" <?php echo $us['id_aset']; ?>>
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