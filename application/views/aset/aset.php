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
							<div class="col-md-6">
								<select id="inputStatus" name="id_jenis_aset" value="#" class="form-control custom-select">
									<option selected disabled>Pilih Jenis Aset</option>
									<?php foreach ($jenisaset as $udt) : ?>
										<?php if ($udt['nama_jenis_aset'] != null) { ?>
											<option value="<?= $udt['id_jenis_aset']; ?>"><?= $udt['nama_jenis_aset']; ?></option>
										<?php } ?>
									<?php endforeach; ?>
								</select>
							</div>
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
												<th>Qty</th>
												<th>Bidang</th>
												<th>Added by</th>
												<th>Tanggal</th>
												<th style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($aset as $us) : ?>
												<tr>
													<td><?= $i; ?></td>
													<td><?= $us['no_aset']; ?></td>
													<td><?= $us['nama_aset']; ?></td>
													<td>
														<?php foreach ($jenisaset as $ja) : ?>
															<?php if ($us['id_jenis_aset'] == $ja['id_jenis_aset']) { ?>
																<?= $ja['nama_jenis_aset']; ?>
															<?php } ?>
														<?php endforeach; ?>
													</td>
													<td><?= $us['qty']; ?></td>
													<td>
														<?php foreach ($bidang as $bdg) : ?>
															<?php if ($us['id_bidang'] == $bdg['id_bidang']) { ?>
																<?= $bdg['nama_bidang']; ?>
															<?php } ?>
														<?php endforeach; ?>
													</td>
													<td>
														<?php foreach ($userdata as $user) : ?>
															<?php if ($us['id_user'] == $user['id_user']) { ?>
																<?= $user['username']; ?>
															<?php } ?>
														<?php endforeach; ?>
													</td>

													<td><?= date('d-m-Y', $us['created_on']); ?></td>
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
																					<?php foreach ($jenisaset as $ja) : ?>
																						<?php if ($us['id_jenis_aset'] == $ja['id_jenis_aset']) { ?>
																							<?= $ja['nama_jenis_aset']; ?>
																						<?php } ?>
																					<?php endforeach; ?>
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
																						<b class="float-left">Merk Aset</b>
																						<a class="float-right"><?= $us['merk_aset']; ?></a>
																					</li>
																					<li class="list-group-item">
																						<b class="float-left">Jumlah</b>
																						<a class="float-right"><?= $us['qty']; ?></a>
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

														<!-- Trigger Edit -->
														<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-warning<?php echo $us['id_aset'];?>">
															<i class="fas fa-edit"></i>
														</button>
														<!-- Modal -->
														<div class="modal fade" id="modal-warning<?php echo $us['id_aset'];?>">
															<div class="modal-dialog">
																<div class="modal-content bg-warning">
																	<div class="modal-header">
																		<h4 class="text-light">Edit Data</h4>
																		<button type="button" class="btn" data-dismiss="modal" aria-label="Close">
																			<i class="fa fa-close"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p>Anda yakin ingin mengubah data ini&hellip; ?</p>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
																		<a href="<?= base_url('aset/edit/') . $us['id_aset']; ?>" class="btn btn-outline-dark">Ubah</a>
																	</div>
																</div>
																<!-- /.modal-content -->
															</div>
															<!-- /.modal-dialog -->
														</div>
														<!-- /.modal -->

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