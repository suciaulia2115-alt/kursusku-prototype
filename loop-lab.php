<?php
require_once __DIR__ . '/data.php';

// =====================================
// FUNGSI KEAMANAN OUTPUT
// =====================================

if (!function_exists('e')) {
    function e($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

// =====================================
// PERULANGAN FOR
// =====================================

$forResults = [];

for ($i = 1; $i <= 5; $i++) {
    $forResults[] = "Perulangan ke-" . $i;
}

// =====================================
// PERULANGAN WHILE
// =====================================

$whileResults = [];
$i = 1;

while ($i <= 5) {
    $whileResults[] = "Data ke-" . $i;
    $i++;
}

// =====================================
// PERULANGAN DO-WHILE
// =====================================

$doWhileResults = [];
$i = 1;

do {
    $doWhileResults[] = "Proses ke-" . $i;
    $i++;
} while ($i <= 5);

// =====================================
// DATA FASILITAS
// =====================================

if (!isset($facilities) || !is_array($facilities)) {
    $facilities = [];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Loop Lab - KursusKu</title>

    <style>
        /* =====================================
           RESET
        ===================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f6f2fc;
            color: #302044;
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* =====================================
           HEADER
        ===================================== */

        .header {
            background: linear-gradient(135deg, #32145f, #6736a0, #482477);
            color: white;
            padding: 20px 5%;
            box-shadow: 0 5px 25px rgba(50, 20, 95, 0.18);
            animation: slideDown 0.8s ease both;
        }

        .header-container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-size: 27px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .brand-icon {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f0d78b, #d4b45d);
            color: #44216f;
            border-radius: 14px;
            font-size: 27px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .brand:hover .brand-icon {
            transform: rotate(-8deg) scale(1.08);
        }

        .brand span:last-child {
            color: #ffffff;
        }

        .navbar {
            display: flex;
            align-items: center;
            gap: 28px;
            flex-wrap: wrap;
        }

        .navbar a {
            color: #ffffff;
            font-weight: 650;
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar a::after {
            content: "";
            position: absolute;
            bottom: -7px;
            left: 0;
            width: 0;
            height: 2px;
            background: #e8cf83;
            transition: width 0.3s ease;
        }

        .navbar a:hover {
            color: #f0d78b;
        }

        .navbar a:hover::after {
            width: 100%;
        }

        /* =====================================
           CONTAINER
        ===================================== */

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
        }

        /* =====================================
           HERO
        ===================================== */

        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #ffffff, #eee5fc);
            padding: 42px;
            border-radius: 24px;
            margin-bottom: 35px;
            border: 1px solid #e3d6f7;
            box-shadow: 0 10px 35px rgba(65, 35, 105, 0.06);
            animation: fadeUp 0.8s ease both;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(128, 83, 189, 0.08);
            right: -65px;
            top: -90px;
        }

        .eyebrow {
            display: inline-block;
            color: #8050b5;
            font-size: 13px;
            font-weight: 850;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .hero h1 {
            color: #392064;
            font-size: 36px;
            line-height: 1.3;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .hero p {
            color: #716184;
            font-size: 16px;
            max-width: 700px;
            position: relative;
            z-index: 1;
        }

        /* =====================================
           GRID KARTU
        ===================================== */

        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .card {
            background: #ffffff;
            padding: 28px;
            border-radius: 20px;
            border: 1px solid #eae1f5;
            box-shadow: 0 8px 28px rgba(65, 35, 105, 0.07);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
            animation: fadeUp 0.8s ease both;
        }

        .card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .card:hover {
            transform: translateY(-7px);
            box-shadow: 0 16px 35px rgba(65, 35, 105, 0.13);
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }

        .card-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: #eee5fa;
            color: #62369b;
            font-size: 21px;
            transition: transform 0.3s ease;
        }

        .card:hover .card-icon {
            transform: rotate(8deg) scale(1.08);
        }

        .card h2 {
            color: #552d89;
            font-size: 21px;
            font-weight: 850;
        }

        .description {
            color: #77698a;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* =====================================
           DAFTAR HASIL PERULANGAN
        ===================================== */

        .result {
            list-style: none;
            display: grid;
            gap: 11px;
        }

        .result li {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f7f3fc;
            border: 1px solid #eee5f8;
            border-left: 4px solid #8053bd;
            padding: 12px 15px;
            border-radius: 10px;
            color: #4e3b65;
            transition: all 0.3s ease;
        }

        .result li::before {
            content: "✓";
            width: 24px;
            height: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 50%;
            background: #e9ddf7;
            color: #62369b;
            font-size: 13px;
            font-weight: 900;
        }

        .result li:hover {
            background: #eee5fa;
            transform: translateX(5px);
        }

        /* =====================================
           FASILITAS
        ===================================== */

        .facility-list {
            display: grid;
            gap: 11px;
        }

        .facility-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f7f3fc;
            border: 1px solid #eee5f8;
            border-left: 4px solid #8053bd;
            padding: 12px 15px;
            border-radius: 10px;
            color: #4e3b65;
            transition: all 0.3s ease;
        }

        .facility-item::before {
            content: "✦";
            color: #9a70c9;
            font-size: 16px;
        }

        .facility-item:hover {
            background: #eee5fa;
            transform: translateX(5px);
        }

        .empty {
            background: #f7f3fc;
            color: #77698a;
            border: 1px dashed #cdbce2;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
        }

        /* =====================================
           INFORMASI TAMBAHAN
        ===================================== */

        .info-section {
            margin-top: 30px;
            background: linear-gradient(135deg, #392064, #7042a5);
            color: white;
            border-radius: 20px;
            padding: 25px 30px;
            box-shadow: 0 10px 28px rgba(65, 35, 105, 0.12);
            animation: fadeUp 0.9s ease both;
        }

        .info-section h2 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .info-section p {
            color: #eee4fa;
            font-size: 14px;
        }

        /* =====================================
           FOOTER
        ===================================== */

        .footer {
            text-align: center;
            padding: 28px 15px;
            color: #847494;
            font-size: 13px;
            margin-top: 35px;
        }

        /* =====================================
           ANIMASI
        ===================================== */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 800px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 30px;
            }

            .hero h1 {
                font-size: 30px;
            }
        }

        @media (max-width: 600px) {
            .header {
                padding: 18px 5%;
            }

            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar {
                gap: 15px;
            }

            .navbar a {
                font-size: 13px;
            }

            .container {
                width: 94%;
                margin: 30px auto;
            }

            .hero {
                padding: 25px 20px;
                border-radius: 18px;
            }

            .hero h1 {
                font-size: 26px;
            }

            .hero p {
                font-size: 14px;
            }

            .card {
                padding: 22px 18px;
                border-radius: 16px;
            }

            .card h2 {
                font-size: 19px;
            }

            .info-section {
                padding: 22px 18px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div class="header-container">

            <a href="index.php" class="brand">
                <span class="brand-icon">K</span>
                <span>KursusKu</span>
            </a>

            <nav class="navbar">
                <a href="index.php">Beranda</a>
                <a href="register.php">Pendaftaran</a>
                <a href="history.php">Riwayat</a>
                <a href="loop-lab.php">Loop Lab</a>
            </nav>

        </div>
    </header>

    <!-- KONTEN -->
    <main class="container">

        <!-- HERO -->
        <section class="hero">
            <span class="eyebrow">Praktikum PHP</span>

            <h1>Loop Lab</h1>

            <p>
                Mengenal perulangan PHP dan penerapannya untuk
                menampilkan data fasilitas KursusKu secara otomatis.
            </p>
        </section>

        <!-- KARTU PERULANGAN -->
        <section class="grid">

            <!-- FOR -->
            <article class="card">

                <div class="card-heading">
                    <span class="card-icon">↻</span>
                    <h2>Perulangan FOR</h2>
                </div>

                <p class="description">
                    Mengulang perintah sebanyak lima kali
                    menggunakan perulangan for.
                </p>

                <ul class="result">
                    <?php foreach ($forResults as $result): ?>
                        <li><?= e($result); ?></li>
                    <?php endforeach; ?>
                </ul>

            </article>

            <!-- WHILE -->
            <article class="card">

                <div class="card-heading">
                    <span class="card-icon">⟳</span>
                    <h2>Perulangan WHILE</h2>
                </div>

                <p class="description">
                    Mengulang perintah selama kondisi
                    bernilai benar.
                </p>

                <ul class="result">
                    <?php foreach ($whileResults as $result): ?>
                        <li><?= e($result); ?></li>
                    <?php endforeach; ?>
                </ul>

            </article>

            <!-- DO-WHILE -->
            <article class="card">

                <div class="card-heading">
                    <span class="card-icon">⟲</span>
                    <h2>Perulangan DO-WHILE</h2>
                </div>

                <p class="description">
                    Menjalankan perintah terlebih dahulu,
                    kemudian memeriksa kondisi perulangan.
                </p>

                <ul class="result">
                    <?php foreach ($doWhileResults as $result): ?>
                        <li><?= e($result); ?></li>
                    <?php endforeach; ?>
                </ul>

            </article>

            <!-- FASILITAS -->
            <article class="card">

                <div class="card-heading">
                    <span class="card-icon">✧</span>
                    <h2>Fasilitas Kursus</h2>
                </div>

                <p class="description">
                    Data fasilitas ditampilkan otomatis menggunakan
                    foreach dari array pada data.php.
                </p>

                <div class="facility-list">

                    <?php if (empty($facilities)): ?>

                        <p class="empty">
                            Belum ada fasilitas yang tersedia.
                        </p>

                    <?php else: ?>

                        <?php foreach ($facilities as $facility): ?>

                            <?php
                            // Mendukung fasilitas berbentuk teks
                            // atau array yang memiliki nama/label.
                            if (is_array($facility)) {
                                $facilityName = $facility['name']
                                    ?? $facility['label']
                                    ?? '';
                            } else {
                                $facilityName = $facility;
                            }
                            ?>

                            <div class="facility-item">
                                <?= e($facilityName); ?>
                            </div>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>

            </article>

        </section>

        <!-- INFORMASI -->
        <section class="info-section">

            <h2>Belajar Perulangan PHP</h2>

            <p>
                Perulangan membantu menampilkan data secara berulang
                tanpa menulis perintah yang sama berkali-kali.
                Pada halaman ini, perulangan digunakan untuk
                menghasilkan daftar contoh dan menampilkan fasilitas
                kursus dari array.
            </p>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        &copy; <?= date('Y'); ?> KursusKu.
        Praktikum Pemrograman Web.
    </footer>

</body>
</html>