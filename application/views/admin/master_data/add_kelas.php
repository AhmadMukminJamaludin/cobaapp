<section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix js-sweetalert">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>TAMBAH DATA KELAS</h2>
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
                                        <form id="form_validation" method="POST" action="<?= site_url('data/addKelas') ?>">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="name" required>
                                                    <label class="form-label">Nama</label>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary waves-effect" data-type="success">SUBMIT</button>
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