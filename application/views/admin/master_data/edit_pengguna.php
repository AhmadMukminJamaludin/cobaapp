<section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix js-sweetalert">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>EDIT DATA PENGGUNA</h2>
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
                                        <form method="POST" action="<?= base_url('data/edit/'. $users['id_users'] ) ?>">
                                        <input type="hidden" name="id" value="<?= $users['id_users']?>">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="username" value="<?= $users['username']?>" required>
                                                    <label class="form-label">Nama</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="nisn" value="<?= $users['nisn']?>" required>
                                                    <label class="form-label">NISN</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" name="email" value="<?= $users['email']?>">
                                                    <label class="form-label">Email</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" name="gender" id="male" class="with-gap" value="L" <?php if($users['gender'] == "L"){ print 'checked'; }?>>
                                                <label for="male">Laki-laki</label>

                                                <input type="radio" name="gender" id="female" class="with-gap" value="P" <?php if($users['gender'] == "P"){ print 'checked'; }?>>
                                                <label for="female" class="m-l-20">Perempuan</label>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control show-tick" name="position_id">
                                                    <option value="">-- Please select --</option>
                                                    <?php foreach($kelas as $kls) : ?>
                                                    <option value="<?= $kls['id_positions']?>"<?php if($users['position_id'] == $kls['id_positions']){ print ' selected'; }?>><?= $kls['position_name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea name="alamat" cols="30" rows="5" class="form-control no-resize" required><?= $users['alamat']?></textarea>
                                                    <label class="form-label">Alamat</label>
                                                </div>
                                            </div>
                                            <button class="btn bg-orange waves-effect" data-type="success"><i class="material-icons">save</i> SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Basic Validation -->
                </div>
    </section>

    <script>

    </script>