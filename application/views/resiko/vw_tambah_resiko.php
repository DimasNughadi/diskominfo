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
                                <li class="breadcrumb-item"><a href="<?= base_url('resiko') ?>">Variabel Resiko</a></li>
                                <li class="breadcrumb-item active">Tambah Variabel Resiko</li>
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
                            <h3 class="card-title text-white">Data Variabel Resiko</h3>
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
                                        <label for="exampleInputName">Nama Risiko</label>
                                        <input type="text" class="form-control" name="nama_risiko" value="<?= set_value('nama_risiko'); ?>" id="nama_risiko" placeholder="Masukkan Nama Risiko">
                                        <?= form_error('no_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Nama Aset</label>
                                        <select id="inputStatus" name="id_aset" value="<?= set_value('id_aset'); ?>" class="form-control custom-select">
                                            <option selected disabled>Pilih Aset</option>
                                            <?php foreach ($aset as $udt) : ?>
                                                <?php if ($udt['nama_aset'] != null) { ?>
                                                    <option value="<?= $udt['id_aset']; ?>"><?= $udt['nama_aset']; ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Simpan Data</button>
                                    <a href="<?= base_url('Resiko') ?>" class="btn btn-danger">Tutup</a>
                                </div>
                                <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-lg-12">

                        <!-- /# column -->
                    </div>
                    <!-- /# row -->