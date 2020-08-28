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
        <a href="<?php echo base_url("$web/detail/".$idForum); ?>" class="btn btn-danger btn-rounded waves-effect waves-light">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
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
            <div class="card-header bg-blue py-3">
                <h5 class="card-title mb-0 text-white"><?php echo $title; ?></h5>
            </div>
            <form action="<?php echo base_url("$web/materiStore/".$idForum); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body table-responsive">                
                    <!-- Form -->
                    <input type="hidden" name="id_forum" value="<?php echo $idForum; ?>">
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Judul Forum/Diskusi</label>
                        <div class="col-9">
                            <select class="form-control" id="pertemuan" name="pertemuan" data-toggle="select2" required>
                                <option value="">--- Pilih Pertemuan ---</option>
                                <?php for($i=1; $i<=14; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Nama Materi</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Ex: Aljabar, Puisi..." required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Deskripsi Materi</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Singkat Materinya..." required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Berkas</label>
                        <div class="col-9">
                            <input type="file" class="form-control" id="berkas" name="berkas" required>
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