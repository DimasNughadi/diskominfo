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
                                    <li class="breadcrumb-item"><a href="<?= base_url('aset') ?>">Data Akun</a></li>
                                    <li class="breadcrumb-item active">Tambah Data Akun</li>
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
                                <h3 class="card-title text-white">Data User</h3>
                            </div>
                            <div class="card card-primary">
                                <!-- form start -->
                                <form action="" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?= set_value('username'); ?>" id="username" placeholder="Masukkan Username">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" name="password1" value="<?= set_value('password'); ?>" placeholder="Masukkan Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" name="password2" placeholder="Masukkan Ulang Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select id="role" name="role" value="<?= set_value('role'); ?>" class="form-control custom-select">
                                                <option selected disabled hidden>Pilih Role</option>
                                                <option>Admin</option>
                                                <option>Eksekutif</option>
                                                <option>Insfratruktur</option>
                                                <option>Aptika</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="bidang">Bidang</label>
                                            <select id="bidang" name="bidang" value="<?= set_value('id_bidang'); ?>" class="form-control custom-select">
                                                <option selected disabled hidden>Pilih Bidang</option>
                                                <?php foreach ($bidang as $udt) : ?>
                                                    <?php if ($udt['nama_bidang'] != null) { ?>
                                                        <option value="<?= $udt['id_bidang']; ?>"><?= $udt['nama_bidang']; ?></option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="status" value="Active" id="status">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Daftarkan</button>
                                        <a href="<?= base_url('Akun') ?>" class="btn btn-danger">Tutup</a>
                                    </div>
                                    <!-- /.card-body -->
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->

                    <!--/.col (right) -->

                    <!-- /# row -->
                    <script>
                        function myFunction() {
                            var x = document.getElementById("password1");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }

                        function myFunction2() {
                            var x = document.getElementById("password2");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>