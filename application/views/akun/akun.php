<style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 20px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
												<th>Departemen</th>
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
													<td><?= $us['departemen']; ?></td>
                                                    <td>
                                                        <a class="float-right">
                                                            <?php if ($us['status'] == 'Active') { ?>
                                                                <?php if ($_SESSION['username'] == $us['username']) { ?>
                                                                    <a href="<?php echo base_url(); ?>user/update_status/<?php echo $us['id_user']; ?>/<?php echo $us['status']; ?>" class="btn btn-success btn-sm disabled">Active</a>
                                                                <?php } else { ?>
                                                                    <a href="<?php echo base_url(); ?>user/update_status/<?php echo $us['id_user']; ?>/<?php echo $us['status']; ?>" class="btn btn-success btn-sm">Active</a>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <a href="<?php echo base_url(); ?>user/update_status/<?php echo $us['id_user']; ?>/<?php echo $us['status']; ?>" class="btn btn-warning btn-sm">Inactive</a>
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
																		<h4 class="modal-title">Detail User</h4>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
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
																						<b class="float-left">Departemen</b>
																						<a class="float-right">
																							<?= $us['departemen']; ?>
																						</a>
																					</li>
																					<li class="list-group-item">
																						<b class="float-left">Hak Akses</b><br/>
																						<table class="table table-bordered table-striped" style="text-align: center;">
																							<thead class="thead-dark">
																								<tr>
																									<th>Data Aset</th>
																									<th>Data Resiko</th>
																									<th>Data User</th>
																									<th style="width: 9rem;">Data Departemen</th>
																									<th style="text-align: center;">Report</th>
																								</tr>
																							</thead>
																							<tbody style="text-align: center;">
																								<tr>
																									<td>
																										<label class="switch">
                                                                                                            <input type="checkbox">
                                                                                                            <span class="slider round"></span>
                                                                                                        </label>
																									</td>
																									<td>
																										<label class="switch">
                                                                                                            <input type="checkbox">
                                                                                                            <span class="slider round"></span>
                                                                                                        </label>
																									</td>
																									<td>
																										<label class="switch">
                                                                                                            <input type="checkbox">
                                                                                                            <span class="slider round"></span>
                                                                                                        </label>
																									</td>
																									<td>
																										<label class="switch">
                                                                                                            <input type="checkbox">
                                                                                                            <span class="slider round"></span>
                                                                                                        </label>
																									</td>
																									<td style="text-align: center;">
																										<label class="switch">
                                                                                                            <input type="checkbox">
                                                                                                            <span class="slider round"></span>
                                                                                                        </label>
																									</td>
																								</tr>
																							</tbody>
																						</table>
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
														<button type="button" class="btn btn-success btn-sm" <?php echo $us['id_user']; ?>>
															<i class="ti-pencil"></i>
														</button>
														<button type="button" class="btn btn-danger btn-sm" <?php echo $us['id_user']; ?>>
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
				</div>
			</div>