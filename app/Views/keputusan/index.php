<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>


<div class="row m-2">
    <div class="card p-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#saw" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Saw</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#topsis" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Topsis</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <?= $this->include("keputusan/saw"); ?>
            <?= $this->include("keputusan/topsis"); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>