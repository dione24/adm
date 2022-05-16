<!doctype html>
<html lang="fr-fr">

<head>
    <meta charset="utf-8" />
    <title><?= $titles; ?> | ADM MALI CREANCES </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/images/mlc.ico">
    <!-- Bootstrap Css -->
    <link href="/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Bienvenue!</h5>
                                        <p>Connectez-vous.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="/images/mlc.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="/" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-6">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="/images/mlc.png" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="/" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-6">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="/images/mlc.png" alt="" class="rounded-circle" height="50">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <?= $content; ?>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <p>© <script>
                            document.write(new Date().getFullYear())
                            </script> ADM MALI CREANCES SA. | Tous droits réservés. <i
                                class="mdi mdi-heart text-danger"></i> by
                            NIANGALY
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="/libs/jquery/jquery.min.js"></script>
    <script src="/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/libs/metismenu/metisMenu.min.js"></script>
    <script src="/libs/simplebar/simplebar.min.js"></script>
    <script src="/libs/node-waves/waves.min.js"></script>
    <script src="/js/app.js"></script>
</body>

</html>