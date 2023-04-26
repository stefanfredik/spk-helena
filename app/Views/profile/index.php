<?= $this->extend('temp/index'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">Foto Profile</div>
            <div class="card-body text-center">
                <!-- <img class="img-account-profile rounded-circle mb-2" src="assets/img/illustrations/profiles/profile-1.png" alt="" /> -->
                <i class="text-primary bi bi-person-circle fa-10x"></i>
                <div class="small font-italic text-muted mb-4">Nama Lengkap</div>
                <!-- Profile picture upload button-->
                <!-- <button class="btn btn-primary" type="button">Upload new image</button> -->
            </div>
        </div>
    </div>


    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Detail Profil</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="small mb-1" for="">Nama Lengkap</label>
                    <p class=""><?= user()->nama_user ?></p>
                </div>

                <div class="mb-3">
                    <label class="small mb-1" for="">Username</label>
                    <p class=""><?= user()->username ?></p>
                </div>

                <div class="mb-3">
                    <label class="small mb-1" for="">User Role/ Jabatan</label>
                    <p class=""><?= $user['jabatan'] ?></p>
                </div>

                <div class="mb-3">
                    <label class="small mb-1" for="">User dibuat</label>
                    <p class=""><?= user()->created_at ?></p>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>