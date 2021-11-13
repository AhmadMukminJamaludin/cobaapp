
<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <?php if($user['role_id']==1) : ?>
                <!-- Widgets -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">PENGGUNA</div>
                            <div class="number"><?= $pengguna ?></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                            <div class="text">KONFIRMASI ABSENSI</div>
                            <div class="number"><?php echo $jmlabsen; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-light-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">access_alarm</i>
                        </div>
                        <div class="content">
                            <div class="text">JAM MASUK</div>
                            <div class="number"><?= $jammasuk['start'] ?> - <?= $jammasuk['finish'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">access_alarm</i>
                        </div>
                        <div class="content">
                            <div class="text">JAM KELUAR</div>
                            <div class="number"><?= $jampulang['start'] ?> - <?= $jampulang['finish'] ?></div>
                        </div>
                    </div>
                </div>
            <!-- #END# Widgets -->
            <?php else : ?>
            <?php endif ?>
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                            <?php if(($user['photo'])) :  ?>
                                <img src="<?= base_url('image/' . $user['photo']) ?>" height="128px" width="128px">
                            <?php else : ?>
                                <?php if ($user['gender']=='L') : ?>
                                    <img src="<?= base_url('assets')?>/images/male.png" alt="" />
                                <?php else : ?>
                                    <img src="<?= base_url('assets')?>/images/female.png" alt="" />
                                <?php endif ?>
                            <?php endif ?>
                            </div>
                            <div class="content-area">
                                <h3><?= $user['username']?></h3>
                                <p>MA Walisongo Pecangaan</p>
                                <?php if($user['role_id']==1) : ?>
                                <p>Administrator</p>
                                <?php else : ?>
                                <p>User</p>
                                <?php endif ?>
                            </div>
                            <div class="profile-footer">
                                <a href="<?= base_url('user/kartu')?>" class="btn btn-primary btn-lg waves-effect btn-block">CETAK KARTU</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <?php foreach ($pengumuman as $row) : ?>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img src="assets/images/jamal.jpg" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#">Administrator</a>
                                                        </h4>
                                                        Shared publicly - <?= $row['tanggal'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p><?= $row['pengumuman'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <?php if($user['role_id']==1) : ?>
                                        <form class="form-horizontal" action="<?= base_url('app/profile')?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <?php else :?>
                                            <form class="form-horizontal" action="<?= base_url('user/profile')?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <?php endif ?>
                                            <input type="hidden" name="id" value="<?= $this->session->userdata('id_users') ?>">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="username" placeholder="Name Surname" value="<?= $user['username'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="<?= $user['email'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Alamat</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="InputExperience" name="alamat" rows="3"><?= $user['alamat'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender" class="col-sm-2 control-label">Jenis kelamin</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="gender" id="male" class="with-gap" value="L" <?php if($user['gender'] == "L"){ print 'checked'; }?>>
                                                    <label for="male">Laki-laki</label>

                                                    <input type="radio" name="gender" id="female" class="with-gap" value="P" <?php if($user['gender'] == "P"){ print 'checked'; }?>>
                                                    <label for="female" class="m-l-20">Perempuan</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="photo" class="col-sm-2 control-label">foto</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input name="photo" type="file" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SAVE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <?php if($user['role_id']==1) : ?>
                                        <form class="form-horizontal" action="<?= base_url('app/ubah_password') ?>" method="post">
                                    <?php else : ?>
                                        <form class="form-horizontal" action="<?= base_url('user/ubah_password') ?>" method="post">
                                    <?php endif ?>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="new_password" placeholder="New Password" required>
                                                        <?= form_error('new_password', '<small class="text-danger mt-1">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="password_confirm" placeholder="New Password (Confirm)" required>
                                                        <?= form_error('password_confirm', '<small class="text-danger mt-1">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">CHANGE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php if($user['role_id']==1) : ?>
                <div class="row clearfix">
                    <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>DATA ABSENSI</h2>
                            <small>Tabel absensi siswa yang belum dikonfirmasi</small>
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
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Tipe entri</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach($absen as $a) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $a['username']?></td>
                                            <td><?= $a['position_name']?></td>
                                            <td><?php if($a['information'] == 'M') : ?>
											<span class="label label-primary">Masuk</span>
                                            <?php elseif($a['information'] == 'P') : ?>
                                                <div class="label label-warning">Pulang</div>
                                            <?php elseif($a['information'] == 'I') : ?>
                                                <div class="label label-danger">Ijin</div>
                                            <?php elseif($a['information'] == 'S') : ?>
                                                <div class="label label-danger">Sakit</div>
                                            <?php endif ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>GRAFIK</h2>
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
                        <div class="body" align="center">
                            <div id="donut_chart" class="dashboard-donut-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    KALENDER
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
                <?php else : ?>
                <?php endif ?>
        </div>
    </section>

    

    <script>

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    calendar.render();
    });

    </script>
