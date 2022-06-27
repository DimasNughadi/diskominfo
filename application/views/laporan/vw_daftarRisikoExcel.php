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
            <th style="text-align: center; vertical-align: middle;">Nama Aset</th>
            <th style="text-align: center; vertical-align: middle;">Nama Risiko</th>
            <th style="text-align: center; vertical-align: middle;">Penyebab</th>
            <th style="text-align: center; vertical-align: middle;">Dampak</th>
            <th style="text-align: center; vertical-align: middle;">Pengendalian</th>
            <th style="text-align: center; vertical-align: middle;">Keputusan</th>
            <th style="text-align: center; vertical-align: middle;">Kemungkinan Terjadi</th>
            <th style="text-align: center; vertical-align: middle;">Dampak</th>
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
                <td><?= $skp->pengendalian ?></td>
                <td><?= $skp->keputusan ?></td>
                <td><?= $skp->skala_kemungkinan ?></td>
                <td><?= $skp->skala_dampak ?></td>
            </tr>

        <?php  } ?>

    </tbody>
</table>

</body>