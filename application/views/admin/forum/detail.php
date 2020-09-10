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
                        <div class="col-lg-2">
                            <a href="<?php echo base_url("$web"); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-blue py-3">
                                    <h5 class="card-title mb-0 text-white"><?php echo $title; ?></h5>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Forum</th>
                                            <td><?php echo $forum['mapel']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td><?php echo $forum['deskripsi']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Guru/Pengajar</th>
                                            <td><?php echo $forum['pengajar']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kode Forum</th>
                                            <td><?php echo $forum['kode']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mata Pelajaran</th>
                                            <td>
                                                <?php 
                                                foreach($mapel as $m):
                                                    echo '<li>'.$m['pertemuan'].". ".$m['judul'].'</li>';
                                                endforeach;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Siswa</th>
                                            <td>
                                                <?php 
                                                foreach($siswa as $s):
                                                    echo '<li>'.$s['nama'].'</li>';
                                                endforeach;
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
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
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>
</html>