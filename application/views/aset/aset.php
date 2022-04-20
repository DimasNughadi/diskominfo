<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-title">
                        <h4>Table Aset </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Aset</th>
                                        <th>Nama Aset</th>
                                        <th>Jenis</th>
                                        <th>Lokasi</th>
                                        <th>Owner</th>
                                        <th>Subclass</th>
                                        <th>Used By</th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($aset as $us) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $us['no_aset']; ?></td>
                                        <td><?= $us['nama_aset']; ?></td>
                                        <td><?= $us['jenis_aset']; ?></td>
                                        <td><?= $us['owner_aset']; ?></td>
                                        <td><?= $us['lokasi_aset']; ?></td>
                                        <td><?= $us['subclass_aset']; ?></td>
                                        <td><?= $us['used_by']; ?></td>
                                        <!-- <td>
                                            <a href="<?= base_url('Aset/detail') . $us[id_aset]; ?>"></a>
                                            <a href="<?= base_url('Aset/detail') . $us[id_aset]; ?>"></a>
                                            <a href="<?= base_url('Aset/detail') . $us[id_aset]; ?>"></a>
                                        </td> -->
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
