<div class="table-responsive">
    <table class="table table-bordered" id="table" width="100%" colspacing="0">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NISN</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Tanggal Lahir</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Nilai SAW</th>
                <th class="text-center">Nilai Topsis</th>
                <th class="text-center">Rangking</th>
                <th class="text-center">Status</th>
                <th class="text-center">Periode</th>
                <th class="text-center">Tanggal Terima</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            // dd($dataPeserta);
            foreach ($peserta as $dt) : ?>
                <tr>
                    <td class="text-center"><?= ++$no; ?></td>
                    <td><?= $dt['nisn']; ?></td>
                    <td><?= $dt['nama_lengkap']; ?></td>
                    <td><?= $dt['jenis_kelamin'] ?></td>
                    <td><?= $dt['tanggal_lahir']; ?></td>
                    <td><?= $dt['tempat_lahir']; ?></td>
                    <td><?= $dt['kelas']; ?></td>
                    <td><?= $dt['alamat']; ?></td>
                    <td><?= $dt['nilaiSaw']; ?></td>
                    <td><?= $dt['nilaiTopsis']; ?></td>
                    <td><?= $no; ?></td>
                    <td> <?= $dt['status'] == 'Menerima beasiswa BSM' ? 'Layak' : 'Tidak Layak'; ?></td>
                    <td><?= 'Periode ' . $dt['periode']; ?></td>
                    <td><?= $dt['tanggalTerima']; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>