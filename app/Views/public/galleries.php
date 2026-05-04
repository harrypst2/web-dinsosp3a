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
        <div class="row">
            <?php foreach ($galleries as $gallery) : ?>
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card border-0 work-container work-grid position-relative d-block overflow-hidden rounded shadow transition-hover">
                        <div class="card-body p-0">
                            <a href="<?= safe_gallery($gallery->image) ?>" class="lightbox" title="<?= $gallery->title ?>">
                                <img src="<?= safe_gallery($gallery->image) ?>" class="img-fluid gallery-img" alt="<?= $gallery->title ?>">
                            </a>
                            <div class="content bg-white p-3">
                                <?php if ($gallery->title) : ?>
                                    <h6 class="mb-0 text-dark title"><?= $gallery->title ?></h6>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <div class="row">
            <?php if ($pager->getPageCount() > 1) : ?>
                <div class="col-12 mt-5">
                    <div class="d-flex justify-content-center">
                        <?= $pager->links("default", "bootstrap") ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</section>

<style>
    .gallery-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .work-container:hover .gallery-img {
        transform: scale(1.1);
    }
    .transition-hover {
        transition: all 0.3s ease;
    }
    .transition-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(60, 72, 88, 0.15) !important;
    }
    .work-grid .overlay-work {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        opacity: 0;
        transition: all 0.5s;
    }
    .work-grid .icon-work {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: all 0.5s;
        z-index: 1;
    }
    .work-grid:hover .overlay-work {
        opacity: 0.5;
    }
    .work-grid:hover .icon-work {
        opacity: 1;
    }
</style>
<?= $this->endSection() ?>