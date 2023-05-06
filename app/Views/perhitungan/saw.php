<div class="tab-pane fade" id="saw" role="tabpanel" aria-labelledby="saw-tab" tabindex="0">
    <div class="row">
        <h3 class="m-3">Perhitungan Metode Saw</h3>

        <div class="row">
            <div class="col">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <h3>Tabel Normalisasi</h3>
                    </div>
                    <div id="data" class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" colspacing="0">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Peserta</th>
                                        <?php foreach ($dataKriteria as $dt) : ?>
                                            <th><?= $dt['keterangan']; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($sawPeserta as $ps) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ps['nama_lengkap']; ?></td>
                                            <?php foreach ($ps['normalisasi'] as $key => $dn) : ?>
                                                <td><?= $dn ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <h3>Tabel Nilai</h3>
                    </div>
                    <div id="data" class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" colspacing="0">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Peserta</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($sawPeserta as $ps) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ps['nama_lengkap']; ?></td>
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