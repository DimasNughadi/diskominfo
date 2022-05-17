<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <br>
                            <h2>Form Tambah Data Aset</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# row -->
            <div id="main-content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Aset</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">User</label>
                                        <input type="text" class="form-control" name="id_user" value="<?= $user['id_user']; ?>" id="id_user" readonly>
                                        <?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Nomor Aset</label>
                                        <input type="text" class="form-control" name="no_aset" value="<?= set_value('no_aset'); ?>" id="no_aset" placeholder="Masukkan Nomor Aset">
                                        <?= form_error('no_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Nama Aset</label>
                                        <input type="text" class="form-control" name="nama_aset" value="<?= set_value('nama_aset'); ?>" id="nama_aset" placeholder="Masukkan nama aset">
                                        <?= form_error('nama_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Jenis Aset</label>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option selected disabled>Pilih jenis aset</option>
                                                <option value="Fisik">Fisik</option>
                                                <option value="Non Fisik">Non Fisik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                </div>
                                <!-- /.card-body -->


                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                    <div class="col-md-6">
                        <!-- Form Element sizes -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Detail Aset</h3>
                            </div>
                            <div class="card-body">
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
                        <div class="card-footer">
                            <button type="submit" name="tambah" class="btn btn-primary">Simpan Data</button>
                            <a href="<?= base_url('Aset') ?>" class="btn btn-danger">Tutup</a>
                        </div>
                        <!-- /.card -->
                        </form>
                    </div>
                    <div class="col-lg-12">

                        <!-- /# column -->
                    </div>
                    <!-- /# row -->