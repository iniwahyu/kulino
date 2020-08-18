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
            <form action="<?php echo base_url("$web/store"); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
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
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('js'); ?>
<script src="<?php echo base_url(); ?>/assets/libs/select2/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#pertemuan').select2();
});
</script>
<?php echo $this->endSection('js'); ?>