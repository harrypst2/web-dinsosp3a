<?= $this->extend("app/_layouts/app") ?>

<?php
/**
 * @var object $userdata
 * @var object $settings
 * @var object $counts
 * @var string $country_code
 * @var string $city
 * @var string $country
 * @var string $ip
 * @var \CodeIgniter\HTTP\UserAgent $agent
 * @var array $chart_visitors
 * @var array $chart_content
 */
?>

<?= $this->section("body") ?>
<!-- Dashboard Header / Greeting -->
<div class="col-12 mb-4">
    <div class="card border-0 shadow-lg overflow-hidden" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);">

        <div class="card-body p-4 p-md-5 position-relative">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="avatar avatar-xl avatar-rounded border border-4 border-white-50 shadow-sm" style="background-image: url(<?= avatar(null, $userdata) ?>); width: 100px; height: 100px;"></span>
                </div>
                <div class="col text-white">
                    <h2 class="display-6 fw-bold mb-1">Halo, <?= $userdata->name ?>!</h2>
                    <p class="lead opacity-75 mb-3">Selamat datang kembali di pusat kendali digital <strong><?= $settings->appName ?></strong>.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-white-20 py-2 px-3 rounded-pill text-white backdrop-blur">
                            <?= tabler_icon("calendar", "me-1 icon-inline") ?> <?= indonesia_date(date("Y-m-d")) ?>
                        </span>
                        <span class="badge bg-white-20 py-2 px-3 rounded-pill text-white backdrop-blur">
                            <?= tabler_icon("clock", "me-1 icon-inline") ?> <?= date("H:i") ?> WIB
                        </span>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <a href="<?= base_url($settings->panelPrefix . "/profile") ?>" class="btn btn-white btn-pill shadow-sm px-4">
                        <?= tabler_icon("settings", "me-2") ?> Pengaturan Akun
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="col-md-6 col-xl-3 mb-3">
    <div class="card card-sm border-0 shadow-sm card-link">
        <div class="card-body p-3">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-md bg-primary-lt rounded-3 shadow-sm me-3">
                    <?= tabler_icon("news", "text-primary") ?>
                </div>
                <div>
                    <div class="font-weight-medium h3 mb-0"><?= $counts->news ?></div>
                    <div class="text-muted small">Total Berita</div>
                </div>
                <div class="ms-auto text-success small fw-bold">
                    <?= tabler_icon("trending-up", "icon-xs me-1") ?> Aktif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3 mb-3">
    <div class="card card-sm border-0 shadow-sm card-link">
        <div class="card-body p-3">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-md bg-success-lt rounded-3 shadow-sm me-3">
                    <?= tabler_icon("award", "text-success") ?>
                </div>
                <div>
                    <div class="font-weight-medium h3 mb-0"><?= $counts->services ?></div>
                    <div class="text-muted small">Total Layanan</div>
                </div>
                <div class="ms-auto text-success small fw-bold">
                    <?= tabler_icon("check", "icon-xs me-1") ?> Siap
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3 mb-3">
    <div class="card card-sm border-0 shadow-sm card-link">
        <div class="card-body p-3">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-md bg-warning-lt rounded-3 shadow-sm me-3">
                    <?= tabler_icon("file-text", "text-warning") ?>
                </div>
                <div>
                    <div class="font-weight-medium h3 mb-0"><?= $counts->files ?></div>
                    <div class="text-muted small">Total Berkas</div>
                </div>
                <div class="ms-auto text-muted small fw-bold">
                    <?= tabler_icon("cloud-download", "icon-xs me-1") ?> Publik
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-3 mb-3">
    <div class="card card-sm border-0 shadow-sm card-link">
        <div class="card-body p-3">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-md bg-purple-lt rounded-3 shadow-sm me-3">
                    <?= tabler_icon("photo", "text-purple") ?>
                </div>
                <div>
                    <div class="font-weight-medium h3 mb-0"><?= $counts->galleries ?></div>
                    <div class="text-muted small">Total Galeri</div>
                </div>
                <div class="ms-auto text-info small fw-bold">
                    <?= tabler_icon("camera", "icon-xs me-1") ?> Baru
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Row -->
<div class="col-lg-8">
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-transparent border-0 pt-4 pb-0 d-flex align-items-center">
            <h3 class="card-title fw-bold">
                <?= tabler_icon("chart-bar", "me-2 text-primary") ?> Statistik Aktivitas Digital
            </h3>
            <div class="ms-auto">
                <span class="badge bg-blue-lt px-3 py-2 rounded-pill">Tahun <?= date("Y") ?></span>
            </div>
        </div>
        <div class="card-body">
            <div id="chart-activity-main" style="min-height: 350px;"></div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-transparent border-0 pt-4 pb-0">
            <h3 class="card-title fw-bold">
                <?= tabler_icon("shield-lock", "me-2 text-azure") ?> Informasi Akun & Keamanan
            </h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-hover">
                    <tbody>
                        <tr>
                            <td class="ps-4 w-1 text-muted"><?= tabler_icon("user", "icon-sm") ?></td>
                            <td class="text-muted">Nama Lengkap</td>
                            <td class="text-end pe-4 fw-bold text-dark"><?= $userdata->name ?></td>
                        </tr>
                        <tr>
                            <td class="ps-4 w-1 text-muted"><?= tabler_icon("id", "icon-sm") ?></td>
                            <td class="text-muted">Nama Pengguna</td>
                            <td class="text-end pe-4"><span class="badge badge-outline text-blue px-2"><?= $userdata->username ?></span></td>
                        </tr>
                        <tr>
                            <td class="ps-4 w-1 text-muted"><?= tabler_icon("mail", "icon-sm") ?></td>
                            <td class="text-muted">Alamat Surel</td>
                            <td class="text-end pe-4"><?= $userdata->email ?></td>
                        </tr>
                        <tr>
                            <td class="ps-4 w-1 text-muted"><?= tabler_icon("award", "icon-sm") ?></td>
                            <td class="text-muted">Hak Akses</td>
                            <td class="text-end pe-4"><span class="badge bg-azure-lt px-2">Administrator</span></td>
                        </tr>
                        <tr>
                            <td class="ps-4 w-1 text-muted"><?= tabler_icon("calendar-check", "icon-sm") ?></td>
                            <td class="text-muted">Aktif Sejak</td>
                            <td class="text-end pe-4"><?= indonesia_date($userdata->created_at) ?></td>
                        </tr>
                        <tr>
                            <td class="ps-4 w-1 text-muted"><?= tabler_icon("circle-check", "icon-sm") ?></td>
                            <td class="text-muted">Status Akun</td>
                            <td class="text-end pe-4">
                                <span class="status status-success">
                                    <span class="status-dot status-dot-animated"></span> Aktif
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-transparent border-0 pt-4 pb-0">
            <h3 class="card-title fw-bold">
                <?= tabler_icon("map-2", "me-2 text-orange") ?> Detail Akses Terakhir
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-unstyled space-y-4">
                <li class="d-flex align-items-start gap-3">
                    <span class="avatar bg-blue-lt rounded-circle">
                        <?= tabler_icon("map-pin") ?>
                    </span>
                    <div>
                        <div class="text-muted small">Lokasi Deteksi</div>
                        <div class="font-weight-medium">
                            <span class="flag flag-country-<?= $country_code ?> me-1"></span>
                            <?= $city ?>, <?= $country ?>
                        </div>
                    </div>
                </li>
                <li class="d-flex align-items-start gap-3">
                    <span class="avatar bg-green-lt rounded-circle">
                        <?= tabler_icon("network") ?>
                    </span>
                    <div>
                        <div class="text-muted small">Alamat IP</div>
                        <div class="font-weight-medium text-monospace"><?= $ip ?></div>
                    </div>
                </li>
                <li class="d-flex align-items-start gap-3">
                    <span class="avatar bg-purple-lt rounded-circle">
                        <?= tabler_icon("device-laptop") ?>
                    </span>
                    <div>
                        <div class="text-muted small">Perangkat & OS</div>
                        <div class="font-weight-medium"><?= $agent->getPlatform() ?></div>
                    </div>
                </li>
                <li class="d-flex align-items-start gap-3">
                    <span class="avatar bg-warning-lt rounded-circle">
                        <?= tabler_icon("browser") ?>
                    </span>
                    <div>
                        <div class="text-muted small">Browser</div>
                        <div class="font-weight-medium"><?= $agent->getBrowser() ?></div>
                    </div>
                </li>
            </ul>
            <div class="mt-4 pt-3 border-top text-center">
                <p class="text-muted small mb-0">Keamanan akun Anda adalah prioritas kami.</p>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm bg-primary-lt">
        <div class="card-body p-4 text-center">
            <div class="mb-3">
                <span class="avatar avatar-lg bg-primary text-white rounded-circle">
                    <?= tabler_icon("help") ?>
                </span>
            </div>
            <h4 class="mb-1">Butuh Bantuan?</h4>
            <p class="text-muted small mb-3">Hubungi tim IT jika Anda mengalami kendala pada panel ini.</p>
            <a href="mailto:it@dinsos-p3a.id" class="btn btn-primary btn-sm px-4 rounded-pill">Kontak IT Support</a>
        </div>
    </div>
