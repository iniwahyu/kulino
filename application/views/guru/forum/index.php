<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('guru/layout/css'); ?>
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
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <a href="<?php echo base_url("$web/create") ?>" class="btn btn-danger btn-rounded waves-effect waves-light">
                                    <i class="fa fa-plus"></i> Tambah Forum
                                </a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <?php if($this->session->flashdata('sukses')): ?>
                                <div class="alert alert-success bg-success text-white border-0" role="alert">
                                    <?php echo $this->session->flashdata('sukses'); ?>
                                </div>
                                <?php endif; ?>

                                <?php if($this->session->flashdata('gagal')): ?>
                                <div class="alert alert-danger bg-danger text-white border-0" role="alert">
                                    <?php echo $this->session->flashdata('gagal') ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php foreach($forum as $forums): ?>
                            <div class="col-lg-4">
                                <div class="card-box project-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="<?php echo base_url("$web/edit/".$forums['id']); ?>">Edit</a>
                                            <a class="dropdown-item" href="<?php echo base_url("$web/delete/".$forums['id']); ?>">Delete</a>
                                            <a class="dropdown-item" href="#">Add Members</a>
                                            <a class="dropdown-item" href="#">Add Due Date</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <!-- Title-->
                                    <h4 class="mt-0"><a href="<?php echo base_url("$web/detail/".$forums['id']); ?>" class="text-dark"><?php echo $forums['nama']; ?></a></h4>
                                    <p class="text-muted text-u  ppercase"><i class="mdi mdi-account-circle"></i> <small><?php echo $forums['nama']; ?></small></p>
                                    <div class="badge bg-soft-success text-success mb-3">Kelas <?php echo $forums['kelas'] ?></div>
                                    <!-- Desc-->
                                    <p class="text-muted font-13 mb-3 sp-line-2">
                                        <?php echo $forums['deskripsi']; ?>
                                    </p>
                                    <!-- Task info-->
                                    <p class="mb-1">
                                        <span class="pr-2 text-nowrap mb-2 d-inline-block">
                                            <i class="fa fa-list text-muted"></i>
                                            <b><?php echo $this->crud->get_where('*', 'forum_mapel', ['id_forum' => $forums['id']])->num_rows(); ?></b> Materi
                                        </span>
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="fa fa-users text-muted"></i>
                                            <b><?php echo $this->crud->get_where('*', 'forum_anggota', ['id_forum' => $forums['id']])->num_rows(); ?></b> Peserta
                                        </span>
                                    </p>

                                </div> <!-- end card box-->
                            </div><!-- end col-->
                            <?php endforeach; ?>
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
        <script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>
    </body>
</html>