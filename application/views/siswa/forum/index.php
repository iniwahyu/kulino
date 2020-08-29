<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('siswa/layout/css'); ?>
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <?php $this->load->view('siswa/layout/header'); ?>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <?php $this->load->view('siswa/layout/sidebar'); ?>
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
                            
                            <?php endforeach; ?>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <button href="javascript:void(0);" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#standard-modal"><i class="fa fa-users-cog"></i> Gabung Forum</button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <?php foreach($forum as $forums): ?>
                            <div class="col-lg-4">
                                <div class="card-box project-box">
                                    <!-- Title-->
                                    <h4 class="mt-0"><a href="<?php echo base_url("$web/detail/".$forums['id']); ?>" class="text-dark"><?php echo $forums['mapel']; ?></a></h4>
                                    <p class="text-muted text-u  ppercase"><i class="mdi mdi-account-circle"></i> <small><?php echo $forums['guru']; ?></small></p>
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

                <!-- Modal Join -->
                <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="standard-modalLabel">Gabung Forum</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="<?php echo base_url("$web/join"); ?>" id="formJoin" method="post">
                                <div class="modal-body">
                                    <div class="form-group row mb-3">
                                        <label class="col-3 col-form-label">Kode Forum</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="kode" name="kode" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- Modal Join -->

                <!-- Footer Start -->
                <footer class="footer">
                    <?php $this->load->view('siswa/layout/footer'); ?>
                </footer>
                <!-- end Footer -->
            </div>
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <?php $this->load->view('siswa/layout/right'); ?>
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php $this->load->view('siswa/layout/js'); ?>
        <script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>
        <script>
            $(document).ready(function() {
                // Form Join
                $("#formJoin").on("submit", function(e) {
                    e.preventDefault();
                    let t = $(this);
                    $.ajax({
                        url: t.attr('action'),
                        type: t.attr('method'),
                        dataType: 'JSON',
                        data: t.serialize(),
                        success: (res) => {
                            if(res.status == 200) { 
                                alert(res.message);
                                location.reload();
                            } else {
                                alert(res.message);
                                location.reload();
                            }
                        },
                    });
                });
                // Form Join
            });
        </script>
    </body>
</html>