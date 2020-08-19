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
            <div class="card-header d-flex mb-0">
                <h4 class="card-title mt-1 mb-0">Daftar Materi</h4>
                <div class="ml-auto">
                    <a href="<?php echo base_url('guru/fmapel/create/'.$forumDetail['id']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Materi</a>
                </div>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <ul class="list-group">
                        <a href="<?php echo base_url("guru/forum/diskusi/".$forumDetail['id']) ?>" class="font-weight-bold text-dark list-group-action">
                            <?php foreach($forumMapel as $fm): ?>
                            <li class="list-group-item d-flex">
                                <b><?php echo $fm['pertemuan'] ?></b>. &nbsp; <?php echo $fm['judul']; ?> 
                                <span class="ml-auto badge badge-success badge-pill">Check</span>
                            </li>
                            <?php endforeach; ?>
                        </a>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header d-flex mb-0">
                <h4 class="card-title mt-1 mb-0">Code</h4>
            </div>
            <div class="card-body">
                <p>Silahkan Bagikan Link dibawah ini kepada para Siswa. Link ini dikhusukan untuk siswa, agar bisa bergabung.</p>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="kode" value="<?php echo base_url("join/".$forumDetail['kode']); ?>" readonly>
                        <div class="input-group-append">
                            <button class="btn btn-dark waves-effect waves-light" id="copy" type="button"><i class="fa fa-copy"></i> Copy</button>
                        </div>
                    </div>
                </div>
                <p>Siswa juga bisa memasukkan Kode ini di bagian <b>Menu Forum</b> dengan memasukkan Kode: <b><?php echo $forumDetail['kode']; ?></b></p>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection('content'); ?>

<?php echo $this->section('js'); ?>
<script>
$("#copy").click(function() {
    var copyText = document.getElementById("kode");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert("Berhasil Copy");
});
</script>
<?php echo $this->endSection('js'); ?>