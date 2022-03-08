
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Entri Absensi</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets')?>/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- scanning menggunakan API instascan -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets')?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets')?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets')?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="<?= base_url('assets')?>/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets')?>/css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
<div id="flash" data-flash="<?= $this->session->flashdata('message') ?>"></div>
<div id="salah" data-salah="<?= $this->session->flashdata('salah') ?>"></div>
    <div class="signup-box">
        <div class="logo">
            <a href="#" id="clocknow"></a>
            <small id="datenow"></small>
        </div>
        <div class="card">
            <div class="body">
                <video id="preview" width="100%"></video>
                <form class="form-horizontal" method="POST" action="<?= base_url('auth/input_absensi') ?>">
                    <h3 class="msg" id="clocknow"></h3>
                    <div class="msg" id="datenow"></div>
                    
                    <h3 class="msg" id="nama"></h3>
                    <div class="msg" id="kelas"></div>
                    <input type="hidden" class="form-control" name="qrcode" id="qrcode" required autofocus>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person_pin_circle</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="latNow" placeholder="Latitude" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person_pin_circle</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="lngNow" placeholder="Longitude" required>
                        </div>
                    </div>
                    <div class="input-group m-l-75">
                        <input type="radio" name="tipe" id="masuk" class="with-gap" value="M">
                        <label for="masuk">Masuk</label>

                        <input type="radio" name="tipe" id="pulang" class="with-gap" value="P">
                        <label for="pulang" class="m-l-20">Pulang</label>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0 ){
                scanner.start(cameras[0]);
            } else{
                alert('No cameras found');
            }

            }).catch(function(e) {
                console.error(e);
            });

        scanner.addListener('scan',function(c){
            document.getElementById('qrcode').value=c;
            var id_users = document.getElementById('qrcode').value=c;
                $.ajax({
                    url:"<?php echo base_url('auth/autofill')?>",
                    data:'id_users='+id_users,
                    success:function(data){
                        var hasil = JSON.parse(data);  
                        
                $.each(hasil, function(key,val){ 
                    document.getElementById("nama").innerHTML = val.username;
                    document.getElementById("kelas").innerHTML = val.position_name;
                    getLocation();
                    });
                }
            });
        });
    </script>

    <script>
        var latInput=document.querySelector("[name=latNow]");
        var lngInput=document.querySelector("[name=lngNow]");

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else { 
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                latInput.value=position.coords.latitude;
                lngInput.value=position.coords.longitude;
            }
    </script>

    <script>
        function currentTime() {
            var date = new Date(); /* creating object of Date class */
            var hour = date.getHours();
            var min = date.getMinutes();
            var sec = date.getSeconds();
            hour = updateTime(hour);
            min = updateTime(min);
            sec = updateTime(sec);
            document.getElementById("clocknow").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */

            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

            var curWeekDay = days[date.getDay()]; // get day
            var curDay = date.getDate(); // get date
            var curMonth = months[date.getMonth()]; // get month
            var curYear = date.getFullYear(); // get year
            var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear; // get full date
            document.getElementById("datenow").innerHTML = date;
            

            var t = setTimeout(function() {
                currentTime()
            }, 1000); /* setting timer */
        }

        function updateTime(k) {
            if (k < 10) {
                return "0" + k;
            } else {
                return k;
            }
        }

        if (document.getElementById("clocknow")) {
            currentTime(); /* calling currentTime() function to initiate the process */
        }
    </script>

    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets')?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets')?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="<?= base_url('assets')?>/plugins/sweetalert/sweetalert.min.js"></script>
    
    

    <!-- Custom Js -->
    <script src="<?= base_url('assets')?>/js/admin.js"></script>
    <script src="<?= base_url('assets')?>/js/script.js"></script>
    <script src="<?= base_url('assets')?>/js/pages/ui/sweetalert.js"></script>
    <script src="<?= base_url('assets')?>/js/pages/examples/sign-up.js"></script>
</body>

</html>