<?= $this->extend('/temp/index'); ?>

<?= $this->section("content"); ?>
<div class="row">
    <div class="col">
        <?php if (in_groups("admin")) : ?>
            <button data-url="<?= '/' . $meta['url'] . '/tambah'; ?>" class="rounded mb-2 btn btn-pink" onclick="add(this)"><i class="bi bi-plus-circle mx-1"></i>Tambah Data</button>
        <?php endif ?>
        <div class="card border ">
            <div class="card-header">
                <h3> <?= $title; ?></h3>
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