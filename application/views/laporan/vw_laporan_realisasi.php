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
                        <form class="" action="<?= base_url('report/exportrealisasi')  ?>" target="__blank" method="post">
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
                                        <button type="submit" name="Realisasipdf" class="btn btn-info">Export PDF</button>
                                        <button type="submit" name="Realisasiexcel" class="btn btn-info">Export Excel</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="jsgrid-table-panel">
                                <?= $this->session->flashdata('message'); ?>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tbRealisasi" class="table table-bordered table-striped" mt_getrandmax>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Risiko</th>
                                                <th>Rencana Penanganan</th>
                                                <th>Mulai</th>
                                                <th>Selesai</th>
                                                <th>Indikator Output</th>
                                                <th>PIC</th>
                                                <th>Anggaran</th>
                                                <th>Real Mulai</th>
                                                <th>Real Selesai</th>
                                                <th>Hambatan</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tb_lapReal">

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
                            $('#tbRealisasi').each(function() {
                                var tahun = $('#selectTahun').val();
                                var link = "<?= base_url('report/getRealisasi') ?>"


                                $.ajax({
                                    url: link,
                                    type: "POST",
                                    data: {
                                        'tahun': tahun
                                    },
                                    dataType: 'JSON',
                                    success: function(data) {
                                        //alert(data.length);
                                        // $('#tb_lapReal').html(data);

                                        var no = 1;
                                        var jum = 1;
                                        var i;
                                        var html = '';

                                        for (i = 0, no = 1; i < data.length; i++) {

                                            html += '<tr>';
                                            html += '<td>' + no++ + '</td>';
                                            html += '<td>' + data[i].nama_risiko + '</td>';
                                            html += '<td>' + data[i].deskripsi + '</td>';
                                            html += '<td>' + data[i].plan_mulai + '</td>';
                                            html += '<td>' + data[i].plan_selesai + '</td>';
                                            html += '<td>' + data[i].indikator_output + '</td>';
                                            html += '<td>' + data[i].pic + '</td>';
                                            html += '<td>' + data[i].anggaran + '</td>';
                                            html += '<td>' + data[i].real_mulai + '</td>';
                                            html += '<td>' + data[i].real_selesai + '</td>';
                                            html += '<td>' + data[i].hambatan + '</td>';
                                            html += '<td>' + data[i].keterangan + '</td>';

                                        }

                                        $('#tb_lapReal').html(html);

                                    },
                                    error: function() {
                                        $('#tb_lapReal').html('<tr><td colspan="12"> Tidak Ada Data </td></tr>');
                                    }
                                });
                            });

                            $('.select').on('change', function() {
                                var tahun = $('#selectTahun').val();
                                var link = "<?= base_url('report/getRealisasi') ?>"



                                $.ajax({
                                    url: link,
                                    type: "POST",
                                    data: {
                                        'tahun': tahun
                                    },
                                    dataType: 'JSON',
                                    success: function(data) {
                                        //alert(data.length);
                                        // $('#tb_lapReal').html(data);
                                        var no = 1;
                                        var jum = 1;
                                        var i;
                                        var html = '';

                                        for (i = 0, no = 1; i < data.length; i++) {
                                            html += '<tr>';
                                            html += '<td>' + no++ + '</td>';
                                            html += '<td>' + data[i].nama_risiko + '</td>';
                                            html += '<td>' + data[i].deskripsi + '</td>';
                                            html += '<td>' + data[i].plan_mulai + '</td>';
                                            html += '<td>' + data[i].plan_selesai + '</td>';
                                            html += '<td>' + data[i].indikator_output + '</td>';
                                            html += '<td>' + data[i].pic + '</td>';
                                            html += '<td>' + data[i].anggaran + '</td>';
                                            html += '<td>' + data[i].real_mulai + '</td>';
                                            html += '<td>' + data[i].real_selesai + '</td>';
                                            html += '<td>' + data[i].hambatan + '</td>';
                                            html += '<td>' + data[i].keterangan + '</td>';
                                        }

                                        $('#tb_lapReal').html(html);
                                    },
                                    error: function() {
                                        $('#tb_lapReal').html('<tr><td colspan="12" style="text-align: center;"> Tidak Ada Data </td></tr>');
                                    }
                                });
                            });
                        });
                    </script>