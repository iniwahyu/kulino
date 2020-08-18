<?php echo $this->extend('guru/layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="row mb-3">
    <div class="col-sm-4">
        <a href="<?php echo base_url("$web/create") ?>" class="btn btn-danger btn-rounded waves-effect waves-light">
            <i class="fa fa-plus"></i> Tambah Forum
        </a>
    </div>
</div>
<div class="row mb-3">
    <?php foreach($forum as $forums): ?>
    <div class="col-lg-4">
        <div class="card-box project-box">
            <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Delete</a>
                    <a class="dropdown-item" href="#">Add Members</a>
                    <a class="dropdown-item" href="#">Add Due Date</a>
                </div>
            </div> <!-- end dropdown -->
            <!-- Title-->
            <h4 class="mt-0"><a href="<?php echo base_url("$web/detail/".$forums['id']); ?>" class="text-dark"><?php echo $forums['nama']; ?></a></h4>
            <p class="text-muted text-u  ppercase"><i class="mdi mdi-account-circle"></i> <small><?php echo $forums['nama']; ?></small></p>
            <div class="badge bg-soft-success text-success mb-3">Kelas <?php echo $forums['kelas'] ?></div>
            <!-- Desc-->
            <p class="text-muted font-13 mb-3 sp-line-2">
                <?php echo $forums['deskripsi']; ?>
            </p>
            <!-- Task info-->
            <p class="mb-1">
                <span class="pr-2 text-nowrap mb-2 d-inline-block">
                    <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                    <b>5</b> Materi
                </span>
                <span class="text-nowrap mb-2 d-inline-block">
                    <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                    <b>10</b> Peserta
                </span>
            </p>

        </div> <!-- end card box-->
    </div><!-- end col-->
    <?php endforeach; ?>
</div>
<?php echo $this->endSection('content'); ?>