<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
      .profile-card .profile-header {
        background-color: #ad1455;
        padding: 42px 0;
      }

      .profile-card .profile-body .image-area {
        text-align: center;
        margin-top: -64px;
      }

      .profile-card .profile-body .image-area img {
        border: 2px solid #ad1455;
        padding: 2px;
        margin: 2px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
      }

      .profile-card .profile-body .qrcode-area {
        text-align: center;
        margin-top: -64px;
      }

      .profile-card .profile-body .qrcode-area img {
        border: 2px solid #ad1455;
        padding: 2px;
        margin: 2px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 10%;
      }

      .profile-card .profile-body .content-area {
        text-align: center;
        border-bottom: 1px solid #ddd;
        padding-bottom: 15px;
      }

      .profile-card .profile-body .content-area p {
        margin-bottom: 0;
      }

      .profile-card .profile-body .content-area p:last-child {
        font-weight: 600;
        color: #ad1455;
        margin-top: 5px;
      }

      .profile-card .profile-footer {
        padding: 15px;
      }

      .profile-card .profile-footer ul {
        margin: 0;
        padding: 0;
        list-style: none;
      }

      .profile-card .profile-footer ul li {
        border-bottom: 1px solid #eee;
        padding: 10px 0;
      }

      .profile-card .profile-footer ul li:last-child {
        border-bottom: none;
        margin-bottom: 15px;
      }

      .profile-card .profile-footer ul li span:first-child {
        font-weight: bold;
      }

      .profile-card .profile-footer ul li span:last-child {
        float: right;
      }
    </style>

    <title>Kartu absensi siswa</title>
  </head>
  <body>
  <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
              <div class="col-lg-4 col-sm-3 col-lg-3">
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
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-3 col-lg-3">
                  <div class="card profile-card">
                      <div class="profile-header">&nbsp;</div>
                      <div class="profile-body">
                          <div class="qrcode-area">
                            <?php $kode = $this->session->userdata('id_users'); ?>
                            <img src="<?php echo base_url('user/ciqrcode/'. $kode); ?>" height="128px" width="128px" alt="">
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
                      </div>
                  </div>
              </div>
            </div>
      </div>
  </section>

  <script>
    window.print();
  </script>

    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets')?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets')?>/plugins/bootstrap/js/bootstrap.js"></script>
  </body>
</html>