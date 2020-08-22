<?php echo $this->extend('guru/layout/template'); ?>

<?php echo $this->section('css'); ?>
<link href="<?php echo base_url(); ?>/assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
<?php echo $this->endSection('css'); ?>

<?php echo $this->section('content'); ?>
<div class="row mb-3">
    <!-- COL -->
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card-box">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th width="125">Mata Pelajaran</th>
                        <th>:</th>
                        <td><?php echo $detail['mapel']; ?></td>
                    </tr>
                    <tr>
                        <th width="125">Kelas</th>
                        <th>:</th>
                        <td><?php echo $detail['kelas']; ?></td>
                    </tr>
                    <tr>
                        <th width="125">Materi</th>
                        <th>:</th>
                        <td><?php echo $detail['judul']; ?></td>
                    </tr>
                    <tr>
                        <th width="125">Pengajar</th>
                        <th>:</th>
                        <td><?php echo $detail['guru']; ?></td>
                    </tr>
                </table>
                <div>
                    <h5 class="bg-light p-2">Deskripsi</h5>
                    <p><?php echo $detail['deskripsi']; ?></p>
                </div>
                <div>
                    <h5 class="bg-light p-2">Berkas</h5>
                    <a href="<?php echo base_url("$web/berkas/".$detail['id']); ?>" class="btn btn-success"><i class="fa fa-download mr-1"></i> DOWNLOAD</a>
                </div>
            </div>
        </div>
    </div>
    <!-- COL -->

    <!-- COL -->
    <div class="col-xl-8 col-lg-8 col-md-6">
        <!-- FORM -->
        <div class="card-box">
            <form action="<?php echo base_url("$web/comment/".$detail['id']); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <textarea class="form-control" id="summernote" name="comment"></textarea>
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

        <!-- Comment -->
        <?php foreach($diskusi as $diskusis): ?>
        <div class="card-box">
            <div class="border border-light p-2 mb-3">
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0"><?php echo session()->get('nama_lengkap'); ?></h5>
                        <small><?php echo date('d-m-Y H:i:s', strtotime($diskusis['created_at'])); ?></small>
                        <p><?php echo $diskusis['comment']; ?></p>

                        <?php if($diskusis['berkas'] != null): ?>
                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download Berkas</a>
                        <?php endif; ?>

                        <div class="mt-2">
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted">
                                <i class="mdi mdi-reply"></i> Reply
                            </a>
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted edit" data-toggle="modal" data-target="#modal-edit<?php echo $diskusis['id']; ?>" data-id="<?php echo $diskusis['id']; ?>">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </div>

                        <!-- Modal Edit -->
                        <div id="modal-edit<?php echo $diskusis['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="standard-modalLabel">Edit Komentar</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <?php 
                                        $db         = \Config\Database::connect();
                                        $query      = $db->query("SELECT * FROM forum_diskusi WHERE id = ".$diskusis['id'])->getRowArray();
                                        ?>
                                        <form action="<?php echo base_url("$web/commentEdit/".$query['id']); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id_forum" value="<?php echo $detail['id']; ?>">
                                            <textarea class="form-control" id="summernote-edit" name="comment"><?php echo $query['comment']; ?></textarea>
                                            <div class="d-flex mt-1">
                                                <div class="mr-auto">
                                                    <input type="file" class="form-control" id="berkas-edit" name="berkas">
                                                    <input type="hidden" id="berkas-edit-lama" name="berkas-lama" value="<?php echo $query['berkas']; ?>">
                                                    <small>Tidak wajib melakukan <b>UPLOAD BERKAS</b>. Jika tidak dibutuhkan, harap dikosongkan</small>
                                                </div>
                                                <div class="ml-auto">
                                                    <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- Modal Edit -->
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="card-box">

            <div class="border border-light p-2 mb-3">
                <div class="media mb-3">
                    <div class="media-body">
                        <h5 class="mt-0">Media heading</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                        <div class="mt-2">
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted">
                                <i class="mdi mdi-reply"></i> Reply
                            </a>
                        </div>

                        <div class="media mt-3">
                            <div class="media-body ml-3">
                                <h5 class="mt-0">Media heading</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                                <div class="mt-2">
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted">
                                        <i class="mdi mdi-reply"></i> Reply
                                    </a>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Comment -->


    </div>
    <!-- COL -->
</div>
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('js'); ?>
<script src="<?php echo base_url(); ?>/assets/libs/summernote/summernote-bs4.min.js"></script>
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

        // Modal
        // $(".edit").click(function() {
        //     let id = $(this).data('id');
        //     $("#edit-modal").modal("show");
        // });
        // Modal
    })
</script>
<?php echo $this->endSection('js'); ?>