<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PILIH KELAS DAN TANGGAL
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
                            <div class="row clearfix">
                                <div class="col-md-12">
                                <form method="get">
                                        <div class="row clearfix">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group">
                                                <select class="form-control show-tick" name="position_id">
                                                    <option value="">-- Pilih kelas --</option>
                                                    <?php foreach($kelas as $kls) : ?>
                                                    <option value="<?= $kls['id_positions']?>"><?= $kls['position_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                                    <div class="input-group date" id="bs_datepicker_component_container">
                                                        <div class="form-line">
                                                            <input type="text" name="tanggal" class="form-control" placeholder="Pilih tanggal...">
                                                        </div>
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                    </div>
                                            </div>
                                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                                <button type="submit" name="preview" class="btn bg-red waves-effect">
                                                <i class="material-icons">search</i>
                                                <span>TAMPILKAN</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- data siswa -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PRESENSI
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
                                <table class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead class="bg-red">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jam masuk</th>
                                            <th>Jam pulang</th>                                            
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Lokasi</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th> 
                                            <th>Kelas</th>  
                                            <th>Jam masuk</th>
                                            <th>Jam pulang</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Lokasi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach ($absen as $a) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= date('d M Y', strtotime($a['date']))?></td>
                                            <td><?= $a['username']?></td>
                                            <td><?= $a['position_name']?></td>
                                            <td><?= $a['time']?></td>
                                            <td><?= $a['time_pulang']?></td>
                                            <td align="center"><?php if($a['information'] == 'M') : ?>
											<span class="label label-primary">Masuk</span>
                                            <?php elseif($a['information'] == 'P') : ?>
                                                <div class="label label-warning">Pulang</div>
                                            <?php elseif($a['information'] == 'I') : ?>
                                                <div class="label label-danger">Ijin</div>
                                            <?php elseif($a['information'] == 'S') : ?>
                                                <div class="label label-danger">Sakit</div>
                                            <?php elseif($a['information'] == 'T') : ?>
                                                <div class="label label-warning">Terlambat</div>
                                            <?php endif ?></td>
                                            <td align="center"><?php if($a['status'] == 0){print '<div class="label label-default">Menunggu dikonfirmasi...</div>';}
                                                elseif($a['status'] == 1){print '<div class="label label-success">Dikonfirmasi</div>';}
                                                else {print '<div class="label label-danger">Ditolak</div>';}?></td>
                                            <td><?= $a['latitude']?>, <?= $a['longitude']?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Custom Content -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PETA
                                <small>Lokasi presensi siswa</small>
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
        </div>
    </section> 
    
    <script>
        var mymap = L.map('mapid').setView([-6.6898398, 110.705151], 10);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
        }).addTo(mymap);

        var LeafIcon = L.Icon.extend({
		options: {
            iconSize:     [50, 50],
			// iconAnchor:   [22, 70],
			// popupAnchor:  [22, 22]
		}
	});

        var greenIcon = new LeafIcon({iconUrl: '<?= base_url('assets/images/logo.png'); ?>'});
            L.marker([-6.688983324749088, 110.70610105991365], {icon: greenIcon}).addTo(mymap)
            .bindPopup("<b>MA Walisongo Pecangaan Jepara</b><br />").openPopup();
        <?php foreach($absen as $a) : ?>
            L.marker([<?= $a['latitude']?>, <?= $a['longitude']?>]).addTo(mymap)
            .bindPopup("<b>Nama: <?= $a['username']?> </b> <br> <small>Jam: <?= $a['time']?> <br> Tanggal: <?= $a['date']?> </small>").openPopup();
        <?php endforeach ?>
    </script>
    