</div>

<style>
    .backdrop-blur { backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); }
    .bg-white-20 { background: rgba(255, 255, 255, 0.2); }
    .card-link { transition: transform 0.2s ease, box-shadow 0.2s ease; cursor: pointer; }
    .card-link:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important; }
    .text-monospace { font-family: 'Fira Code', monospace; }
</style>
<?= $this->endSection() ?>

<?= $this->section("javascript") ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-activity-main'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 350,
                parentHeightOffset: 0,
                toolbar: { show: false },
                animations: { enabled: true, easing: 'easeinout', speed: 800 }
            },
            dataLabels: { enabled: false },
            fill: { 
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.45,
                    opacityTo: 0.05,
                    stops: [20, 100, 100, 100]
                }
            },
            stroke: { width: 3, curve: "smooth" },
            series: [{
                name: "Kunjungan Situs",
                data: <?= json_encode($chart_visitors) ?>
            }, {
                name: "Update Konten",
                data: <?= json_encode($chart_content) ?>
            }],
            tooltip: { theme: 'light' },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: { padding: 0 },
                tooltip: { enabled: false },
                axisBorder: { show: false },
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            },
            yaxis: { labels: { padding: 4 } },
            colors: ['#206bc4', '#2fb344'],
            legend: { show: true, position: 'top', horizontalAlign: 'right' },
        })).render();
    });
</script>
<?= $this->endSection() ?>