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
                                    <select class="form-control select" name="tahun" id="selectTahun">
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
                                                <th>No</th>
                                                <th>Nama Aset</th>
                                                <th>Nama Risiko</th>
                                                <th>Penyebab</th>
                                                <th>Dampak</th>
                                                <th>Pengendalian</th>
                                                <th>Keputusan</th>
                                                <th>Kemungkinan Terjadi</th>
                                                <th>Dampak</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tb_lapDR"></tbody>
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
                                var tahun = $('#selectTahun').val();
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
                                        var jum = 1;
                                        var i;
                                        var html = '';         

                                        for (i = 0, no = 1; i < data.length; i++) {
                                            html += '<tr>';
                                            if (jum <= 1) {
                                                var jmlpk = data[i].rowpk;
                                                if (jmlpk == 0) {
                                                    jmlpk = 1;
                                                }
                                                html += '<td rowspan="' + jmlpk + '">' + no++ + '</td>';
                                                html += '<td rowspan="' + jmlpk + '">' + data[i].nama_aset + '</td>';
                                                jum = data[i].rowpk;
                                            } else {
                                                jum = jum - 1;
                                            }

                                            html += '<td>' + data[i].nama_risiko + '</td>';
                                            html += '<td>' + data[i].penyebab + '</td>';
                                            html += '<td>' + data[i].pengendalian + '</td>';
                                            html += '<td>' + data[i].dampak + '</td>';
                                            html += '<td>' + data[i].keputusan + '</td>';
                                            html += '<td>' + data[i].skala_kemungkinan + '</td>';
                                            html += '<td>' + data[i].skala_dampak + '</td>';
                                        }

                                        $('#tb_lapDR').html(html);
                                    },
                                    error: function() {
                                        $('#tb_lapDR').html('<tr><td colspan="10"> Tidak Ada Data </td></tr>');
                                    }
                                });
                            });

                            $('.select').on('change', function() {
                                var tahun = $('#selectTahun').val();
                                var link = "<?= base_url('report/getDR') ?>"


                                $.ajax({
                                    url: link,
                                    type: "POST",
                                    data: {
                                        'tahun': tahun
                                    },
                                    dataType: 'JSON',
                                    success: function(data) {
                                        var no = 1;
                                        var jum = 1;
                                        var i;
                                        var html = '';

                                        for (i = 0, no = 1; i < data.length; i++) {
                                            html += '<tr>';
                                            if (jum <= 1) {
                                                var jmlpk = data[i].rowpk;
                                                if (jmlpk == 0) {
                                                    jmlpk = 1;
                                                }
                                                html += '<td rowspan="' + jmlpk + '">' + no++ + '</td>';
                                                html += '<td rowspan="' + jmlpk + '">' + data[i].nama_aset + '</td>';
                                                jum = data[i].rowpk;
                                            } else {
                                                jum = jum - 1;
                                            }

                                            html += '<td>' + data[i].nama_risiko + '</td>';
                                            html += '<td>' + data[i].penyebab + '</td>';
                                            html += '<td>' + data[i].pengendalian + '</td>';
                                            html += '<td>' + data[i].dampak + '</td>';
                                            html += '<td>' + data[i].keputusan + '</td>';
                                            html += '<td>' + data[i].skala_kemungkinan + '</td>';
                                            html += '<td>' + data[i].skala_dampak + '</td>';
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