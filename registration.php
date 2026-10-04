
<?php
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';

function h($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus - <?= h($siteName) ?></title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        :root {
            --purple-dark: #321747;
            --purple-deep: #472260;
            --purple-main: #70439a;
            --purple-light: #8954b8;
            --purple-soft: #f7f2fb;
            --purple-pale: #eee3f7;
            --gold: #f3d68d;
            --text-dark: #39234e;
            --text-muted: #766783;
            --border: #e5d8ee;
            --white: #fff;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--purple-soft);
            color: var(--text-dark);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        /* HEADER */
        .header {
            position: sticky;
            top: 0;
            z-index: 100;
            width: 100%;
            background: linear-gradient(
                115deg,
                var(--purple-dark),
                #512d70,
                var(--purple-main)
            );
            box-shadow: 0 8px 25px rgba(40, 18, 60, .18);
        }

        .container {
            width: 90%;
            max-width: 1250px;
            margin: 0 auto;
        }

        .header-container {
            min-height: 90px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            color: white;
            font-size: 29px;
            font-weight: 900;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: linear-gradient(135deg, #f5d78b, #c89a44);
            color: #422653;
            font-size: 31px;
            font-weight: 900;
            box-shadow: 0 7px 20px rgba(0, 0, 0, .15);
            transition: transform .3s ease;
        }

        .brand:hover .brand-icon {
            transform: rotate(-8deg) scale(1.06);
        }

        .navbar {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar a {
            padding: 12px 20px;
            border-radius: 30px;
            color: #f6edfc;
            font-size: 15px;
            font-weight: 700;
            transition: all .3s ease;
        }

        .navbar a:hover,
        .navbar a.active {
            background: rgba(255, 255, 255, .16);
            color: white;
            transform: translateY(-2px);
        }

        /* HERO */
        .registration-hero {
            position: relative;
            overflow: hidden;
            padding: 85px 0;
            color: white;
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(206, 163, 244, .35),
                    transparent 32%
                ),
                linear-gradient(
                    120deg,
                    var(--purple-deep),
                    var(--purple-main),
                    var(--purple-light)
                );
        }

        .registration-hero::before,
        .registration-hero::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(255, 255, 255, .15);
            border-radius: 50%;
            pointer-events: none;
        }

        .registration-hero::before {
            width: 400px;
            height: 400px;
            top: -260px;
            right: 5%;
        }

        .registration-hero::after {
            width: 250px;
            height: 250px;
            bottom: -180px;
            right: 35%;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 850px;
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 18px;
            color: var(--gold);
            font-size: 14px;
            font-weight: 900;
            letter-spacing: 2px;
        }

        .registration-hero h1 {
            margin: 0 0 20px;
            color: white;
            font-size: clamp(38px, 5vw, 65px);
            line-height: 1.15;
            font-weight: 900;
            letter-spacing: -1.5px;
        }

        .registration-hero p {
            max-width: 750px;
            margin: 0;
            color: #f1e6f9;
            font-size: 19px;
            line-height: 1.8;
        }

        .hero-button {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-top: 30px;
            padding: 15px 25px;
            border-radius: 13px;
            background: linear-gradient(135deg, #f5d78b, #d3aa55);
            color: #45285d;
            font-weight: 800;
            box-shadow: 0 8px 22px rgba(30, 12, 44, .18);
            transition: all .3s ease;
        }

        .hero-button:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(30, 12, 44, .25);
        }

        /* FORM SECTION */
        .registration-section {
            padding: 75px 0;
        }

        .registration-card {
            padding: 48px;
            border: 1px solid var(--border);
            border-radius: 28px;
            background: white;
            box-shadow: 0 18px 50px rgba(73, 52, 95, .09);
        }

        .registration-heading {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 40px;
        }

        .form-icon {
            width: 65px;
            height: 65px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: var(--purple-pale);
            color: var(--purple-main);
            font-size: 30px;
        }

        .registration-heading h2 {
            margin: 0 0 5px;
            color: var(--purple-dark);
            font-size: 30px;
            font-weight: 900;
        }

        .registration-heading p {
            margin: 0;
            color: var(--text-muted);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 25px 22px;
        }

        .form-group {
            min-width: 0;
            margin: 0;
            padding: 0;
            border: 0;
        }

        .form-full {
            grid-column: 1 / -1;
        }

        .form-group label,
        .form-group legend {
            display: block;
            margin-bottom: 10px;
            color: var(--text-dark);
            font-size: 15px;
            font-weight: 800;
        }

        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="tel"],
        .registration-form select,
        .registration-form textarea {
            display: block;
            width: 100%;
            padding: 15px 17px;
            border: 1px solid #d9c8e8;
            border-radius: 12px;
            background: #fcfaff;
            color: var(--text-dark);
            font: inherit;
            transition: all .25s ease;
        }

        .registration-form input::placeholder,
        .registration-form textarea::placeholder {
            color: #a395b0;
        }

        .registration-form input:focus,
        .registration-form select:focus,
        .registration-form textarea:focus {
            outline: none;
            border-color: var(--purple-light);
            background: white;
            box-shadow: 0 0 0 4px rgba(137, 84, 184, .12);
        }

        .registration-form textarea {
            min-height: 130px;
            resize: vertical;
        }

        /* RADIO DAN CHECKBOX */
        .choice-list {
            display: grid;
            grid-template-columns: repeat(
                auto-fit,
                minmax(190px, 1fr)
            );
            gap: 14px;
        }

        .choice-item {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 60px;
            padding: 16px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #faf7fd;
            cursor: pointer;
            transition: all .25s ease;
        }

        .choice-item:hover {
            border-color: var(--purple-light);
            background: var(--purple-pale);
            transform: translateY(-3px);
            box-shadow: 0 7px 18px rgba(112, 67, 154, .08);
        }

        .choice-item input {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            accent-color: var(--purple-main);
            cursor: pointer;
        }

        .choice-item span {
            color: var(--text-dark);
            font-size: 14px;
            font-weight: 600;
        }

        /* TOMBOL */
        .form-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 40px;
        }

        .form-back,
        .form-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 54px;
            padding: 15px 25px;
            border-radius: 13px;
            font: inherit;
            font-weight: 800;
            text-align: center;
            transition: all .3s ease;
        }

        .form-back {
            border: 1px solid var(--border);
            background: var(--purple-pale);
            color: var(--purple-dark);
        }

        .form-back:hover {
            background: #e2d1f1;
            transform: translateY(-3px);
        }

        .form-submit {
            flex: 1;
            border: 0;
            background: linear-gradient(
                135deg,
                var(--purple-light),
                var(--purple-main)
            );
            color: white;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(112, 67, 154, .18);
        }

        .form-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(112, 67, 154, .28);
        }

        /* UJI GET */
        .get-test-section {
            padding: 0 0 75px;
        }

        .get-test-card {
            padding: 35px;
            border: 1px solid var(--border);
            border-radius: 24px;
            background: white;
            box-shadow: 0 12px 35px rgba(73, 52, 95, .07);
        }

        .get-test-card h2 {
            margin: 0 0 10px;
            color: var(--purple-dark);
            font-size: 26px;
        }

        .get-test-card p {
            color: var(--text-muted);
        }

        .get-test-card form {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .get-test-card input {
            flex: 1;
            min-width: 220px;
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            font: inherit;
        }

        .get-test-card input:focus {
            outline: none;
            border-color: var(--purple-light);
            box-shadow: 0 0 0 4px rgba(137, 84, 184, .12);
        }

        .get-test-card button {
            padding: 14px 22px;
            border: none;
            border-radius: 12px;
            background: var(--purple-main);
            color: white;
            font: inherit;
            font-weight: 800;
            cursor: pointer;
            transition: all .3s ease;
        }

        .get-test-card button:hover {
            background: var(--purple-dark);
            transform: translateY(-2px);
        }

        .get-result {
            margin-top: 22px;
            padding: 18px;
            border: 1px solid #b8dfc4;
            border-radius: 12px;
            background: #effaf2;
            color: #21643a;
            overflow-wrap: anywhere;
        }

        .get-result p {
            margin: 5px 0 0;
            color: #21643a;
        }

        /* FOOTER */
        .footer {
            padding: 30px 0;
            background: var(--purple-dark);
            color: #f1e6f9;
        }

        .footer-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-size: 20px;
            font-weight: 900;
        }

        .footer-brand .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            font-size: 22px;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        /* ANIMASI */
        .reveal {
            opacity: 0;
            transform: translateY(35px);
            transition:
                opacity .8s ease,
                transform .8s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-left {
            opacity: 0;
            transform: translateX(-40px);
            transition:
                opacity .8s ease,
                transform .8s ease;
        }

        .reveal-left.show {
            opacity: 1;
            transform: translateX(0);
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(40px);
            transition:
                opacity .8s ease,
                transform .8s ease;
        }

        .reveal-right.show {
            opacity: 1;
            transform: translateX(0);
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .header-container {
                flex-direction: column;
                justify-content: center;
                padding: 18px 0;
            }

            .registration-hero {
                padding: 65px 0;
            }

            .registration-card {
                padding: 35px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-full {
                grid-column: auto;
            }

            .footer-container {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

            .brand {
                font-size: 25px;
            }

            .brand-icon {
                width: 50px;
                height: 50px;
                font-size: 27px;
            }

            .navbar {
                flex-wrap: wrap;
                justify-content: center;
                gap: 3px;
            }

            .navbar a {
                padding: 10px 13px;
                font-size: 12px;
            }

            .registration-hero {
                padding: 50px 0;
            }

            .eyebrow {
                font-size: 11px;
                letter-spacing: 1px;
            }

            .registration-hero h1 {
                font-size: 36px;
            }

            .registration-hero p {
                font-size: 15px;
            }

            .registration-section {
                padding: 40px 0;
            }

            .registration-card {
                padding: 25px 18px;
                border-radius: 20px;
            }

            .registration-heading {
                align-items: flex-start;
                gap: 12px;
                margin-bottom: 30px;
            }

            .form-icon {
                width: 48px;
                height: 48px;
                border-radius: 14px;
                font-size: 22px;
            }

            .registration-heading h2 {
                font-size: 22px;
            }

            .registration-heading p {
                font-size: 13px;
            }

            .choice-list {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-back,
            .form-submit {
                width: 100%;
            }

            .get-test-card {
                padding: 25px 18px;
            }

            .get-test-card form {
                flex-direction: column;
            }

            .get-test-card input,
            .get-test-card button {
                width: 100%;
            }
        }

        /* Hormati pengaturan pengurangan animasi */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
                animation-duration: .01ms !important;
            }

            .reveal,
            .reveal-left,
            .reveal-right {
                opacity: 1;
                transform: none;
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
                <a href="registration.php" class="active">Daftar Kursus</a>
            </nav>
        </div>
    </header>

    <main class="registration-page">

        <!-- HERO -->
        <section class="registration-hero">
            <div class="container hero-content reveal">
                <span class="eyebrow">✦ PENDAFTARAN KURSUS ✦</span>

                <h1>
                    Mulai Perjalanan<br>
                    Belajarmu Hari Ini
                </h1>

                <p>
                    Lengkapi formulir berikut untuk mendaftar
                    dan memilih kursus yang sesuai dengan minatmu.
                </p>

                <a href="#formulir" class="hero-button">
                    Isi Formulir
                    <span aria-hidden="true">↓</span>
                </a>
            </div>
        </section>

        <!-- FORMULIR -->
        <section class="registration-section" id="formulir">
            <div class="container">
                <div class="registration-card reveal">

                    <div class="registration-heading">
                        <span class="form-icon" aria-hidden="true">✦</span>
                        <div>
                            <h2>Formulir Pendaftaran</h2>
                            <p>Isi informasi dengan benar dan lengkap.</p>
                        </div>
                    </div>

                    <form
                        action="process-registration.php"
                        method="POST"
                        class="registration-form"
                    >
                        <input
                            type="hidden"
                            name="source"
                            value="week-05"
                        >

                        <div class="form-grid">

                            <!-- NAMA -->
                            <div class="form-group reveal">
                                <label for="name">Nama Lengkap</label>
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
                            <div class="form-group reveal">
                                <label for="email">Alamat Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="contoh@email.com"
                                    autocomplete="email"
                                    required
                                >
                            </div>

                            <!-- TELEPON -->
                            <div class="form-group reveal">
                                <label for="phone">Nomor Telepon</label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    placeholder="08xxxxxxxxxx"
                                    maxlength="20"
                                    autocomplete="tel"
                                    required
                                >
                            </div>

                            <!-- PROGRAM STUDI -->
                            <div class="form-group reveal">
                                <label for="study_program">Program Studi</label>
                                <input
                                    type="text"
                                    id="study_program"
                                    name="study_program"
                                    placeholder="Masukkan program studi"
                                    required
                                >
                            </div>

                            <!-- KURSUS -->
                            <div class="form-group form-full reveal">
                                <label for="course">Pilih Kursus</label>
                                <select id="course" name="course" required>
                                    <option value="">-- Pilih Kursus --</option>
                                    <option value="Web Dasar">Web Dasar</option>
                                    <option value="PHP Dasar">PHP Dasar</option>
                                    <option value="PHP Lanjutan">PHP Lanjutan</option>
                                    <option value="Laravel Fundamental">Laravel Fundamental</option>
                                    <option value="MySQL Dasar">MySQL Dasar</option>
                                    <option value="UI Web Dasar">UI Web Dasar</option>
                                </select>
                            </div>

                            <!-- JENIS PESERTA -->
                            <fieldset class="form-group form-full reveal">
                                <legend>Jenis Peserta</legend>

                                <div class="choice-list">
                                    <label class="choice-item">
                                        <input
                                            type="radio"
                                            name="participant_type"
                                            value="Pelajar"
                                            required
                                        >
                                        <span>Pelajar</span>
                                    </label>

                                    <label class="choice-item">
                                        <input
                                            type="radio"
                                            name="participant_type"
                                            value="Mahasiswa"
                                        >
                                        <span>Mahasiswa</span>
                                    </label>

                                    <label class="choice-item">
                                        <input
                                            type="radio"
                                            name="participant_type"
                                            value="Umum"
                                        >
                                        <span>Umum</span>
                                    </label>
                                </div>
                            </fieldset>

                            <!-- MINAT -->
                            <fieldset class="form-group form-full reveal">
                                <legend>Minat Pembelajaran</legend>

                                <div class="choice-list">
                                    <label class="choice-item">
                                        <input
                                            type="checkbox"
                                            name="interests[]"
                                            value="UI/UX"
                                        >
                                        <span>UI/UX</span>
                                    </label>

                                    <label class="choice-item">
                                        <input
                                            type="checkbox"
                                            name="interests[]"
                                            value="Database"
                                        >
                                        <span>Database</span>
                                    </label>

                                    <label class="choice-item">
                                        <input
                                            type="checkbox"
                                            name="interests[]"
                                            value="Backend"
                                        >
                                        <span>Backend</span>
                                    </label>
                                </div>
                            </fieldset>

                            <!-- CATATAN -->
                            <div class="form-group form-full reveal">
                                <label for="note">Catatan Tambahan</label>
                                <textarea
                                    id="note"
                                    name="note"
                                    rows="5"
                                    placeholder="Tuliskan catatan jika diperlukan"
                                ></textarea>
                            </div>

                        </div>

                        <!-- TOMBOL -->
                        <div class="form-actions reveal">
                            <a href="index.php" class="form-back">
                                Kembali ke Katalog
                            </a>

                            <button type="submit" class="form-submit">
                                Kirim Pendaftaran
                                <span aria-hidden="true">→</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- UJI GET -->
        <section class="get-test-section">
            <div class="container">
                <div class="get-test-card reveal">
                    <h2>Uji Metode GET</h2>

                    <p>
                        Masukkan teks berikut untuk melihat cara kerja
                        metode GET melalui alamat URL.
                    </p>

                    <form action="registration.php" method="GET">
                        <input
                            type="text"
                            name="uji_get"
                            placeholder="Masukkan teks pengujian"
                            value="<?= isset($_GET['uji_get']) ? h($_GET['uji_get']) : '' ?>"
                            required
                        >

                        <button type="submit">
                            Uji GET →
                        </button>
                    </form>

                    <?php if (isset($_GET['uji_get'])): ?>
                        <div class="get-result" role="status">
                            <strong>GET berhasil!</strong>
                            <p>
                                Data yang dikirim:
                                <?= h($_GET['uji_get']) ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container footer-container">
            <a href="index.php" class="footer-brand">
                <span class="brand-icon">K</span>
                <span>KursusKu</span>
            </a>

            <p>
                &copy; <?= date('Y') ?> KursusKu.
                Semua hak dilindungi.
            </p>
        </div>
    </footer>

    <!-- ANIMASI SAAT SCROLL -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const elements = document.querySelectorAll(
                ".reveal, .reveal-left, .reveal-right"
            );

            if (!("IntersectionObserver" in window)) {
                elements.forEach(function (element) {
                    element.classList.add("show");
                });
                return;
            }

            const observer = new IntersectionObserver(
                function (entries, currentObserver) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("show");
                            currentObserver.unobserve(entry.target);
                        }
                    });
                },
                {
                    threshold: 0.12,
                    rootMargin: "0px 0px -30px 0px"
                }
            );

            elements.forEach(function (element, index) {
                element.style.transitionDelay =
                    (index % 4) * 100 + "ms";
                observer.observe(element);
            });
        });
    </script>

</body>
</html>