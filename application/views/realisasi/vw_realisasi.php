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
                            <div class="jsgrid-table-panel">
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
                                                    <th>Risiko</th>
                                                    <th>Rencana Penanganan</th>
                                                    <th>Mulai</th>
                                                    <th>Selesai</th>
                                                    <th>Indikator Output</th>
                                                    <th>PIC</th>
                                                    <th>Anggaran</th>
                                                    <th>Mulai</th>
                                                    <th>Selesai</th>
                                                    <th>Hambatan</th>
                                                    <th>Keterangan</th>
                                                    <th>File</th>
                                                    <th style="text-align: center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($realisasi)) : ?>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($realisasi as $us) : ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $us['nama_risiko'] ?></td>
                                                            <td><?= $us['deskripsi'] ?></td>

                                                            <td><?php if (!empty((int)$us['plan_mulai'])) {
                                                                    echo date('d-m-Y', strtotime($us['plan_mulai']));
                                                                } else echo " "; ?></td>
                                                            <td><?php if (!empty((int)$us['plan_selesai'])) {
                                                                    echo date('d-m-Y', strtotime($us['plan_selesai']));
                                                                } else echo " "; ?></td>

                                                            <td><?= $us['indikator_output'] ?></td>
                                                            <td><?= $us['pic'] ?></td>
                                                            <td><?php if (!empty((int)$us['anggaran'])) {
                                                                    echo "Rp" . number_format($us['anggaran'], 2, ',', '.');;
                                                                } else echo "Rp.0"; ?></td>
                                                            <td><?php if (!empty((int)$us['real_mulai'])) {
                                                                    echo date('d-m-Y', strtotime($us['real_mulai']));
                                                                } else echo " "; ?></td>
                                                            <td><?php if (!empty((int)$us['real_selesai'])) {
                                                                    echo date('d-m-Y', strtotime($us['real_selesai']));
                                                                } else echo " "; ?></td>
                                                            <td><?= $us['hambatan'] ?></td>
                                                            <td><?= $us['keterangan'] ?></td>
                                                            <td>
                                                                <?php if ($us['status'] == "Close") {
                                                                    if ($us['berkas'] == "") { ?>
                                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-danger<?php echo $us['id_risiko']; ?>">Upload <span class="fa fa-upload"></span> </button>

                                                                    <?php       } else { ?>
                                                                        <a class="btn btn-danger btn-sm" href="<?= base_url('uploadzip/' . $us['berkas']) ?>">Download<span class="fa fa-download"></span></a>
                                                                <?php       }
                                                                } else {
                                                                    echo "";
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <?php if (!isset($us['real_mulai'])) { ?>
                                                                    <a href="<?= base_url('realisasi/tambah/') . $us['id_risiko']; ?>" class="btn btn-sm btn-info">Buat Realisasi</a>
                                                                <?php } else { ?>
                                                                    <a href="<?= base_url('realisasi/edit/') . $us['id_risiko']; ?>" class="btn btn-sm btn-success">Edit Realisasi</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    RE
                                                <?php endif ?>

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

                <!-- Modal -->
                <div class="modal fade" id="modal-danger<?php echo $us['id_risiko']; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload Zip
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </h5>
                            </div>

                            <form class="form-upload" action="<?= base_url('realisasi/upload/') . $us['id_risiko']; ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" name="id_risiko" value="<?= $us['id_risiko']; ?>" id="upload_id">
                                    <label for="exampleInputFile">Pilih File</label>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="berkas" class="custom-file-input" id="berkas">
                                            <label for="berkas" class="custom-file-label">Choose File</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>