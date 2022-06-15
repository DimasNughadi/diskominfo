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
                        <form class="" action="<?= base_url('report/exportdaftarrisiko')  ?>" target="__blank" method="post">
                            <div class="col-md-4">
                                <label for="">Pilih Tahun </label>
                                <div class="input-group input-group-md">
                                    <select class="form-control" name="tahun" id="selectTahunDR">
                                        <option value="">-- Semua -- </option>
                                        <?php foreach ($select as $periode) : ?>
                                            <?php echo $periode->tahun; ?>
                                            <option value="<?= $periode->tahun ?>"><?= $periode->tahun ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    &nbsp;
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
                                    <table id="tbDR" class="table table-bordered table-striped" mt_getrandmax>
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Aset</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Risiko</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Penyebab</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Dampak</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Pengendalian</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Keputusan</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Kemungkinan Terjadi</th>
                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Dampak</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tb_lapDR">
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#tbDR').each(function() {
                                var tahun = $('#selectTahunDR').val();
                                var link = "<?= base_url('report/getDR') ?>"

                                $.ajax({
                                    url: link,
                                    type: "POST",
                                    data: {
                                        'tahun': tahun
                                    },
                                    dataType: 'JSON',
                                    success: function(data) {
                                        //alert(data.length);
                                        // $('#tb_lapDR').html(data);
                                        var no = 1;
                                        var jum1 = 1;
                                        var jum2 = 1;
                                        var i;
                                        var html = '';

                                        for (i = 0, no = 1; i < data.length; i++) {
                                            if (jum2 <= 1) {
                                                var jmlpk = data[i].rowpk;
                                                if (jmlpk == 0) {
                                                    jmlpk = 1;
                                                }
                                                html += '<tr><td rowspan="' + jmlpk + '">' + no++ + '</td>';
                                                html += '<td rowspan="' + jmlpk + '">' + data[i].nama_risiko + '</td>';
                                                jum2 = data[i].rowpk;
                                            } else {
                                                jum2 = jum2 - 1;
                                            }

                                            if (jum1 <= 1) {
                                                var jmlskp = data[i].risiko;
                                                if (jmlskp == 0) {
                                                    jmlskp = 1;
                                                }
                                                html += '<td rowspan="' + jmlskp + '">' + data[i].nama_skp + '</td>';
                                                jum1 = data[i].risiko;
                                            } else {
                                                jum1 = jum1 - 1;
                                            }

                                            html += '<td>' + data[i].nama_risiko + '</td>';
                                            html += '<td>' + data[i].nama_risk + '</td>';
                                            html += '<td>' + data[i].deskripsi_cause + '</td>';
                                            html += '<td>' + data[i].deskripsi_pengendalian + '</td>';
                                            html += '<td>' + data[i].sisa_risk + '</td>';
                                            html += '<td>' + data[i].frekuensi + '</td>';
                                            html += '<td>' + data[i].dampak + '</td></tr>';
                                        }

                                        $('#tb_lapDR').html(html);
                                    },
                                    error: function() {
                                        $('#tb_lapDR').html('<tr><td colspan="10"> Tidak Ada Data </td></tr>');
                                    }
                                });
                            });

                            $('#selectTahunDR').on('change', function() {
                                var tahun = $('#selectTahunDR').val();
                                var link = "<?= base_url('report/getDR') ?>"


                                $.ajax({
                                    url: link,
                                    type: "POST",
                                    data: {
                                        'tahun': tahun
                                    },
                                    dataType: 'JSON',
                                    success: function(data) {
                                        // $('#tb_lapDR').html(data);
                                        //alert('Berhasil');
                                        var no = 1;
                                        var jum1 = 1;
                                        var jum2 = 1;
                                        var i;
                                        var html = '';

                                        for (i = 0, no = 1; i < data.length; i++) {
                                            if (jum2 <= 1) {
                                                var jmlpk = data[i].rowpk;
                                                if (jmlpk == 0) {
                                                    jmlpk = 1;
                                                }
                                                html += '<tr><td rowspan="' + jmlpk + '">' + no++ + '</td>';
                                                html += '<td rowspan="' + jmlpk + '">' + data[i].nama_ik + '</td>';
                                                jum2 = data[i].rowpk;
                                            } else {
                                                jum2 = jum2 - 1;
                                            }

                                            if (jum1 <= 1) {
                                                var jmlskp = data[i].rowskp;
                                                if (jmlskp == 0) {
                                                    jmlskp = 1;
                                                }
                                                html += '<td rowspan="' + jmlskp + '">' + data[i].nama_skp + '</td>';
                                                jum1 = data[i].rowskp;
                                            } else {
                                                jum1 = jum1 - 1;
                                            }

                                            html += '<td>' + data[i].nama_sop + '</td>';
                                            html += '<td>' + data[i].nama_risk + '</td>';
                                            html += '<td>' + data[i].deskripsi_cause + '</td>';
                                            html += '<td>' + data[i].deskripsi_pengendalian + '</td>';
                                            html += '<td>' + data[i].sisa_risk + '</td>';
                                            html += '<td>' + data[i].frekuensi + '</td>';
                                            html += '<td>' + data[i].dampak + '</td></tr>';
                                        }

                                        $('#tb_lapDR').html(html);

                                    },
                                    error: function() {
                                        $('#tb_lapDR').html('<tr><td colspan="10"> Tidak Ada Data </td></tr>');
                                    }
                                });
                            });
                        });
                    </script>