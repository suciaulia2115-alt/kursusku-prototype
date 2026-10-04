
<?php
require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus | KursusKu</title>

    <style>
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
            background: #f7f4fc;
            color: #302449;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* HEADER */
        .premium-header {
            width: 100%;
            background: #24143f;
            padding: 16px 6%;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 20px rgba(28, 13, 53, 0.2);
        }

        .header-container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .premium-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: white;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
            background: linear-gradient(135deg, #c5a6ff, #8d5de5);
            color: #24143f;
            font-size: 25px;
            font-weight: 900;
        }

        .brand-name {
            font-size: 23px;
            font-weight: 800;
            line-height: 1.2;
        }

        .brand-name small {
            display: block;
            color: #d5c5f2;
            font-size: 9px;
            letter-spacing: 2px;
            margin-top: 4px;
        }

        .premium-nav {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .premium-nav a {
            color: #e9e1f7;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 16px;
            border-radius: 10px;
            transition: 0.3s ease;
        }

        .premium-nav a:hover,
        .premium-nav a.active {
            color: white;
            background: #65429b;
            transform: translateY(-2px);
        }

        /* HERO */
        .register-hero {
            min-height: 420px;
            padding: 75px 8%;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 40px;
            background: linear-gradient(120deg, #38205f, #6843a0, #9069c8);
            color: white;
        }

        .hero-content {
            max-width: 650px;
            position: relative;
            z-index: 2;
            animation: slideUp 0.9s ease both;
        }

        .hero-label {
            display: inline-block;
            padding: 8px 15px;
            border: 1px solid rgba(255,255,255,0.35);
            background: rgba(255,255,255,0.12);
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
        }

        .hero-content h1 {
            font-size: clamp(35px, 5vw, 56px);
            line-height: 1.15;
            margin-bottom: 20px;
            font-weight: 850;
        }

        .hero-content h1 span {
            color: #e5d0ff;
        }

        .hero-content p {
            max-width: 550px;
            color: #f0e9fb;
            font-size: 16px;
            margin-bottom: 28px;
        }

        .hero-button {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 13px 24px;
            border-radius: 12px;
            background: #e4c778;
            color: #382653;
            text-decoration: none;
            font-weight: 800;
            transition: 0.3s ease;
            box-shadow: 0 8px 20px rgba(24, 11, 42, 0.2);
        }

        .hero-button:hover {
            transform: translateY(-4px);
            background: #f0d994;
            box-shadow: 0 12px 25px rgba(24, 11, 42, 0.3);
        }

        .hero-decoration-card {
            width: 290px;
            min-width: 250px;
            padding: 28px;
            border-radius: 22px;
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.25);
            backdrop-filter: blur(12px);
            box-shadow: 0 15px 40px rgba(31, 15, 55, 0.18);
            z-index: 2;
            animation: floatCard 4s ease-in-out infinite;
        }

        .hero-card-icon {
            width: 54px;
            height: 54px;
            border-radius: 17px;
            background: #e4c778;
            color: #382653;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 18px;
        }

        .hero-decoration-card strong {
            display: block;
            font-size: 19px;
            margin-bottom: 10px;
        }

        .hero-decoration-card span {
            display: block;
            font-size: 14px;
            color: #eee5fa;
        }

        .hero-decoration {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            pointer-events: none;
            animation: drift 9s ease-in-out infinite alternate;
        }

        .hero-circle-one {
            width: 300px;
            height: 300px;
            top: -130px;
            right: 25%;
        }

        .hero-circle-two {
            width: 220px;
            height: 220px;
            bottom: -110px;
            left: 35%;
            animation-delay: 1.5s;
        }

        /* FORM */
        .register-page {
            padding: 70px 20px 90px;
            position: relative;
        }

        .register-card {
            max-width: 850px;
            margin: auto;
            padding: 45px;
            border-radius: 25px;
            background: white;
            box-shadow: 0 15px 55px rgba(56, 32, 95, 0.1);
            border: 1px solid #eee7f8;
            animation: slideUp 0.8s ease 0.15s both;
        }

        .register-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .eyebrow {
            display: inline-block;
            color: #8052bd;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .register-heading h2 {
            color: #302047;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .register-heading p {
            color: #766b86;
            font-size: 14px;
            max-width: 570px;
            margin: auto;
        }

        .register-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .form-group {
            min-width: 0;
            animation: fadeIn 0.7s ease both;
        }

        .form-group:nth-child(1) { animation-delay: 0.10s; }
        .form-group:nth-child(2) { animation-delay: 0.15s; }
        .form-group:nth-child(3) { animation-delay: 0.20s; }
        .form-group:nth-child(4) { animation-delay: 0.25s; }
        .form-group:nth-child(5) { animation-delay: 0.30s; }
        .form-group:nth-child(6) { animation-delay: 0.35s; }
        .form-group:nth-child(7) { animation-delay: 0.40s; }
        .form-group:nth-child(8) { animation-delay: 0.45s; }

        .group-label {
            display: block;
            color: #382653;
            font-size: 14px;
            font-weight: 750;
            margin-bottom: 9px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #ded5ed;
            border-radius: 11px;
            background: #fcfbfe;
            color: #302449;
            font: inherit;
            font-size: 14px;
            outline: none;
            transition: border 0.25s ease, box-shadow 0.25s ease,
                        background 0.25s ease, transform 0.25s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #9063cf;
            background: white;
            box-shadow: 0 0 0 4px rgba(144, 99, 207, 0.13);
            transform: translateY(-1px);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 110px;
        }

        .choice-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .choice-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px 14px;
            border: 1px solid #e5def0;
            border-radius: 11px;
            background: #fcfbfe;
            cursor: pointer;
            transition: 0.25s ease;
            font-size: 13px;
            color: #514565;
        }

        .choice-item:hover {
            border-color: #a987d9;
            background: #f5effd;
            transform: translateX(4px);
        }

        .choice-item input {
            accent-color: #7950b5;
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .choice-item:has(input:checked) {
            border-color: #8e65c6;
            background: #f2eafd;
            color: #382653;
        }

        .form-group:nth-child(7),
        .form-group:nth-child(8),
        .register-actions {
            grid-column: 1 / -1;
        }

        .register-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 8px;
            padding-top: 10px;
        }

        .register-submit,
        .register-back {
            min-height: 50px;
            padding: 13px 24px;
            border: none;
            border-radius: 11px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font: inherit;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .register-submit {
            color: white;
            background: linear-gradient(135deg, #8052bd, #56318e);
            box-shadow: 0 7px 18px rgba(86, 49, 142, 0.2);
        }

        .register-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(86, 49, 142, 0.3);
        }

        .register-submit:active {
            transform: scale(0.98);
        }

        .register-back {
            color: #64448e;
            background: #f0eafa;
            border: 1px solid #e3d7f3;
        }

        .register-back:hover {
            background: #e6daf7;
            transform: translateY(-3px);
        }

        /* FOOTER */
        .register-footer {
            padding: 23px 15px;
            text-align: center;
            background: #24143f;
            color: #ded2ef;
            font-size: 13px;
        }

        /* ANIMATIONS */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(35px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes floatCard {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        @keyframes drift {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(25px, 15px) scale(1.08); }
        }

        /* RESPONSIVE */
        @media (max-width: 850px) {
            .register-hero {
                flex-direction: column;
                align-items: flex-start;
                padding: 65px 7%;
            }

            .hero-decoration-card {
                width: 100%;
                max-width: 450px;
            }
        }

        @media (max-width: 650px) {
            .premium-header {
                padding: 14px 5%;
            }

            .header-container {
                flex-direction: column;
                gap: 12px;
            }

            .premium-nav {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 4px;
            }

            .premium-nav a {
                padding: 8px 11px;
                font-size: 12px;
            }

            .hero-content h1 {
                font-size: 37px;
            }

            .register-page {
                padding: 45px 14px 60px;
            }

            .register-card {
                padding: 28px 20px;
                border-radius: 18px;
            }

            .register-heading h2 {
                font-size: 26px;
            }

            .register-form {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .form-group:nth-child(7),
            .form-group:nth-child(8),
            .register-actions {
                grid-column: auto;
            }

            .register-actions {
                flex-direction: column;
            }

            .register-submit,
            .register-back {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>

<header class="premium-header">
    <div class="header-container">
        <a href="index.php" class="premium-brand">
            <span class="brand-icon">K</span>
            <span class="brand-name">
                KursusKu
                <small>LEARN • GROW • SUCCEED</small>
            </span>
        </a>

        <nav class="premium-nav">
            <a href="index.php">Beranda</a>
            <a href="register.php" class="active">Daftar Kursus</a>
            <a href="history.php">Riwayat</a>
        </nav>
    </div>
</header>

<section class="register-hero">
    <div class="hero-decoration hero-circle-one"></div>
    <div class="hero-decoration hero-circle-two"></div>

    <div class="hero-content">
        <span class="hero-label">
            ✦ WAKTUNYA MENINGKATKAN KEMAMPUAN ✦
        </span>

        <h1>
            Mulai Perjalanan<br>
            <span>Belajarmu Hari Ini</span>
        </h1>

        <p>
            Temukan kursus yang sesuai dengan minat dan tujuanmu.
            Kembangkan keterampilan bersama KursusKu.
        </p>

        <a href="#formulir" class="hero-button">
            Isi Formulir <span aria-hidden="true">↓</span>
        </a>
    </div>

    <div class="hero-decoration-card">
        <div class="hero-card-icon">✦</div>
        <strong>Investasi untuk Masa Depan</strong>
        <span>
            Belajar lebih mudah, berkembang lebih jauh.
            Mulai langkahmu bersama KursusKu.
        </span>
    </div>
</section>

<main class="register-page" id="formulir">
    <section class="register-card">
        <div class="register-heading">
            <span class="eyebrow">PENDAFTARAN KURSUS</span>
            <h2>Formulir Pendaftaran</h2>
            <p>
                Lengkapi data berikut untuk memilih program
                pembelajaran yang sesuai dengan kebutuhan Anda.
            </p>
        </div>

        <form action="process.php" method="POST" class="register-form">

            <div class="form-group">
                <label class="group-label" for="name">
                    Nama Lengkap
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Masukkan nama lengkap"
                    maxlength="100"
                    autocomplete="name"
                    required
                >
            </div>

            <div class="form-group">
                <label class="group-label" for="email">
                    Alamat Email
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="contoh@email.com"
                    maxlength="150"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="form-group">
                <label class="group-label" for="course_code">
                    Pilih Kursus
                </label>
                <select id="course_code" name="course_code" required>
                    <option value="">-- Pilih Kursus --</option>

                    <?php foreach ($courses as $course): ?>
                        <option value="<?= e($course['code']) ?>">
                            <?= e($course['name']) ?> -
                            <?= e(formatRupiah((int) $course['fee'])) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <span class="group-label">Tipe Peserta</span>

                <div class="choice-list">
                    <label class="choice-item">
                        <input
                            type="radio"
                            name="participant_type"
                            value="mahasiswa"
                            required
                        >
                        <span>Mahasiswa (Diskon 20%)</span>
                    </label>

                    <label class="choice-item">
                        <input
                            type="radio"
                            name="participant_type"
                            value="guru"
                        >
                        <span>Guru (Diskon 15%)</span>
                    </label>

                    <label class="choice-item">
                        <input
                            type="radio"
                            name="participant_type"
                            value="umum"
                        >
                        <span>Umum (Tanpa Diskon)</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <span class="group-label">Minat Belajar</span>

                <div class="choice-list">
                    <?php foreach ($interestOptions as $value => $label): ?>
                        <label class="choice-item">
                            <input
                                type="checkbox"
                                name="interests[]"
                                value="<?= e($value) ?>"
                            >
                            <span><?= e($label) ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="form-group">
                <label class="group-label" for="learning_mode">
                    Metode Belajar
                </label>

                <select id="learning_mode" name="learning_mode" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="offline">Tatap Muka</option>
                    <option value="online">Online</option>
                    <option value="hybrid">Hybrid</option>
                </select>
            </div>

            <div class="form-group">
                <label class="group-label" for="package_count">
                    Jumlah Paket
                </label>

                <select id="package_count" name="package_count" required>
                    <option value="">-- Pilih Jumlah Paket --</option>

                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <option value="<?= $i ?>">
                            <?= $i ?> Paket
                        </option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="form-group">
                <label class="group-label" for="notes">
                    Catatan Tambahan
                </label>

                <textarea
                    id="notes"
                    name="notes"
                    rows="4"
                    maxlength="500"
                    placeholder="Tuliskan catatan jika ada..."
                ></textarea>
            </div>

            <div class="register-actions">
                <button type="submit" class="register-submit">
                    Kirim Pendaftaran
                </button>

                <a href="index.php" class="register-back">
                    Kembali ke Beranda
                </a>
            </div>

        </form>
    </section>
</main>

<footer class="register-footer">
    <p>
        &copy; <?= date('Y') ?> KursusKu. Semua hak dilindungi.
    </p>
</footer>

</body>
</html>