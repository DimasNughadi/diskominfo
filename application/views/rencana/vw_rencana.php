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
                                                                echo date('d-m-Y', $us->plan_mulai);
                                                            } else echo " "; ?></td>
                                                        <td><?php if (!empty((int)$us->plan_selesai)) {
                                                                echo date('d-m-Y', $us->plan_selesai);
                                                            } else echo " "; ?></td>
                                                        <td><?= $us->indikator_output ?></td>
                                                        <td><?= $us->anggaran ?></td>
                                                        <td><?= $us->pic ?></td>
                                                        <td>
                                                            <?php if (!isset($us->deskripsi)) { ?>
                                                                <button id="tambah" class="btn btn-sm btn-info">Buat Rencana</button>
                                                            <?php } else { ?>
                                                                <button id="edit" class="btn btn-sm btn-success">Edit Rencana</button>
                                                            <?php } ?>
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