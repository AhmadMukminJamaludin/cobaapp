<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $title ?></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets')?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets')?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets')?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="<?= base_url('assets')?>/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?= base_url('assets')?>/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="<?= base_url('assets')?>/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?= base_url('assets')?>/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url('assets')?>/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?= base_url('assets')?>/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets')?>/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('assets')?>/css/themes/all-themes.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>

<body class="theme-red">
<div id="flash" data-flash="<?= $this->session->flashdata('message') ?>"></div>
<div id="salah" data-salah="<?= $this->session->flashdata('salah') ?>"></div>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Absensi<b>APP</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('assets')?>/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user['username']?></div>
                    <div class="email"><?= $user['email'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url('auth')?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?= base_url('user')?>">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('user/entri')?>">
                            <i class="material-icons">work</i>
                            <span>Entri absensi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('user/tabel_absensisiswa')?>">
                            <i class="material-icons">date_range</i>
                            <span>Data Absensi</span>
                        </a>
                    </li>
                                        
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 <a href="javascript:void(0);">Jamaludin</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

    <?php $this->load->view($page) ?>
    
    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets')?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets')?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Wait Me Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/waitme/waitMe.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/bootstrap-datepicker/js/datepicker.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets')?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?= base_url('assets')?>/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets')?>/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?= base_url('assets')?>/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?= base_url('assets')?>/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?= base_url('assets')?>/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?= base_url('assets')?>/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets')?>/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


    <!-- Custom Js -->
    <script src="<?= base_url('assets')?>/js/admin.js"></script>
    <script src="<?= base_url('assets')?>/js/pages/forms/basic-form-elements.js"></script>    
    <script src="<?= base_url('assets')?>/js/pages/ui/sweetalert.js"></script>
    <script src="<?= base_url('assets')?>/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?= base_url('assets')?>/js/pages/ui/modals.js"></script>
    
    <!-- Demo Js -->
    <script src="<?= base_url('assets')?>/js/demo.js"></script>
</body>

</html>

