<?= $this->extend("public/_layouts/default") ?>

<?= $this->section("hero") ?>
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h4 class="title text-dark"> <?= $page ?> </h4>
                    <p class="text-muted para-desc mx-auto">Temukan dan unduh dokumen resmi, laporan, dan berkas penting lainnya dengan mudah.</p>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Utama</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Berkas</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="text-center subcribe-form mb-5">
                    <form action="<?= base_url('files') ?>" method="get" class="relative">
                        <input type="text" id="s" name="s" class="rounded-pill shadow-lg border-0 ps-4 pe-5" 
                               placeholder="Cari nama berkas atau dokumen..." value="<?= $keywords ?>"
                               style="height: 60px; font-size: 1.1rem;">
                        <button type="submit" class="btn btn-pills btn-primary" 
                                style="position: absolute; right: 8px; top: 8px; height: 44px; padding: 0 30px;">
                            <i class="uil uil-search me-1"></i> Cari
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <?php if (count($files) <= 0) : ?>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-6 col-md-8 text-center">
                    <img src="<?= base_url("assets/images/404.svg") ?>" class="img-fluid mb-4" alt="" style="max-height: 250px;">
                    <h5 class="text-dark">Wah, berkas tidak ditemukan!</h5>
                    <p class="text-muted">
                        Maaf, kami tidak dapat menemukan berkas dengan kata kunci "<strong><?= $keywords ?></strong>". 
                        Coba gunakan kata kunci lain.
                    </p>
                    <a href="<?= base_url('files') ?>" class="btn btn-soft-primary mt-3">Tampilkan Semua Berkas</a>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <?php foreach ($files as $file) : ?>
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card border-0 shadow rounded p-4 h-100 transition-hover" 
                             style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(5px); border: 1px solid rgba(255, 255, 255, 0.3) !important;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-shape bg-soft-primary rounded p-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <?php 
                                        $ext = pathinfo($file->file, PATHINFO_EXTENSION);
                                        $icon = 'uil-file';
                                        $colorClass = 'text-primary';
                                        
                                        if (in_array($ext, ['pdf'])) { $icon = 'uil-file-info-alt'; $colorClass = 'text-danger'; }
                                        elseif (in_array($ext, ['doc', 'docx'])) { $icon = 'uil-file-word'; $colorClass = 'text-info'; }
                                        elseif (in_array($ext, ['xls', 'xlsx'])) { $icon = 'uil-file-exclamation'; $colorClass = 'text-success'; }
                                        elseif (in_array($ext, ['jpg', 'png', 'jpeg'])) { $icon = 'uil-image-v'; $colorClass = 'text-warning'; }
                                    ?>
                                    <i class="uil <?= $icon ?> h3 mb-0 <?= $colorClass ?>"></i>
                                </div>
                                <div class="ms-3 overflow-hidden">
                                    <h6 class="mb-0 text-dark text-truncate" title="<?= $file->title ?>"><?= $file->title ?></h6>
                                    <small class="text-muted d-block mt-1">
                                        <i class="uil uil-import me-1"></i> <?= $file->downloaded ?>x Unduh
                                    </small>
                                </div>
                            </div>
                            
                            <div class="card-body p-0 mt-2">
                                <p class="text-muted small mb-0" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; height: 60px;">
                                    <?= $file->description ?: 'Tidak ada deskripsi untuk berkas ini.' ?>
                                </p>
                            </div>
                            
                            <div class="mt-4 pt-2 border-top d-flex justify-content-between align-items-center">
                                <span class="badge bg-soft-muted text-muted text-uppercase" style="font-size: 0.7rem;">
                                    <?= strtoupper($ext ?: 'FILE') ?>
                                </span>
                                <a href="<?= base_url("download/" . hashids($file->id)) ?>" class="btn btn-link text-primary fw-bold p-0">
                                    Unduh <i class="uil uil-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <?php if ($pager->getPageCount() > 1) : ?>
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="d-flex justify-content-center">
                        <?= $pager->links("default", "bootstrap") ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</section>

<style>
    .transition-hover {
        transition: all 0.3s ease;
    }
    .transition-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(60, 72, 88, 0.15) !important;
    }
    .bg-soft-primary {
        background-color: rgba(47, 85, 212, 0.1) !important;
    }
    .bg-soft-muted {
        background-color: rgba(132, 146, 166, 0.1) !important;
    }
    .icon-shape {
        flex-shrink: 0;
    }
</style>
<?= $this->endSection() ?>