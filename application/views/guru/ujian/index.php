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
                            <a href="<?php echo base_url("$web/create"); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Nilai</a>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3"><?php echo $title; ?></h4>
                                        <table class="table table-striped dt-responsive nowrap w-100" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>UTS</th>
                                                    <th>UAS</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Ashton Cox</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cedric Kelly</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Airi Satou</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Brielle Williamson</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Herrod Chandler</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Rhona Davidson</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Colleen Hurst</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sonya Frost</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jena Gaines</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Quinn Flynn</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Charde Marshall</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Haley Kennedy</td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td><?php echo rand(70, 95); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("$web/edit/1"); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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