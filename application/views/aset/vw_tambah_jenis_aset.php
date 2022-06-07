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
                                    <li class="breadcrumb-item"><a href="<?= base_url('jenisaset') ?>">Data Jenis Aset</a></li>
                                    <li class="breadcrumb-item active">Tambah Data Jenis Aset</li>
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
                                <h3 class="card-title text-white">Data Jenis Aset</h3>
                            </div>
                            <div class="card card-primary">
                                <!-- form start -->
                                <form action="" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Nama Jenis Aset</label>
                                            <input type="text" class="form-control" name="nama_jenis_aset" value="<?= set_value('nama_jenis_aset'); ?>" id="nama_jenis_aset" placeholder="Masukkan Nama Jenis Aset">
                                            <?= form_error('nama_jenis_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Tambah</button>
                                        <a href="<?= base_url('JenisAset') ?>" class="btn btn-danger">Tutup</a>
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