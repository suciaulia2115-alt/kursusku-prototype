<?php
// =====================================
// DATA KALKULATOR BIAYA KURSUS
// =====================================

$courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 2;
$discountPercent = 10;
$adminFee = 25000;
$isActive = true;

// =====================================
// PROSES PERHITUNGAN
// =====================================

$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount + $adminFee;

// =====================================
// FORMAT RUPIAH
// =====================================

function formatRupiah($amount)
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kalkulator Biaya - KursusKu</title>

    <style>
        /* =====================================
           RESET DAN DASAR
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

        a {
            text-decoration: none;
        }

        /* =====================================
           HEADER
        ===================================== */

        .header {
            background: linear-gradient(135deg, #32145f, #6736a0, #482477);
            color: white;
            padding: 22px 5%;
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
            font-size: 28px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .brand-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            border-radius: 15px;
            color: #44216f;
            background: linear-gradient(135deg, #f0d78b, #d4b45d);
            font-size: 28px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .brand:hover .brand-icon {
            transform: rotate(-8deg) scale(1.08);
        }

        .brand-name span {
            color: #e6ceff;
        }

        .navbar {
            display: flex;
            align-items: center;
            gap: 30px;
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
            left: 0;
            bottom: -7px;
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
           KONTEN UTAMA
        ===================================== */

        .container {
            width: 90%;
            max-width: 900px;
            margin: 55px auto;
        }

        .calculator-card {
            background: #ffffff;
            border: 1px solid #e8def4;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 50px rgba(65, 35, 105, 0.09);
            animation: fadeUp 0.9s ease both;
        }

        .eyebrow {
            display: inline-block;
            color: #8050b5;
            font-size: 13px;
            font-weight: 850;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .eyebrow::before {
            content: "✦ ";
            color: #c49b42;
        }

        h1 {
            color: #392064;
            font-size: 34px;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .description {
            color: #77688a;
            font-size: 16px;
            margin-bottom: 30px;
        }

        /* =====================================
           KOTAK NAMA KURSUS
        ===================================== */

        .course-box {
            background: linear-gradient(135deg, #392064, #7042a5, #8055b7);
            color: white;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeUp 1s ease both;
        }

        .course-box::after {
            content: "";
            position: absolute;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            right: -45px;
            top: -65px;
        }

        .course-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(57, 32, 100, 0.2);
        }

        .course-label {
            color: #e9dcf7;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .course-name {
            font-size: 23px;
            font-weight: 850;
            position: relative;
            z-index: 1;
        }

        .active-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 12px;
            color: #f1e8ff;
            font-size: 13px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #8be0b4;
            box-shadow: 0 0 10px rgba(139, 224, 180, 0.7);
        }

        /* =====================================
           TABEL RINCIAN
        ===================================== */

        .table-heading {
            color: #392064;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            margin-bottom: 25px;
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 450px;
        }

        th,
        td {
            padding: 16px;
            border-bottom: 1px solid #eee7f6;
            text-align: left;
        }

        th {
            background: #eee6f8;
            color: #392064;
            font-size: 15px;
            font-weight: 850;
        }

        td {
            color: #4d3b63;
            transition: background 0.2s ease;
        }

        td:last-child,
        th:last-child {
            text-align: right;
            white-space: nowrap;
        }

        tbody tr:hover td {
            background: #faf7ff;
        }

        .discount {
            color: #b34c61;
            font-weight: 700;
        }

        .total-row td {
            background: linear-gradient(135deg, #392064, #7042a5);
            color: #ffffff;
            font-size: 18px;
            font-weight: 850;
            border-bottom: none;
        }

        .total-row td:first-child {
            border-radius: 10px 0 0 10px;
        }

        .total-row td:last-child {
            border-radius: 0 10px 10px 0;
        }

        /* =====================================
           CATATAN
        ===================================== */

        .note {
            background: #f8f4ff;
            border-left: 4px solid #c49b42;
            border-radius: 10px;
            padding: 16px 18px;
            color: #655477;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .note strong {
            color: #392064;
        }

        /* =====================================
           TOMBOL
        ===================================== */

        .actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #56318a, #8055b7);
            color: white;
            padding: 13px 23px;
            border-radius: 10px;
            font-weight: 800;
            box-shadow: 0 6px 16px rgba(86, 49, 138, 0.18);
            transition: all 0.3s ease;
        }

        .back-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(86, 49, 138, 0.28);
        }

        .print-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #eee7f8;
            color: #56318a;
            padding: 13px 23px;
            border: 1px solid #e0d3ef;
            border-radius: 10px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .print-button:hover {
            background: #e2d5f2;
            transform: translateY(-3px);
        }

        /* =====================================
           FOOTER
        ===================================== */

        .footer {
            text-align: center;
            color: #847494;
            font-size: 13px;
            padding: 25px 15px;
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

        @media (max-width: 700px) {
            .header {
                padding: 18px 5%;
            }

            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar {
                gap: 18px;
                flex-wrap: wrap;
            }

            .container {
                width: 94%;
                margin: 30px auto;
            }

            .calculator-card {
                padding: 25px 18px;
                border-radius: 18px;
            }

            h1 {
                font-size: 26px;
            }

            .course-name {
                font-size: 20px;
            }

            th,
            td {
                padding: 12px 10px;
                font-size: 13px;
            }

            .total-row td {
                font-size: 15px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .back-link,
            .print-button {
                width: 100%;
            }
        }

        /* =====================================
           PENGATURAN CETAK
        ===================================== */

        @media print {
            body {
                background: white;
            }

            .header,
            .footer,
            .actions {
                display: none;
            }

            .container {
                width: 100%;
                max-width: 100%;
                margin: 0;
            }

            .calculator-card {
                border: none;
                box-shadow: none;
                padding: 0;
                animation: none;
            }

            .course-box,
            .total-row td {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
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
                <span class="brand-name">Kursus<span>Ku</span></span>
            </a>

            <nav class="navbar">
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="register.php">Pendaftaran</a>
                <a href="history.php">Riwayat</a>
            </nav>

        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="container">

        <section class="calculator-card">

            <p class="eyebrow">KursusKu • Estimasi Biaya</p>

            <h1>Kalkulator Estimasi Biaya</h1>

            <p class="description">
                Rincian perhitungan biaya kursus berdasarkan data
                yang telah ditentukan.
            </p>

            <!-- INFORMASI KURSUS -->
            <div class="course-box">

                <p class="course-label">Nama kursus</p>

                <p class="course-name">
                    <?= htmlspecialchars($courseName, ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <?php if ($isActive): ?>
                    <div class="active-status">
                        <span class="status-dot"></span>
                        Kursus aktif
                    </div>
                <?php endif; ?>

            </div>

            <!-- TABEL PERHITUNGAN -->
            <h2 class="table-heading">Rincian Biaya</h2>

            <div class="table-wrapper">

                <table>
                    <thead>
                        <tr>
                            <th>Komponen</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Biaya per peserta</td>
                            <td><?= formatRupiah($fee); ?></td>
                        </tr>

                        <tr>
                            <td>Jumlah peserta</td>
                            <td><?= $participantCount; ?> orang</td>
                        </tr>

                        <tr>
                            <td>Subtotal</td>
                            <td><?= formatRupiah($subtotal); ?></td>
                        </tr>

                        <tr>
                            <td>Diskon (<?= $discountPercent; ?>%)</td>
                            <td class="discount">
                                - <?= formatRupiah($discount); ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Biaya administrasi</td>
                            <td><?= formatRupiah($adminFee); ?></td>
                        </tr>

                        <tr class="total-row">
                            <td>Total akhir</td>
                            <td><?= formatRupiah($total); ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <!-- CATATAN -->
            <div class="note">
                <strong>Informasi perhitungan:</strong>
                Total biaya diperoleh dari subtotal dikurangi diskon,
                kemudian ditambah biaya administrasi.
            </div>

            <!-- TOMBOL -->
            <div class="actions">

                <a href="index.php" class="back-link">
                    ← Kembali ke Beranda
                </a>

                <button
                    type="button"
                    class="print-button"
                    onclick="window.print()"
                >
                    Cetak Rincian
                </button>

            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        &copy; <?= date('Y'); ?> KursusKu.
        Semua hak dilindungi.
    </footer>

</body>
</html>