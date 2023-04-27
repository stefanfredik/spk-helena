<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <button data-url="<?= '/' . $meta['url'] . '/tambah'; ?>" class="rounded mb-2 btn btn-pink" onclick="add(this)"><i class="bi bi-plus-circle mx-1"></i>Tambah Data</button>

        <div class="card border ">
            <div class="card-header bg-pink text-white">
                <?= $title; ?>
            </div>
            <div id="data" class="card-body"></div>
        </div>

    </div>
</div>

<div id="modalArea">
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    let url = '<?= $meta['url']; ?>';

    $(document).ready(() => {
        getTable(url);
    });
</script>
<?= $this->endSection(); ?>