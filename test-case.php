<?php
// =====================================
// PENGUJIAN OTOMATIS
// =====================================

$testCasesAuto = [
    [
        'name' => 'Test Case 1',
        'description' => 'Biaya normal',
        'fee' => 350000,
        'participants' => 1,
        'discountPercent' => 0,
        'adminFee' => 25000,
        'expected' => 375000
    ],
    [
        'name' => 'Test Case 2',
        'description' => 'Diskon 10%',
        'fee' => 350000,
        'participants' => 1,
        'discountPercent' => 10,
        'adminFee' => 25000,
        'expected' => 340000
    ],
    [
        'name' => 'Test Case 3',
        'description' => 'Dua peserta dengan diskon 25%',
        'fee' => 350000,
        'participants' => 2,
        'discountPercent' => 25,
        'adminFee' => 25000,
        'expected' => 550000
    ],
    [
        'name' => 'Test Case 4',
        'description' => 'Biaya nol',
        'fee' => 0,
        'participants' => 1,
        'discountPercent' => 10,
        'adminFee' => 0,
        'expected' => 0
    ],
    [
        'name' => 'Test Case 5',
        'description' => 'Tiga peserta dengan biaya besar',
        'fee' => 2500000,
        'participants' => 3,
        'discountPercent' => 10,
        'adminFee' => 50000,
        'expected' => 6800000
    ]
];

function formatRupiah($amount)
{
    return 'Rp' . number_format($amount, 0, ',', '.');
}

$passCount = 0;
$failCount = 0;

// =====================================
// MATRIKS PENGUJIAN MANUAL
// =====================================

