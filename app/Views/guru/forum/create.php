<?php echo $this->extend('guru/layout/template'); ?>

<?php echo $this->section('css'); ?>
<link href="<?php echo base_url(); ?>/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php echo $this->endSection('css'); ?>

<?php echo $this->section('content'); ?>
<div class="row mb-3">
    <div class="col-sm-4">
        <a href="" class="btn btn-danger btn-rounded waves-effect waves-light">
            <i class="fa fa-plus"></i> Tambah Forum
        </a>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <div class="card">
        <div class="card-header bg-blue py-3">
                <h5 class="card-title mb-0 text-white"><?php echo $title; ?></h5>
            </div>
            <form action="<?php echo base_url("$web/store"); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body table-responsive">                
                    <!-- Form -->
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Judul Forum/Diskusi</label>
                        <div class="col-9">
                            <select class="form-control" id="mapel" name="mapel" data-toggle="select2" required>
                                <option value="">--- Pilih Kelas dan Mata Pelajaran ---</option>
                                <option value="1">Kelas 7 - Bahasa Indonesia</option>
                                <option value="2">Kelas 7 - Matematika</option>
                                <option value="3">Kelas 7 - Bahasa Inggris</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Deskripsi Singkat</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Keterangan Forum ini...">
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
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('js'); ?>
<script src="<?php echo base_url(); ?>/assets/libs/select2/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#mapel').select2();
});
</script>
<?php echo $this->endSection('js'); ?>