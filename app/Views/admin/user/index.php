<?php echo $this->extend('admin/layout/template'); ?>

<?php echo $this->section('css'); ?>
<link href="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php echo $this->endSection('css'); ?>

<?php echo $this->section('content'); ?>
<div class="row mb-3">
    <div class="col">
        <div class="mb-3">
            <a href="<?php echo base_url("$web/create"); ?>" class="btn btn-warning"><i class="fa fa-plus"></i> Tambah Data</a>
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
                <h5 class="card-title mb-0 text-white">Data <?php echo $title; ?></h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table dt-responsive nowrap w-100" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username (NIS/NUPTK)</th>
                            <th>Tingkatan</th>
                            <th>Last Login</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($user as $users): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $users['username']; ?></td>
                            <td><?php echo $users['level']; ?></td>
                            <td><?php echo $users['last_login']; ?></td>
                            <td>
                                <a href="<?php echo base_url("$web/edit/".$users['id']); ?>" class="btn btn-info btn-rounded waves-effect waves-light">
                                    <span class="btn-label"><i class="fa fa-edit"></i></span> Edit
                                </a>
                                <a href="<?php echo base_url("$web/delete/".$users['id']); ?>" class="btn btn-danger btn-rounded waves-effect waves-light">
                                    <span class="btn-label"><i class="fa fa-trash-alt"></i></span> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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