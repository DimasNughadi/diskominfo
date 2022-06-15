<head>
    <title>Report Daftar Risiko</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        table.items {
            border: 0.1mm solid #000000;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
            border-top: 0.1mm solid #000000;
            border-bottom: 0.1mm solid #000000;
        }

        .items th {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
            border-top: 0.1mm solid #000000;
            border-bottom: 0.1mm solid #000000;
        }

        table thead td {
            background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }
    </style>
</head>

<body>

    <!--mpdf
    <htmlpageheader name="myheader">
        <table width="100%" style="font-size: 9pt; padding-top: 1mm; border-bottom: 1px solid #000000;">
            <tr>
                <td rowspan="2" width="6%" align="center">
                    <img src="<?= base_url() . 'images/setwapres.png' ?>" height="50" width="50">
                </td>
                <td style="vertical-align: bottom;">
                    SEKRETARIAT WAKIL PRESIDEN
               </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    SISTEM INFORMASI MONITORING MANAJEMEN RISIKO
                </td>
                <td style="text-align: right;">
                    Daftar Risiko - <?php echo $this->session->userdata('nama_unit') ?>
                </td>
            </tr>
        </table>
    </htmlpageheader>
    
    <htmlpagefooter name="myfooter">
    <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
    Page {PAGENO} of {nb}
    </div>
    </htmlpagefooter>

    <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
    <sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

    <table class="items" width="100%" style="font-size:9pt; border-collapse: collapse; " cellpadding="8" autosize="1.8">
        <thead>
            <tr style="background-color: rgb(162, 216, 250);">
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
                    <td><?= $skp->skala_dampak ?></td>
                    <td><?= $skp->skala_kemungkinan ?></td>
                </tr>

            <?php  } ?>

        </tbody>
    </table>

</body>