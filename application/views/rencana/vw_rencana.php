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
                                                    <th>Penyebab</th>
                                                    <th>Tingkat Risiko</th>
                                                    <th>Penanganan Yang Sudah Ada</th>
                                                    <th>Rencana Penanganan</th>
                                                    <th>Mulai</th>
                                                    <th>Selesai</th>
                                                    <th>Indikator Output</th>
                                                    <th>PIC</th>
                                                    <th>Anggaran</th>
                                                    <th style="text-align: center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($rencana as $us) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $us->nama_risiko ?></td>
                                                        <td><?= $us->penyebab ?></td>
                                                        <td><?= $us->tingkat_risiko ?></td>
                                                        <td><?= $us->pengendalian ?></td>
                                                        <td><?= $us->deskripsi ?></td>
                                                        <td><?php if (!empty((int)$us->plan_mulai)) {
                                                                echo date('d-m-Y', strtotime($us->plan_mulai));
                                                            } else echo " "; ?></td>
                                                        <td><?php if (!empty((int)$us->plan_selesai)) {
                                                                echo date('d-m-Y', strtotime($us->plan_selesai));
                                                            } else echo " "; ?></td>
                                                        <td><?= $us->indikator_output ?></td>
                                                        <td><?= $us->pic ?></td>
                                                        <td><?php if (!empty((int)$us->anggaran)) {
                                                                echo "Rp" . number_format($us->anggaran, 2, ',', '.');;
                                                            } else echo "Rp.0"; ?></td>
                                                        <td>
                                                            <?php if (!isset($us->deskripsi)) { ?>
                                                                <?php foreach ($hak as $hk) : ?>
                                                                    <?php if ($hk['id_menu'] == 8 && $hk['id_user'] == ucwords($this->session->userdata('id_user'))) { ?>
                                                                        <?php if ($hk['tambah'] == 1) { ?>
                                                                            <a href="<?= base_url('rencana/tambah/') . $us->id_risiko; ?>" class="btn btn-sm btn-info">Buat Rencana</a>
                                                                        <?php } else { ?>
                                                                            <a href="<?= base_url('rencana/tambah/') . $us->id_risiko; ?>" class="btn btn-sm btn-info disabled">Buat Rencana</a>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php endforeach; ?>
                                                            <?php } else { ?>
                                                                <?php foreach ($hak as $hk) : ?>
                                                                    <?php if ($hk['id_menu'] == 8 && $hk['id_user'] == ucwords($this->session->userdata('id_user'))) { ?>
                                                                        <?php if ($hk['edit'] == 1) { ?>
                                                                            <a href="<?= base_url('rencana/edit/') . $us->id_risiko; ?>" class="btn btn-sm btn-success">Edit Rencana</a>
                                                                        <?php } else { ?>
                                                                            <a href="<?= base_url('rencana/edit/') . $us->id_risiko; ?>" class="btn btn-sm btn-success disabled">Edit Rencana</a>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php endforeach; ?>
                                                            <?php } ?>

                                                            <!-- Trigger Hapus -->
                                                            <?php foreach ($hak as $hk) : ?>
                                                                <?php if ($hk['id_menu'] == 6 && $hk['id_user'] == ucwords($this->session->userdata('id_user'))) { ?>
                                                                    <?php if ($hk['edit'] == 1) { ?>
                                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger<?php echo $us->id_risiko; ?>">
                                                                            <i class="ti-trash"></i>
                                                                        </button>
                                                                    <?php } else { ?>
                                                                        <button type="button" class="btn btn-danger btn-sm" disabled data-toggle="modal" data-target="#modal-danger<?php echo $us->id_risiko; ?>">
                                                                            <i class="ti-trash"></i>
                                                                        </button>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="modal-danger<?php echo $us->id_risiko; ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="text-light">Hapus Data Risiko</h4>
                                                                            <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                                                                                <i class="fa fa-close"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p class="card-title text-light">Anda yakin akan menghapus data ini&hellip; ?</p>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
                                                                            <a href="<?= base_url('rencana/hapus/') . $us->id_risiko; ?>" class="btn btn-outline-light">Simpan Perubahan</a>
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