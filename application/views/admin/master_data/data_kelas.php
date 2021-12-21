<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA KELAS
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
                            <div class="m-b-15">
                                <button type="button" class="btn btn-info btn-lg waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Tambah Kelas</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead class="bg-red">
                                        <tr>
                                            <th>No</th>
                                            <th>Id Kelas</th>
                                            <th>Nama Kelas</th>                                            
                                            <th>Aksi</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Kelas</th>
                                            <th>Nama Kelas</th>                                           
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($kelas as $kls) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $kls['id_positions']?></td>
                                            <td><?= $kls['position_name']?></td>
                                            <td align="center">
                                            <a href="" class="btn btn-warning btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#modal<?= $kls['id_positions']?>">
                                                <i class="material-icons">mode_edit</i>
                                            </a>
                                            <a href="<?= base_url('data/deletekelas/'. $kls['id_positions']) ?>" type="button" id="btn-hapus" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </a>
                                            </td>
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
        <!-- modal edit data kelas -->
        <?php foreach($kelas as $kls) : ?>
        <div class="modal fade" id="modal<?= $kls['id_positions']?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit Kelas</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form_validation" method="POST" action="<?= base_url('data/editkelas/'. $kls['id_positions']) ?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" name="id" value="<?= $kls['id_positions']?>" >
                                        <input type="text" class="form-control" name="name" value="<?= $kls['position_name']?>" required>
                                        <label class="form-label">Nama Kelas :</label>
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
        <!-- modal tambah data kelas -->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Kelas</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form_validation" method="POST" action="<?= site_url('data/addKelas') ?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required>
                                        <label class="form-label">Nama Kelas :</label>
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
    </section>