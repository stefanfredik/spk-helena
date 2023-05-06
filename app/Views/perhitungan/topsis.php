<div class="tab-pane fade" id="topsis" role="tabpanel" aria-labelledby="topsis-tab" tabindex="0">
    <div class="row">
        <h3 class="m-3">Perhitungan Metode Topsis</h3>
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
                                    foreach ($topsisPeserta as $ps) :
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
                        <h3>Tabel Normalisasi Terbobot</h3>
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
                                    foreach ($topsisPeserta as $ps) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ps['nama_lengkap']; ?></td>
                                            <?php foreach ($ps['normalisasiTerbobot'] as $key => $dn) : ?>
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
                        <h3>Tabel A Plus dan A Minus</h3>
                    </div>
                    <div id="data" class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" colspacing="0">
                                <thead>
                                    <tr>
                                        <th width="80px">Kriteria</th>
                                        <?php foreach ($dataKriteria as $dt) : ?>
                                            <th><?= $dt['keterangan']; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>A Plus</td>
                                        <?php
                                        foreach ($topsisAplus as $key => $plus) : ?>
                                            <td><?= $plus; ?></td>
                                        <?php endforeach; ?>
                                    </tr>

                                    <tr>
                                        <td>A Minus</td>
                                        <?php
                                        foreach ($topsisAminus as $key => $minus) : ?>
                                            <td><?= $minus; ?></td>
                                        <?php endforeach; ?>
                                    </tr>

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
                        <h3>Tabel Solusi Ideal</h3>
                    </div>
                    <div id="data" class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" colspacing="0">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Peserta</th>
                                        <th>Ideal Positive</th>
                                        <th>Ideal Negative</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($topsisPeserta as $ps) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ps['nama_lengkap']; ?></td>
                                            <td><?= $ps['idealPositive']; ?></td>
                                            <td><?= $ps['idealNegative']; ?></td>
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
                                    foreach ($topsisPeserta as $ps) :
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