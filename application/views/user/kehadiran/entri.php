<section class="content">
        <div class="container-fluid">
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ENTRI ABSENSI
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" id="form_validation" method="POST" action="<?= base_url('user/input_absensi') ?>">
                                <div class="row clearfix">
                                    <h2 align="center" id="clocknow"></h2>
                                    <h5 align="center" id="datenow"></h5>
                                </div>
                                <div class="row clearfix">
                                    <div class="input-group" align="center">
                                        <input type="radio" name="tipe" id="masuk" class="with-gap" value="M">
                                        <label for="masuk">Masuk</label>

                                        <input type="radio" name="tipe" id="pulang" class="with-gap" value="P">
                                        <label for="pulang" class="m-l-20">Pulang</label>
                                    </div>
                                </div>
                                <input type="hidden" id="latitude" name="latNow">
                                <input type="hidden" id="longitude" name="lngNow">
                                <div class="row clearfix">
                                    <div class="demo-button">
                                        <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect"><i class="material-icons">input</i><span>SUBMIT</span></button>
                                        <button type="button" class="btn btn-block btn-lg btn-danger waves-effect" data-toggle="modal" data-target="#defaultModal"><i class="material-icons">report</i> <span>TIDAK BERANGKAT</span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Markers -->
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA ABSENSI
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Jam</th>
                                            <th>Tanggal</th>
                                            <th>Tipe entri</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach($absen as $a) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $a['time']?></td>
                                            <td><?= $a['date']?></td>
                                            <td><?php if($a['information'] == 'M') : ?>
											<span class="label label-primary">Masuk</span>
                                            <?php elseif($a['information'] == 'P') : ?>
                                                <div class="label label-warning">Pulang</div>
                                            <?php elseif($a['information'] == 'I') : ?>
                                                <div class="label label-danger">Ijin</div>
                                            <?php elseif($a['information'] == 'S') : ?>
                                                <div class="label label-danger">Sakit</div>
                                            <?php endif ?></td>
                                            <td><?php if($a['status'] == 0) : ?>
											<span class="label label-default">Belum dikonfirmasi</span>
                                            <?php elseif($a['status'] == 1) : ?>
                                                <div class="label label-success">Dikonfirmasi</div>
                                            <?php elseif($a['status'] == 2) : ?>
                                                <div class="label label-danger">Ditolak</div>
                                            <?php endif ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Markers -->
                <!-- Markers -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    PETA
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div id="mapid" style="width: 100%; height: 400px;" class="mt-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Markers -->
            </div>
            <!-- #END# Horizontal Layout -->
        </div>
        <!-- Default Size -->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Input keterangan</h4>
                        </div>
                        <div class="modal-body">
                        <?php echo form_open_multipart('user/ijin'); ?>
                        <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="jam">Jam</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                                <input type="text" id="jam" name="jam" class="form-control"  value="<?= date('H:i') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Tanggal</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?= date('d M Y') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="tipe_entri">Tipe entri</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 mb-5">
                                        <div class="form-group">
                                        <input name="tipe" type="radio" id="radio_1" value="S" />
                                            <label for="radio_1">Sakit</label>
                                        <input name="tipe" type="radio" id="radio_2" Value="I" />
                                            <label for="radio_2">Ijin</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="lokasi">Titik lokasi</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm col-xs">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="latitude" name="latNow1" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm col-xs">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="longitude" name="lngNow1" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Keterangan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" name="keterangan" class="form-control no-resize" placeholder="Berikan keterangan anda..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Keterangan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="surat" type="file" class="form-control">
                                            </div>
                                            <small>Nama file harus sesuai dengan nama lengkap siswa..
                                            Contoh : <b>Ahmad_mukmin_Jamaludin.pdf</b></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SUBMIT</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
    </section>

    <script>
	var latInput=document.querySelector("[name=latNow]");
	var lngInput=document.querySelector("[name=lngNow]");
	var latInput1=document.querySelector("[name=latNow1]");
	var lngInput1=document.querySelector("[name=lngNow1]");
	var mymap = L.map('mapid').setView([-6.6898398, 110.705151], 15);

	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);
		L.marker([-6.6898398, 110.705151]).addTo(mymap)
		.bindPopup("<b>MA Walisongo Pecangaan Jepara</b><br />").openPopup();
	
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
        latInput1.value=position.coords.latitude;
	    lngInput1.value=position.coords.longitude;
	  	const lat =position.coords.latitude;
		const long =position.coords.longitude;
		L.marker([lat,long]).addTo(mymap)
		.bindPopup("<b>Lokasi anda</b>").openPopup();
		var circle = L.circle([lat, long], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 50
        }).addTo(mymap);
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
            getLocation();
        }
    </script>

    
