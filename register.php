<?php

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Kursus | KursusKu</title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        :root {
            --purple-dark: #29134d;
            --purple: #6336a0;
            --purple-light: #9864d0;
            --lavender: #f2eaff;
            --gold: #f3d58b;
            --text: #332348;
            --muted: #81748f;
            --border: #e8def3;
            --white: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "DM Sans", sans-serif;
            color: var(--text);
            background: #f8f5fc;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* BACKGROUND */

        .background-glow {
            position: fixed;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            filter: blur(100px);
            opacity: .25;
            pointer-events: none;
            z-index: -1;
        }

        .glow-one {
            background: #c5a1f5;
            top: 180px;
            left: -150px;
        }

        .glow-two {
            background: #e9c8ff;
            right: -150px;
            bottom: 50px;
        }

        /* NAVBAR */

        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(41, 19, 77, .94);
            backdrop-filter: blur(14px);
            box-shadow:
                0 5px 25px
                rgba(41, 19, 77, .15);
        }

        .navbar {
            max-width: 1250px;
            margin: auto;
            min-height: 78px;
            padding: 0 30px;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .logo {
            font-family: "Plus Jakarta Sans", sans-serif;
            color: white;
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .logo span {
            color: var(--gold);
        }

        nav {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        nav a {
            color: #eee5fa;
            text-decoration: none;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 9px;
            transition: .3s ease;
        }

        nav a:hover,
        nav a.active {
            background: rgba(255,255,255,.13);
            color: var(--gold);
        }

        /* HERO */

        .hero {
            position: relative;
            overflow: hidden;

            padding: 75px 20px 110px;

            text-align: center;
            color: white;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(255,255,255,.13),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(243,213,139,.15),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #32165f,
                    #6336a0 55%,
                    #9460c8
                );
        }

        .hero::before,
        .hero::after {
            content: "";

            position: absolute;

            border: 1px solid rgba(255,255,255,.12);

            border-radius: 50%;

            animation:
                orbit 18s linear infinite;
        }

        .hero::before {
            width: 300px;
            height: 300px;

            top: -160px;
            left: 8%;
        }

        .hero::after {
            width: 420px;
            height: 420px;

            right: -170px;
            bottom: -280px;

            animation-direction: reverse;
        }

        .hero-content {
            position: relative;
            z-index: 1;

            max-width: 760px;
            margin: auto;

            animation:
                heroEnter .9s ease both;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 8px 16px;
            margin-bottom: 18px;

            border: 1px solid rgba(255,255,255,.25);
            border-radius: 50px;

            background: rgba(255,255,255,.1);

            color: #fff4d6;

            font-size: 12px;
            font-weight: 700;

            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero h1 {
            font-family: "Plus Jakarta Sans", sans-serif;

            font-size:
                clamp(32px, 5vw, 53px);

            line-height: 1.2;

            font-weight: 800;

            margin-bottom: 16px;
        }

        .hero h1 span {
            color: var(--gold);
        }

        .hero p {
            max-width: 620px;
            margin: auto;

            color: #eee4fa;

            font-size: 16px;
        }

        /* FORM */

        .form-wrapper {
            position: relative;

            max-width: 960px;
            width: 92%;

            margin: -55px auto 75px;

            z-index: 2;
        }

        .form-container {
            background: rgba(255,255,255,.96);

            border: 1px solid rgba(255,255,255,.9);

            border-radius: 24px;

            padding: 42px;

            box-shadow:
                0 25px 75px
                rgba(54, 25, 92, .12);

            animation:
                cardEnter .8s .15s ease both;
        }

        .form-heading {
            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 20px;

            padding-bottom: 25px;
            margin-bottom: 30px;

            border-bottom: 1px solid #eee7f5;
        }

        .form-heading h2 {
            font-family:
                "Plus Jakarta Sans",
                sans-serif;

            font-size: 25px;

            color: var(--purple-dark);
        }

        .form-heading p {
            color: var(--muted);

            font-size: 14px;

            margin-top: 5px;
        }

        .form-icon {
            display: grid;

            place-items: center;

            width: 58px;
            height: 58px;

            flex-shrink: 0;

            border-radius: 17px;

            color: var(--purple);

            background: var(--lavender);

            font-size: 28px;

            animation:
                float 3s ease-in-out infinite;
        }

        .form-group {
            margin-bottom: 27px;
        }

        .form-label {
            display: block;

            margin-bottom: 9px;

            color: #40235f;

            font-size: 14px;

            font-weight: 700;
        }

        .required {
            color: #d64d76;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        textarea {
            width: 100%;

            padding: 14px 16px;

            border: 1px solid var(--border);

            border-radius: 12px;

            background: #fdfbff;

            color: var(--text);

            font: inherit;

            outline: none;

            transition:
                border-color .25s,
                box-shadow .25s,
                background .25s;
        }

        input::placeholder,
        textarea::placeholder {
            color: #b0a5bd;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #9864d0;

            background: white;

            box-shadow:
                0 0 0 4px
                rgba(152,100,208,.12);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-hint {
            font-size: 13px;

            color: var(--muted);

            margin: -3px 0 13px;
        }

        /* RADIO + CHECKBOX */

        .radio-options,
        .checkbox-options {
            display: grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(0, 1fr)
                );

            gap: 13px;
        }

        .choice-card {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 15px 16px;

            border: 1px solid var(--border);

            border-radius: 13px;

            background: #fdfbff;

            cursor: pointer;

            transition: .25s ease;
        }

        .choice-card:hover {
            border-color:
                var(--purple-light);

            background: #f7f0ff;

            transform:
                translateY(-2px);
        }

        .choice-card:has(input:checked) {
            border-color:
                var(--purple);

            background: #f1e7ff;

            box-shadow:
                0 5px 15px
                rgba(99,54,160,.08);
        }

        .choice-card input {
            width: 18px;
            height: 18px;

            accent-color:
                var(--purple);

            flex-shrink: 0;

            cursor: pointer;
        }

        .choice-card span {
            font-size: 14px;

            font-weight: 600;
        }

        /* FACILITY */

        .facility-section {
            padding: 25px;

            border: 1px solid #e9def5;

            border-radius: 18px;

            background:
                linear-gradient(
                    135deg,
                    #fcfaff,
                    #f8f1ff
                );
        }

        .facility-title-row {
            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 7px;
        }

        .facility-title-icon {
            display: grid;

            place-items: center;

            width: 46px;
            height: 46px;

            border-radius: 14px;

            background: #eadbfc;

            color: #6336a0;

            font-size: 23px;

            flex-shrink: 0;
        }

        .section-title {
            font-family:
                "Plus Jakarta Sans",
                sans-serif;

            color: #4b2779;

            font-size: 20px;

            font-weight: 800;
        }

        .facility-options {
            display: grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(0, 1fr)
                );

            gap: 13px;

            margin-top: 20px;
        }

        .facility-option {
            position: relative;

            display: flex;

            align-items: center;

            gap: 12px;

            min-height: 92px;

            padding: 15px;

            border: 1px solid #e5d9f1;

            border-radius: 14px;

            background: white;

            cursor: pointer;

            transition: .3s ease;

            overflow: hidden;
        }

        .facility-option:hover {
            border-color: #a17acb;

            transform:
                translateY(-4px);

            box-shadow:
                0 10px 22px
                rgba(79,39,121,.09);
        }

        .facility-option:has(input:checked) {
            border-color: #8955c3;

            background: #f3eaff;

            box-shadow:
                0 5px 16px
                rgba(99,54,160,.1);
        }

        .facility-option input {
            width: 19px;
            height: 19px;

            accent-color:
                var(--purple);

            flex-shrink: 0;
        }

        .facility-icon {
            display: grid;

            place-items: center;

            width: 43px;
            height: 43px;

            flex-shrink: 0;

            border-radius: 12px;

            background: #f2eaff;

            font-size: 22px;
        }

        .facility-text strong {
            display: block;

            color: #4d287a;

            font-size: 13px;

            line-height: 1.4;
        }

        .facility-text small {
            display: block;

            color: #897d98;

            font-size: 11px;

            line-height: 1.4;

            margin-top: 4px;
        }

        /* BUTTON */

        .submit-btn {
            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            width: 100%;

            padding: 16px 20px;

            margin-top: 8px;

            overflow: hidden;

            border: none;

            border-radius: 13px;

            background:
                linear-gradient(
                    110deg,
                    #4a237d,
                    #7742b4,
                    #9b66cf
                );

            background-size: 200% 100%;

            color: white;

            font-family:
                "Plus Jakarta Sans",
                sans-serif;

            font-size: 15px;

            font-weight: 800;

            cursor: pointer;

            box-shadow:
                0 10px 25px
                rgba(99,54,160,.22);

            transition: .35s ease;
        }

        .submit-btn:hover {
            background-position:
                100% 0;

            transform:
                translateY(-3px);

            box-shadow:
                0 15px 30px
                rgba(99,54,160,.3);
        }

        .submit-arrow {
            transition:
                transform .3s;
        }

        .submit-btn:hover
        .submit-arrow {
            transform:
                translateX(5px);
        }

        .secure-note {
            text-align: center;

            color: #9588a2;

            font-size: 12px;

            margin-top: 15px;
        }

        /* FOOTER */

        footer {
            background: #29134d;

            color: #e8def4;

            padding: 30px 20px;

            text-align: center;
        }

        .footer-logo {
            font-family:
                "Plus Jakarta Sans",
                sans-serif;

            font-size: 22px;

            font-weight: 800;

            margin-bottom: 5px;
        }

        .footer-logo span {
            color: var(--gold);
        }

        footer p {
            font-size: 12px;

            color: #c9b9df;
        }

        /* ANIMATION */

        @keyframes heroEnter {

            from {
                opacity: 0;
                transform:
                    translateY(25px);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0);
            }

        }

        @keyframes cardEnter {

            from {
                opacity: 0;
                transform:
                    translateY(35px)
                    scale(.98);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0)
                    scale(1);
            }

        }

        @keyframes orbit {

            to {
                transform:
                    rotate(360deg);
            }

        }

        @keyframes float {

            0%, 100% {
                transform:
                    translateY(0);
            }

            50% {
                transform:
                    translateY(-6px);
            }

        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .navbar {
                padding: 15px 5%;

                flex-direction:
                    column;

                align-items:
                    flex-start;
            }

            nav {
                width: 100%;

                gap: 5px;

                flex-wrap: wrap;
            }

            nav a {
                padding:
                    8px 10px;

                font-size: 13px;
            }

            .hero {
                padding:
                    55px 20px 90px;
            }

            .form-container {
                padding:
                    27px 20px;
            }

            .form-heading h2 {
                font-size: 21px;
            }

            .facility-section {
                padding: 18px;
            }

            .radio-options,
            .checkbox-options,
            .facility-options {
                grid-template-columns:
                    1fr;
            }

        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {

                animation-duration:
                    .01ms !important;

                animation-iteration-count:
                    1 !important;

                scroll-behavior:
                    auto !important;

                transition-duration:
                    .01ms !important;
            }

        }

    </style>

