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
                                <li class="breadcrumb-item"><a href="<?= base_url('resiko') ?>">Identifikasi Resiko</a></li>
                                <li class="breadcrumb-item active">Tambah Risiko</li>
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
                            <h3 class="card-title text-white">Identifikasi Risiko</h3>
                        </div>
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_user" value="<?= $user['id_user']; ?>" id="id_user" readonly>
                                        <label for="exampleInputName">User</label>
                                        <input type="text" class="form-control" name="nama_user" value="<?= $user['username']; ?>" id="nama_user" readonly>
                                        <?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="inputStatus">Nama Aset</label>
                                                <input type="hidden" class="form-control" name="id_aset" value="<?= $id; ?>" id="nama_aset" readonly>
                                                <?php foreach ($aset as $ja) : ?>
                                                    <?php if ($ja['id_aset'] == $id) { ?>
                                                        <input type="text" class="form-control" name="nama_user" value="<?= $ja['nama_aset']; ?>" readonly>
                                            </div>
                                            <div class="col">
                                                <label for="inputStatus">Lokasi Aset</label>
                                                <input type="text" class="form-control" value="<?= $ja['lokasi_aset']; ?>" readonly>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Nama Risiko</label>
                                        <input type="text" class="form-control" name="nama_risiko" value="<?= set_value('nama_risiko'); ?>" id="nama_risiko" placeholder="Masukkan Nama Risiko">
                                        <?= form_error('nama_risiko', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Tahun Risiko</label>
                                        <input type="number" class="form-control" name="tahun" value="<?= set_value('tahun'); ?>" id="tahun" placeholder="Masukkan Tahun Risiko">
                                        <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Penyebab</label>
                                        <textarea class="form-control" rows="6" name="penyebab" value="<?= set_value('penyebab'); ?>" id="penyebab" placeholder="Masukkan Penyebab Risiko"></textarea>
                                        <?= form_error('penyebab', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Dampak</label>
                                        <textarea class="form-control" rows="6" name="dampak" value="<?= set_value('dampak'); ?>" id="dampak" placeholder="Masukkan Dampak Risiko"></textarea>
                                        <?= form_error('dampak', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Pengendalian</label>
                                        <textarea class="form-control" rows="6" name="pengendalian" value="<?= set_value('pengendalian'); ?>" id="pengendalian" placeholder="Masukkan Pengendalian Risiko"></textarea>
                                        <?= form_error('pengendalian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Keputusan</label>
                                        <textarea class="form-control" rows="6" name="keputusan" value="<?= set_value('keputusan'); ?>" id="keputusan" placeholder="Masukkan Keputusan Risiko"></textarea>
                                        <?= form_error('keputusan', '<small class="text-danger pl-3">', '</small>'); ?>
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
                            <h3 class="card-title text-white">Penilaian Risiko</h3>
                        </div>
                        <div class="card card-success">
                            <div class="card-body">
                                <div class="col-sm-10">
                                    <label for="exampleInputName">Skala Dampak</label>
                                    <select class="form-control" name="skala_dampak">
                                        <option value="1" selected="selected">Tidak Berarti</option>
                                        <option value="2">Kecil</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Besar</option>
                                        <option value="5">Besar Sekali</option>
                                    </select>
                                </div>
                                <div class="col-sm-10">
                                    <label for="exampleInputName">Skala Kemungkinan</label>
                                    <select class="form-control" name="skala_kemungkinan">
                                        <option value="1" selected="selected">Sangat Jarang</option>
                                        <option value="2">Jarang</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Sering</option>
                                        <option value="5">Sangat Sering</option>
                                    </select>
                                </div>
                                <br />
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-white">
                                <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Simpan Data</button>
                                <a href="<?= base_url('Resiko') ?>" class="btn btn-danger">Tutup</a>
                            </div>
                        </div>
                        <!-- /.card -->
                        </form>
                    </div>
                    <div class="col-lg-12">

                        <!-- /# column -->
                    </div>
                    <!-- /# row -->