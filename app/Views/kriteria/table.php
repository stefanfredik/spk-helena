<?php
$allNilaiKriteria = 0;
foreach ($dataKriteria as $dt) {
    $allNilaiKriteria += $dt["nilai"];
}

function hitungBobot(int $nk, float $allNk)
{
    if ($nk == 0 || $allNk == 0) {
        return 0;
    }
    return number_format(($nk / $allNk), 2);
}
?>


<div class="table-responsive">
    <table class="table table-bordered" id="table" width="100%" colspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                <th>Keterangan</th>
                <th>Bobot</th>
                <th>Perbaikan Bobot</th>
                <th>Cost/Benefit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;

            foreach ($dataKriteria as $dt) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt['kriteria']; ?></td>
                    <td><?= $dt['keterangan']; ?></td>
                    <td><?= $dt['nilai']; ?></td>
                    <td><?= hitungBobot($dt['nilai'], $allNilaiKriteria) ?></td>
                    <td><?= $dt['type']; ?></td>
                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button onclick="remove('<?= $url; ?>', this)" class="btn btn-sm text-white btn-danger" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                            <button onclick="edit('<?= $url; ?>', this)" class="btn btn-sm  btn-indigo" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>