$matrixCases = [
    [1, 'Pendaftaran mahasiswa', 'Mahasiswa, Web Dasar, 1 peserta', 'Total Rp240.000'],
    [2, 'Pendaftaran guru', 'Guru, PHP Dasar, 1 peserta', 'Total Rp340.000'],
    [3, 'Pendaftaran umum', 'Umum, Laravel Dasar, 1 peserta', 'Total Rp500.000'],
    [4, 'Pendaftaran mahasiswa 2 peserta', 'Mahasiswa, Web Dasar, 2 peserta', 'Total Rp480.000'],
    [5, 'Nama dikosongkan', 'Nama kosong', 'Pesan nama wajib diisi'],
    [6, 'Email tidak valid', 'Email dengan format salah', 'Pesan email tidak valid'],
    [7, 'Tidak memilih minat', 'Tidak ada checkbox dipilih', 'Belum memilih minat tanpa peringatan'],
    [8, 'Memilih 3 minat', 'Memilih 3 checkbox', 'Ketiga minat ditampilkan'],
    [9, 'Metode tatap muka', 'Metode offline', 'Label Tatap Muka'],
    [10, 'Metode hybrid', 'Metode hybrid', 'Label Hybrid'],
    [11, 'Mengakses process.php langsung', 'Membuka process.php dengan GET', 'Dialihkan ke halaman register'],
    [12, 'Menambahkan fasilitas', 'Menambahkan fasilitas baru ke array', 'Fasilitas baru tampil otomatis']
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengujian Sistem - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

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
            background: #f5f3ff;
            color: #30234b;
            line-height: 1.6;
            animation: pageFade .8s ease both;
        }

        /* ANIMASI */

        @keyframes pageFade {
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

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes numberPop {
            0% {
                transform: scale(.7);
                opacity: 0;
            }
            70% {
                transform: scale(1.08);
                opacity: 1;
            }
            100% {
                transform: scale(1);
            }
        }

        /* HEADER */

        .header {
            background: linear-gradient(135deg, #25104f, #49247b, #7042a5);
            color: white;
            padding: 22px 5%;
            box-shadow: 0 6px 25px rgba(37, 16, 79, .2);
            animation: slideDown .7s ease both;
        }

        .header-content {
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
            text-decoration: none;
            font-size: 28px;
            font-weight: 900;
        }

        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            background: linear-gradient(135deg, #f5d47a, #d5a93e);
            color: #392064;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 29px;
            font-weight: 900;
            box-shadow: 0 5px 15px rgba(213, 169, 62, .25);
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .nav a {
            position: relative;
            color: white;
            text-decoration: none;
            font-weight: 700;
            transition: color .3s ease;
        }

        .nav a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -7px;
            width: 0;
            height: 2px;
            background: #f5d47a;
            transition: width .3s ease;
        }

        .nav a:hover {
            color: #f5d47a;
        }

        .nav a:hover::after {
            width: 100%;
        }

        /* KONTEN */

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 45px auto;
        }

        .intro {
            margin-bottom: 35px;
            animation: slideUp .8s ease both;
        }

        .eyebrow {
            display: inline-block;
            color: #9860d5;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 1.7px;
            margin-bottom: 10px;
        }

        .intro h1 {
            font-size: 36px;
            color: #392064;
            line-height: 1.3;
            margin-bottom: 10px;
        }

        .intro p {
            color: #756889;
            font-size: 16px;
        }

        .section-heading {
            margin-bottom: 22px;
            animation: slideUp .7s ease both;
        }

        .section-heading h2 {
            font-size: 25px;
            color: #392064;
            margin-bottom: 5px;
        }

        .section-heading p {
            color: #756889;
        }

        /* RINGKASAN */

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-bottom: 28px;
        }

        .summary-card {
            background: white;
            padding: 25px;
            border: 1px solid #eee7f8;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(55, 32, 100, .06);
            transition: transform .35s ease, box-shadow .35s ease;
            animation: slideUp .7s ease both;
        }

        .summary-card:nth-child(1) {
            animation-delay: .1s;
        }

        .summary-card:nth-child(2) {
            animation-delay: .2s;
        }

        .summary-card:nth-child(3) {
            animation-delay: .3s;
        }

        .summary-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 35px rgba(55, 32, 100, .13);
        }

        .summary-card p {
            color: #756889;
            font-size: 14px;
            font-weight: 600;
        }

        .summary-card h2 {
            color: #56318a;
            font-size: 32px;
            margin-top: 8px;
            animation: numberPop .7s ease both;
        }

        /* KARTU */

        .test-card,
        .table-card {
            background: white;
            padding: 28px;
            border-radius: 21px;
            border: 1px solid #eee7f8;
            box-shadow: 0 8px 28px rgba(55, 32, 100, .07);
            margin-bottom: 45px;
            animation: slideUp .8s ease both;
            transition: box-shadow .3s ease;
        }

        .test-card:hover,
        .table-card:hover {
            box-shadow: 0 14px 35px rgba(55, 32, 100, .11);
        }

        .table-title {
            color: #392064;
            font-size: 21px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        /* TABEL */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .auto-table {
            min-width: 650px;
        }

        .matrix-table {
            min-width: 950px;
        }

        th {
            background: linear-gradient(135deg, #56318a, #7042a5);
            color: white;
            padding: 16px 14px;
            text-align: left;
            font-size: 14px;
            white-space: nowrap;
        }

        th:first-child {
            border-radius: 9px 0 0 0;
        }

        th:last-child {
            border-radius: 0 9px 0 0;
        }

        td {
            padding: 15px 14px;
            border-bottom: 1px solid #eee8f6;
            font-size: 14px;
            vertical-align: middle;
        }

        tbody tr {
            transition: background .25s ease;
            animation: slideUp .45s ease both;
        }

        tbody tr:hover {
            background: #faf7ff;
        }

        .status-pass {
            color: #087b50;
            font-weight: 900;
        }

        .status-fail {
            color: #c0392b;
            font-weight: 900;
        }

        /* HASIL OTOMATIS */

        .result-summary {
            background: linear-gradient(135deg, #f3edfc, #faf7ff);
            border-left: 5px solid #8055b7;
            padding: 20px;
            border-radius: 12px;
            margin-top: 25px;
            animation: scaleIn .7s ease both;
        }

        .result-summary h3 {
            color: #392064;
            font-size: 22px;
            margin-bottom: 5px;
        }

        .result-summary p {
            color: #756889;
        }

        /* INPUT */

        input,
        select {
            width: 100%;
            min-width: 130px;
            padding: 10px 12px;
            border: 1px solid #d9cce9;
            border-radius: 9px;
            font-family: inherit;
            font-size: 13px;
            color: #30234b;
            background: white;
            transition: border-color .25s ease, box-shadow .25s ease;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #8055b7;
            box-shadow: 0 0 0 4px rgba(128, 85, 183, .15);
        }

        /* TOMBOL */

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 13px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        button {
            border: none;
            padding: 13px 22px;
            border-radius: 10px;
            cursor: pointer;
            font-family: inherit;
            font-size: 14px;
            font-weight: 800;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 9px 20px rgba(55, 32, 100, .18);
        }

        button:active {
            transform: scale(.96);
        }

        .print-btn {
            background: linear-gradient(135deg, #7042a5, #49247b);
            color: white;
        }

        .reset-btn {
            background: #eee7f8;
            color: #56318a;
        }

        /* CATATAN */

        .note {
            background: #f7f2ff;
            border-left: 4px solid #8055b7;
            padding: 16px 19px;
            margin-top: 25px;
            border-radius: 9px;
            color: #655477;
            font-size: 13px;
        }

        /* FOOTER */

        footer {
            background: linear-gradient(135deg, #25104f, #49247b);
            color: #e8def7;
            text-align: center;
            padding: 28px 15px;
            margin-top: 60px;
            font-size: 13px;
        }

        /* RESPONSIVE */

        @media (max-width: 800px) {
            .summary {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .header-content {
                align-items: flex-start;
            }

            .nav {
                gap: 17px;
            }

            .intro h1 {
                font-size: 30px;
            }
        }

        @media (max-width: 500px) {
            .container {
                width: 94%;
                margin: 28px auto;
            }

            .header {
                padding: 18px 5%;
            }

            .brand {
                font-size: 23px;
            }

            .brand-icon {
                width: 44px;
                height: 44px;
                font-size: 24px;
            }

            .nav {
                gap: 13px;
                font-size: 13px;
            }

            .intro h1 {
                font-size: 26px;
            }

            .section-heading h2 {
                font-size: 22px;
            }

            .test-card,
            .table-card {
                padding: 16px;
                border-radius: 15px;
            }

            .summary-card {
                padding: 19px;
            }

            .summary-card h2 {
                font-size: 27px;
            }

            .actions {
                flex-direction: column;
            }

            .actions button {
                width: 100%;
            }
        }

        /* MODE CETAK */

        @media print {
            body {
                background: white;
                color: black;
                animation: none;
            }

            .header,
            .actions,
            .note,
            footer {
                display: none !important;
            }

            .container {
                width: 100%;
                max-width: none;
                margin: 0;
            }

            .test-card,
            .table-card,
            .summary-card {
                box-shadow: none;
                border: 1px solid #ddd;
                animation: none;
                break-inside: avoid;
            }

            input,
            select {
                border: none;
                padding: 0;
                appearance: none;
            }

            tbody tr {
                animation: none;
            }
        }

        /* AKSESIBILITAS */

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

<header class="header">
    <div class="header-content">
        <a href="index.php" class="brand">
            <span class="brand-icon">K</span>
            <span>KursusKu</span>
        </a>

        <nav class="nav">
            <a href="index.php">Beranda</a>
            <a href="register.php">Pendaftaran</a>
            <a href="history.php">Riwayat</a>
            <a href="test-case.php">Pengujian</a>
        </nav>
    </div>
</header>

<main class="container">

    <!-- JUDUL -->
    <section class="intro">
        <span class="eyebrow">KURSUSKU / PERTEMUAN 6</span>
        <h1>Pengujian Sistem</h1>
        <p>
            Pengujian otomatis dan dokumentasi matriks
            pengujian sistem KursusKu.
        </p>
    </section>

    <!-- PENGUJIAN OTOMATIS -->
    <section>
        <div class="section-heading">
            <h2>Pengujian Otomatis</h2>
            <p>
                Lima skenario untuk memeriksa perhitungan biaya kursus.
            </p>
        </div>

        <div class="summary">
            <div class="summary-card">
                <p>Total Test Case Otomatis</p>
                <h2><?= count($testCasesAuto) ?></h2>
            </div>

            <div class="summary-card">
                <p>Pengujian PASS</p>
                <h2 id="auto-passed">0</h2>
            </div>

            <div class="summary-card">
                <p>Pengujian FAIL</p>
                <h2 id="auto-failed">0</h2>
            </div>
        </div>

        <div class="test-card">
            <div class="table-wrapper">
                <table class="auto-table">
                    <thead>
                        <tr>
                            <th>Test</th>
                            <th>Skenario</th>
                            <th>Total Aktual</th>
                            <th>Total Harapan</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($testCasesAuto as $case): ?>
                            <?php
                            $subtotal = $case['fee'] * $case['participants'];

                            $discount = intdiv(
                                $subtotal * $case['discountPercent'],
                                100
                            );

                            $total = $subtotal - $discount + $case['adminFee'];

                            $passed = $total === $case['expected'];

                            if ($passed) {
                                $passCount++;
                            } else {
                                $failCount++;
                            }
                            ?>

                            <tr>
                                <td><?= htmlspecialchars($case['name']) ?></td>
                                <td><?= htmlspecialchars($case['description']) ?></td>
                                <td><?= formatRupiah($total) ?></td>
                                <td><?= formatRupiah($case['expected']) ?></td>
                                <td class="<?= $passed ? 'status-pass' : 'status-fail' ?>">
                                    <?= $passed ? 'PASS' : 'FAIL' ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="result-summary">
                <h3>
                    Hasil: <?= $passCount ?> dari
                    <?= count($testCasesAuto) ?> test PASS
                </h3>

                <p>
                    <?= $failCount === 0
                        ? 'Seluruh perhitungan sesuai dengan hasil yang diharapkan.'
                        : 'Terdapat perhitungan yang belum sesuai.' ?>
                </p>
            </div>
        </div>
    </section>

    <!-- MATRIKS PENGUJIAN -->
    <section>
        <div class="section-heading">
            <h2>Matriks Pengujian</h2>
            <p>
                Dokumentasikan hasil pengujian langsung pada aplikasi.
            </p>
        </div>

        <div class="summary">
            <div class="summary-card">
                <p>Total Skenario</p>
                <h2 id="total">12</h2>
            </div>

            <div class="summary-card">
                <p>Pengujian PASS</p>
                <h2 id="passed">0</h2>
            </div>

            <div class="summary-card">
                <p>Pengujian FAIL</p>
                <h2 id="failed">0</h2>
            </div>
        </div>

        <div class="table-card">
            <h3 class="table-title">Daftar Skenario Pengujian</h3>

            <div class="table-wrapper">
                <table class="matrix-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Skenario Pengujian</th>
                            <th>Data Uji</th>
                            <th>Hasil yang Diharapkan</th>
                            <th>Hasil Aktual</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($matrixCases as $test): ?>
                            <tr>
                                <td><?= $test[0] ?></td>
                                <td><?= htmlspecialchars($test[1]) ?></td>
                                <td><?= htmlspecialchars($test[2]) ?></td>
                                <td><?= htmlspecialchars($test[3]) ?></td>
                                <td>
                                    <input
                                        type="text"
                                        class="actual"
                                        placeholder="Isi hasil aktual"
                                        aria-label="Hasil aktual test <?= $test[0] ?>"
                                    >
                                </td>
                                <td>
                                    <select
                                        class="status"
                                        aria-label="Status test <?= $test[0] ?>"
                                    >
                                        <option value="Belum diuji">Belum diuji</option>
                                        <option value="PASS">PASS</option>
                                        <option value="FAIL">FAIL</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="actions">
                <button
                    type="button"
                    class="reset-btn"
                    onclick="resetMatrix()"
                >
                    Reset Matriks
                </button>

                <button
                    type="button"
                    class="print-btn"
                    onclick="window.print()"
                >
                    Cetak Matriks
                </button>
            </div>

            <div class="note">
                <strong>Catatan:</strong>
                Isi hasil aktual dan status berdasarkan pengujian
                yang benar-benar telah dilakukan. PASS berarti
                hasil sesuai harapan, sedangkan FAIL berarti
                hasil belum sesuai. Data matriks belum disimpan
                ke database.
            </div>
        </div>
    </section>

</main>

<footer>
    &copy; <?= date('Y') ?> KursusKu.
    Semua hak dilindungi.
</footer>

<script>
    // Ringkasan pengujian otomatis
    document.getElementById("auto-passed").textContent =
        <?= $passCount ?>;

    document.getElementById("auto-failed").textContent =
        <?= $failCount ?>;

    // Ringkasan matriks pengujian
    const statusInputs = document.querySelectorAll(".status");

    function updateSummary() {
        let passed = 0;
        let failed = 0;

        statusInputs.forEach(function(input) {
            if (input.value === "PASS") {
                passed++;
            }

            if (input.value === "FAIL") {
                failed++;
            }
        });

        document.getElementById("passed").textContent = passed;
        document.getElementById("failed").textContent = failed;
    }

    statusInputs.forEach(function(input) {
        input.addEventListener("change", updateSummary);
    });

    // Reset matriks
    function resetMatrix() {
        const yakin = confirm(
            "Apakah kamu yakin ingin mengosongkan semua hasil pengujian?"
        );

        if (!yakin) {
            return;
        }

        document.querySelectorAll(".actual").forEach(function(input) {
            input.value = "";
        });

        statusInputs.forEach(function(input) {
            input.value = "Belum diuji";
        });

        updateSummary();
    }
</script>

</body>
</html>