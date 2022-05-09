<div class="content-wrap">
	<div class="main">
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<?= $this->session->flashdata('message');?>
							<!-- /.card-header -->
							<div class="card-body">
								<table id_aset="example1" class="table table-bordered table-striped">
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
									<tfoot>
										<tr>
											<th>No</th>
											<th>No Aset</th>
											<th>Nama Aset</th>
											<th>Jenis</th>
											<th>Lokasi</th>
											<th>Owner</th>
											<th>Subclass</th>
											<th>Used By</th>
											<th>aksi</th>
										</tr>
									</tfoot>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
