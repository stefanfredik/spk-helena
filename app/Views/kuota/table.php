<div class="table-responsive">
    <table class="table table-bordered" id="table" width="100%" colspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Periode</th>
                <th>Jumlah Kuota</th>
                <th>Tanggal Terima</th>
                <th>Keterangan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;

            foreach ($dataKuota as $dt) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt['tahun']; ?></td>
                    <td><?= $dt['periode']; ?></td>
                    <td><?= $dt['jumlah_kuota']; ?></td>
                    <td><?= $dt['tanggal_terima']; ?></td>
                    <td><?= $dt['keterangan']; ?></td>
                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button onclick="remove('<?= $url; ?>', this)" class="btn btn-sm text-white btn-danger" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                            <button onclick="edit('<?= $url; ?>', this)" class="btn btn-sm  btn-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>