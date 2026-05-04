<?= $this->extend("public/_layouts/default") ?>

<!-- Card Renderer Helper -->
<?php
// Define the card renderer at the top so it's available below
$renderCard = function($human, $size = 'small') {
    $imgSize = ($size == 'large') ? '140px' : (($size == 'medium') ? '120px' : '100px');
    $titleClass = ($size == 'large') ? 'h5' : 'h6';
    $cardClass = ($size == 'large') ? 'py-5 px-4 shadow-lg' : 'py-4 px-3 shadow';
    ?>
    <div class="card team text-center border-0 rounded-md transition-hover overflow-hidden mb-4 <?= $cardClass ?>" 
         style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.4) !important;">
        <div class="card-body p-0">
            <div class="position-relative mb-3">
                <img src="<?= safe_photo($human->photo) ?>" class="img-fluid avatar rounded-circle shadow-md border-3 border-white mx-auto" alt="<?= $human->name ?>" style="width: <?= $imgSize ?>; height: <?= $imgSize ?>; object-fit: cover;">
            </div>
            <div class="content">
                <h6 class="name mb-0 text-dark fw-bold <?= $titleClass ?>"><?= $human->name ?></h6>
                <?php if ($human->position) : ?>
                    <small class="text-primary d-block mt-1 fw-medium" style="font-size: 0.85rem;"><?= $human->position ?></small>
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
                    <p class="text-muted para-desc mx-auto">Struktur organisasi dan jajaran pegawai profesional kami yang berdedikasi tinggi.</p>
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
        <?php if (!empty($employeesTree)) : ?>
            <!-- LEVEL 1: KEPALA DINAS -->
            <div class="row justify-content-center">
                <?php foreach ($employeesTree as $kadin) : ?>
                    <div class="col-lg-4 col-md-6">
                        <?php $renderCard($kadin, 'large'); ?>
                    </div>
                <?php endforeach ?>
            </div>

            <!-- LEVEL 2: SEKRETARIS DINAS -->
            <?php foreach ($employeesTree as $kadin) : ?>
                <?php if (isset($kadin->children)) : ?>
                    <div class="row justify-content-center">
                        <?php foreach ($kadin->children as $sekdis) : ?>
                            <div class="col-lg-4 col-md-6">
                                <?php $renderCard($sekdis, 'medium'); ?>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <!-- LEVEL 3: KEPALA BIDANG -->
                    <div class="row justify-content-center mt-4">
                        <?php foreach ($kadin->children as $sekdis) : ?>
                            <?php if (isset($sekdis->children)) : ?>
                                <?php foreach ($sekdis->children as $kabid) : ?>
                                    <div class="col-lg-3 col-md-6 mt-4">
                                        <?php $renderCard($kabid, 'small'); ?>
                                        
                                        <!-- LEVEL 4: STAFF UNDER KABID -->
                                        <?php if (isset($kabid->children)) : ?>
                                            <div class="row mt-1 g-2 justify-content-center">
                                                <?php foreach ($kabid->children as $staff) : ?>
                                                    <div class="col-6">
                                                        <div class="card team text-center border-0 shadow-sm rounded-md overflow-hidden staff-card h-100">
                                                            <div class="p-2">
                                                                <img src="<?= safe_photo($staff->photo) ?>" class="img-fluid rounded-circle mb-2" style="width: 50px; height: 50px; object-fit: cover;">
                                                                <h6 class="name mb-0 text-dark" style="font-size: 11px;"><?= $staff->name ?></h6>
                                                                <small class="text-muted d-block" style="font-size: 9px; line-height: 1.1;"><?= $staff->position ?></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        <?php else : ?>
            <div class="row justify-content-center pt-5 mt-5">
                <div class="col-12 text-center">
                    <div class="alert alert-light shadow-sm">
                        <i data-feather="info" class="fea icon-sm text-info me-2"></i>
                        Data pegawai belum diatur hirarkinya. Silakan atur melalui Panel Admin.
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
    .staff-card {
        background: #f8f9fc;
        border: 1px solid #edf2f9 !important;
        transition: all 0.2s;
    }
    .staff-card:hover {
        background: #ffffff;
        box-shadow: 0 5px 10px rgba(0,0,0,0.05) !important;
    }
    .shadow-md {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08) !important;
    }
    .border-3 {
        border-width: 3px !important;
    }
</style>
<?= $this->endSection() ?>