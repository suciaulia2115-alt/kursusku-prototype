
<?php
// ==========================================
// PROCESS REGISTRATION - KURSUSKU
// ==========================================

$errors = [];

// Fungsi untuk mengamankan output
function bersihkan($data)
{
    return htmlspecialchars((string) $data, ENT_QUOTES, 'UTF-8');
}

// Fungsi format rupiah
function formatRupiah($angka)
{
    return 'Rp' . number_format((float) $angka, 0, ',', '.');
}

// Pastikan formulir dikirim menggunakan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

// Mengambil data formulir
$nama = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$telepon = trim($_POST['phone'] ?? '');
$program = trim($_POST['study_program'] ?? '');
$kursus = trim($_POST['course'] ?? '');
$jenisPeserta = trim($_POST['participant_type'] ?? '');
$minat = $_POST['interests'] ?? [];
$catatan = trim($_POST['note'] ?? '');
$sumber = trim($_POST['source'] ?? '');

// Daftar kursus yang tersedia
$daftarKursus = [
    'Web Dasar',
    'PHP Dasar',
    'PHP Lanjutan',
    'Laravel Fundamental',
    'MySQL Dasar',
    'UI Web Dasar'
];

// Daftar jenis peserta
$daftarPeserta = [
    'Pelajar',
    'Mahasiswa',
    'Umum'
];

// Daftar minat
$daftarMinat = [
    'UI/UX',
    'Database',
    'Backend'
];

// ==========================================
// VALIDASI DATA
// ==========================================

// Validasi nama
$panjangNama = function_exists('mb_strlen')
    ? mb_strlen($nama, 'UTF-8')
    : strlen($nama);

if ($nama === '') {
    $errors[] = 'Nama lengkap wajib diisi.';
} elseif ($panjangNama < 3 || $panjangNama > 100) {
    $errors[] = 'Nama harus terdiri dari 3 sampai 100 karakter.';
}

// Validasi email
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Masukkan alamat email yang valid.';
}

// Validasi telepon
if ($telepon === '') {
    $errors[] = 'Nomor telepon wajib diisi.';
} elseif (strlen($telepon) > 20) {
    $errors[] = 'Nomor telepon maksimal 20 karakter.';
}

// Validasi program studi
if ($program === '') {
    $errors[] = 'Program studi wajib diisi.';
}

// Validasi kursus
if (!in_array($kursus, $daftarKursus, true)) {
    $errors[] = 'Silakan pilih kursus yang tersedia.';
}

// Validasi jenis peserta
if (!in_array($jenisPeserta, $daftarPeserta, true)) {
    $errors[] = 'Silakan pilih jenis peserta.';
}

// Validasi minat
if (!is_array($minat)) {
    $minat = [];
    $errors[] = 'Format pilihan minat tidak valid.';
} else {
    $minat = array_values(array_intersect($minat, $daftarMinat));
}

// Validasi sumber formulir
if ($sumber !== 'week-05') {
    $errors[] = 'Sumber formulir tidak valid.';
}

// ==========================================
// DATA BIAYA KURSUS
// ==========================================

$biayaKursus = [
    'Web Dasar' => 250000,
    'PHP Dasar' => 350000,
    'PHP Lanjutan' => 450000,
    'Laravel Fundamental' => 500000,
    'MySQL Dasar' => 300000,
    'UI Web Dasar' => 275000
];

$biaya = $biayaKursus[$kursus] ?? 0;

// Diskon berdasarkan jenis peserta
$diskonPersen = 0;

if ($jenisPeserta === 'Pelajar') {
    $diskonPersen = 10;
} elseif ($jenisPeserta === 'Mahasiswa') {
    $diskonPersen = 15;
}

