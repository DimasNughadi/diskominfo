<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
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
                                <li class="breadcrumb-item"><a href="resiko"><?= $judul ?></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>

            <!-- /# row -->
            <div id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="" action="<?= base_url('unit_kerja/laporan/exportdaftarrisiko')  ?>" target="__blank" method="post">
                            <div class="col-md-4">
                                <label for="">Pilih Tahun </label>
                                <div class="input-group input-group-md">
                                    <select class="form-control" name="tahun_pk" id="selectTahunDR">
                                        <option value="">-- Semua -- </option>
                                        <?php foreach ($select as $periode) : ?>
                                            <?php echo $periode->tahun_pk; ?>
                                            <option value="<?= $periode->tahun_pk ?>"><?= $periode->tahun_pk ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="submit" name="DRpdf" class="btn btn-info">Export PDF</button>
                                        <button type="submit" name="DRexcel" class="btn btn-info">Export Excel</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="jsgrid-table-panel">
                                <?= $this->session->flashdata('message'); ?>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped" mt_getrandmax>
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Aset</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Risiko</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Penyebab</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Dampak</th>
                                                <th colspan="3" style="text-align: center; vertical-align: middle;">Penilaian Risiko</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Pengendalian</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Keputusan</th>
                                                <th rowspan="2" style="width: 8%; text-align: center; vertical-align: middle;">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center; vertical-align: middle;">SD</th>
                                                <th style="text-align: center; vertical-align: middle;">SK</th>
                                                <th style="text-align: center; vertical-align: middle;">TR</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php $noskp = 1;
                                            $jum = 1; ?>
                                            <?php foreach ($resiko as $skp) { ?>
                                                <tr>
                                                    <?php

                                                    if ($jum <= 1) {
                                                        $jmlrow = $skp->rowpk;
                                                        if ($jmlrow == 0) {
                                                            $jmlrow = 1;
                                                        }
                                                    ?>
                                                        <td rowspan="<?= $jmlrow ?>"><?= $noskp ?></td>
                                                        <td rowspan="<?= $jmlrow ?>"><?= $skp->nama_aset ?></td>
                                                    <?php
                                                        $jum = $skp->rowpk;
                                                        $noskp++;
                                                    } else {
                                                        $jum = $jum - 1;
                                                    }
                                                    ?>
                                                    <td><?= $skp->nama_risiko ?></td>
                                                    <td><?= $skp->penyebab ?></td>
                                                    <td><?= $skp->dampak ?></td>
                                                    <td><?= $skp->skala_dampak ?></td>
                                                    <td><?= $skp->skala_kemungkinan ?></td>
                                                    <td><?= $skp->tingkat_risiko ?></td>
                                                    <td><?= $skp->pengendalian ?></td>
                                                    <td><?= $skp->keputusan ?></td>

                                                    <td>
                                                        <!-- Trigger Edit -->
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-success<?php echo $skp->id_risiko; ?>">
                                                            <i class="ti-pencil-alt"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modal-success<?php echo $skp->id_risiko; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-success">
                                                                    <div class="modal-header">
                                                                        <h4 class="text-light">Edit Data</h4>
                                                                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                                                                            <i class="fa fa-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="text-light">Anda yakin ingin mengubah data ini&hellip; ?</p>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                        <a href="<?= base_url('resiko/edit/') . $skp->id_risiko; ?>" class="btn btn-outline-light">Ubah</a>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->

                                                        <!-- Trigger Hapus -->
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger<?php echo $skp->id_risiko; ?>">
                                                            <i class="ti-trash"></i>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modal-danger<?php echo $skp->id_risiko; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-danger">
                                                                    <div class="modal-header">
                                                                        <h4 class="text-light">Hapus Data Risiko</h4>
                                                                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                                                                            <i class="fa fa-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="card-title text-light">Anda yakin akan menghapus data ini&hellip; ?</p>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
                                                                        <a href="<?= base_url('Resiko/hapus/') . $skp->id_risiko; ?>" class="btn btn-outline-light">Simpan Perubahan</a>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </td>

                                                </tr>

                                            <?php  } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->