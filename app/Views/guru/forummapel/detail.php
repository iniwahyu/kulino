<?php echo $this->extend('guru/layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="row mb-3">
    <div class="col">
        <div class="card-box">
            <h3 class="card-title mb-0">Mata Pelajaran <?php echo $forumDetail['nama']; ?></h3>
            <p class="lead"><?php echo $forumDetail['deskripsi']; ?></p>
            <div class="my-3 d-flex">
                <strong class="mr-2"><i class="fa fa-user"></i> <?php echo $forumDetail['guru']; ?></strong>
                <strong><i class="fa fa-school"></i> Kelas <?php echo $forumDetail['kelas']; ?></strong>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header d-flex mb-0">
                <h4 class="card-title mt-1 mb-0">Daftar Materi</h4>
                <div class="ml-auto">
                    <a href="<?php echo base_url('forum/mapel/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Materi</a>
                </div>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <ul class="list-group list-group-action">
                        <a href="" class="font-weight-bold text-dark">
                            <li class="list-group-item">
                                1. Aljabar
                            </li>
                        </a>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection('content'); ?>