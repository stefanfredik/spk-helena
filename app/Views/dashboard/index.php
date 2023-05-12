<?= $this->extend("temp/index"); ?>
<?= $this->section("content"); ?>

<div class="border  rounded border-2  p-3 row text-center mb-5">
    <div>
        <img width="100" class="img-fluid" src="/assets/img/logo.png" alt="">
        <h2 class="text-dark">Halo <?= user()->nama_user; ?></h2>
        <h4 class="text-dark">Selamat datang di <?= APP_NAME; ?></h4>

    </div>
</div>

<hr class="border-2 border border-pink">

<?php
if (in_groups('admin')) echo view("/dashboard/dashboard/admin");
if (in_groups('kepala-sekolah')) echo view("/dashboard/dashboard/kepalasekolah");
?>

<?= $this->endSection(); ?>