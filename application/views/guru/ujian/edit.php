<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('guru/layout/css'); ?>
        <link href="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <?php $this->load->view('guru/layout/header'); ?>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <?php $this->load->view('guru/layout/sidebar'); ?>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid mt-3">
                        <div class="d-flex mb-3">
                            <a href="<?php echo base_url("$web"); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><?php echo $title; ?></h4>

                                        <!-- FORM -->
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Siswa</label>
                                            <div class="col-9">
                                                <select class="form-control" id="siswa" name="siswa">
                                                    <option value="">--- Pilih Siswa ---</option>
                                                    <option value="1">Alexander Porat</option>
                                                    <option value="2">Jada Facer</option>
                                                    <option value="3">Kurt Hugo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Nilai UTS</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="uts">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label">Nilai UAS</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="uas">
                                            </div>
                                        </div>
                                        <!-- FORM -->

                                        <!-- FORM ACTION -->
                                        <div class="form-group row mb-3">
                                            <label class="col-3 col-form-label"></label>
                                            <div class="col-9">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                            </div>
                                        </div>
                                        <!-- FORM ACTION -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <?php $this->load->view('guru/layout/footer'); ?>
                </footer>
                <!-- end Footer -->
            </div>
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <?php $this->load->view('guru/layout/right'); ?>
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php $this->load->view('guru/layout/js'); ?>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#datatable").DataTable();
            });
        </script>
    </body>
</html>