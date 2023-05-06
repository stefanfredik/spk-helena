<div class="tab-pane fade show active" id="kriteria" role="tabpanel" aria-labelledby="kriteria-tab" tabindex="0">
    <div class="row">
        <h3 class="m-3">Data Kriteria</h3>
        <div class="row">
            <div class="col">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <h3>Tabel Kriteria</h3>
                    </div>
                    <div id="data" class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" colspacing="0">
                                <thead>
                                    <tr>
                                        <td>Kode</td>
                                        <td>Keterangan</td>
                                        <td>Nilai</td>
                                        <td>Perbaikan Bobot</td>
                                        <td>Kepentingan</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataKriteria as $dk) :
                                    ?>
                                        <tr>
                                            <td><?= $dk['keterangan'] ?></td>
                                            <td><?= $dk['kriteria']; ?></td>
                                            <td><?= $dk['nilai']; ?></td>
                                            <?php foreach ($bobotKriteria as $key => $db) {
                                                if ($dk['keterangan'] == $key) {
                                                    echo '<td>' . $db . '</td>';
                                                }
                                            } ?>
                                            <td>
                                                <?php
                                                echo match ($dk['nilai']) {
                                                    '50' => 'Sangat Penting',
                                                    '40' => 'Penting',
                                                    '30' => 'Cukup Penting',
                                                    '20' => 'Tidak Penting',
                                                    '10' => 'Sangat Tidak Penting',
                                                    default => 'Tidak Diketahui'
                                                }
                                                ?>
                                            </td>
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