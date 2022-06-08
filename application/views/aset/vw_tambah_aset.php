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
                                <li class="breadcrumb-item"><a href="<?= base_url('aset') ?>">Data Aset</a></li>
                                <li class="breadcrumb-item active">Tambah Data Aset</li>
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
                            <h3 class="card-title text-white">Data Aset</h3>
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
                                        <label for="inputStatus">Jenis Aset</label>
                                        <select id="inputStatus" name="id_jenis_aset" value="<?= set_value('id_jenis_aset'); ?>" class="form-control custom-select">
                                            <option selected disabled hidden>Pilih Jenis Aset</option>
                                            <?php foreach ($jenisaset as $udt) : ?>
                                                <?php if ($udt['nama_jenis_aset'] != null) { ?>
                                                    <option value="<?= $udt['id_jenis_aset']; ?>"><?= $udt['nama_jenis_aset']; ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Bidang</label>
                                        <select id="inputStatus" name="id_bidang" value="<?= set_value('id_bidang'); ?>" class="form-control custom-select">
                                            <option selected disabled hidden>Pilih Bidang</option>
                                            <?php foreach ($bidang as $udt) : ?>
                                                <?php if ($udt['nama_bidang'] != null) { ?>
                                                    <option value="<?= $udt['id_bidang']; ?>"><?= $udt['nama_bidang']; ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Nomor Aset</label>
                                        <input type="text" class="form-control" name="no_aset" value="<?= set_value('no_aset'); ?>" id="no_aset" placeholder="Masukkan Nomor Aset">
                                        <?= form_error('no_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Nama Aset</label>
                                        <input type="text" class="form-control" name="nama_aset" value="<?= set_value('nama_aset'); ?>" id="nama_aset" placeholder="Masukkan Nama aset">
                                        <?= form_error('nama_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="simpan" value="Simpan"  class="btn btn-primary">Simpan Data</button>
                                    <a href="<?= base_url('Aset') ?>" class="btn btn-danger">Tutup</a>
                                </div>
                                <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                    <div class="col-md-6">
                        <!-- Form Element sizes -->
                        <div class="card bg-success text-white">
                            <h3 class="card-title text-white">Detail Aset</h3>
                        </div>
                        <div class="card card-success">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Merk Aset</label>
                                    <input type="text" class="form-control" name="merk_aset" value="<?= set_value('merk_aset'); ?>" id="merk_aset" placeholder="Masukkan Owner Aset">
                                    <?= form_error('merk_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Qty</label>
                                    <input type="number" class="form-control" name="qty" value="<?= set_value('qty'); ?>" id="qty" placeholder="Masukkan Jumlah  Aset">
                                    <?= form_error('qty', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Owner Aset</label>
                                    <input type="text" class="form-control" name="owner_aset" value="<?= set_value('owner_aset'); ?>" id="owner_aset" placeholder="Masukkan Owner Aset">
                                    <?= form_error('owner_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Lokasi Aset</label>
                                    <input type="text" class="form-control" name="lokasi_aset" value="<?= set_value('lokasi_aset'); ?>" id="lokasi_aset" placeholder="Masukkan Lokasi Aset">
                                    <?= form_error('lokasi_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Subclass</label>
                                    <input type="text" class="form-control" name="subclass_aset" value="<?= set_value('subclass_aset'); ?>" id="subclass_aset" placeholder="Masukkan Subclass Aset">
                                    <?= form_error('subclass_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Pengguna</label>
                                    <input type="text" class="form-control" name="used_by" value="<?= set_value('used_by'); ?>" id="used_by" placeholder="Masukkan Pengguna Aset">
                                    <?= form_error('used_by', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <br><br>
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