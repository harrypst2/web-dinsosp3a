<?= $this->extend("app/_layouts/app") ?>

<?= $this->section("body") ?>
<div class="col-12">
    <form action="<?= base_url($settings->panelPrefix . '/contact/update') ?>" method="post">
        <?= csrf_field() ?>
        <div class="card shadow-sm border-0 rounded-3 mb-4">
            <div class="card-header bg-white border-bottom py-3 px-4">
                <h3 class="card-title fw-bold mb-0 d-flex align-items-center gap-2">
                    <?= tabler_icon("phone", "text-primary") ?>
                    Informasi Kontak Utama
                </h3>
                <div class="card-subtitle text-muted mt-1">Atur informasi kontak yang tampil pada halaman publik</div>
            </div>
            <div class="card-body px-4 pb-4">
                <div class="row g-4">
                    <!-- Telepon -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <?= tabler_icon("phone", "text-primary") ?>
                                </span>
                                <input type="text" name="phone" 
                                    class="form-control border-start-0" 
                                    value="<?= esc($phone) ?>" 
                                    placeholder="+62...">
                            </div>
                            <small class="form-hint">Nomor telepon resmi kantor</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi Telepon</label>
                            <textarea name="desc_phone" class="form-control" rows="2" 
                                placeholder="Deskripsi singkat..."><?= esc($desc_phone) ?></textarea>
                            <small class="form-hint">Teks pendek yang tampil di bawah judul "Telepon"</small>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <?= tabler_icon("mail", "text-info") ?>
                                </span>
                                <input type="email" name="email" 
                                    class="form-control border-start-0" 
                                    value="<?= esc($email) ?>" 
                                    placeholder="email@instansi.go.id">
                            </div>
                            <small class="form-hint">Surel resmi instansi untuk korespondensi</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi Email</label>
                            <textarea name="desc_email" class="form-control" rows="2" 
                                placeholder="Deskripsi singkat..."><?= esc($desc_email) ?></textarea>
                            <small class="form-hint">Teks pendek yang tampil di bawah judul "Email"</small>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Kantor / Lokasi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <?= tabler_icon("map-pin", "text-danger") ?>
                                </span>
                                <input type="text" name="address" 
                                    class="form-control border-start-0" 
                                    value="<?= esc($address) ?>" 
                                    placeholder="Alamat lengkap kantor...">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi Lokasi</label>
                            <textarea name="desc_location" class="form-control" rows="2" 
                                placeholder="Deskripsi singkat..."><?= esc($desc_location) ?></textarea>
                            <small class="form-hint">Teks pendek yang tampil di bawah judul "Lokasi"</small>
                        </div>
                    </div>

                    <!-- Google Maps -->
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">URL Embed Google Maps</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <?= tabler_icon("world", "text-success") ?>
                                </span>
                                <input type="text" name="gmaps" 
                                    class="form-control border-start-0" 
                                    value="<?= esc($gmaps) ?>" 
                                    placeholder="https://www.google.com/maps/embed?...">
                            </div>
                            <small class="form-hint">
                                Buka Google Maps → Bagikan → Embed peta → Salin URL dari atribut <code>src</code>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light-subtle d-flex justify-content-end py-3 px-4 gap-2">
                <a href="<?= base_url('contact') ?>" target="_blank" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                    <?= tabler_icon("eye") ?>
                    Lihat Halaman Publik
                </a>
                <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                    <?= tabler_icon("device-floppy") ?>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Map Preview -->
<div class="col-12">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white border-bottom py-3 px-4">
            <h3 class="card-title fw-bold mb-0 d-flex align-items-center gap-2">
                <?= tabler_icon("map", "text-success") ?>
                Pratinjau Peta
            </h3>
            <div class="card-subtitle text-muted mt-1">Preview peta yang tampil di halaman kontak publik</div>
        </div>
        <div class="card-body p-0 overflow-hidden rounded-bottom-3" style="height: 320px;">
            <iframe src="<?= esc($gmaps) ?>" 
                width="100%" height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
