<?= $this->extend("app/_layouts/auth") ?>

<?= $this->section("login") ?>
<style>
    body {
        background-color: #f4f6fa;
        background-image: radial-gradient(#dce1e7 1px, transparent 1px);
        background-size: 20px 20px;
    }
    .login-logo {
        display: block;
        margin-bottom: 2rem;
        transition: transform 0.3s ease;
    }
    .login-logo:hover {
        transform: scale(1.05);
    }
    .card-login {
        border: none;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        border-radius: 12px;
    }
    .btn-primary {
        background: #206bc4;
        border: none;
        font-weight: 600;
        padding: 0.6rem;
    }
    .form-label {
        font-weight: 600;
        color: #495057;
    }
</style>

<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center">
            <a href="<?= base_url() ?>" class="login-logo">
                <img src="<?= base_url("assets/images/logo.png") ?>" height="72" alt="<?= $settings->appName ?>">
            </a>
        </div>
        <div class="card card-md card-login">
            <div class="card-body py-5">
                <h2 class="card-title text-center mb-4 fs-2 fw-bold">Masuk ke Panel</h2>
                
                <?= form_open("auth/check", ["autocomplete" => "off"]) ?>
                    <?= $this->include("app/_includes/failed-alert") ?>

                    <div class="mb-3">
                        <label class="form-label">Nama Pengguna</label>
                        <input type="text" name="username" class="form-control" placeholder="admin" value="<?= get_cookie("username_saved") ?>" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Kata Sandi
                            <span class="form-label-description">
                                <a href="javascript:void(0)" class="text-muted small">Lupa sandi?</a>
                            </span>
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                            <span class="input-group-text">
                                <a href="javascript:void(0)" class="link-secondary" id="show-password" title="Lihat" data-bs-toggle="tooltip">
                                    <?= tabler_icon("eye") ?>
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-check cursor-pointer">
                            <input type="checkbox" name="remember" value="1" class="form-check-input" <?= get_cookie("username_saved") ? 'checked' : '' ?> />
                            <span class="form-check-label text-muted">Ingat saya</span>
                        </label>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100 shadow-sm">
                            <?= tabler_icon("login", "me-1") ?> Masuk Sekarang
                        </button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
        <div class="text-center text-muted mt-4">
            <a href="<?= base_url() ?>" class="text-muted text-decoration-none small d-inline-flex align-items-center">
                <?= tabler_icon("arrow-left", "me-1 icon-sm") ?> Kembali ke Beranda
            </a>
            <div class="mt-3 small">
                &copy; <?= date("Y") ?> <?= $settings->appName ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>