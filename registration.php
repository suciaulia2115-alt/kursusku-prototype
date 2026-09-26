<?php

require_once __DIR__ . '/helpers.php';

/*
|--------------------------------------------------------------------------
| DATA GET
|--------------------------------------------------------------------------
| Data GET dibaca dari URL.
| Contoh:
| registration.php?course=web-dasar
*/

$selectedCourse = $_GET['course'] ?? '';

$courses = [
    'web-dasar' => 'Web Dasar',
    'php-dasar' => 'PHP Dasar',
    'php-lanjutan' => 'PHP Lanjutan',
    'laravel-fundamental' => 'Laravel Fundamental',
    'mysql-dasar' => 'MySQL Dasar',
    'ui-web-dasar' => 'UI Web Dasar'
];

$selectedCourseName = $courses[$selectedCourse] ?? '';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Pendaftaran Kursus - KursusKu
    </title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>


<body class="registration-page">


<!-- =====================================================
     HEADER
===================================================== -->

<header class="premium-header">

    <div class="container">

        <nav class="premium-navbar">

            <!-- LOGO -->

            <a
                href="index.php"
                class="premium-logo"
            >

                <span class="logo-icon">
                    K
                </span>

                <span>
                    KursusKu
                </span>

            </a>


            <!-- NAVIGASI -->

            <div class="premium-nav-links">

                <a href="index.php">
                    Beranda
                </a>

                <a href="index.php#katalog">
                    Katalog
                </a>

                <a
                    href="registration.php"
                    class="active"
                >
                    Daftar
                </a>

            </div>

        </nav>

    </div>

</header>



<!-- =====================================================
     HERO
===================================================== -->

