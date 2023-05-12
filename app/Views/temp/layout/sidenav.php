<nav class="sidenav shadow-right sidenav-dark">
    <div class="sidenav-menu">
        <div class="text-center my-2">
            <img width="80" class="img-fluid my-2" src="/assets/img/logo.png" alt="">
            <p class="fw-bold"><?= "SPK SMPN 2 Boleng" ?></p>
        </div>
        <hr class="mx-3">

        <?php
        if (logged_in()) {
            if (in_groups('admin')) echo view("/temp/layout/sidenav/admin");
            if (in_groups('kepala-sekolah'))  echo view("/temp/layout/sidenav/kepalasekolah");
        }
        ?>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">User:</div>
            <div class="sidenav-footer-title"><?= User()->nama_user; ?></div>
        </div>
    </div>

</nav>