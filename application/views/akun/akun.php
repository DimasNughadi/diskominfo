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
			<!-- /# row -->
			<div id="main-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-md-6"><a href="<?= base_url(); ?>Akun/tambah" class="btn btn-info mb-2">Tambah Akun</a></div>
						<div class="card">
							<div class="jsgrid-table-panel">
								<?= $this->session->flashdata('message'); ?>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>ID User</th>
												<th>Username</th>
												<th>Role</th>
												<th>Bidang</th>
												<th>Status</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($akun as $us) : ?>
												<tr>
													<td><?= $i; ?></td>
													<td><?= $us['id_user']; ?></td>
													<td><?= $us['username']; ?></td>
													<td><?= $us['role']; ?></td>
													<td>
														<?php foreach ($bidang as $bdg) : ?>
															<?php if ($us['id_bidang'] == $bdg['id_bidang']) { ?>
																<?= $bdg['nama_bidang']; ?>
															<?php } ?>
														<?php endforeach; ?>
													</td>
                                                    <td>
                                                        <a class="float-right">
                                                            <?php if ($us['status'] == 'Active') { ?>
                                                                <?php if ($_SESSION['username'] == $us['username']) { ?>
                                                                    <a href="<?php echo base_url(); ?>akun/update_status/<?php echo $us['id_user']; ?>/<?php echo $us['status']; ?>" class="btn btn-success btn-sm disabled">Active</a>
                                                                <?php } else { ?>
                                                                    <a href="<?php echo base_url(); ?>akun/update_status/<?php echo $us['id_user']; ?>/<?php echo $us['status']; ?>" class="btn btn-success btn-sm">Active</a>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <a href="<?php echo base_url(); ?>akun/update_status/<?php echo $us['id_user']; ?>/<?php echo $us['status']; ?>" class="btn btn-warning btn-sm">Inactive</a>
                                                            <?php } ?>
                                                        </a>
                                                    </td>
													<td>

														<!-- Trigger Detail -->
														<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-default<?php echo $us['id_user'] ?>">Detail</a>
														<!-- Modal -->
														<div class="modal fade" id="modal-default<?php echo $us['id_user'] ?>">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="text-dark">Detail User</h4>
																		<button type="button" class="btn" data-dismiss="modal" aria-label="Close">
																			<i class="fa fa-close"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<!-- Profile Image -->
																		<div class="card card-primary card-outline">
																			<div class="card-body box-profile">
																				<h3 class="profile-username text-center">
																					<?php echo $us['username']; ?></h3>

																				<p class="text-muted text-center">
																					<?php echo $us['role']; ?></h3>
																				</p>

																				<ul class="list-group list-group-unbordered mb-3">
																					<li class="list-group-item">
																						<b class="float-left">Status</b>
                                                                                        <a class="float-right">
                                                                                        <?= $us['status']; ?>
																						</a>
																					</li>
																					<li class="list-group-item">
																						<b class="float-left">Bidang</b>
																						<a class="float-right">
																							<?php foreach ($bidang as $bdg) : ?>
																								<?php if ($us['id_bidang'] == $bdg['id_bidang']) { ?>
																									<?= $bdg['nama_bidang']; ?>
																								<?php } ?>
																							<?php endforeach; ?>
																						</a>
																					</li>
																					<li class="list-group-item">
																						<b class="float-left">Hak Akses</b><br/>
																						<form action="akun/edithak/" method="POST">
																							<table class="table table-bordered table-striped" style="text-align: center;">
																								<thead class="thead-light">
																									<tr>
																										<th>Menu</th>
																										<th>Tambah</th>
																										<th>Edit</th>
																										<th style="text-align: center;">Hapus</th>
																									</tr>
																								</thead>
																								<tbody style="text-align: center;">
																									<?php foreach ($hak as $hk) : ?>
																										<!-- <input type="text" value="<?= $hak['id_hak_akses'] ?>"> -->
																									<?php if ($hk['id_user'] == $us['id_user']) { ?>
																									<tr>
																										<td>
																										<?php foreach ($menu as $mn) : ?>
																											<?php if ($hk['id_menu'] == $mn['id_menu'] && $hk['id_user'] == $us['id_user']) { ?>
																												<?= $mn['nama_menu']; ?>
																											<?php } ?>
																										<?php endforeach; ?>
																										</td>
																										<td>
																											<?php if ($hk['tambah'] == 1 ) { ?>
																											<?php if ($_SESSION['username'] == $us['username']) { ?>
																												<a href="<?php echo base_url(); ?>akun/update_hak_tambah/<?php echo $hk['id_hak_akses']; ?>/<?php echo $hk['tambah']; ?>" class="btn btn-success btn-sm disabled">Active</a>
																											<?php } else { ?>
																												<a href="<?php echo base_url(); ?>akun/update_hak_tambah/<?php echo $hk['id_hak_akses']; ?>/<?php echo $hk['tambah']; ?>" class="btn btn-success btn-sm">Active</a>
																											<?php } ?>
																										<?php } else { ?>
																											<a href="<?php echo base_url(); ?>akun/update_hak_tambah/<?php echo $hk['id_hak_akses']; ?>/<?php echo $hk['tambah']; ?>" class="btn btn-warning btn-sm">Inactive</a>
																										<?php } ?>
																										</td>
																										<td>
																											<?php if ($hk['edit'] == 1 ) { ?>
																											<?php if ($_SESSION['username'] == $us['username']) { ?>
																												<a href="<?php echo base_url(); ?>akun/update_hak_edit/<?php echo $hk['id_hak_akses']; ?>/<?php echo $hk['edit']; ?>" class="btn btn-success btn-sm disabled">Active</a>
																											<?php } else { ?>
																												<a href="<?php echo base_url(); ?>akun/update_hak_edit/<?php echo $hk['id_hak_akses']; ?>/<?php echo $hk['edit']; ?>" class="btn btn-success btn-sm">Active</a>
																											<?php } ?>
																										<?php } else { ?>
																											<a href="<?php echo base_url(); ?>akun/update_hak_edit/<?php echo $hk['id_hak_akses']; ?>/<?php echo $hk['edit']; ?>" class="btn btn-warning btn-sm">Inactive</a>
																										<?php } ?>
																										</td>
																										<td style="text-align: center;" >
																											<?php if ($hk['hapus'] == 1 ) { ?>
																											<?php if ($_SESSION['username'] == $us['username']) { ?>
																												<a href="<?php echo base_url(); ?>akun/update_hak_hapus/<?php echo $hk['id_hak_akses']; ?>/<?php echo $hk['hapus']; ?>" class="btn btn-success btn-sm disabled">Active</a>
																											<?php } else { ?>
																												<a href="<?php echo base_url(); ?>akun/update_hak_hapus/<?php echo $hk['id_hak_akses']; ?>/<?php echo $hk['hapus']; ?>" class="btn btn-success btn-sm">Active</a>
																											<?php } ?>
																										<?php } else { ?>
																											<a href="<?php echo base_url(); ?>akun/update_hak_hapus/<?php echo $hk['id_hak_akses']; ?>/<?php echo $hk['hapus']; ?>" class="btn btn-warning btn-sm">Inactive</a>
																										<?php } ?>
																										</td>
																									</tr>
																									<?php } ?>
																									<?php endforeach; ?>
																							</tbody>
																						</table>
																					</li>
																				</ul>
																			</div>
																			<!-- /.card-body -->
																		</div>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
																	</div>
																	</form>
																</div>
																<!-- /.modal-content -->
															</div>
															<!-- /.modal-dialog -->
														</div>
														<!-- /.modal -->

													    <!-- Trigger Edit -->
														<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-success<?php echo $us['id_user'];?>">
															<i class="ti-pencil-alt"></i>
														</button>
														<!-- Modal -->
														<div class="modal fade" id="modal-success<?php echo $us['id_user'];?>">
															<div class="modal-dialog">
																<div class="modal-content bg-success">
																	<div class="modal-header">
																		<h4 class="text-light">Edit Data User</h4>
																		<button type="button" class="btn" data-dismiss="modal" aria-label="Close">
																			<i class="fa fa-close"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p class="text-light">Anda yakin ingin mengubah user ini&hellip; ?</p>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
																		<a href="<?= base_url('akun/edit/') . $us['id_user']; ?>" class="btn btn-outline-light">Ubah</a>
																	</div>
																</div>
																<!-- /.modal-content -->
															</div>
															<!-- /.modal-dialog -->
														</div>
														<!-- /.modal -->
														
														<!-- Trigger Hapus -->
														<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger<?php echo $us['id_user']; ?>">
															<i class="ti-trash"></i>
														</button>
														<!-- Modal -->
														<div class="modal fade" id="modal-danger<?php echo $us['id_user']; ?>">
															<div class="modal-dialog">
																<div class="modal-content bg-danger">
																	<div class="modal-header">
																		<h4 class="text-light">Hapus Data User</h4>
																		<button type="button" class="btn" data-dismiss="modal" aria-label="Close">
																			<i class="fa fa-close"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p class="card-title text-light">Anda yakin akan menghapus user ini&hellip; ?</p>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
																		<a href="<?= base_url('Akun/hapus/') . $us['id_user']; ?>" class="btn btn-outline-light">Hapus</a>
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
			<script>
				function refreshmodal()
				{
					$('#modal-default<?php echo $us['id_user'] ?>').load(location.href + "#modal-default<?php echo $us['id_user'] ?>");	
				}
			</script>