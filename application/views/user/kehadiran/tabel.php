<section class="content">
        <div class="container-fluid">
            <!-- data siswa -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                                <td align="center"><?php if($a['information'] == 'M' && $a['status']==1) : ?>
                                                <span class="label label-primary">Masuk</span>
                                                <?php elseif($a['information'] == 'P' && $a['status']==1) : ?>
                                                    <div class="label label-warning">Pulang</div>
                                                <?php elseif($a['information'] == 'I' && $a['status']==1) : ?>
                                                    <div class="label label-danger">Ijin</div>
                                                <?php elseif($a['information'] == 'S' && $a['status']==1) : ?>
                                                    <div class="label label-danger">Sakit</div>
                                                <?php elseif($a['status']==0) : ?>
                                                    <div class="label label-default">Belum dikonfirmasi...</div>
                                                <?php endif ?></td>
                                                <td align="center"><?php if($a['time'] >= date(14,24)){ 
                                                print '<div class="label label-danger">terlambat</div>'; 
                                                } else {
                                                    print '<div class="label label-success">tepat waktu</div>';
                                                }?></td>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REKAP DATA ABSENSI
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
                                                <td align="center"><?php if($a['information'] == 'M' && $a['status']==1) : ?>
                                                <span class="label label-primary">Masuk</span>
                                                <?php elseif($a['information'] == 'P' && $a['status']==1) : ?>
                                                    <div class="label label-warning">Pulang</div>
                                                <?php elseif($a['information'] == 'I' && $a['status']==1) : ?>
                                                    <div class="label label-danger">Ijin</div>
                                                <?php elseif($a['information'] == 'S' && $a['status']==1) : ?>
                                                    <div class="label label-danger">Sakit</div>
                                                <?php elseif($a['status']==0) : ?>
                                                    <div class="label label-default">Belum dikonfirmasi...</div>
                                                <?php endif ?></td>
                                                <td align="center"><?php if($a['time'] >= date(14,24)){ 
                                                print '<div class="label label-danger">terlambat</div>'; 
                                                } else {
                                                    print '<div class="label label-success">tepat waktu</div>';
                                                }?></td>
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
        </div>
    </section>
    