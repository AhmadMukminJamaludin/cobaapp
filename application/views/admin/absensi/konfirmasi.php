<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PILIH KELAS
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
                                            <div class="col-lg-7 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group">
                                                <select class="form-control show-tick" name="position_id">
                                                    <option value="">-- Please select --</option>
                                                    <?php foreach($kelas as $kls) : ?>
                                                    <option value="<?= $kls['id_positions']?>"><?= $kls['position_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
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
                                            <th>Nama</th>
                                            <th>Jam masuk</th>                                            
                                            <th>Jam Pulang</th>
                                            <th>Tanggal</th>
                                            <th>Tipe entri</th>
                                            <th>Surat</th>
                                            <th>Aksi</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>   
                                            <th>Jam masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Tanggal</th>
                                            <th>Tipe entri</th>
                                            <th>Surat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($absen as $a) : ?>
                                        <tr>
                                            <td><?= $a['username']?></td>
                                            <td><?= $a['time']?></td>
                                            <td><?= $a['time_pulang']?></td>
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
                                            <td><?php if(isset($a['surat'])) : ?>
                                            <a href="<?= base_url('assets/surat/' . $a['surat']) ?>"><i class="far fa-fw fa-file"></i><?= $a['surat']?></a>
                                            <?php else : ?>
                                                Tidak ada surat
                                            <?php endif; ?></td>
                                            <td><a href="<?= base_url('app/konfirmasi/'. $a['id_presents']) ?>" type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float"><i class="material-icons">done</i></a><a href="<?= base_url('app/tolak/'. $a['id_presents']) ?>" type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float"><i class="material-icons">clear</i></a></td>
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
        </div>
    </section>