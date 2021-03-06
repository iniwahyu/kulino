<?php echo $this->extend('admin/layout/template'); ?>

<?php echo $this->section('css'); ?>
<link href="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php echo $this->endSection('css'); ?>

<?php echo $this->section('content'); ?>
<div class="row mb-3">
    <div class="col">
        <div class="mb-3">
            <a href="<?php echo base_url("$web"); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>

        <?php if(session()->get('sukses')): ?>
        <div class="alert alert-success bg-success text-white border-0" role="alert">
            <?php echo session()->get('sukses') ?>
        </div>
        <?php endif; ?>

        <?php if(session()->get('error')): ?>
        <div class="alert alert-danger bg-danger text-white border-0" role="alert">
            <?php echo session()->get('error') ?>
        </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header bg-blue py-3">
                <h5 class="card-title mb-0 text-white"><?php echo $title; ?></h5>
            </div>
            <form action="<?php echo base_url("$web/update/".$siswa['id']); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body table-responsive">                
                    <!-- Form -->
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Username *</label>
                        <div class="col-9">
                            <select class="form-control" name="username" required>
                                <option value="">--- Pilih Username ---</option>
                                <?php foreach($user as $users): ?>
                                    <option value="<?php echo $users['id']; ?>" <?php echo $users['id'] == $siswa['id_user'] ? 'selected' : ''; ?> ><?php echo $users['username']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">NIS *</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="nis" value="<?php echo $siswa['nis']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Nama Lengkap *</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="nama" value="<?php echo $siswa['nama']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Jenis Kelamin *</label>
                        <div class="col-9">
                            <select class="form-control" name="jenis_kelamin" required>
                                <option value="">--- Pilih Jenis Kelamin ---</option>
                                <option value="Laki-Laki" <?php echo $siswa['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php echo $siswa['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">Email *</label>
                        <div class="col-9">
                            <input type="email" class="form-control" name="email" value="<?php echo $siswa['email']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-3 col-form-label">No HP *</label>
                        <div class="col-9">
                            <input type="number" class="form-control" name="nohp" value="<?php echo $siswa['nohp']; ?>" required>
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
<script src="<?php echo base_url(); ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/admin/user.js"></script>
<?php echo $this->endSection('js'); ?>