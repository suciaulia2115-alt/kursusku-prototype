
<?php
require_once 'helpers.php';

// History dummy
$history = [
    [
        'name' => 'Suci Aulia',
        'course' => 'Web Dasar',
        'total' => 240000
    ],
    [
        'name' => 'Andi Saputra',
        'course' => 'PHP Dasar',
        'total' => 340000
    ],
    [
        'name' => 'Rina Amelia',
        'course' => 'Laravel Dasar',
        'total' => 500000
    ],
    [
        'name' => 'Budi Pratama',
        'course' => 'Web Dasar',
        'total' => 480000
    ]
];

$totalPeserta = count($history);
$totalPembayaran = array_sum(array_column($history, 'total'));
$tahun = date('Y');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Pendaftaran | KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* =====================================
           TEMA DASAR KURSUSKU
        ===================================== */

        :root {
            --purple-dark: #241044;
            --purple-deep: #32145d;
            --purple: #6d35a5;
            --purple-medium: #8954b8;
            --purple-light: #eee3f7;
            --purple-soft: #f7f2fb;
            --text-dark: #39234e;
            --text-muted: #81718f;
            --border: #eadcf5;
            --white: #ffffff;
            --gold: #f3d68d;
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
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: 90%;
            max-width: 1280px;
            margin: 0 auto;
        }

        /* =====================================
           ANIMASI
        ===================================== */

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
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

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-16px);
            }
        }

        @keyframes rotateSlow {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 12px 35px rgba(48, 17, 85, 0.08);
            }
            50% {
                box-shadow: 0 18px 45px rgba(109, 53, 165, 0.17);
            }
        }

        /* =====================================
           HEADER
        ===================================== */

        .history-header {
            position: relative;
            z-index: 10;
            background: linear-gradient(
                110deg,
                #210c42,
                #32145d,
                #451c79
            );
            box-shadow: 0 8px 25px rgba(25, 8, 51, 0.18);
            animation: slideDown 0.8s ease both;
        }

        .header-container {
            min-height: 110px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .premium-brand {
            display: flex;
            align-items: center;
            gap: 16px;
            color: var(--white);
        }

        .brand-icon {
            width: 68px;
            height: 68px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 22px;
            background: linear-gradient(
                135deg,
                #d45cff,
                #8737dc
            );
            color: white;
            font-size: 38px;
            font-weight: 900;
            box-shadow: 0 8px 25px rgba(184, 73, 255, 0.3);
            transition: transform 0.3s ease;
        }

        .premium-brand:hover .brand-icon {
            transform: rotate(-7deg) scale(1.06);
        }

        .brand-name {
            font-size: 32px;
            font-weight: 900;
            letter-spacing: -1px;
            line-height: 1.1;
        }

        .brand-name small {
            display: block;
            margin-top: 7px;
            color: #d9c4f2;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .premium-nav {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .premium-nav a {
            padding: 13px 20px;
            border-radius: 15px;
            color: #f5eefe;
            font-size: 15px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .premium-nav a:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-2px);
        }

        .premium-nav a.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
        }

        /* =====================================
           HERO RIWAYAT
        ===================================== */

        .history-hero {
            position: relative;
            min-height: 410px;
            padding: 85px 20px 90px;
            overflow: hidden;
            text-align: center;
            color: white;
            background:
                radial-gradient(
                    circle at 90% 20%,
                    rgba(126, 62, 200, 0.65),
                    transparent 35%
                ),
                linear-gradient(
                    115deg,
                    #35145e,
                    #421c78,
                    #55269a
                );
        }

        .history-hero-content {
            position: relative;
            z-index: 2;
            max-width: 850px;
            margin: 0 auto;
        }

        .history-label {
            display: inline-block;
            padding: 10px 23px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.08);
            color: #f0d8ff;
            font-size: 14px;
            font-weight: 900;
            letter-spacing: 1.8px;
            animation: slideUp 0.8s ease 0.1s both;
        }

        .history-hero h1 {
            margin: 5px 0 16px;
            color: white;
            font-size: clamp(38px, 5vw, 66px);
            font-weight: 900;
            letter-spacing: -2px;
            line-height: 1.2;
            animation: slideUp 0.9s ease 0.2s both;
        }

        .history-hero p {
            margin: 0 auto;
            color: #e4d2f5;
            font-size: 20px;
            animation: slideUp 0.9s ease 0.35s both;
        }

        /* Dekorasi lingkaran */

        .history-decoration {
            position: absolute;
            border: 1px solid rgba(255, 255, 255, 0.13);
            border-radius: 50%;
            pointer-events: none;
        }

        .circle-one {
            width: 440px;
            height: 440px;
            top: -220px;
            left: -170px;
            box-shadow: 0 0 0 60px rgba(255, 255, 255, 0.025);
            animation: float 8s ease-in-out infinite;
        }

        .circle-two {
            width: 330px;
            height: 330px;
            right: -80px;
            bottom: -200px;
            animation: float 9s ease-in-out infinite;
            animation-delay: 1s;
        }

        .circle-three {
            width: 150px;
            height: 150px;
            right: 20%;
            top: 40px;
            border-style: dashed;
            opacity: 0.3;
            animation: rotateSlow 35s linear infinite;
        }

        /* =====================================
           KONTEN RIWAYAT
        ===================================== */

        .history-section {
            padding: 75px 0 90px;
        }

        .history-card {
            padding: 45px 50px;
            border: 1px solid var(--border);
            border-radius: 32px;
            background: white;
            box-shadow: 0 15px 45px rgba(65, 29, 100, 0.08);
            animation: slideUp 0.9s ease 0.15s both;
            transition: box-shadow 0.35s ease,
                        transform 0.35s ease;
        }

        .history-card:hover {
            box-shadow: 0 20px 55px rgba(65, 29, 100, 0.14);
            transform: translateY(-3px);
        }

        .history-card-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .history-card-heading h2 {
            margin: 0;
            color: var(--purple-dark);
            font-size: 30px;
            font-weight: 900;
        }

        .history-card-heading p {
            margin: 6px 0 0;
            color: var(--text-muted);
            font-size: 15px;
        }

        .data-badge {
            padding: 12px 20px;
            border-radius: 30px;
            background: #f1e5fc;
            color: #783cb2;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 0.7px;
            white-space: nowrap;
            animation: float 4s ease-in-out infinite;
        }

        /* =====================================
           RINGKASAN
        ===================================== */

        .history-summary {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .summary-item {
            padding: 23px 25px;
            border: 1px solid #eadcf5;
            border-radius: 20px;
            background: linear-gradient(
                135deg,
                #fbf8fe,
                #f3eafa
            );
            transition: transform 0.3s ease,
                        box-shadow 0.3s ease;
            animation: slideUp 0.7s ease both;
        }

        .summary-item:nth-child(2) {
            animation-delay: 0.15s;
        }

        .summary-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(81, 45, 112, 0.12);
        }

        .summary-label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 600;
        }

        .summary-value {
            display: block;
            color: var(--purple-dark);
            font-size: 27px;
            font-weight: 900;
        }

        /* =====================================
           TABEL
        ===================================== */

        .history-table-wrapper {
            width: 100%;
            overflow-x: auto;
            border-radius: 18px;
            border: 1px solid #eadcf5;
        }

        .history-table {
            width: 100%;
            min-width: 650px;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
        }

        .history-table thead {
            background: linear-gradient(
                110deg,
                #35145e,
                #542580
            );
            color: white;
        }

        .history-table th {
            padding: 21px 20px;
            text-align: left;
            font-size: 15px;
            font-weight: 800;
            white-space: nowrap;
        }

        .history-table th:first-child {
            border-radius: 17px 0 0 0;
        }

        .history-table th:last-child {
            border-radius: 0 17px 0 0;
        }

        .history-table td {
            padding: 20px;
            border-bottom: 1px solid #eee5f5;
            color: var(--text-dark);
            font-size: 15px;
        }

        .history-table tbody tr {
            transition: background 0.3s ease,
                        transform 0.3s ease;
            animation: slideUp 0.6s ease both;
        }

        .history-table tbody tr:nth-child(1) {
            animation-delay: 0.1s;
        }

        .history-table tbody tr:nth-child(2) {
            animation-delay: 0.2s;
        }

        .history-table tbody tr:nth-child(3) {
            animation-delay: 0.3s;
        }

        .history-table tbody tr:nth-child(4) {
            animation-delay: 0.4s;
        }

        .history-table tbody tr:hover {
            background: #f8f1fd;
        }

        .history-table tbody tr:last-child td {
            border-bottom: none;
        }

        .history-number {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 38px;
            height: 38px;
            border-radius: 13px;
            background: #efe2fa;
            color: #69349b;
            font-size: 14px;
            font-weight: 900;
        }

        .history-name {
            font-weight: 800;
            color: #38204f;
        }

        .history-course {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 10px;
            background: #f3eafa;
            color: #713da2;
            font-size: 13px;
            font-weight: 700;
        }

        .history-total {
            color: #65309b;
            font-weight: 900;
            white-space: nowrap;
        }

        /* =====================================
           CATATAN
        ===================================== */

        .history-note {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-top: 28px;
            padding: 20px 23px;
            border: 1px solid #e6d7f3;
            border-left: 5px solid #8850b8;
            border-radius: 15px;
            background: #f8f3fc;
            color: #756386;
            font-size: 14px;
            line-height: 1.8;
        }

        .note-icon {
            display: flex;
            flex-shrink: 0;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            border-radius: 10px;
            background: #e9d9f7;
            color: #69349b;
            font-weight: 900;
        }

        .history-note strong {
            color: #4a2866;
        }

        /* =====================================
           TOMBOL
        ===================================== */

        .history-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 30px;
        }

        .history-button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 15px 24px;
            border: 1px solid transparent;
            border-radius: 13px;
            font-family: inherit;
            font-size: 15px;
            font-weight: 800;
            transition: all 0.3s ease;
        }

        .button-primary {
            background: linear-gradient(
                135deg,
                #8b4fc0,
                #65329a
            );
            color: white;
            box-shadow: 0 8px 20px rgba(101, 50, 154, 0.18);
        }

        .button-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(101, 50, 154, 0.28);
        }

        .button-secondary {
            background: #f1e6fa;
            color: #512d70;
            border-color: #e4d3f1;
        }

        .button-secondary:hover {
            background: #e7d6f5;
            transform: translateY(-3px);
        }

        /* =====================================
           FOOTER
        ===================================== */

        .history-footer {
            padding: 28px 0;
            background: #210c42;
            color: #e5d5f3;
            text-align: center;
        }

        .history-footer p {
            margin: 0;
            font-size: 14px;
        }

        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 900px) {
            .header-container {
                min-height: auto;
                padding: 20px 0;
                flex-direction: column;
                gap: 18px;
            }

            .history-card {
                padding: 35px 28px;
            }

            .history-hero {
                min-height: 350px;
                padding: 70px 20px;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

            .header-container {
                align-items: center;
            }

            .brand-icon {
                width: 52px;
                height: 52px;
                border-radius: 16px;
                font-size: 29px;
            }

            .brand-name {
                font-size: 25px;
            }

            .premium-nav {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 3px;
            }

            .premium-nav a {
                padding: 10px 12px;
                font-size: 12px;
            }

            .history-hero {
                min-height: 310px;
                padding: 60px 18px;
            }

            .history-label {
                padding: 8px 14px;
                font-size: 10px;
                letter-spacing: 1px;
            }

            .history-hero h1 {
                font-size: 36px;
                letter-spacing: -1px;
            }

            .history-hero p {
                font-size: 15px;
            }

            .history-section {
                padding: 40px 0 55px;
            }

            .history-card {
                padding: 25px 18px;
                border-radius: 22px;
            }

            .history-card-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .history-card-heading h2 {
                font-size: 23px;
            }

            .history-summary {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .summary-item {
                padding: 18px;
            }

            .summary-value {
                font-size: 23px;
            }

            .history-table th,
            .history-table td {
                padding: 15px;
                font-size: 13px;
            }

            .history-note {
                padding: 16px;
                font-size: 13px;
            }

            .history-actions {
                flex-direction: column;
            }

            .history-button {
                width: 100%;
            }
        }

        /* Hormati pengaturan pengurangan gerakan */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="history-header">
        <div class="container header-container">

            <a href="index.php" class="premium-brand">
                <span class="brand-icon">K</span>

                <span class="brand-name">
                    KursusKu
                    <small>LEARN • GROW • SUCCEED</small>
                </span>
            </a>

            <nav class="premium-nav">
                <a href="index.php">Beranda</a>
                <a href="register.php">Daftar Kursus</a>
                <a href="history.php" class="active">History</a>
            </nav>

        </div>
    </header>

    <!-- HERO -->
    <section class="history-hero">

        <div class="history-decoration circle-one"></div>
        <div class="history-decoration circle-two"></div>
        <div class="history-decoration circle-three"></div>

        <div class="history-hero-content">

            <span class="history-label">
                KURSUSKU • RIWAYAT PESERTA
            </span>

            <h1>Riwayat Pendaftaran</h1>

            <p>
                Lihat daftar peserta dan ringkasan pembayaran
                kursus dalam satu halaman.
            </p>

        </div>
    </section>

    <!-- KONTEN UTAMA -->
    <main class="history-section">
        <div class="container">

            <section class="history-card">

                <!-- JUDUL KARTU -->
                <div class="history-card-heading">

                    <div>
                        <h2>History Dumy</h2>
                        <p>Ringkasan data pendaftaran peserta.</p>
                    </div>

                    <span class="data-badge">
                        DATA LATIHAN
                    </span>

                </div>

                <!-- RINGKASAN -->
                <div class="history-summary">

                    <div class="summary-item">
                        <span class="summary-label">
                            Total Peserta
                        </span>

                        <span class="summary-value">
                            <?= $totalPeserta ?> Peserta
                        </span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">
                            Total Pembayaran
                        </span>

                        <span class="summary-value">
                            <?= e(formatRupiah($totalPembayaran)) ?>
                        </span>
                    </div>

                </div>

                <!-- TABEL RIWAYAT -->
                <div class="history-table-wrapper">

                    <table class="history-table">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Peserta</th>
                                <th>Kursus</th>
                                <th>Total Pembayaran</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($history as $index => $item): ?>

                                <tr>
                                    <td>
                                        <span class="history-number">
                                            <?= $index + 1 ?>
                                        </span>
                                    </td>

                                    <td class="history-name">
                                        <?= e($item['name']) ?>
                                    </td>

                                    <td>
                                        <span class="history-course">
                                            <?= e($item['course']) ?>
                                        </span>
                                    </td>

                                    <td class="history-total">
                                        <?= e(formatRupiah($item['total'])) ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>

                <!-- CATATAN -->
                <div class="history-note">

                    <span class="note-icon">i</span>

                    <div>
                        <strong>Informasi:</strong>
                        Halaman ini menggunakan data dummy untuk
                        latihan array dan perulangan foreach.
                        Data belum tersimpan secara permanen.
                    </div>

                </div>

                <!-- TOMBOL -->
                <div class="history-actions">

                    <a href="register.php"
                       class="history-button button-primary">
                        Daftar Kursus
                        <span aria-hidden="true">→</span>
                    </a>

                    <a href="index.php"
                       class="history-button button-secondary">
                        Kembali ke Beranda
                    </a>

                </div>

            </section>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="history-footer">
        <div class="container">
            <p>
                &copy; <?= e((string) $tahun) ?>
                KursusKu. Semua hak dilindungi.
            </p>
        </div>
    </footer>

</body>
</html>