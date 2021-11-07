<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Absensi<b>APP</b></a>
            <small>Aplikasi absensi online berbasis website </small>
        </div>
        <div class="card">
            <div class="body">
            <?= $this->session->flashdata('message') ?>
                <form id="sign_in" method="POST" action="<?= base_url('auth') ?>">
                    <div class="msg">Sign in to start</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-indigo waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                                <a href="<?= base_url('auth/absen_in_auth')?>">Entri Absensi!</a>
                            </div>
                        <div class="col-xs-6 align-right">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Jquery Core Js -->
<script src="assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="assets/plugins/node-waves/waves.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Custom Js -->
<script src="assets/js/admin.js"></script>

<!-- Demo Js -->
<script src="assets/js/demo.js"></script>
</body>

</html>