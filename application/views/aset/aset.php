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
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Table-Jsgrid</li>
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
                                    <?= $this->session->flashdata('message');?>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example" class="table table-bordered table-striped" mt_getrandmax>
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
													<button type="button" class="btn btn-danger btn-sm"
														<?php echo $us['id_aset']; ?>>
														<i class="ti-trash"></i>
													</button>
													<button type="button" class="btn btn-primary btn-sm"
														<?php echo $us['id_aset']; ?>>
														<i class="ti-info-alt"></i>
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