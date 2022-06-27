<head>
    <title>Report Rencana Pengendalian Risiko</title>
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


    <htmlpageheader name="myheader">
        <table width="100%" style="font-size: 9pt; padding-top: 1mm; border-bottom: 1px solid #000000;">
            <tr>
                <td rowspan="2" width="6%" align="center">
                    <img src="<?= base_url() . 'assets/images/riau.png' ?>" height="50" width="80">
                </td>
                <td style="vertical-align: bottom;">
                    DINAS KOMUNIKASI INFORMATIKA DAN STATISTIK PROVINSI RIAU
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    SISTEM INFORMASI MONITORING MANAJEMEN RISIKO
                </td>
                <td style="text-align: right;">
                    Daftar Rencana Pengendalian - <?php echo $this->session->userdata('username') ?>
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