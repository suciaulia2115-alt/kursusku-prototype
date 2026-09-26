<?php

require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$tagline = 'Belajar Skill Baru, Raih Masa Depan';
$tahun = date('Y');

$keunggulan = [
    [
        'icon' => '✓',
        'title' => 'Pembelajaran Terarah',
        'description' => 'Materi disusun secara bertahap agar proses belajar lebih mudah diikuti.'
    ],
    [
        'icon' => '★',
        'title' => 'Materi Berkualitas',
        'description' => 'Materi pembelajaran dirancang untuk membantu meningkatkan kemampuan.'
    ],
    [
        'icon' => '⚡',
        'title' => 'Fleksibel',
        'description' => 'Belajar dengan lebih fleksibel sesuai kebutuhan dan tujuan Anda.'
    ]
];

$courses = [
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

$serverTime = date('Y-m-d H:i:s');

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= e($siteName); ?> - <?= e($tagline); ?></title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

<header class="site-header">

    <div class="header-top">

        <div class="container">

            <h1><?= e($siteName); ?></h1>

            <p><?= e($tagline); ?></p>

        </div>

    </div>

</header>


<nav class="navbar">

    <div class="container">

        <nav aria-label="Navigasi utama">

            <a href="#beranda">Beranda</a>

            <a href="#keunggulan">Keunggulan</a>

            <a href="#katalog">Katalog</a>

            <a href="#alur">Alur Pendaftaran</a>

            <a href="#media">Media</a>

            <a href="#kontak">Kontak</a>

        </nav>

    </div>

</nav>


<main>

    <!-- HERO -->

    <section
        id="beranda"
        class="hero"
    >

        <div class="container">

            <div class="hero-content">

                <div class="hero-text">

                    <span class="hero-label">
                        KURSUS ONLINE
                    </span>

                    <h1>
                        Belajar Lebih Mudah
                        Bersama KursusKu
                    </h1>

                    <p>
                        Tingkatkan kemampuanmu dengan berbagai
                        kursus pilihan yang dirancang untuk
                        membantu perjalanan belajar menjadi lebih
                        mudah dan menyenangkan.
                    </p>

                    <a
                        href="#katalog"
                        class="button"
                    >
                        Lihat Katalog
                    </a>

                    <a
                        href="registration.php"
                        class="button button-green"
                    >
                        Daftar Sekarang
                    </a>

                </div>


                <div class="hero-image">

                    <img
                        src="assets/images/hero-kursus.jpg"
                        alt="Belajar bersama KursusKu"
                    >

                </div>

            </div>

        </div>

    </section>


    <!-- KEUNGGULAN -->

    <section
        id="keunggulan"
        class="section"
    >

        <div class="container">

            <div class="section-title">

                <h2>Mengapa KursusKu?</h2>

                <p>
                    Belajar dengan cara yang lebih mudah,
                    terarah, dan sesuai kebutuhanmu.
                </p>

            </div>


            <div class="card-container">

                <?php foreach ($keunggulan as $item): ?>

                    <article class="card">

                        <div class="step-number">
                            <?= e($item['icon']); ?>
                        </div>

                        <h3>
                            <?= e($item['title']); ?>
                        </h3>

                        <p>
                            <?= e($item['description']); ?>
                        </p>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>


    <!-- KATALOG -->

    <section
        id="katalog"
        class="section"
    >

        <div class="container">

            <div class="section-title">

                <h2>Katalog Kursus</h2>

                <p>
                    Pilih kursus sesuai dengan kebutuhan
                    dan tujuan belajar Anda.
                </p>

            </div>


            <div class="course-grid">

                <?php foreach ($courses as $course): ?>

                    <?php

                    $status = statusKursus(
                        $course['quota'],
                        $course['registered']
                    );

                    $sisa = sisaKursi(
                        $course['quota'],
                        $course['registered']
                    );

                    ?>

                    <article class="course-card">

                        <span class="course-code">
                            <?= e($course['code']); ?>
                        </span>

                        <h3>
                            <?= e($course['name']); ?>
                        </h3>

                        <div class="course-price">
                            <?= rupiah($course['fee']); ?>
                        </div>

                        <div class="course-info">

                            <p>
                                Kuota:
                                <?= e($course['quota']); ?> peserta
                            </p>

                            <p>
                                Mulai:
                                <?= e(
                                    formatTanggal(
                                        $course['start_date']
                                    )
                                ); ?>
                            </p>

                            <p>
                                Sisa kursi:
                                <?= e($sisa); ?>
                            </p>

                        </div>


                        <?php if ($status === 'Tersedia'): ?>

                            <span class="badge-available">
                                ✓ Tersedia
                            </span>

                            <br><br>

                            <a
                                href="registration.php?course=<?= e($course['code']); ?>"
                                class="button"
                            >
                                Daftar
                            </a>

                        <?php else: ?>

                            <span class="badge-full">
                                ✕ Penuh
                            </span>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>


    <!-- ALUR PENDAFTARAN -->

    <section
        id="alur"
        class="section"
    >

        <div class="container">

            <div class="section-title">

                <h2>Alur Pendaftaran</h2>

                <p>
                    Ikuti tiga langkah sederhana untuk
                    memulai perjalanan belajarmu.
                </p>

            </div>


            <div class="steps">

                <article class="step">

                    <div class="step-number">
                        01
                    </div>

                    <h3>
                        Pilih Kursus
                    </h3>

                    <p>
                        Pilih program kursus yang sesuai
                        dengan kebutuhan Anda.
                    </p>

                </article>


                <article class="step">

                    <div class="step-number">
                        02
                    </div>

                    <h3>
                        Isi Formulir
                    </h3>

                    <p>
                        Lengkapi data diri dan informasi
                        pendaftaran dengan benar.
                    </p>

                </article>


                <article class="step">

                    <div class="step-number">
                        03
                    </div>

                    <h3>
                        Mulai Belajar
                    </h3>

                    <p>
                        Setelah pendaftaran berhasil,
                        Anda dapat memulai perjalanan belajar.
                    </p>

                </article>

            </div>

        </div>

    </section>


    <!-- MEDIA -->

    <section
        id="media"
        class="section"
    >

        <div class="container">

            <div class="section-title">

                <h2>Media Kursus</h2>

                <p>
                    Kenali KursusKu melalui gambar dan video
                    pembelajaran.
                </p>

            </div>


            <div class="media-container">

                <div class="media-box">

                    <img
                        src="assets/images/hero-kursus.jpg"
                        alt="Media pembelajaran KursusKu"
                    >

                </div>


                <div class="media-box">

                    <video controls>

                        <source
                            src="assets/video/intro-kursus.mp4"
                            type="video/mp4"
                        >

                        Browser Anda tidak mendukung
                        video HTML5.

                    </video>

                </div>

            </div>

        </div>

    </section>


    <!-- KONTAK -->

    <section
        id="kontak"
        class="section"
    >

        <div class="container">

            <div class="section-title">

                <h2>Kontak</h2>

                <p>
                    Hubungi KursusKu apabila membutuhkan
                    informasi lebih lanjut.
                </p>

            </div>


            <div class="contact-info">

                <h3>
                    KursusKu
                </h3>

                <p>
                    📍 Indonesia
                </p>

                <p>
                    📧 info@kursusku.test
                </p>

                <p>
                    📞 0812-0000-0000
                </p>

                <div class="server-section">

                    <strong>
                        Informasi Server
                    </strong>

                    <p>
                        Waktu server:
                        <?= e($serverTime); ?>
                    </p>

                </div>

            </div>

        </div>

    </section>

</main>


<footer class="site-footer">

    <div class="container">

        <strong>
            KursusKu
        </strong>

        <p>
            <?= e($tagline); ?>
        </p>

        <p>
            &copy; <?= e($tahun); ?> KursusKu.
            Semua Hak Dilindungi.
        </p>

    </div>

</footer>

</body>

</html>