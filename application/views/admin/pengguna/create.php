<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/layout/css'); ?>
    <link href="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <?php $this->load->view('admin/layout/header'); ?>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="h-100" data-simplebar>
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <?php $this->load->view('admin/layout/sidebar'); ?>
                </div>
                <!-- End Sidebar -->
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid mt-3">
                    <div class="row mb-3">
                        <div class="col">
                            <?php if($this->session->flashdata('gagal')): ?>
                            <div class="alert alert-danger bg-danger text-white border-0" role="alert">
                                <?php echo $this->session->flashdata('gagal') ?>
                            </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <a href="<?php echo base_url("$web"); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                            <div class="card">
                                <div class="card-header bg-blue py-3">
                                    <h5 class="card-title mb-0 text-white"><?php echo $title; ?></h5>
                                </div>
                                <form action="<?php echo base_url("$web/store"); ?>" method="post">
                                    <div class="card-body table-responsive">                
                                        <!-- Form -->
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Username *</label>
                                            <div class="col-9">
                                                <select class="form-control" name="username" required>
                                                    <option value="">--- Pilih Username ---</option>
                                                    <?php foreach($user as $users): ?>
                                                        <option value="<?php echo $users['id']; ?>"><?php echo $users['username']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">NIS/NUPTK *</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="kode" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Nama Lengkap *</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Jenis Kelamin *</label>
                                            <div class="col-9">
                                                <select class="form-control" name="jenis_kelamin" required>
                                                    <option value="">--- Pilih Jenis Kelamin ---</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Email *</label>
                                            <div class="col-9">
                                                <input type="email" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">No HP *</label>
                                            <div class="col-9">
                                                <input type="number" class="form-control" name="nohp" required>
                                            </div>
                                        </div>
                                        <!-- Form -->

                                        <!-- Form Action -->
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label"></label>
                                            <div class="col-9">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-check-square"></i> Submit</button>
                                            </div>
                                        </div>
                                        <!-- Form Action -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <?php $this->load->view('admin/layout/footer'); ?>
            </footer>
            <!-- end Footer -->
        </div>
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <?php $this->load->view('admin/layout/right'); ?>
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <?php $this->load->view('admin/layout/js'); ?>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>
</body>
</html>