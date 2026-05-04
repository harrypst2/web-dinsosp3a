<?= $this->extend("public/_layouts/default") ?>

<!-- Card Renderer Helper -->
<?php
$renderCard = function($human, $size = 'small') {
    $imgSize = ($size == 'large') ? '120px' : (($size == 'medium') ? '100px' : '85px');
    $titleClass = ($size == 'large') ? 'h5' : 'h6';
    $cardClass = ($size == 'large') ? 'py-4 px-3 shadow-lg' : (($size == 'medium') ? 'py-3 px-2 shadow-md' : 'py-3 px-2 shadow-sm');
    ?>
    <div class="card team text-center border-0 rounded-md transition-hover overflow-hidden mb-3 <?= $cardClass ?>" 
         style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.4) !important;">
        <div class="card-body p-0">
            <div class="position-relative mb-2">
                <img src="<?= safe_photo($human->photo) ?>" class="img-fluid avatar rounded-circle shadow-md border-3 border-white mx-auto" alt="<?= $human->name ?>" style="width: <?= $imgSize ?>; height: <?= $imgSize ?>; object-fit: cover;">
            </div>
            <div class="content">
                <h6 class="name mb-0 text-dark fw-bold" style="font-size: <?= ($size == 'large') ? '18px' : (($size == 'medium') ? '16px' : '14px') ?>;"><?= $human->name ?></h6>
                <?php if ($human->position) : ?>
                    <small class="text-primary d-block mt-1 fw-bold" style="font-size: 13px;"><?= $human->position ?></small>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php
};
?>

<?= $this->section("hero") ?>
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h4 class="title text-dark"> <?= $page ?> </h4>
                    <p class="text-muted para-desc mx-auto">Hirarki kepemimpinan dan struktur organisasi resmi kami.</p>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Utama</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $page ?></li>
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
        <?php if (!empty($orgsTree)) : ?>
            
            <?php foreach ($orgsTree as $kadin) : ?>
                <!-- BARIS 1: KEPALA DINAS & SEKRETARIS DINAS -->
                <div class="row justify-content-center mb-5">

                    <div class="col-lg-4 col-md-6">
                        <?php $renderCard($kadin, 'large'); ?>
                    </div>
                    
                    <?php 
                    $sekdis = null;
                    $kabids = [];
                    if (isset($kadin->children) && !empty($kadin->children)) {
                        foreach ($kadin->children as $index => $child) {
                            if ($index === 0) {
                                $sekdis = $child;
                            } else {
                                $kabids[] = $child;
                            }
                        }
                    }
                    ?>

                    <?php if ($sekdis) : ?>
                        <div class="col-lg-4 col-md-6">
                            <?php $renderCard($sekdis, 'large'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <!-- BARIS 2: SELURUH KEPALA BIDANG -->
                <?php if (!empty($kabids)) : ?>
                    <div class="row justify-content-center mb-5">

                        <?php foreach ($kabids as $kabid) : ?>
                            <div class="col-lg-3 col-md-6">
                                <?php $renderCard($kabid, 'medium'); ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <!-- BARIS 3: PENGELOMPOKAN SESUAI BIDANG (STAF) -->
                <div class="row mt-5">
                    <!-- SEKSI SEKRETARIAT -->
                    <?php if ($sekdis && isset($sekdis->children) && !empty($sekdis->children)) : ?>
                        <div class="col-12 mb-5">
                            <div class="p-4 rounded-md shadow-sm border-0" style="background: #f8f9fc; border-left: 5px solid #2f55d4 !important;">
                                <div class="section-title mb-4">
                                    <h5 class="title text-uppercase fw-bold m-0" style="font-size: 18px !important; color: #2f55d4;">Sekretariat</h5>
                                </div>
                                <div class="row">
                                    <?php foreach ($sekdis->children as $sek_staff) : ?>
                                        <div class="col-lg-2 col-md-4 col-6">
                                            <?php $renderCard($sek_staff, 'small'); ?>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <!-- SEKSI BIDANG-BIDANG -->
                    <?php if (!empty($kabids)) : ?>
                        <?php foreach ($kabids as $kabid) : ?>
                            <?php if (isset($kabid->children) && !empty($kabid->children)) : ?>
                                <div class="col-12 mb-5">
                                    <div class="p-4 rounded-md shadow-sm border-0" style="background: #fff; border: 1px solid #edf2f9 !important; border-left: 5px solid #3c4858 !important;">
                                        <div class="section-title mb-4">
                                            <?php 
                                            // Logic: If bidang is generic "Kepala Bidang", use the position or a fallback
                                            $displayBidang = $kabid->bidang;
                                            if (strcasecmp($displayBidang, 'Kepala Bidang') === 0) {
                                                // Try to get more specific name from the first child if possible, 
                                                // or just use 'Bidang Terkait'
                                                $displayBidang = 'Bidang Terkait';
                                            }
                                            ?>
                                            <h5 class="title text-uppercase fw-bold m-0" style="font-size: 18px !important; color: #3c4858;"><?= $displayBidang ?></h5>
                                        </div>
                                        <div class="row">
                                            <?php foreach ($kabid->children as $staff) : ?>
                                                <div class="col-lg-2 col-md-4 col-6">
                                                    <?php $renderCard($staff, 'small'); ?>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>

            <?php endforeach ?>

        <?php else : ?>
            <div class="row justify-content-center pt-5 mt-5">
                <div class="col-12 text-center">
                    <div class="alert alert-light shadow-sm">
                        <i data-feather="info" class="fea icon-sm text-info me-2"></i>
                        Struktur belum diatur. Silakan tambahkan data melalui Panel Admin menu Struktur Organisasi.
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
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(60, 72, 88, 0.1) !important;
    }
    .shadow-md {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08) !important;
    }
    .border-3 {
        border-width: 3px !important;
    }
    .rounded-md {
        border-radius: 12px !important;
    }
    .bg-soft-primary {
        background-color: rgba(47, 85, 212, 0.1) !important;
        color: #2f55d4 !important;
    }
    .bg-soft-info {
        background-color: rgba(23, 162, 184, 0.1) !important;
        color: #17a2b8 !important;
    }
    .ls-2 {
        letter-spacing: 2px;
    }
</style>
<?= $this->endSection() ?>