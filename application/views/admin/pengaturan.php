<section class="content">
        <div class="container-fluid">
            <!--Bootstrap Date Picker -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PENGATURAN
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
                                            <th>Jam mulai</th>
                                            <th>Jam selesai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($jam as $j) : ?>
                                        <tr>
                                            <td><?= $j['keterangan'] ?></td>
                                            <td><?= $j['start'] ?></td>
                                            <td><?= $j['finish'] ?></td>
                                            <td align="center"><button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#smallModal<?= $j['id_time'] ?>"><i class="material-icons">mode_edit</i></button></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--#END# Bootstrap Date Picker -->
            <!-- modal -->
            <?php foreach($jam as $j) : ?>
                <div class="modal fade" id="smallModal<?= $j['id_time'] ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit jam</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('app/updatejam/'. $j['id_time']) ?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" name="id_time" value="<?= $j['id_time']?>" >
                                        <input type="text"  class="timepicker form-control" name="start" value="<?= $j['start']?>" required>
                                        <label class="form-label">Jam mulai :</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class="timepicker form-control" name="finish" value="<?= $j['finish']?>" required>
                                        <label class="form-label">Jam selesai :</label>
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
