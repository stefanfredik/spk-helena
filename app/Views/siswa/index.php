<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <button data-url="<?= '/' . $meta['url'] . '/tambah'; ?>" class="mb-2 btn btn-pink" onclick="add(this)"><i class="bi bi-plus-circle mx-1"></i>Tambah Data</button>
        <button data-url="<?= '/' . $meta['url'] . '/upload'; ?>" class="mb-2 btn btn-purple" onclick="add(this)"><i class="bi bi-upload mx-1"></i><span>Upload Excel</span></button>

        <div class="card border shadow">
            <div class="card-header">
                <h3><?= $title; ?></h3>
            </div>
            <div id="data" class="card-body"></div>
        </div>

    </div>
</div>

<div id="modalArea">
</div>


<?= $this->section('script'); ?>
<script>
    let url = '<?= $meta['url']; ?>';

    $(document).ready(() => {
        getTable(url);
    });
</script>
<?= $this->endSection(); ?>


<?= $this->endSection(); ?>