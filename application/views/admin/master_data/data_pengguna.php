<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                IMPORT DATA
                                <small>Upload file dengan format <b>Microsoft Excel Worksheet (.xlsx)</b></a></small>
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
                                <form id="form_validation" method="POST" action="<?= site_url('data/upload')?>"  enctype="multipart/form-data">
                                        <div class="row clearfix">
                                            <div class="col-lg-7 col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" name="userfile" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                                <button type="submit" name="preview" class="btn bg-orange waves-effect">
                                                <i class="material-icons">file_upload</i>
                                                <span>UPLOAD</span></button>
                                                <a href="<?= base_url('assets/excel/format.xlsx') ?>" download class="btn btn-primary waves-effect"><i class="material-icons">insert_drive_file</i><span>TEMPLATE</span></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PENGGUNA
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse">
                                        <i class="material-icons">loop</i>
                                    </a>
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
                                            <th>QR Code</th>                                            
                                            <th>Aksi</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Jenis kelamin</th>
                                            <th>QR Code</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($pengguna as $p) : ?>
                                            <!-- <?php $kode = 'M'; ?> -->
                                        <tr>
                                            <td><?= $p['username']?></td>                                            
                                            <td><?= $p['email']?></td>                                            
                                            <td><?= $p['alamat']?></td>
                                            <?php if($p['gender'] == 'L') : ?>
                                                <td>Laki-laki</td>
                                            <?php else : ?>
                                                <td>Perempuan</td>
                                            <?php endif ?>
                                            <td><img src="<?php echo base_url('data/ciqrcode/'. $kode=$p['id_users']); ?>" alt=""></td>
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
            <!-- #END# Basic Examples -->
        </div>
    </section>