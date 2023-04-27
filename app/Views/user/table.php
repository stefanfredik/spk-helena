<div class="table-responsive">
    <table class="table" id="table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Username</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($dataUser as $dt) : ?>
                <tr>
                    <td><i class="text-pink border  p-2 border-pink rounded-circle bi bi-person"></i></td>
                    <td><?= $dt['nama_user']; ?></td>
                    <td><?= $dt['username']; ?></td>
                    <td><?= $dt['jabatan']; ?></td>
                    <td>
                        <div class="badge bg-pink text-white rounded-pill">Active</div>
                    </td>
                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button onclick="remove('<?= $url; ?>', this)" class="btn btn-sm text-white btn-pink" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                            <button onclick="edit('<?= $url; ?>', this)" class="btn btn-sm  btn-indigo" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>