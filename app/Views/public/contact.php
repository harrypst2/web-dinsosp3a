<?= $this->extend("public/_layouts/default") ?>

<?= $this->section("hero") ?>
<section class="bg-half bg-light d-table w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h4 class="title text-dark"> <?= $page ?> </h4>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Utama</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
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
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card border-0 text-center features feature-clean p-4 rounded shadow transition-hover h-100" 
                     style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3) !important;">
                    <div class="icons text-primary text-center mx-auto bg-soft-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="uil uil-whatsapp d-block h2 mb-0"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="fw-bold text-dark">WhatsApp</h5>
                        <p class="text-muted"><?= $desc_phone ?: 'Hubungi kami melalui WhatsApp untuk respon cepat' ?></p>
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $phone) ?>" target="_blank" class="h5 text-primary fw-bold"><?= $phone ?></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 text-center features feature-clean p-4 rounded shadow transition-hover h-100"
                     style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3) !important;">
                    <div class="icons text-primary text-center mx-auto bg-soft-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="uil uil-envelope d-block h2 mb-0"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="fw-bold text-dark">Email</h5>
                        <p class="text-muted"><?= $desc_email ?: 'Kirimkan pertanyaan melalui surel' ?></p>
                        <a href="mailto:<?= $email ?>" class="h5 text-primary fw-bold"><?= $email ?></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                <div class="card border-0 text-center features feature-clean p-4 rounded shadow transition-hover h-100"
                     style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3) !important;">
                    <div class="icons text-primary text-center mx-auto bg-soft-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="uil uil-map-marker d-block h2 mb-0"></i>
                    </div>
                    <div class="content mt-4">
                        <h5 class="fw-bold text-dark">Lokasi</h5>
                        <p class="text-muted"><?= $address ?></p>
                        <a href="<?= $gmaps ?>" data-type="iframe" class="video-play-icon text-primary lightbox fw-bold">
                            <i class="uil uil-external-link-alt me-1"></i> Buka Petunjuk Arah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title mb-5">
                    <h4 class="title mb-4">Aksesibilitas & Bantuan</h4>
                    <p class="text-muted para-desc mx-auto">Kantor kami terbuka untuk kunjungan publik selama jam operasional. Jika Anda memiliki pertanyaan mendesak, silakan hubungi nomor hotline kami atau kunjungi lokasi kami secara langsung.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="d-flex contact-detail align-items-center justify-content-center">
                    <div class="icon">
                        <i data-feather="clock" class="fea icon-m-md text-primary me-3"></i>
                    </div>
                    <div class="content">
                        <h6 class="title fw-bold mb-0">Jam Operasional</h6>
                        <p class="text-muted mb-0">Senin - Jumat: 08:00 - 16:00 WIB</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-3 mt-sm-0">
                <div class="d-flex contact-detail align-items-center justify-content-center">
                    <div class="icon">
                        <i data-feather="map-pin" class="fea icon-m-md text-primary me-3"></i>
                    </div>
                    <div class="content">
                        <h6 class="title fw-bold mb-0">Alamat Kantor</h6>
                        <p class="text-muted mb-0"><?= $address ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card map map-height-two rounded border-0 shadow-lg overflow-hidden">
                    <div class="card-body p-0">
                        <iframe src="<?= $gmaps ?>" style="border:0; height: 450px;" class="w-100" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
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
    .map iframe {
        width: 100%;
        height: 300px;
    }
    .fea.icon-sm {
        height: 16px;
        width: 16px;
        position: absolute;
        top: 11px;
        left: 15px;
        color: #3c4858;
    }
</style>
<?= $this->endSection() ?>