<section class="registration-hero">

    <div class="hero-glow hero-glow-one"></div>

    <div class="hero-glow hero-glow-two"></div>


    <div class="container">

        <div class="registration-hero-content">


            <!-- BADGE -->

            <div class="registration-badge">

                <span>
                    ●
                </span>

                PENDAFTARAN KURSUS

            </div>


            <!-- JUDUL -->

            <h1>

                Mulai Perjalanan

                <span>
                    Belajarmu
                </span>

            </h1>


            <!-- DESKRIPSI -->

            <p>

                Tingkatkan kemampuanmu bersama KursusKu.
                Isi formulir pendaftaran dan pilih kursus
                yang sesuai dengan tujuan belajarmu.

            </p>


            <!-- STATISTIK -->

            <div class="hero-mini-info">


                <div>

                    <strong>
                        6+
                    </strong>

                    <span>
                        Kursus
                    </span>

                </div>


                <div>

                    <strong>
                        100%
                    </strong>

                    <span>
                        Online
                    </span>

                </div>


                <div>

                    <strong>
                        Flexible
                    </strong>

                    <span>
                        Belajar
                    </span>

                </div>


            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<main class="registration-content">

    <div class="container">

        <div class="registration-layout">


            <!-- =================================================
                 KOLOM KIRI
            ================================================= -->

            <aside class="registration-info">


                <!-- CARD INFORMASI -->

                <div class="info-card">


                    <span class="info-label">

                        KENAPA KURSUSKU?

                    </span>


                    <h2>

                        Belajar lebih mudah,
                        <span>
                            berkembang lebih cepat.
                        </span>

                    </h2>


                    <p>

                        KursusKu membantu kamu mempelajari
                        berbagai keterampilan digital melalui
                        materi yang terstruktur dan mudah dipahami.

                    </p>


                    <!-- BENEFIT -->

                    <div class="benefit-list">


                        <!-- BENEFIT 1 -->

                        <div class="benefit-item">

                            <div class="benefit-icon">
                                ✓
                            </div>

                            <div>

                                <strong>
                                    Materi Terstruktur
                                </strong>

                                <span>
                                    Materi disusun secara bertahap
                                    agar mudah dipelajari.
                                </span>

                            </div>

                        </div>


                        <!-- BENEFIT 2 -->

                        <div class="benefit-item">

                            <div class="benefit-icon">
                                ✓
                            </div>

                            <div>

                                <strong>
                                    Pembelajaran Fleksibel
                                </strong>

                                <span>
                                    Belajar sesuai waktu dan
                                    kemampuanmu.
                                </span>

                            </div>

                        </div>


                        <!-- BENEFIT 3 -->

                        <div class="benefit-item">

                            <div class="benefit-icon">
                                ✓
                            </div>

                            <div>

                                <strong>
                                    Skill yang Relevan
                                </strong>

                                <span>
                                    Fokus pada keterampilan web
                                    dan teknologi digital.
                                </span>

                            </div>

                        </div>


                        <!-- BENEFIT 4 -->

                        <div class="benefit-item">

                            <div class="benefit-icon">
                                ✓
                            </div>

                            <div>

                                <strong>
                                    Sertifikat Kursus
                                </strong>

                                <span>
                                    Dapatkan bukti penyelesaian
                                    kursusmu.
                                </span>

                            </div>

                        </div>


                    </div>


                    <!-- HARGA -->

                    <div class="price-highlight">

                        <span>
                            Mulai belajar dari
                        </span>

                        <strong>
                            Rp 200.000
                        </strong>

                    </div>


                </div>


                <!-- CARD KEAMANAN -->

                <div class="secure-card">

                    <div class="secure-icon">
                        ✓
                    </div>

                    <div>

                        <strong>
                            Pendaftaran Aman
                        </strong>

                        <span>
                            Data yang kamu masukkan
                            diproses dengan aman.
                        </span>

                    </div>

                </div>


            </aside>



            <!-- =================================================
                 KOLOM KANAN
            ================================================= -->

            <section class="registration-form-card">


                <!-- HEADER FORM -->

                <div class="form-card-header">

                    <div>

                        <span class="form-eyebrow">

                            FORMULIR PENDAFTARAN

                        </span>


                        <h2>
                            Data Peserta
                        </h2>


                        <p>

                            Silakan isi data berikut dengan
                            lengkap dan benar.

                        </p>

                    </div>


                    <div class="form-number">
                        01
                    </div>

                </div>



                <!-- =================================================
                     FORM POST
                ================================================= -->

                <form
                    action="process-registration.php"
                    method="POST"
                    class="registration-form"
                >


                    <!-- SOURCE -->

                    <input
                        type="hidden"
                        name="source"
                        value="week-05"
                    >


                    <!-- NAMA -->

                    <div class="form-group">

                        <label for="name">

                            Nama Lengkap

                            <span>
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Masukkan nama lengkap"
                            minlength="3"
                            maxlength="100"
                            autocomplete="name"
                            required
                        >

                    </div>



                    <!-- EMAIL -->

                    <div class="form-group">

                        <label for="email">

                            Email

                            <span>
                                *
                            </span>

                        </label>


                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="contoh@email.com"
                            maxlength="120"
                            autocomplete="email"
                            required
                        >

                    </div>



                    <!-- TELEPON + PROGRAM STUDI -->

                    <div class="form-row">


                        <!-- TELEPON -->

                        <div class="form-group">

                            <label for="phone">

                                Nomor Telepon

                                <span>
                                    *
                                </span>

                            </label>


                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                placeholder="08xxxxxxxxxx"
                                maxlength="15"
                                autocomplete="tel"
                                required
                            >

                        </div>


                        <!-- PROGRAM STUDI -->

                        <div class="form-group">

                            <label for="study_program">

                                Program Studi

                                <span>
                                    *
                                </span>

                            </label>


                            <input
                                type="text"
                                id="study_program"
                                name="study_program"
                                placeholder="Contoh: Informatika"
                                maxlength="100"
                                required
                            >

                        </div>


                    </div>



                    <!-- KURSUS -->

                    <div class="form-group">

                        <label for="course">

                            Pilih Kursus

                            <span>
                                *
                            </span>

                        </label>


                        <select
                            id="course"
                            name="course"
                            required
                        >

                            <option value="">

                                Pilih kursus yang ingin diikuti

                            </option>


                            <?php foreach ($courses as $value => $name): ?>

                                <option
                                    value="<?= e($value) ?>"
                                    <?= $selectedCourse === $value ? 'selected' : '' ?>
                                >

                                    <?= e($name) ?>

                                </option>

                            <?php endforeach; ?>


                        </select>

                    </div>



                    <!-- =================================================
                         PESAN GET
                    ================================================= -->

                    <?php if ($selectedCourseName !== ''): ?>

                        <div class="get-success-message">

                            <span class="get-message-icon">
                                GET
                            </span>

                            <div>

                                <strong>
                                    Kursus dari GET berhasil diterima
                                </strong>

                                <p>
                                    Kursus yang dipilih melalui URL:
                                    <b>
                                        <?= e($selectedCourseName) ?>
                                    </b>
                                </p>

                            </div>

                        </div>

                    <?php endif; ?>



                    <!-- JENIS PESERTA -->

                    <div class="form-group">

                        <label>

                            Jenis Peserta

                            <span>
                                *
                            </span>

                        </label>


                        <div class="radio-grid">


                            <!-- MAHASISWA -->

                            <label class="choice-card">

                                <input
                                    type="radio"
                                    name="participant_type"
                                    value="mahasiswa"
                                    required
                                >


                                <span class="choice-content">

                                    <strong>
                                        Mahasiswa
                                    </strong>

                                    <small>
                                        Saya masih berstatus mahasiswa
                                    </small>

                                </span>

                            </label>



                            <!-- UMUM -->

                            <label class="choice-card">

                                <input
                                    type="radio"
                                    name="participant_type"
                                    value="umum"
                                >


                                <span class="choice-content">

                                    <strong>
                                        Umum
                                    </strong>

                                    <small>
                                        Saya peserta umum
                                    </small>

                                </span>

                            </label>


                        </div>

                    </div>



                    <!-- MINAT -->

                    <div class="form-group">

                        <label>

                            Bidang yang Diminati

                        </label>


                        <div class="checkbox-grid">


                            <label class="check-card">

                                <input
                                    type="checkbox"
                                    name="interests[]"
                                    value="ui-ux"
                                >

                                <span>
                                    UI/UX
                                </span>

                            </label>


                            <label class="check-card">

                                <input
                                    type="checkbox"
                                    name="interests[]"
                                    value="database"
                                >

                                <span>
                                    Database
                                </span>

                            </label>


                            <label class="check-card">

                                <input
                                    type="checkbox"
                                    name="interests[]"
                                    value="backend"
                                >

                                <span>
                                    Backend
                                </span>

                            </label>


                        </div>

                    </div>



                    <!-- CATATAN -->

                    <div class="form-group">

                        <label for="note">

                            Catatan Tambahan

                        </label>


                        <textarea
                            id="note"
                            name="note"
                            rows="4"
                            maxlength="300"
                            placeholder="Tuliskan catatan atau pertanyaan jika ada..."
                        ></textarea>

                    </div>



                    <!-- TOMBOL POST -->

                    <div class="form-submit">


                        <button
                            type="submit"
                            class="premium-submit"
                        >

                            <span>
                                Daftar Sekarang
                            </span>

                            <strong>
                                →
                            </strong>

                        </button>


                        <p>

                            Dengan mengirim formulir,
                            kamu menyatakan data yang diberikan
                            sudah benar.

                        </p>

                    </div>


                </form>



                <!-- =================================================
                     FORM GET
                ================================================= -->

                <div class="get-test-card">


                    <!-- ICON -->

                    <div class="get-test-icon">

                        GET

                    </div>


                    <!-- CONTENT -->

                    <div class="get-test-content">


                        <span class="get-test-label">

                            PENGUJIAN METHOD GET

                        </span>


                        <h3>

                            Coba Kirim Data dengan GET

                        </h3>


                        <p>

                            Masukkan kode kursus di bawah.
                            Data akan dikirim menggunakan GET
                            dan dapat dilihat langsung pada URL browser.

                        </p>


                        <!-- FORM GET -->

                        <form
                            action="registration.php"
                            method="GET"
                            class="get-test-form"
                        >


                            <input
                                type="text"
                                name="course"
                                placeholder="Contoh: web-dasar"
                            >


                            <button type="submit">

                                Coba GET →

                            </button>


                        </form>


                        <!-- CONTOH -->

                        <div class="get-example">

                            Contoh:

                            <code>
                                web-dasar
                            </code>

                            atau

                            <code>
                                php-dasar
                            </code>

                        </div>


                    </div>

                </div>


            </section>

        </div>

    </div>

