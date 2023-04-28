<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="loading" class="my-5 text-center" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div>Mengupload File Excel ...</div>
            </div>



            <form action="<?= $meta['url']; ?>" method="POST" id="formUpload" onsubmit="upload(event)" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="badge bg-warning p-3">
                        Agar tidak terjadi kesalahan data saat mengupload file excel. Silahkan sesuaikan format excel seusia kriteria berikut :
                    </div>
                    <div class="mt-2">
                        <ul>
                            <li>
                                Urutan tabel sesuai dengan kriteria berikut.
                                <div>
                                    <h3>Kriteria Upload File</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>NISN</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Kelas</th>
                                            <th>Nama Orang Tua</th>
                                            <th>Alamat</th>
                                        </thead>
                                    </table>
                                </div>
                            </li>
                            <li>Penulisan Tanggal Lahir sesuai format contoh berikut : 01/12/2005 </li>

                        </ul>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Silahkan Upload File Excel anda Sesuai dengan ketentuan di atas.</label>
                        <input name="excel_file" id="excel-file" type="file" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>