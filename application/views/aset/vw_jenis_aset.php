<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
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
						<?php if ($this->session->userdata('role') == "Admin") : ?>
							<?php foreach ($hak as $hk) : ?>
								<?php if ($hk['id_menu'] == 3 && $hk['id_user'] == $user['id_user']) { ?>
									<?php if ($hk['tambah'] == 1) { ?>
										<div class="col-md-6"><a href="<?= base_url(); ?>jenisaset/tambah" class="btn btn-info mb-2">Tambah Data Jenis Aset</a></div>
									<?php } else { ?>
										<div class="col-md-6"><a href="<?= base_url(); ?>jenisaset/tambah" class="btn btn-secondary mb-2 disabled">Tambah Data Jenis Aset</a></div>
									<?php } ?>
								<?php } ?>
							<?php endforeach; ?>
						<?php else : ?>
						<?php endif; ?>
						<!-- <div class="col-md-6"><a href="<?= base_url(); ?>jenisaset/tambah" class="btn btn-info mb-2">Tambah Data Jenis Aset</a></div> -->
						<div class="card">
							<div class="jsgrid-table-panel">
								<?= $this->session->flashdata('message'); ?>
								<!-- /.card-header -->
								<div class="card-body">

									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Jenis Aset</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($jenisaset as $us) : ?>
												<tr>
													<td><?= $i; ?></td>
													<td><?= $us['nama_jenis_aset']; ?></td>
													<td>
														<!-- /.modal -->
														<?php foreach ($hak as $hk) : ?>
															<?php if ($hk['id_menu'] == 3 && $hk['id_user'] == ucwords($this->session->userdata('id_user'))) { ?>
																<?php if ($hk['edit'] == 1) { ?>
																	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-success<?php echo $us['id_jenis_aset']; ?>">
																		<i class="ti-pencil-alt"></i>
																	</button>
																<?php } else { ?>
																	<button type="button" class="btn btn-success btn-sm" disabled data-toggle="modal" data-target="#modal-success<?php echo $us['id_jenis_aset']; ?>">
																		<i class="ti-pencil-alt"></i>
																	</button>
																<?php } ?>
															<?php } ?>
														<?php endforeach; ?>
														<!-- Modal -->
														<div class="modal fade" id="modal-success<?php echo $us['id_jenis_aset']; ?>">
															<div class="modal-dialog">
																<div class="modal-content bg-success">
																	<div class="modal-header">
																		<h4 class="text-light">Edit Data</h4>
																		<button type="button" class="btn" data-dismiss="modal" aria-label="Close">
																			<i class="fa fa-close"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p class="text-light">Anda yakin ingin mengubah data ini&hellip; ?</p>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
																		<a href="<?= base_url('JenisAset/edit/') . $us['id_jenis_aset']; ?>" class="btn btn-outline-light">Ubah</a>
																	</div>
																</div>
																<!-- /.modal-content -->
															</div>
															<!-- /.modal-dialog -->
														</div>
														<!-- /.modal -->

														<!-- Trigger Hapus -->
														<!-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger<?php echo $us['id_jenis_aset']; ?>">
															<i class="ti-trash"></i>
														</button> -->

														<!-- Modal -->
														<div class="modal fade" id="modal-danger<?php echo $us['id_jenis_aset']; ?>">
															<div class="modal-dialog">
																<div class="modal-content bg-danger">
																	<div class="modal-header">
																		<h4 class="text-light">Hapus Data Jenis Aset</h4>
																		<button type="button" class="btn" data-dismiss="modal" aria-label="Close">
																			<i class="fa fa-close"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p class="card-title text-light">Anda yakin akan menghapus data ini&hellip; ?</p>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
																		<a href="<?= base_url('JenisAset/hapus/') . $us['id_jenis_aset']; ?>" class="btn btn-outline-light">Hapus</a>
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