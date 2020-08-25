<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('guru/layout/css'); ?>
        <link href="<?php echo base_url(); ?>/assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
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
                            <!-- COL -->
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="card-box">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th width="125">Mata Pelajaran</th>
                                                <th>:</th>
                                                <td><?php echo $forum['mapel']; ?></td>
                                            </tr>
                                            <tr>
                                                <th width="125">Kelas</th>
                                                <th>:</th>
                                                <td><?php echo $forum['kelas']; ?></td>
                                            </tr>
                                            <tr>
                                                <th width="125">Materi</th>
                                                <th>:</th>
                                                <td><?php echo $forum['judul']; ?></td>
                                            </tr>
                                            <tr>
                                                <th width="125">Pengajar</th>
                                                <th>:</th>
                                                <td><?php echo $forum['guru']; ?></td>
                                            </tr>
                                        </table>
                                        <div>
                                            <h5 class="bg-light p-2">Deskripsi</h5>
                                            <p><?php echo $forum['deskripsi']; ?></p>
                                        </div>
                                        <div>
                                            <h5 class="bg-light p-2">Berkas</h5>
                                            <a href="<?php echo base_url("$web/berkas/".$forum['id']); ?>" class="btn btn-success"><i class="fa fa-download mr-1"></i> DOWNLOAD</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL -->

                            <!-- COL -->
                            <div class="col-xl-8 col-lg-8 col-md-6">
                                <!-- FORM -->
                                <div class="card-box">
                                    <form action="<?php echo base_url("$web/comment/".$forum['id']); ?>" class="form" id="formComment" method="post" enctype="multipart/form-data">
                                        <textarea class="form-control" id="summernote" name="comment" required></textarea>
                                        <div class="d-flex mt-1">
                                            <div class="mr-auto">
                                                <input type="file" class="form-control" id="berkas" name="berkas">
                                                <small>Tidak wajib melakukan <b>UPLOAD BERKAS</b>. Jika tidak dibutuhkan, harap dikosongkan</small>
                                            </div>
                                            <div class="ml-auto">
                                                <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- FORM -->

                                <!-- COMMENT -->
                                <div class="comment">
                                    <!-- <div class="card-box">
                                        <div class="media mb-3 mt-1">
                                            <div class="media-body">
                                                <small class="float-right">Dec 14, 2017, 5:17 AM</small>
                                                <h6 class="mb-2 font-14">Steven Smith</h6>

                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate eveniet corrupti possimus similique quibusdam voluptatem earum, blanditiis modi impedit, porro iusto cum officia obcaecati sequi vero temporibus commodi laboriosam ipsam.</p>

                                                <div class="mt-1">
                                                    <a href="" class="btn btn-primary mr-2"><i class="mdi mdi-reply mr-1"></i> Reply</a>
                                                    <a href="" class="btn btn-warning"><i class="fa fa-edit ml-1"></i> Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- COMMENT -->
                            </div>
                            <!-- COL -->
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
        <script src="<?php echo base_url(); ?>/assets/libs/summernote/summernote-bs4.min.js"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/app.min.js"></script>
        <script>
            $(document).ready(function (params) {
                // Summernote
                $("#summernote, #summernote-edit").summernote({
                    height: 100,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                    ]
                });
                // Summernote

                // Pusher
                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;

                var pusher = new Pusher('b2996c15c176cee9cf0f', {
                    cluster: 'ap1'
                });

                var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {
                    // alert(JSON.stringify(data));
                    showComment();
                });
                // Pusher
                showComment();

                // Comment Show
                function showComment() {
                    $.ajax({
                        url: '<?php echo base_url("guru/forum/showComment/".$forum['id']); ?>',
                        type: 'GET',
                        async: true,
                        dataType: 'JSON',
                        success: (res) => {
                            var html = '';
                            var count = 1;
                            var i;
                            for(i=0; i<res.length; i++) {
                                html += '<div class="card-box">'+
                                            '<div class="media mb-3 mt-1">'+
                                                '<div class="media-body">'+
                                                    '<small class="float-right">'+res[i].created_at+'</small>'+
                                                    '<h6 class="mb-2 font-14">'+res[i].pengguna+'<span class="btn btn-sm btn-primary waves-effect waves-light btn-rounded ml-2">'+res[i].level+'</span></h6>'+
                                                    '<p>'+res[i].comment+'</p>'+
                                                    '<div class="mt-1">'+
                                                        '<button class="btn btn-primary mr-2 reply" data-id="'+res[i].id+'"><i class="mdi mdi-reply mr-1"></i> Reply</button>'+
                                                        '<button class="btn btn-warning edit" id="edit" data-id="'+res[i].id+'"><i class="fa fa-edit ml-1"></i> Edit</button>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>';
                            }
                            $(".comment").html(html);
                        }
                    });
                }
                // Comment Show

                // Comment Add
                $("#formComment").on("submit", function(e) {
                    e.preventDefault();
                    let t = $(this);
                    $.ajax({
                        url: t.attr('action'),
                        type: t.attr('method'),
                        dataType: 'JSON',
                        processData : false,
                        contentType : false,
                        data		: new FormData(this),
                        success     : (res) => {
                            $("#summernote").summernote("");
                        }
                    });
                });
                // Comment Add

                // Comment Edit
                $('.comment').on('click', '#edit', function() {
                    let id = $(this).data('id');
                    alert(id);
                })
                // Comment Edit
            })
        </script>
    </body>
</html>