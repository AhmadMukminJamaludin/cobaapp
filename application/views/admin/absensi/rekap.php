<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PILIH KELAS & TANGGAL
                                <small>Isikan form berikut untuk menampilkan data absensi</small>
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
                                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
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
                                                <div class="form-group">
                                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                        <div class="form-line">
                                                            <input type="text" name="start" class="form-control" placeholder="Date start...">
                                                        </div>
                                                        <span class="input-group-addon">to</span>
                                                        <div class="form-line">
                                                            <input type="text" name="end" class="form-control" placeholder="Date end...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
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
                        <div class="m-b-15">
                            <a type="button" href="<?php echo $url_export; ?>" class="btn btn-info waves-effect">
                                <i class="material-icons">insert_drive_file</i>
                                <span>EXCEL</span>
                            </a>                            
                            <a type="button" href="<?php echo $url_exportPDF; ?>" class="btn btn-info waves-effect">
                                <i class="material-icons">insert_drive_file</i>
                                <span>PDF</span>
                            </a>                            
                            <a type="button" href="<?php echo $url_exportCetak; ?>" class="btn btn-info waves-effect" target="_blank">
                                <i class="material-icons">print</i>
                                <span>CETAK</span>
                            </a>                            
                        </div>
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead class="bg-red">
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Masuk</th>
                                            <th>Sakit</th>
                                            <th>Ijin</th>                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Masuk</th>
                                            <th>Sakit</th>
                                            <th>Ijin</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($absen as $a) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $a['nisn']?></td>
                                            <td><?= $a['username']?></td>
                                            <td><?= $a['position_name']?></td>
                                            <td><?= $a['masuk'] ?></td>
                                            <td><?= $a['sakit'] ?></td>
                                            <td><?= $a['ijin'] ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 