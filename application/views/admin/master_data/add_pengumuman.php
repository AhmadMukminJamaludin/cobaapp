<section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TAMBAH PENGUMUMAN</h2>
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
                            <form id="form_validation" method="POST" action="<?= site_url('app/add_pengumuman') ?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <textarea name="pengumuman" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Isi pengumuman :</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" data-type="success">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>PENGUMUMAN</h2>
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
                                            <th>Jam</th>
                                            <th>Pengumuman</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($pengumuman as $row) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td><?= $row['jam'] ?></td>
                                            <td><?= $row['pengumuman'] ?></td>
                                            <td align="center"><button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#smallModal<?= $row['id_pengumuman'] ?>"><i class="material-icons">mode_edit</i></button><a href="<?= base_url('app/delete_pengumuman/'. $row['id_pengumuman']) ?>" type="button" id="btn-hapus" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </a></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            <!-- modal -->
            <?php foreach($pengumuman as $row) : ?>
                <div class="modal fade" id="smallModal<?= $row['id_pengumuman'] ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit pengumuman</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('app/update_pengumuman/'. $row['id_pengumuman']) ?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" name="id_pengumuman" value="<?= $row['id_pengumuman']?>" >
                                        <textarea name="pengumuman" cols="30" rows="5" class="form-control no-resize" required><?= $row['pengumuman']?></textarea>
                                        <label class="form-label">Pengumuman :</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            </div>
    </section>