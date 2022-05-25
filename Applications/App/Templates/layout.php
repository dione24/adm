<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>ADM MALI CREANCES | <?= $titles; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="/images/mlc.ico">
    <link href="/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js">
    </script>
    <style type="text/css" media="print">
    @page {
        size: landscape;
    }
    </style>


</head>

<body data-topbar="white" data-layout="horizontal">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        ADM | MALI CREANCES SA
                        <a href="/" class="logo logo-white">
                            <span class="logo-sm">
                                <img src="/images/mlc.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="/images/mlc.png" alt="" height="50">
                            </span>
                        </a>
                    </div>
                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                        data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

            </div>
        </header>

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/home" id="topnav-dashboard"
                                    role="button">
                                    <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Accueil</span>
                                </a>
                            </li>
                            <?php if (in_array(15, $permission)) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/courrier/receptions"
                                    id="topnav-dashboard" role="button">
                                    <i class="fas fa-folder-minus"></i><span key="t-dashboards"> Receptions</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (in_array(16, $permission)) { ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/courrier/departs"
                                    id="topnav-dashboard" role="button">
                                    <i class="fas fa-folder-plus"></i><span key="t-dashboards"> Departs</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (in_array(17, $permission)) { ?>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/demande/index"
                                    id="topnav-dashboard" role="button">
                                    <i class="fas fa-question-circle"></i><span key="t-dashboards"> Demandes</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (in_array(18, $permission)) { ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/comptabilite/index"
                                    id="topnav-dashboard" role="button">
                                    <i class="fas fa-money-check"></i><span key="t-dashboards"> Decaissements</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (in_array(19, $permission)) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/comptabilite/facturations"
                                    id="topnav-dashboard" role="button">
                                    <i class="fas fa-file-invoice"></i><span key="t-dashboards"> Factures</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (in_array(20, $permission)) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/employe/index"
                                    id="topnav-dashboard" role="button">
                                    <i class="fas fa-user-friends"></i><span key="t-dashboards"> Employés</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (in_array(21, $permission)) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/pannel/index"
                                    id="topnav-dashboard" role="button">
                                    <i class="fas fa-user-cog"></i><span key="t-dashboards"> Users</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (in_array(22, $permission)) { ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/pannel/configurations/index"
                                    id="topnav-dashboard" role="button">
                                    <i class="fas fa-cog"></i><span key="t-dashboards"></span>
                                </a>
                            </li>
                            <?php } ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="/logout" id="topnav-dashboard"
                                    role="button">
                                    <i class="bx bx-log-out-circle"></i><span key="t-dashboards">logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?= $content; ?>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                            document.write(new Date().getFullYear())
                            </script> © ADM MALI CREANCES SA. | Tous droits réservés.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Develop by NIANGALY ABDOULAYE
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="/libs/jquery/jquery.min.js"></script>
    <script src="/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/libs/metismenu/metisMenu.min.js"></script>
    <script src="/libs/simplebar/simplebar.min.js"></script>
    <script src="/libs/node-waves/waves.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            "ordering": false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });
    });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script>
    $(document).ready(function() {
        $('.summernote').summernote();
        $('#summernote').summernote();
    });
    </script>
    <script>
    function copyToClipboard(elementId) {
        var aux = document.createElement("input");
        aux.setAttribute("value", document.getElementById(elementId).innerHTML);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"
        integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w=="
        crossorigin="anonymous"></script>

    <script type="text/javascript">
    var j = jQuery.noConflict(true);

    function Print_Specific_Element() {

        j('#printableArea').printThis({
            importCSS: true, // to import the page css
            importStyle: true, // to import <style>css here will be imported !</style> the stylesheets (bootstrap included !)
            loadCSS: true, // to import style="The css writed Here will be imported !"
            canvas: true // only if you Have image/Charts ... 
        });
    }

    $("#printBtn").click(Print_Specific_Element);
    </script>


    <!-- apexcharts -->
    <script src="/libs/apexcharts/apexcharts.min.js"></script>
    <script src="/js/pages/dashboard.init.js"></script>
    <!-- Required datatable js -->
    <script src="/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/libs/jszip/jszip.min.js"></script>
    <script src="/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="/js/pages/datatables.init.js"></script>

    <script src="/js/app.js"></script>


</body>

</html>