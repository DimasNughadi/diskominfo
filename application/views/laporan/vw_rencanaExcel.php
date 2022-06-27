<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Daftar_Risiko.xls"); //ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>

<h1>DAFTAR RISIKO</h1>
<h2>Nama User : <?php echo $this->session->userdata('username') ?></h2>


<table class="items" width="100%" style="font-size:9pt; border-collapse: collapse; " cellpadding="8" autosize="1.8">
    <thead>
        <tr style="background-color: rgb(162, 216, 250);">
            <th style="text-align: center; vertical-align: middle;">No</th>
            <th style="text-align: center; vertical-align: middle;">Risiko</th>
            <th style="text-align: center; vertical-align: middle;">Penyebab</th>
            <th style="text-align: center; vertical-align: middle;">Tingkat Risiko</th>
            <th style="text-align: center; vertical-align: middle;">Penanganan Yang Sudah Ada</th>
            <th style="text-align: center; vertical-align: middle;">Rencana Penanganan</th>
            <th style="text-align: center; vertical-align: middle;">Mulai</th>
            <th style="text-align: center; vertical-align: middle;">Selesai</th>
            <th style="text-align: center; vertical-align: middle;">Indikator Output</th>
            <th style="text-align: center; vertical-align: middle;">PIC</th>
            <th style="text-align: center; vertical-align: middle;">Anggaran</th>
        </tr>
    </thead>
    <tbody>

        <?php $i = 1; ?>
        <?php foreach ($rencana as $us) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $us->nama_risiko ?></td>
                <td><?= $us->penyebab ?></td>
                <td><?= $us->tingkat_risiko ?></td>
                <td><?= $us->pengendalian ?></td>
                <td><?= $us->deskripsi ?></td>
                <td><?php if (!empty((int)$us->plan_mulai)) {
                        echo date('d-m-Y', strtotime($us->plan_mulai));
                    } else echo " "; ?></td>
                <td><?php if (!empty((int)$us->plan_selesai)) {
                        echo date('d-m-Y', strtotime($us->plan_selesai));
                    } else echo " "; ?></td>
                <td><?= $us->indikator_output ?></td>
                <td><?= $us->pic ?></td>
                <td><?php if (!empty((int)$us->anggaran)) {
                        echo "Rp" . number_format($us->anggaran, 2, ',', '.');;
                    } else echo "Rp.0"; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>

    </tbody>
</table>

</body>