<div class="table-responsive">
    <table class="table table-bordered" id="table" width="100%" colspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun Bantuan</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            // dd($dataPeserta);
            foreach ($dataPeserta as $dt) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt['tahun']; ?></td>
                    <td><?= $dt['nisn']; ?></td>
                    <td><?= $dt['nama_lengkap']; ?></td>
                    <td><?= $dt['jenis_kelamin']; ?></td>


                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?php if (in_groups("admin")) : ?>
                                <button onclick="remove('<?= $meta['url']; ?>', this)" class="btn btn-sm text-white btn-danger" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                                <button onclick="edit('<?= $meta['url']; ?>', this)" class="btn  btn-sm btn-indigo" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                            <?php endif ?>
                            <button onclick="detail('<?= $meta['url']; ?>', this)" class="btn btn-sm btn-purple" data-id="<?= $dt['id'] ?>">Detail</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>