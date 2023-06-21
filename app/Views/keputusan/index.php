<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>

<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <!-- <h3 class="m-3">Perhitungan Metode SAW</h3> -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3>Tabel Keputusan SAW</h3>
                        </div>
                        <div id="data" class="card-body">
                            <div class="table-responsive">
                                <table id="saw" class="table table-bordered" width="100%" colspacing="0">
                                    <thead>
                                        <tr class="align-middle">
                                            <th class="text-center" width="80">Rangking</th>
                                            <th>NISN</td>
                                            <th>Nama Lengkap</th>
                                            <th>Kelas</td>
                                            <th>Nilai Akhir</td>
                                            <th>Keputusan</th>
                                            <th>Tahap BSM</th>
                                            <th>Tanggal Terima Bantuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rank = 1;
                                        foreach ($sawPeserta as $ps) :
                                        ?>
                                            <tr>
                                                <td class="text-center "><span class="badge bg-pink rounded rounded-circle"><?= $rank++; ?></span></td>
                                                <td><?= $ps['nisn'] ?></td>
                                                <td><?= $ps['nama_lengkap'] ?></td>
                                                <td><?= $ps['kelas'] ?></td>
                                                <td><?= $ps['nilaiAkhir']; ?></td>
                                                <td><span class="badge <?= $ps['status'] == 'Menerima beasiswa BSM' ? 'bg-success' : 'bg-danger'; ?>"><?= $ps['status'] == 'Menerima beasiswa BSM' ? 'Layak' : 'Tidak Layak'; ?></span></td>
                                                <td><?= 'Tahap ' . $ps['periode']; ?></td>
                                                <td><?= $ps['tanggalTerima']; ?></td>
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

    <div class="col-lg-6">
        <div class="row">
            <!-- <h3 class="m-3">Perhitungan Metode Topsis</h3> -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3>Tabel Keputusan Topsis</h3>
                        </div>
                        <div id="data" class="card-body">
                            <div class="table-responsive">
                                <table id="topsis" class="table table-bordered" width="100%" colspacing="0">
                                    <thead>
                                        <tr class="align-middle">
                                            <th class="text-center" width="80">Rangking</th>
                                            <th>NISN</td>
                                            <th>Nama Lengkap</th>
                                            <th>Kelas</td>
                                            <th>Nilai Akhir</td>
                                                <!-- <th>Kelayakan</th> -->
                                            <th>Keputusan</th>
                                            <th>Tahap BSM</th>
                                            <th>Tanggal Terima Bantuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rank = 1;
                                        foreach ($topsisPeserta as $ps) :
                                        ?>
                                            <tr>
                                                <td class="text-center "><span class="badge bg-pink rounded rounded-circle"><?= $rank++; ?></span></td>
                                                <td><?= $ps['nisn'] ?></td>
                                                <td><?= $ps['nama_lengkap'] ?></td>
                                                <td><?= $ps['kelas'] ?></td>
                                                <td><?= $ps['nilaiAkhir']; ?></td>
                                                <td><span class="badge <?= $ps['status'] == 'Menerima beasiswa BSM' ? 'bg-success' : 'bg-danger'; ?>"><?= $ps['status'] == 'Menerima beasiswa BSM' ? 'Layak' : 'Tidak Layak'; ?></span></td>
                                                <td><?= 'Tahap ' . $ps['periode']; ?></td>
                                                <td><?= $ps['tanggalTerima']; ?></td>
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
</div>

<?= $this->endSection(); ?>

<?= $this->section("script") ?>
<script>
    const config = {
        columnDefs: [{
            width: 20,
            targets: 0
        }],
        language: {
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: ' <i class="bi bi-arrow-right-circle"></i>',
                previous: '<i class="bi bi-arrow-left-circle"></i>'
            },
            zeroRecords: "Belum ada data.",
            search: "Cari:",
            lengthMenu: "Tampil _MENU_ kolom",
            info: "Kolom _START_ sampai _END_ dari _TOTAL_ kolom"
        }
    };

    $('#saw').DataTable(config)
    $('#topsis').DataTable(config)
</script>
<?= $this->endSection() ?>