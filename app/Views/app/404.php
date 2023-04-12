<!DOCTYPE html>
<html lang="en">
<?= $this->include("temp/layout/head"); ?>

<body class="bg-white">
    <div id="layoutError">
        <div id="layoutError_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mt-4">
                                <img class="img-fluid p-4" src="/sbadmin/assets/img/illustrations/404-error.svg" alt="" />
                                <p class="lead">Maaf, halaman yang anda cari tidak ditemukan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?= $this->include("/temp/layout/sbscript"); ?>
</body>

</html>