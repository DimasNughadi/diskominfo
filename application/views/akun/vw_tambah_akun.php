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
                                        <input type="text" class="form-control" name="no_aset" value="<?= set_value('username'); ?>" id="username" placeholder="Masukkan Username">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Password</label>
                                        <input type="password" class="form-control" name="password" value="<?= set_value('password'); ?>" id="password1" placeholder="Masukkan Password">
                                        <input type="checkbox" class="mt-3" id="Check1" onclick="myFunction()">
                                        <label class="form-check-label" for="Check1">Show Password</label>
                                        <?= form_error('password1   ', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Verifikasi Password</label>
                                        <input type="Password" class="form-control" name="password2" value="<?= set_value('password'); ?>" id="password2" placeholder="Ulangi Password">
                                        <input type="checkbox" class="mt-3" id="Check2" onclick="myFunction2()">
                                        <label class="form-check-label" for="Check2">Show Password</label>
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Role</label>
                                        <select id="inputStatus" name="id_bidang" value="<?= set_value('role'); ?>" class="form-control custom-select">
                                            <option selected disabled>Pilih Role</option>
                                            <option>Admin</option>
                                            <option>User</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Bidang</label>
                                        <select id="inputStatus" name="id_bidang" value="<?= set_value('id_bidang'); ?>" class="form-control custom-select">
                                            <option selected disabled>Pilih Bidang</option>
                                            <?php foreach ($bidang as $udt) : ?>
                                                <?php if ($udt['nama_bidang'] != null) { ?>
                                                    <option value="<?= $udt['id_bidang']; ?>"><?= $udt['nama_bidang']; ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="status" value="Active" id="status" placeholder="Masukkan Username">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Daftarkan</button>
                                    <a href="<?= base_url('Akun') ?>" class="btn btn-danger">Tutup</a>
                                </div>
                                <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                

                        <!-- /.card -->
                        </form>
                    <div class="col-lg-12">

                        <!-- /# column -->
                    </div>
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