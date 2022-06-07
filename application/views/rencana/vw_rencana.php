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
                        <div class="col-md-6"><a href="<?= base_url(); ?>aset/tambah" class="btn btn-info mb-2">Tambah Data Aset</a></div>
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
                                                        <td><?= $us->pengendalian ?></td>
                                                        <td><?= $us->deskripsi ?></td>
                                                        <td><?= date('d-m-Y', $us->plan_mulai); ?></td>
                                                        <td><?= date('d-m-Y', $us->plan_selesai); ?></td>
                                                        <td><?= $us->indikator_output ?></td>
                                                        <td><?= $us->anggaran ?></td>
                                                        <td><?= $us->pic ?></td>
                                                        <td>

                                                            <!-- Trigger Edit -->
                                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-success<?= $us->id_risiko ?>">
                                                                <i class="ti-pencil-alt"></i>
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="modal-success<?= $us->id_risiko ?>">
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
                                                                            <!-- <a href="<?= base_url('aset/edit/') . $us['id_aset']; ?>" class="btn btn-outline-light">Ubah</a> -->
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