$diskon = (int) ($biaya * $diskonPersen / 100);
$total = $biaya - $diskon;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hasil Pendaftaran - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* =====================================
           TEMA UNGU KURSUSKU
        ===================================== */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f6f3fc;
            color: #30234a;
            line-height: 1.6;
        }

        .header {
            position: relative;
            z-index: 10;
            background: linear-gradient(135deg, #392064, #7042a5);
            box-shadow: 0 5px 25px rgba(55, 32, 100, 0.16);
            animation: headerDown 0.7s ease both;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        .header-container {
            min-height: 82px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .brand,
        .footer-brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            text-decoration: none;
            font-size: 25px;
            font-weight: 900;
        }

        .brand-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 13px;
            color: #4a2876;
            background: #eadbff;
            font-weight: 900;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        .navbar {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 26px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.25s ease;
        }

        .navbar a:hover {
            color: #eadbff;
        }

        /* =====================================
           HALAMAN HASIL
        ===================================== */

        .result-page {
            min-height: 75vh;
            padding: 65px 0;
            background:
                radial-gradient(circle at 10% 15%, #eee4fc, transparent 32%),
                radial-gradient(circle at 90% 80%, #e9def8, transparent 30%),
                #f6f3fc;
        }

        .result-wrapper {
            width: 92%;
            max-width: 1000px;
            margin: auto;
        }

        .result-card {
            padding: 45px;
            background: #fff;
            border: 1px solid #e8def3;
            border-radius: 28px;
            box-shadow: 0 18px 50px rgba(83, 53, 107, 0.10);
            animation: cardEnter 0.8s ease both;
        }

        .result-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .result-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 86px;
            height: 86px;
            margin: 0 auto 22px;
            border-radius: 50%;
            color: #fff;
            font-size: 40px;
            font-weight: 800;
            animation: iconPop 0.7s 0.2s ease both;
        }

        .result-icon.success {
            background: linear-gradient(135deg, #9675b0, #5c4175);
            box-shadow: 0 10px 25px rgba(92, 65, 117, 0.25);
        }

        .result-icon.error {
            background: linear-gradient(135deg, #d18b9a, #a94c68);
        }

        .result-heading h1 {
            margin: 0 0 12px;
            color: #49345f;
            font-size: clamp(27px, 4vw, 38px);
            line-height: 1.3;
        }

        .result-heading p {
            margin: 0;
            color: #766985;
            font-size: 16px;
        }

        .result-card h2 {
            margin: 30px 0 20px;
            color: #49345f;
            font-size: 23px;
        }

        /* =====================================
           DETAIL PENDAFTARAN
        ===================================== */

        .result-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin: 25px 0;
        }

        .result-item {
            padding: 20px;
            min-width: 0;
            overflow-wrap: anywhere;
            background: #faf7fc;
            border: 1px solid #eee5f3;
            border-radius: 16px;
            transition: transform 0.25s ease,
                        box-shadow 0.25s ease,
                        border-color 0.25s ease;
            animation: itemFade 0.6s ease both;
        }

        .result-item:hover {
            transform: translateY(-4px);
            border-color: #cdb8e2;
            box-shadow: 0 10px 22px rgba(83, 53, 107, 0.09);
        }

        .result-item strong {
            display: block;
            margin-bottom: 8px;
            color: #80609b;
            font-size: 13px;
            letter-spacing: 0.3px;
        }

        .result-item span {
            color: #49345f;
            font-size: 16px;
            font-weight: 600;
            line-height: 1.6;
        }

        .fee-box {
            margin-top: 25px;
            padding: 22px;
            border-radius: 17px;
            color: #fff;
            background: linear-gradient(135deg, #56318a, #8055b7);
            box-shadow: 0 10px 25px rgba(86, 49, 138, 0.16);
            animation: itemFade 0.7s ease both;
        }

        .fee-box p {
            margin: 0 0 5px;
            color: #eee4fb;
            font-size: 14px;
        }

        .fee-box strong {
            font-size: 28px;
        }

        .fee-detail {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
        }

        .fee-detail:last-child {
            border-bottom: 0;
        }

        /* =====================================
           PESAN ERROR
        ===================================== */

        .error-message {
            padding: 22px 25px;
            margin: 25px 0;
            color: #873b54;
            background: #fff4f6;
            border: 1px solid #f0d2db;
            border-radius: 16px;
        }

        .error-message strong {
            display: block;
            margin-bottom: 10px;
        }

        .error-message ul {
            padding-left: 22px;
            margin: 0;
        }

        .error-message li {
            margin: 8px 0;
        }

        /* =====================================
           TOMBOL
        ===================================== */

        .result-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid #eee5f3;
        }

        .result-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 13px 24px;
            color: #fff;
            background: linear-gradient(135deg, #9675b0, #5c4175);
            border-radius: 13px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
            transition: transform 0.25s ease,
                        box-shadow 0.25s ease;
        }

        .result-button.secondary {
            color: #73548d;
            background: #f3eaf8;
            border: 1px solid #e5d7ed;
        }

        .result-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(83, 53, 107, 0.18);
        }

        /* =====================================
           FOOTER
        ===================================== */

        .footer {
            padding: 25px 0;
            background: #392064;
            color: #e9def6;
        }

        .footer-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .footer-brand {
            font-size: 20px;
        }

        .footer-brand .brand-icon {
            width: 34px;
            height: 34px;
            font-size: 16px;
        }

        .footer p {
            margin: 0;
            font-size: 13px;
        }

        /* =====================================
           ANIMASI
        ===================================== */

        @keyframes headerDown {
            from {
                opacity: 0;
                transform: translateY(-25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes cardEnter {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes iconPop {
            0% {
                opacity: 0;
                transform: scale(0.5) rotate(-15deg);
            }
            70% {
                transform: scale(1.12) rotate(5deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }

        @keyframes itemFade {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =====================================
           RESPONSIF
        ===================================== */

        @media (max-width: 700px) {
            .header-container {
                padding: 17px 0;
                align-items: flex-start;
                flex-direction: column;
            }

            .navbar {
                gap: 15px;
            }

            .result-page {
                padding: 40px 0;
            }

            .result-card {
                padding: 25px 18px;
                border-radius: 20px;
            }

            .result-list {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .result-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .result-button {
                width: 100%;
            }

            .footer-container {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div class="container header-container">
            <a href="index.php" class="brand">
                <span class="brand-icon">K</span>
                <span>KursusKu</span>
            </a>

            <nav class="navbar">
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="registration.php">Daftar Kursus</a>
            </nav>
        </div>
    </header>

    <!-- HASIL PENDAFTARAN -->
    <main class="result-page">
        <div class="result-wrapper">
            <section class="result-card">

                <?php if (!empty($errors)): ?>

                    <!-- PENDAFTARAN GAGAL -->
                    <div class="result-heading">
                        <div class="result-icon error">!</div>

                        <h1>Pendaftaran Belum Berhasil</h1>

                        <p>
                            Periksa kembali data yang Anda masukkan.
                        </p>
                    </div>

                    <div class="error-message">
                        <strong>Perhatikan hal berikut:</strong>

                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= bersihkan($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="result-actions">
                        <a href="registration.php" class="result-button">
                            Kembali ke Formulir
                        </a>

                        <a href="index.php" class="result-button secondary">
                            Kembali ke Beranda
                        </a>
                    </div>

                <?php else: ?>

                    <!-- PENDAFTARAN BERHASIL -->
                    <div class="result-heading">
                        <div class="result-icon success">✓</div>

                        <h1>Pendaftaran Berhasil!</h1>

                        <p>
                            Terima kasih,
                            <strong><?= bersihkan($nama); ?></strong>.
                            Data pendaftaran Anda telah diterima.
                        </p>
                    </div>

                    <h2>Detail Pendaftaran</h2>

                    <div class="result-list">

                        <div class="result-item">
                            <strong>Nama Lengkap</strong>
                            <span><?= bersihkan($nama); ?></span>
                        </div>

                        <div class="result-item">
                            <strong>Alamat Email</strong>
                            <span><?= bersihkan($email); ?></span>
                        </div>

                        <div class="result-item">
                            <strong>Nomor Telepon</strong>
                            <span><?= bersihkan($telepon); ?></span>
                        </div>

                        <div class="result-item">
                            <strong>Program Studi</strong>
                            <span><?= bersihkan($program); ?></span>
                        </div>

                        <div class="result-item">
                            <strong>Kursus Pilihan</strong>
                            <span><?= bersihkan($kursus); ?></span>
                        </div>

                        <div class="result-item">
                            <strong>Jenis Peserta</strong>
                            <span><?= bersihkan($jenisPeserta); ?></span>
                        </div>

                        <div class="result-item">
                            <strong>Minat Pembelajaran</strong>
                            <span>
                                <?= !empty($minat)
                                    ? bersihkan(implode(', ', $minat))
                                    : 'Belum memilih minat'; ?>
                            </span>
                        </div>

                        <div class="result-item">
                            <strong>Catatan Tambahan</strong>
                            <span>
                                <?= $catatan !== ''
                                    ? nl2br(bersihkan($catatan))
                                    : 'Tidak ada catatan'; ?>
                            </span>
                        </div>

                    </div>

                    <!-- RINCIAN BIAYA -->
                    <h2>Estimasi Biaya Kursus</h2>

                    <div class="fee-box">
                        <div class="fee-detail">
                            <span>Biaya kursus</span>
                            <strong><?= formatRupiah($biaya); ?></strong>
                        </div>

                        <div class="fee-detail">
                            <span>Diskon (<?= $diskonPersen; ?>%)</span>
                            <strong>- <?= formatRupiah($diskon); ?></strong>
                        </div>

                        <div class="fee-detail">
                            <span>Total biaya</span>
                            <strong><?= formatRupiah($total); ?></strong>
                        </div>
                    </div>

                    <div class="result-actions">
                        <a href="index.php#katalog" class="result-button">
                            Kembali ke Katalog
                        </a>

                        <a href="registration.php" class="result-button secondary">
                            Daftar Kursus Lain
                        </a>
                    </div>

                <?php endif; ?>

            </section>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container footer-container">
            <a href="index.php" class="footer-brand">
                <span class="brand-icon">K</span>
                <span>KursusKu</span>
            </a>

            <p>
                &copy; <?= date('Y'); ?> KursusKu.
                Semua hak dilindungi.
            </p>
        </div>
    </footer>

</body>
</html>