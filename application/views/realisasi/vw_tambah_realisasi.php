<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 p-r-0 title-margin-right">
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
                                <li class="breadcrumb-item"><a href="<?= base_url('rencana') ?>">Rencana Penanganan</a></li>
                                <li class="breadcrumb-item active">Tambah Rencana Penanganan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <div id="main-content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card bg-primary text-white">
                            <h3 class="card-title text-white">Detail Risiko</h3>
                        </div>
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_risiko" value="<?= $realisasi['id_risiko']; ?>" id="id_risiko" readonly>
                                        <label for="exampleInputName">Nama Risiko</label>
                                        <input type="text" class="form-control" name="nama_user" value="<?= $realisasi['nama_risiko']; ?>" id="nama_user" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Penyebab</label>
                                        <input type="text" class="form-control" name="penyebab" value="<?= $realisasi['penyebab']; ?>" id="penyebab" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Dampak</label>
                                        <input type="text" class="form-control" name="dampak" value="<?= $realisasi['dampak']; ?>" id="dampak" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Pengendalian Yang Sudah Ada</label>
                                        <input type="text" class="form-control" name="pengendalian" value="<?= $realisasi['pengendalian']; ?>" id="pengendalian" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Deskripsi RTP</label>
                                        <input type="text" class="form-control" name="deskripsi" value="<?= $realisasi['deskripsi']; ?>" id="deskripsi" placeholder="Masukkan Deskripsi Rencana Pengendalian Risiko" readonly> 
                                        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Plan Mulai</label>
                                        <input type="date" class="form-control" name="plan_mulai" value="<?= $realisasi['plan_mulai']; ?>" id="plan_mulai" placeholder="Masukkan Deskripsi Rencana Pengendalian Risiko" readonly>
                                        <?= form_error('plan_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Plan Selesai</label>
                                        <input type="date" class="form-control" name="plan_selesai" value="<?= $realisasi['plan_selesai']; ?>" id="plan_selesai" placeholder="Masukkan Deskripsi Rencana Pengendalian Risiko" readonly>
                                        <?= form_error('plan_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Indikator Output</label>
                                        <input type="text" class="form-control" name="indikator_output" value="<?= $realisasi['indikator_output']; ?>" id="indikator_output" placeholder="Masukkan Indikator Output" readonly>
                                        <?= form_error('indikator_output', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">PIC</label>
                                        <select id="inputStatus" name="pic" class="form-control custom-select" disabled>
                                            <option selected disabled>Pilih Bidang</option>
                                            <?php foreach ($bidang as $udt) : ?>
                                                <option <?php if ($udt['nama_bidang'] == $rencana['pic']) {
                                                            echo 'selected="selected"';
                                                        } ?> value="<?= $udt['nama_bidang']; ?>"><?= $udt['nama_bidang']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Status</label>
                                        <input type="text" class="form-control" name="status" value="Open" id="status" placeholder="Masukkan Status" readonly>
                                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                </div>

                                <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                    <div class="col-md-6">
                        <!-- Form Element sizes -->
                        <div class="card bg-success text-white">
                            <h3 class="card-title text-white">Realisasi Penanganan Risiko</h3>
                        </div>
                        <div class="card card-success">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputName">Hambatan</label>
                                    <input type="text" class="form-control" name="hambatan" value="<?= set_value('hambatan'); ?>" id="hambatan" placeholder="Masukkan Hambatan Realisasi Pengendalian Risiko">
                                    <?= form_error('hambatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Real Mulai</label>
                                    <input type="date" class="form-control" name="real_mulai" value="<?= set_value('real_mulai'); ?>" id="real_mulai" require>
                                    <?= form_error('real_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Real Selesai</label>
                                    <input type="date" class="form-control" name="real_selesai" value="<?= set_value('real_selesai'); ?>" id="real_selesai" require>
                                    <?= form_error('real_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" value="<?= set_value('keterangan'); ?>" id="keterangan" placeholder="Masukkan Keterangan Realisasi Pengendalian Risiko">
                                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="card-footer bg-white">
                                    <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Simpan Data</button>
                                    <a href="<?= base_url('realisasi') ?>" class="btn btn-danger">Tutup</a>
                                </div>
                                <br />
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        </form>
                    </div>
                    <div class="col-lg-12">

                        <!-- /# column -->
                    </div>
                    <!-- /# row -->