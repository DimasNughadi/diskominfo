<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div id="main-content">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url() . 'assets/images/profile.png' ?>" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?= $user['username']; ?></h3>

                                <p class="text-muted text-center"><?= $user['role']; ?></p>

                                <ul class="list-group list-group-unbordered mb-3">

                                    <li class="list-group-item">
                                        <b>Status</b> <a class="float-right"><?= $user['status']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Role</b> <a class="float-right"><?= $user['role']; ?></a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block disabled"><b>Info</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">

                        <div class="card card-primary">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="card-header">
                                <h3 class="card-title">Setting</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal" action="<?= base_url('User/edit/') . $user['id_user']; ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama" value="<?= $user['username']; ?>" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-10">
                                                    <select id="role" name="role" value="<?= set_value('role'); ?>" class="form-control custom-select">
                                                        <option value="Admin" <?php if ($user['role'] == 'Admin') {
                                                                                    echo 'selected="selected"';
                                                                                } ?>>Admin</option>
                                                        <option value="Eksekutif" <?php if ($user['role'] == 'Eksekutif') {
                                                                                        echo 'selected="selected"';
                                                                                    } ?>>Eksekutif</option>
                                                        <option value="Insfrastruktur" <?php if ($user['role'] == 'Insfrastruktur') {
                                                                                            echo 'selected="selected"';
                                                                                        } ?>>Insfrastruktur</option>
                                                        <option value="Aptika" <?php if ($user['role'] == 'Aptika') {
                                                                                    echo 'selected="selected"';
                                                                                } ?>>Aptika</option>
                                                    </select>
                                                </div>
                                                <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputBidang" class="col-sm-2 col-form-label">Bidang</label>
                                                <div class="col-sm-10">
                                                    <select id="bidang" name="bidang" value="<?= set_value('id_bidang'); ?>" class="form-control custom-select">
                                                        <?php foreach ($bidang as $udt) : ?>
                                                            <option <?php if ($udt['id_bidang'] == $user['id_bidang']) {
                                                                        echo 'selected="selected"';
                                                                    } ?> value="<?= $udt['id_bidang']; ?>"><?= $udt['nama_bidang']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <!-- <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="alamat" value="<?= $user['alamat']; ?>" class="form-control" id="inputName" placeholder="Alamat">
                                                </div>
                                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Kota</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="kota" value="<?= $user['kota']; ?>" class="form-control" id="inputName" placeholder="Kota">
                                                </div>
                                                <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nomor HP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="no_hp" value="<?= $user['no_hp']; ?>" class="form-control" id="inputName" placeholder="Nomor HP">
                                                </div>
                                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">File Input</label>
                                                <div class="col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" name="gambar" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile"><?= $user['gambar']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <img src="<?= base_url('assets/images/profile/') . $user['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                                                </div>
                                            </div> -->


                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <!-- Trigger -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                                        Update
                                                    </button>
                                                    <button type="reset" class="btn btn-default">
                                                        Cancel
                                                    </button>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modal-default">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Konfirmasi</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin ingin mengubah data&hellip; ?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
</div>
<!-- /.content -->

<!-- /.content-wrapper -->