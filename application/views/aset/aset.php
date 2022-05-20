<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
			<!-- <div class="row">
				<div class="col-lg-8 p-r-0 title-margin-right">
					<div class="page-header">
						<div class="page-title">
							<h1>Hello, <span>Welcome Here</span></h1>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /# row -->
			<div id="main-content">
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
									<li class="breadcrumb-item active"><?= $judul; ?></li>
								</ol>
							</div>
						</div>
					</div>
					<!-- /# column -->
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="col-md-6"><a href="<?= base_url(); ?>aset/tambah" class="btn btn-info mb-2">Tambah Data Aset</a></div>
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
													<td><?= $us['nama_aset']; ?></td>
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
																		<h4 class="text-dark">Detail Aset</h4>
																		<button type="button" class="btn" data-dismiss="modal" aria-label="Close">
																			<i class="fa fa-close"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<!-- Profile Image -->
																		<div class="card card-primary card-outline">
																			<div class="card-body box-profile">

																				<h3 class="profile-username text-center">
																					<?php echo $us['nama_aset']; ?></h3>

																				<p class="text-muted text-center">
																					<?php echo $us['jenis_aset']; ?></h3>
																				</p>

																				<ul class="list-group list-group-unbordered mb-3">
																					<li class="list-group-item">
																						<b class="float-left">Nama Aset</b>
																						<a class="float-right"><?= $us['nama_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b class="float-left">Nomor Aset</b>
																						<a class="float-right"><?= $us['no_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b class="float-left" b>Owner</b> <a class="float-right"><?= $us['owner_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b class="float-left">Lokasi</b> <a class="float-right"><?= $us['lokasi_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b class="float-left">Subclass</b>
																						<a class="float-right"><?= $us['subclass_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b class="float-left">Used by</b> <a class="float-right"><?= $us['used_by']; ?></a>
																					</li>
																				</ul>
																				<div class="row">
																					<div class="col-md"> <strong><a href="#" class="text-primary">[Risiko Aset]</a></strong>
																					</div>
																				</div>
																			</div>
																			<!-- /.card-body -->
																		</div>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-primary cen" data-dismiss="modal">Tutup</button>
																	</div>
																</div>
																<!-- /.modal-content -->
															</div>
															<!-- /.modal-dialog -->
														</div>
														<!-- /.modal -->
														<button type="button" class="btn btn-success btn-sm" <?php echo $us['id_aset']; ?>>
															<i class="ti-pencil"></i>
														</button>

														<!-- Trigger Hapus -->
														<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger<?php echo $us['id_aset']; ?>">
															<i class="fas fa-trash"></i>
														</button>

														<!-- Modal -->
														<div class="modal fade" id="modal-danger<?php echo $us['id_aset']; ?>">
															<div class="modal-dialog">
																<div class="modal-content bg-danger">
																	<div class="modal-header">
																		<h4 class="text-light">Hapus Data Aset</h4>
																		<button type="button" class="btn" data-dismiss="modal" aria-label="Close">
																			<i class="fa fa-close"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p class="card-title text-light">Anda yakin akan menghapus data ini&hellip; ?</p>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
																		<a href="<?= base_url('Aset/hapus/') . $us['id_aset']; ?>" class="btn btn-outline-light">Simpan Perubahan</a>
																	</div>
																</div>
																<!-- /.modal-content -->
															</div>
															<!-- /.modal-dialog -->
														</div>
														<!-- /.modal -->


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
				</div>
			</div>