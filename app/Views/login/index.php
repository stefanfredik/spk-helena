<!DOCTYPE html>
<html lang="en">
<?= $this->include("temp/layout/head"); ?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                            <!-- Social login form-->
                            <div class="card my-5">
                                <div class="card-body p-5 text-center">
                                    <div class="h3 fw-light mb-3">Login</div>
                                    <div>Silahkan login menggunakan akun yang sudah terdaftar.</div>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body p-5">
                                    <!-- Login form-->
                                    <form>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="emailExample">Username</label>
                                            <input class="form-control form-control-solid" type="text" placeholder="" aria-label="Email Address" aria-describedby="emailExample" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="passwordExample">Password</label>
                                            <input class="form-control form-control-solid" type="password" placeholder="" aria-label="Password" aria-describedby="passwordExample" />
                                        </div>


                                        <div class="mb-3"><a class="small" href="auth-password-social.html">Lupa Password?</a></div>

                                        <div class="d-flex align-items-center justify-content-between mb-0">
                                            <div class="form-check">
                                                <input class="form-check-input" id="checkRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="checkRememberPassword">Ingat Saya</label>
                                            </div>
                                            <a class="btn btn-primary" href="dashboard-1.html">Masuk</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?= $this->include("temp/layout/footer"); ?>
        </div>
    </div>
    <?= $this->include("/temp/layout/sbscript"); ?>
</body>

</html>