<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $siswa['nama_lengkap']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">Nama Lengkap</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $siswa['nama_lengkap'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">NISN</label>
                    </div>

                    <div class="col-md-8">
                        <p><?= $siswa['nisn'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">Kelas</label>
                    </div>

                    <div class="col-md-8">
                        <p><?= $siswa['kelas'] ?></p>
                    </div>
                </div>



                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">Tempat Lahir</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $siswa['tempat_lahir'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Lahir</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $siswa['tanggal_lahir'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">Jenis Kelamin</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $siswa['jenis_kelamin'] ?></p>
                    </div>
                </div>

                <hr>
                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">Nama Orang Tua</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $siswa['nama_orangtua'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">ALamat</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $siswa['alamat'] ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button onclick="edit('<?= $meta['url'] ?>',this)" data-id="<?= $siswa['id']; ?>" type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>