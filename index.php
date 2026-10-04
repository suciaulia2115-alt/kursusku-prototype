<?php
require_once 'helpers.php';

$siteName = 'KursusKu';
$tagline = ' Belajar & Kembangkan Keahlianmu di Satu Platform';
$year = date('Y');

// DATA KURSUS
$kursus = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
        'quota' => 30,
        'registered' => 12,
        'start_date' => '2026-09-21'
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
        'quota' => 30,
        'registered' => 18,
        'start_date' => '2026-09-22'
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
        'quota' => 25,
        'registered' => 24,
        'start_date' => '2026-09-24'
    ],
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
        'quota' => 25,
        'registered' => 25,
        'start_date' => '2026-09-28'
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
        'quota' => 20,
        'registered' => 0,
        'start_date' => '2026-10-01'
    ],
    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
        'quota' => 35,
        'registered' => 9,
        'start_date' => '2026-10-03'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($siteName); ?> - Belajar Lebih Mudah</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div class="container header-container">
            <a href="#beranda" class="brand">
                <span class="brand-icon">K</span>
                <span><?= htmlspecialchars($siteName); ?></span>
            </a>

            <nav class="navbar">
                <a href="#keunggulan">Keunggulan</a>
                <a href="#katalog">Katalog</a>
                <a href="#alur">Alur Pendaftaran</a>
                <a href="#media">Media</a>
                <a href="#kontak">Kontak</a>
                <a href="register.php">Daftar Kursus</a>
                <a href="history-dumy.php">History</a>
                <a href="test-case.php">Test Case</a>
            </nav>
        </div>
    </header>

    <main>

        <!-- HERO -->
        <section class="hero" id="beranda">
            <div class="container hero-container">

                <div class="hero-content">
                    <span class="eyebrow">PLATFORM BELAJAR DIGITAL</span>

                    <h1><?= htmlspecialchars($tagline); ?></h1>

                    <p>
                        Tingkatkan keterampilan dan perluas pengetahuan
                        melalui pilihan kursus yang dirancang untuk
                        mendukung proses belajar secara terarah.
                    </p>

                    <div class="hero-actions">
                        <a href="#katalog" class="btn btn-primary">
                            Jelajahi Kursus
                            <span aria-hidden="true">→</span>
                        </a>

                        <a href="#alur" class="btn btn-outline">
                            Lihat Alur
                        </a>

                        <a href="fee-calculator.php" class="btn btn-outline">
                            Hitung Biaya Kursus
                        </a>
                    </div>

                    <div class="hero-note">
                        <span class="note-line"></span>
                        Mulai belajar dan kembangkan potensimu, bareng CHA EUN WOO❤️
                    
                    </div>
                </div>

                <div class="hero-image">
                    <img
                        src="assets/images/hero-kursus.jpg"
                        alt="Ilustrasi kegiatan belajar melalui platform KursusKu"
                    >

                    <div class="image-caption">
                        <span class="caption-icon">✦</span>
                        <div>
                            <strong>Belajar Lebih Terarah Bareng CHA EUN WOO</strong>
                            <small>Temukan pengalaman belajar baru</small>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- KEUNGGULAN -->
        <section class="section features-section" id="keunggulan">
            <div class="container">

                <div class="section-heading">
                    <span class="eyebrow">KEUNGGULAN KAMI</span>
                    <h2>Pengalaman Belajar yang Lebih Baik</h2>
                    <p>
                        KursusKu membantu proses belajar melalui materi
                        yang terarah dan kegiatan praktik.
                    </p>
                </div>

                <div class="feature-grid">

                    <article class="feature-card">
                        <div class="card-icon">✧</div>
                        <h3>Materi Terarah</h3>
                        <p>
                            Pelajari materi secara bertahap agar lebih
                            mudah memahami setiap pembahasan.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="card-icon">⌘</div>
                        <h3>Belajar dengan Proyek</h3>
                        <p>
                            Tingkatkan keterampilan melalui latihan
                            dan proyek yang berkaitan dengan materi.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="card-icon">◎</div>
                        <h3>Pendampingan Praktik</h3>
                        <p>
                            Kembangkan kemampuan melalui kegiatan
                            praktik yang mendukung proses belajar.
                        </p>
                    </article>

                </div>
            </div>
        </section>

        <!-- KATALOG DINAMIS -->
        <section class="section catalog-section" id="katalog">
            <div class="container">

                <div class="section-heading">
                    <span class="eyebrow">KATALOG KURSUS</span>
                    <h2>Pilih Kursus Sesuai Minatmu</h2>
                    <p>
                        Temukan pilihan kursus berdasarkan biaya,
                        tanggal mulai, dan ketersediaan kursi.
                    </p>
                </div>

                <div class="table-wrapper">
                    <table class="course-table">

                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Kursus</th>
                                <th>Biaya</th>
                                <th>Tanggal Mulai</th>
                                <th>Sisa Kursi</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($kursus as $item): ?>
                                <?php
                                $nama = trim($item['name']);

                                $status = statusKursus(
                                    $item['quota'],
                                    $item['registered']
                                );

                                $sisa = sisaKursi(
                                    $item['quota'],
                                    $item['registered']
                                );

                                $classStatus = $status === 'Penuh'
                                    ? 'badge-full'
                                    : 'badge-available';
                                ?>

                                <tr>
                                    <td>
                                        <?= htmlspecialchars($item['code']); ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($nama); ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars(
                                            rupiah($item['fee'])
                                        ); ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars(
                                            formatTanggal($item['start_date'])
                                        ); ?>
                                    </td>

                                    <td><?= $sisa; ?></td>

                                    <td>
                                        <span class="status-badge <?= $classStatus; ?>">
                                            <?= htmlspecialchars($status); ?>
                                        </span>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </section>

        <!-- ALUR PENDAFTARAN -->
        <section class="section process-section" id="alur">
            <div class="container">

                <div class="section-heading">
                    <span class="eyebrow">ALUR PENDAFTARAN</span>
                    <h2>Mulai Belajar dalam Empat Langkah</h2>
                    <p>
                        Ikuti langkah sederhana berikut untuk
                        memulai perjalanan belajarmu.
                    </p>
                </div>

                <ol class="steps-list">

                    <li class="step-item">
                        <span class="step-number">01</span>
                        <div>
                            <h3>Pilih Kursus</h3>
                            <p>
                                Tentukan kursus yang sesuai dengan
                                kebutuhan dan minatmu.
                            </p>
                        </div>
                    </li>

                    <li class="step-item">
                        <span class="step-number">02</span>
                        <div>
                            <h3>Isi Data Pendaftaran</h3>
                            <p>
                                Lengkapi informasi yang diperlukan
                                untuk proses pendaftaran.
                            </p>
                        </div>
                    </li>

                    <li class="step-item">
                        <span class="step-number">03</span>
                        <div>
                            <h3>Periksa Informasi</h3>
                            <p>
                                Pastikan data yang dimasukkan
                                sudah sesuai.
                            </p>
                        </div>
                    </li>

                    <li class="step-item">
                        <span class="step-number">04</span>
                        <div>
                            <h3>Mulai Belajar</h3>
                            <p>
                                Persiapkan diri untuk mengikuti
                                kegiatan pembelajaran.
                            </p>
                        </div>
                    </li>

                </ol>
            </div>
        </section>

        <!-- MEDIA -->
        <section class="section media-section" id="media">
            <div class="container">

                <div class="section-heading">
                    <span class="eyebrow">MEDIA PEMBELAJARAN</span>
                    <h2>Kenali KursusKu Lebih Dekat</h2>
                    <p>
                        Lihat media pendukung yang menggambarkan
                        pengalaman belajar di KursusKu.
                    </p>
                </div>

                <div class="media-grid">

                    <div class="media-image">
                        <img
                            src="assets/images/hero-kursus.jpg"
                            alt="Gambaran media pembelajaran KursusKu"
                        >
                    </div>

                    <div class="media-video">
                        <video controls>
                            <source
                                src="assets/video/intro-kursus.mp4"
                                type="video/mp4"
                            >
                            Browser Anda tidak mendukung pemutaran video.
                            Silakan gunakan browser lain untuk melihat media ini.
                        </video>
                    </div>

                </div>

                <p class="media-reference">
                    Pelajari dokumentasi
                    <a
                        href="https://www.php.net/manual/id/"
                        target="_blank"
                        rel="noopener"
                    >
                        PHP
                    </a>
                    untuk mengenal lebih jauh pemrograman web.
                </p>

            </div>
        </section>

        <!-- KONTAK -->
        <section class="section contact-section" id="kontak">
            <div class="container contact-container">

                <div>
                    <span class="eyebrow">HUBUNGI KAMI</span>
                    <h2>Siap Memulai Perjalanan Belajarmu?</h2>
                    <p>
                        Hubungi KursusKu untuk mendapatkan informasi
                        lebih lanjut mengenai pembelajaran.
                    </p>
                </div>

                <div class="contact-details">

                    <div class="contact-item">
                        <span class="contact-symbol">✉</span>
                        <div>
                            <small>Email</small>
                            <a href="mailto:info@kursuskuSuciAulia.example">
                                info@kursuskuSuciAulia.example
                            </a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <span class="contact-symbol">⌖</span>
                        <div>
                            <small>Alamat</small>
                            <p>Jl. Pendidikan No. 10, Indonesia</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container footer-container">

            <a href="#beranda" class="footer-brand">
                <span class="brand-icon">K</span>
                <span><?= htmlspecialchars($siteName); ?></span>
            </a>

            <p>
                © <?= htmlspecialchars((string) $year); ?>
                <?= htmlspecialchars($siteName); ?>.
                Semua hak dilindungi.
            </p>

        </div>
    </footer>

</body>
</html>
