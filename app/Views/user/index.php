<?= $this->extend('temp/index'); ?>
<?= $this->section('content'); ?>
<div class="px-4 mt-n10">

    <div class="card card-icon mb-4">
        <div class="row g-0">
            <div class="col-auto card-icon-aside bg-pink"><i class="me-1 text-white-50" data-feather="users"></i></div>
            <div class="col">
                <div class="card-body py-5">
                    <h5 class="card-title"><?= $title; ?></h5>
                    <p class="card-text">Jumlah User : <?= $userCount; ?></p>
                </div>
            </div>
        </div>
    </div>

    <button data-url="<?= '/' . $meta['url'] . '/tambah'; ?>" class="mb-2 btn btn-pink" onclick="add(this)"><i class="bi bi-plus-circle mx-1"></i>Tambah Data</button>
    <div class="card  mb-4">
        <div class="card-header bg-pink text-white">Table User</div>
        <div id="data" class="card-body">

        </div>
    </div>
</div>


<div id="modalArea">
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    let url = '<?= $meta['url'] ?>';

    $(document).ready(() => {
        getTable(url);
    });
</script>

<script>
    const formInput = ["username", "password", "password2"];


    function validation(error) {
        resetForm(formInput);
        if (error.username) {
            $("input[name='username']").addClass("is-invalid").next().html(error.username);
        }

        if (error.password) {
            $("input[name='password']").addClass("is-invalid").next().html(error.password);
        }

        if (error.password2) {
            $("input[name='password2']").addClass("is-invalid").next().html(error.password2);
        }
    }

    function resetForm(arr) {
        arr.forEach((a) => {
            $(`input[name='${a}']`).removeClass("is-invalid").next().html("");
        });
    }
</script>
<?= $this->endSection(); ?>