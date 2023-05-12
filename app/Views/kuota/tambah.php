<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= $url; ?>" method="" id="formTambah" onsubmit="save(event)">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Tahun</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="tahun" id="">
                                <?php for ($i = 2015; $i < 2030; $i++) :   ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Periode</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="periode" id="">
                                <?php for ($i = 1; $i <= 5; $i++) :   ?>
                                    <option value="<?= $i; ?>">Periode <?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Jumlah Kuota</label>
                        </div>
                        <div class="col-md-8">
                            <input name="jumlah_kuota" type="number" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Terima</label>
                        </div>
                        <div class="col-md-8">
                            <input name="tanggal_terima" type="date" class="form-control" required>
                        </div>
                    </div>

                    <!-- <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Keterangan</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="keterangan" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>