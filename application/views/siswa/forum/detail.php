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
                            <div class="col">
                                <div class="card-box">
                                    <h3 class="card-title mb-0">Mata Pelajaran <?php echo $forum['nama']; ?></h3>
                                    <p class="lead"><?php echo $forum['deskripsi']; ?></p>
                                    <div class="my-3 d-flex">
                                        <strong class="mr-2"><i class="fa fa-user"></i> <?php echo $forum['guru']; ?></strong>
                                        <strong><i class="fa fa-school"></i> Kelas <?php echo $forum['kelas']; ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-8 col-md-6 col-sm-12">
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

                                <div class="card">
                                    <div class="card-header d-flex mb-0">
                                        <h4 class="card-title mt-1 mb-0">Daftar Materi</h4>
                                        <div class="ml-auto">
                                            <a href="<?php echo base_url('guru/fmapel/create/'.$forum['id']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Materi</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            <ul class="list-group">
                                                <?php foreach($forumMapel as $fm): ?>
                                                <a href="<?php echo base_url("guru/forum/diskusi/".$fm['id']) ?>" class="font-weight-bold text-dark list-group-action">
                                                    <li class="list-group-item d-flex">
                                                        <b><?php echo $fm['pertemuan'] ?></b>. &nbsp; <?php echo $fm['judul']; ?> 
                                                        <span class="ml-auto badge badge-success badge-pill">Check</span>
                                                    </li>
                                                </a>
                                                <?php endforeach; ?>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex mb-0">
                                        <h4 class="card-title mt-1 mb-0">Code</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Silahkan Bagikan Kode dibawah ini kepada para Siswa. Kode ini dikhusukan untuk siswa, agar bisa bergabung.</p>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="kode" value="<?php echo $forum['kode']; ?>" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-dark waves-effect waves-light" id="copy" type="button"><i class="fa fa-copy"></i> Copy</button>
                                                </div>
                                            </div>
                                        </div>
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
        <script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#copy").click(function() {
                    var copyText = document.getElementById("kode");
                    copyText.select();
                    copyText.setSelectionRange(0, 99999)
                    document.execCommand("copy");
                    alert("Berhasil Copy");
                });
            });
        </script>
    </body>
</html>