</main>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="premium-footer">

    <div class="container">

        <div class="footer-content">


            <!-- FOOTER BRAND -->

            <div>

                <div class="footer-logo">

                    KursusKu

                </div>


                <p>

                    Belajar hari ini,
                    berkembang untuk masa depan.

                </p>

            </div>


            <!-- FOOTER LINKS -->

            <div class="footer-links">

                <a href="index.php">
                    Beranda
                </a>

                <a href="index.php#katalog">
                    Katalog
                </a>

                <a href="registration.php">
                    Pendaftaran
                </a>

            </div>


        </div>


        <!-- FOOTER BOTTOM -->

        <div class="footer-bottom">

            <span>

                &copy;
                <?= date('Y') ?>
                KursusKu

            </span>


            <span>

                Platform Pembelajaran Digital

            </span>

        </div>


    </div>

</footer>



</body>

</html>
<form action="process-registration.php" method="GET">

    <input
        type="hidden"
        name="source"
        value="week-05"
    >

    <input
        type="text"
        name="name"
        placeholder="Nama lengkap"
        required
    >

    <input
        type="email"
        name="email"
        placeholder="Email"
        required
    >

    <input
        type="text"
        name="phone"
        placeholder="Nomor telepon"
        required
    >

    <input
        type="text"
        name="study_program"
        placeholder="Program studi"
        required
    >

    <select name="course" required>

        <option value="">
            Pilih kursus
        </option>

        <option value="web-dasar">
            Web Dasar
        </option>

        <option value="php-dasar">
            PHP Dasar
        </option>

        <option value="laravel-fundamental">
            Laravel Fundamental
        </option>

    </select>

    <button type="submit">
        Kirim GET →
    </button>
<!-- =========================
     TOMBOL PENGUJIAN GET
========================= -->

<div class="registration-actions">

    <a
        href="registration.php"
        class="back-button"
    >
        ← Kembali
    </a>

    <a
        href="process-registration.php?source=week-05&name=suciaulia&email=suciaulia000000%40gmail.com&phone=0000&study_program=Informatika&course=web-dasar"
        class="get-button"
    >
        ↗ Tes GET
    </a>

</div>