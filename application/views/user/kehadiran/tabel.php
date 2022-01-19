<section class="content">
        <div class="container-fluid">
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
                                            <th>Nama siswa</th>
                                            <th>Jam masuk</th>
                                            <th>Jam pulang</th>
                                            <th>Keterangan</th>                                            
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama siswa</th>
                                            <th>Jam masuk</th>
                                            <th>Jam pulang</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach ($absen as $a) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= date('d M Y', strtotime($a['date']))?></td>
                                                <td><?= $a['username']?></td>
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
                                            <?php endif ?> 
                                                </td>
                                                <td align="center"><?php if($a['status'] == 0){print '<div class="label label-default">Menunggu dikonfirmasi...</div>';}
                                                elseif($a['status'] == 1){print '<div class="label label-success">Dikonfirmasi</div>';}
                                                else {print '<div class="label label-danger">Ditolak</div>';}?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir card data siswa -->
            <!-- data siswa -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REKAP DATA PRESENSI
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
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-red">
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Masuk</td>
                                            <td><?= $masuk ?></td>
                                        </tr>
                                        <tr>
                                            <td>Sakit</td>
                                            <td><?= $sakit?></td>
                                        </tr>
                                        <tr>
                                            <td>Ijin</td>
                                            <td><?= $ijin ?></td>
                                        </tr>
                                        <tr>
                                            <td>Terlambat</td>
                                            <td><?= $terlambat ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KALENDER PRESENSI
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
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir card data siswa -->
        </div>
    </section>
    
    <script>

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: "<?php echo base_url(); ?>user/fullcalender_load"
    });
    calendar.render();
    });

    </script>