</head>

<body>

<div class="background-glow glow-one"></div>
<div class="background-glow glow-two"></div>


<header>

    <div class="navbar">

        <div class="logo">
            Kursus<span>Ku</span>
        </div>

        <nav>

            <a href="index.php">
                Katalog
            </a>

            <a
                href="register.php"
                class="active"
            >
                Daftar Kursus
            </a>

            <a href="history.php">
                Riwayat
            </a>

        </nav>

    </div>

</header>


<section class="hero">

    <div class="hero-content">

        <div class="hero-badge">
            ✦ Mulai perjalanan belajarmu
        </div>

        <h1>
            Wujudkan Potensimu<br>
            <span>Bersama KursusKu</span>
        </h1>

        <p>
            Lengkapi formulir pendaftaran dan temukan
            pengalaman belajar yang sesuai dengan
            tujuan serta minatmu.
        </p>

    </div>

</section>


<main class="form-wrapper">

    <div class="form-container">

        <div class="form-heading">

            <div>

                <h2>
                    Formulir Pendaftaran
                </h2>

                <p>
                    Isi data berikut dengan lengkap dan benar.
                </p>

            </div>

            <div class="form-icon">
                ✦
            </div>

        </div>


        <form
            action="process.php"
            method="POST"
        >

            <!-- NAMA -->

            <div class="form-group">

                <label
                    for="name"
                    class="form-label"
                >
                    Nama Lengkap
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Masukkan nama lengkap"
                    autocomplete="name"
                    minlength="3"
                    maxlength="100"
                    required
                >

            </div>


            <!-- EMAIL -->

            <div class="form-group">

                <label
                    for="email"
                    class="form-label"
                >
                    Alamat Email
                    <span class="required">*</span>
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="contoh@email.com"
                    autocomplete="email"
                    maxlength="150"
                    required
                >

            </div>


            <!-- KURSUS -->

            <div class="form-group">

                <label
                    for="course_code"
                    class="form-label"
                >
                    Pilihan Kursus
                    <span class="required">*</span>
                </label>

                <select
                    id="course_code"
                    name="course_code"
                    required
                >

                    <option value="">
                        -- Pilih Kursus --
                    </option>

                    <?php foreach ($courses as $code => $course): ?>

                        <?php

                        if (is_array($course)) {

                            $courseName =
                                $course['name']
                                ?? $course['title']
                                ?? $course['course_name']
                                ?? $code;

                            $courseCode =
                                $course['code']
                                ?? $code;

                        } else {

                            $courseName =
                                $course;

                            $courseCode =
                                $code;
                        }

                        ?>

                        <option
                            value="<?= e($courseCode) ?>"
                        >
                            <?= e($courseName) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- JENIS PESERTA -->

            <div class="form-group">

                <label class="form-label">

                    Jenis Peserta
                    <span class="required">*</span>

                </label>

                <div class="radio-options">

                    <?php

                    $participantTypes = [

                        'mahasiswa' =>
                            'Mahasiswa',

                        'guru' =>
                            'Guru',

                        'umum' =>
                            'Umum'

                    ];

                    ?>

                    <?php foreach (
                        $participantTypes
                        as $value => $label
                    ): ?>

                        <label
                            class="choice-card"
                        >

                            <input
                                type="radio"
                                name="participant_type"
                                value="<?= e($value) ?>"
                                required
                            >

                            <span>
                                <?= e($label) ?>
                            </span>

                        </label>

                    <?php endforeach; ?>

                </div>

            </div>


            <!-- MINAT BELAJAR -->

            <div class="form-group">

                <label class="form-label">
                    Minat Belajar
                </label>

                <p class="form-hint">
                    Pilih minat yang sesuai.
                    Kamu dapat memilih lebih dari satu.
                </p>

                <div class="checkbox-options">

                    <?php foreach (
                        $interestOptions
                        as $interestValue => $interestLabel
                    ): ?>

                        <label
                            class="choice-card"
                        >

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="<?= e($interestValue) ?>"
                            >

                            <span>
                                <?= e($interestLabel) ?>
                            </span>

                        </label>

                    <?php endforeach; ?>

                </div>

            </div>


            <!-- METODE PEMBELAJARAN -->

            <div class="form-group">

                <label class="form-label">

                    Metode Pembelajaran
                    <span class="required">*</span>

                </label>

                <div class="radio-options">

                    <label
                        class="choice-card"
                    >

                        <input
                            type="radio"
                            name="learning_mode"
                            value="offline"
                            required
                        >

                        <span>
                            🏫 Offline
                        </span>

                    </label>


                    <label
                        class="choice-card"
                    >

                        <input
                            type="radio"
                            name="learning_mode"
                            value="online"
                        >

                        <span>
                            💻 Online
                        </span>

                    </label>


                    <label
                        class="choice-card"
                    >

                        <input
                            type="radio"
                            name="learning_mode"
                            value="hybrid"
                        >

                        <span>
                            🔄 Hybrid
                        </span>

                    </label>

                </div>

            </div>


            <!-- JUMLAH PAKET -->

            <div class="form-group">

                <label
                    for="package_count"
                    class="form-label"
                >

                    Jumlah Paket
                    <span class="required">*</span>

                </label>

                <select
                    id="package_count"
                    name="package_count"
                    required
                >

                    <option value="">
                        -- Pilih Jumlah Paket --
                    </option>

                    <option value="1">
                        1 Paket
                    </option>

                    <option value="2">
                        2 Paket
                    </option>

                    <option value="3">
                        3 Paket
                    </option>

                </select>

            </div>


            <!-- FASILITAS -->

            <div class="form-group">

                <div class="facility-section">

                    <div class="facility-title-row">

                        <div class="facility-title-icon">
                            🎁
                        </div>

                        <div>

                            <h3 class="section-title">
                                Fasilitas Kursus
                            </h3>

                            <p class="form-hint">
                                Pilih fasilitas yang kamu inginkan.
                            </p>

                        </div>

                    </div>


                    <div class="facility-options">

                        <label
                            class="facility-option"
                        >

                            <input
                                type="checkbox"
                                name="facilities[]"
                                value="Modul Pembelajaran"
                            >

                            <span class="facility-icon">
                                📘
                            </span>

                            <span class="facility-text">

                                <strong>
                                    Modul Pembelajaran
                                </strong>

                                <small>
                                    Materi digital untuk belajar.
                                </small>

                            </span>

                        </label>


                        <label
                            class="facility-option"
                        >

                            <input
                                type="checkbox"
                                name="facilities[]"
                                value="Bimbingan Mentor"
                            >

                            <span class="facility-icon">
                                👨‍🏫
                            </span>

                            <span class="facility-text">

                                <strong>
                                    Bimbingan Mentor
                                </strong>

                                <small>
                                    Pendampingan selama kursus.
                                </small>

                            </span>

                        </label>


                        <label
                            class="facility-option"
                        >

                            <input
                                type="checkbox"
                                name="facilities[]"
                                value="Praktik dan Proyek"
                            >

                            <span class="facility-icon">
                                💻
                            </span>

                            <span class="facility-text">

                                <strong>
                                    Praktik dan Proyek
                                </strong>

                                <small>
                                    Latihan meningkatkan keterampilan.
                                </small>

                            </span>

                        </label>


                        <label
                            class="facility-option"
                        >

                            <input
                                type="checkbox"
                                name="facilities[]"
                                value="Sertifikat"
                            >

                            <span class="facility-icon">
                                🏆
                            </span>

                            <span class="facility-text">

                                <strong>
                                    Sertifikat
                                </strong>

                                <small>
                                    Sertifikat penyelesaian kursus.
                                </small>

                            </span>

                        </label>


                        <label
                            class="facility-option"
                        >

                            <input
                                type="checkbox"
                                name="facilities[]"
                                value="Akses Materi"
                            >

                            <span class="facility-icon">
                                📚
                            </span>

                            <span class="facility-text">

                                <strong>
                                    Akses Materi
                                </strong>

                                <small>
                                    Akses materi pembelajaran.
                                </small>

                            </span>

                        </label>


                        <label
                            class="facility-option"
                        >

                            <input
                                type="checkbox"
                                name="facilities[]"
                                value="Komunitas Belajar"
                            >

                            <span class="facility-icon">
                                🤝
                            </span>

                            <span class="facility-text">

                                <strong>
                                    Komunitas Belajar
                                </strong>

                                <small>
                                    Diskusi dan berbagi pengetahuan.
                                </small>

                            </span>

                        </label>

                    </div>

                </div>

            </div>


            <!-- CATATAN -->

            <div class="form-group">

                <label
                    for="notes"
                    class="form-label"
                >
                    Catatan
                </label>

                <textarea
                    id="notes"
                    name="notes"
                    rows="4"
                    maxlength="500"
                    placeholder="Tuliskan catatan tambahan jika ada..."
                ></textarea>

            </div>


            <!-- TOMBOL -->

            <button
                type="submit"
                class="submit-btn"
            >

                Daftar Sekarang

                <span class="submit-arrow">
                    ➜
                </span>

            </button>


            <p class="secure-note">
                ✦ Pastikan data yang kamu masukkan sudah benar.
            </p>

        </form>

    </div>

</main>


<footer>

    <div class="footer-logo">
        Kursus<span>Ku</span>
    </div>

    <p>
        Belajar, Berkembang, dan Berprestasi.
    </p>

    <p>
        &copy; <?= date('Y') ?>
        KursusKu.
        Semua hak dilindungi.
    </p>

</footer>


</body>

</html>