<!DOCTYPE html>
<html lang="en">

<?= $this->include("temp/layout/head"); ?>

<body class="nav-fixed">
    <?= $this->include("temp/layout/navbar"); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?= $this->include("temp/layout/sidenav"); ?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <?= $this->include("temp/layout/header"); ?>
                <div class="container-xl px-4 mt-n10">
                    <?= $this->renderSection("content"); ?>
                </div>
            </main>
            <?= $this->include("temp/layout/footer"); ?>
        </div>

    </div>
    <?= $this->include("temp/layout/script"); ?>
</body>

</html>