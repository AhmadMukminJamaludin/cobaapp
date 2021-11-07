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
                                DATA SISWA
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
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Jenis kelamin</th>                                            
                                            <th>Kelas</th>
                                            <th>Aksi</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Jenis kelamin</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($pengguna as $p) : ?>
                                        <tr>
                                            <td><?= $p['username']?></td>                                            
                                            <td><?= $p['email']?></td>                                            
                                            <td><?= $p['alamat']?></td>
                                            <?php if($p['gender'] == 'L') : ?>
                                                <td>Laki-laki</td>
                                            <?php else : ?>
                                                <td>Perempuan</td>
                                            <?php endif ?>
                                            <td><?= $p['position_name']?></td>
                                            <td align ="center"><a href="<?= base_url('data/edit/'. $p['id_users']) ?>" type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float"><i class="material-icons">mode_edit</i></a><a href="<?= base_url('data/delete/'. $p['id_users']) ?>" type="button" id="btn-hapus" class="btn btn-danger btn-circle waves-effect waves-circle waves-float"><i class="material-icons">delete</i></a></td>
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