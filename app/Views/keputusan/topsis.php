<div class="tab-pane fade show" id="topsis" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    <div class="row">
        <h3 class="m-3">Keputusan Metode SAW</h3>
        <div class="row">
            <div class="col">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <h3>Tabel Kriteria</h3>
                    </div>
                    <div id="data" class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered" width="100%" colspacing="0">
                                <thead>
                                    <tr class="align-middle">
                                        <th class="text-center">Rangking</th>
                                        <th>NISN</td>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</td>
                                        <th>Kelas</td>
                                        <th>Nilai Akhir</td>
                                        <th>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rank = 1;
                                    foreach ($topsisPeserta as $ps) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $rank++; ?></td>
                                            <td><?= $ps['nisn'] ?></td>
                                            <td><?= $ps['nama_lengkap'] ?></td>
                                            <td><?= $ps['jenis_kelamin'] ?></td>
                                            <td><?= $ps['kelas'] ?></td>
                                            <td><?= $ps['nilaiAkhir']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>