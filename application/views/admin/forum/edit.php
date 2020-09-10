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
                            <div class="mb-3">
                                <a href="<?php echo base_url("$web"); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                            <div class="card">
                                <div class="card-header bg-blue py-3">
                                    <h5 class="card-title mb-0 text-white"><?php echo $title; ?></h5>
                                </div>
                                <form action="<?php echo base_url("$web/update/".$user['id']); ?>" method="post">
                                    <div class="card-body table-responsive">                
                                        <!-- Form -->
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Username (NIS/NPUK)</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Level</label>
                                            <div class="col-9">
                                                <select class="form-control" name="level" required>
                                                    <option value="">--- Pilih Level ---</option>
                                                    <option value="1" <?php echo $user['level'] == 1 ? 'selected' : ''; ?> >Admin</option>
                                                    <option value="2" <?php echo $user['level'] == 2 ? 'selected' : ''; ?> >Guru</option>
                                                    <option value="3" <?php echo $user['level'] == 3 ? 'selected' : ''; ?> >Siswa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Password</label>
                                            <div class="col-9">
                                                <input type="password" class="form-control" name="password">
                                                <input type="hidden" class="form-control" name="password_old" value="<?php echo $user['password']; ?>">
                                                <small class="text-danger">Jika Tidak ingin <b>MENGUBAH PASSWORD</b> Harap Dikosongkan.</small>
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