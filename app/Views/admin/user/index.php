<?php echo $this->extend('admin/layout/template'); ?>

<?php echo $this->section('css'); ?>
<link href="<?php echo base_url(); ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php echo $this->endSection('css'); ?>

<?php echo $this->section('content'); ?>
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-header bg-blue py-3">
                <h5 class="card-title mb-0 text-white">Data <?php echo $title; ?></h5>
            </div>
            <div class="card-body table-responsive">
                <div class="mb-3">
                    <a href="" class="btn btn-primary">Tambah Data</a>
                    <a href="" class="btn btn-primary">Tambah Data</a>
                </div>
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
                        <tr>
                            <td>1</td>
                            <td>123</td>
                            <td>Admin</td>
                            <td>Tadi</td>
                            <td>
                                <a href="" class="btn btn-info btn-rounded waves-effect waves-light">
                                    <span class="btn-label"><i class="fa fa-edit"></i></span> Edit
                                </a>
                                <a href="" class="btn btn-danger btn-rounded waves-effect waves-light">
                                    <span class="btn-label"><i class="fa fa-trash-alt"></i></span> Hapus
                                </a>
                            </td>
                        </tr>
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