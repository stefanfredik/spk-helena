<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>


<div class="row m-2">
    <div class="card p-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="kriteria-tab" data-bs-toggle="tab" data-bs-target="#kriteria" type="button" role="tab" aria-controls="kriteria-tab-pane" aria-selected="true">Kriteria</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="peserta-tab" data-bs-toggle="tab" data-bs-target="#peserta" type="button" role="tab" aria-controls="peserta-tab-pane" aria-selected="false">Data Peserta</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="saw-tab" data-bs-toggle="tab" data-bs-target="#saw" type="button" role="tab" aria-controls="saw-tab-pane" aria-selected="false">Saw</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="topsis-tab" data-bs-toggle="tab" data-bs-target="#topsis" type="button" role="tab" aria-controls="topsis-tab-pane" aria-selected="false">Topsis</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <?= $this->include("perhitungan/kriteria"); ?>
            <?= $this->include("perhitungan/peserta"); ?>
            <?= $this->include("perhitungan/saw"); ?>
            <?= $this->include("perhitungan/topsis"); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>