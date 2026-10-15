
<?php
$siteName = 'KursusKu';

// ========================================
// 1. PENGUJIAN FUNGSI TRIM()
// ========================================
$teks = " Laravel Fundamental ";
$hasilTrim = trim($teks);

// ========================================
// 2. PENGUJIAN OPERATOR PENGGABUNG STRING
// ========================================
$namaKursus = 'Laravel Fundamental';
$teksGabungan = 'Nama kursus: ' . $namaKursus;

// ========================================
// 3. WAKTU SERVER
// ========================================
$serverTime = date('d-m-Y H:i:s');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengujian String | <?= htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8') ?></title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #f8f3ff;
            background:
                radial-gradient(circle at top right, #49246f 0, transparent 35%),
                linear-gradient(135deg, #13091f, #24113e 60%, #351650);
        }

        header {
            padding: 24px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid rgba(207, 166, 255, .25);
            background: rgba(15, 7, 28, .6);
        }

        .brand {
            font-size: 29px;
            font-weight: 800;
        }

        .brand span {
            color: #c59aff;
        }

        .brand small {
            display: block;
            margin-top: 5px;
            color: #c5b3dc;
            font-size: 12px;
            font-weight: 400;
        }

        .nav-label {
            color: #e2d0ff;
            font-size: 13px;
        }

        main {
            width: min(850px, 90%);
            margin: 65px auto;
        }

        .heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .eyebrow {
            display: inline-block;
            padding: 8px 16px;
            margin-bottom: 18px;
            color: #e4d0ff;
            background: rgba(168, 121, 232, .14);
            border: 1px solid rgba(207, 166, 255, .3);
            border-radius: 30px;
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        h1 {
            margin-bottom: 14px;
            font-size: clamp(29px, 5vw, 43px);
        }

        .heading p {
            max-width: 600px;
            margin: auto;
            color: #c5b3dc;
            line-height: 1.8;
        }

        .card {
            overflow: hidden;
            margin-bottom: 25px;
            border: 1px solid rgba(207, 166, 255, .3);
            border-radius: 22px;
            background: rgba(255, 255, 255, .055);
            box-shadow: 0 22px 65px rgba(0, 0, 0, .28);
        }

        .card-header {
            padding: 22px 27px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            background: rgba(168, 121, 232, .13);
            border-bottom: 1px solid rgba(207, 166, 255, .2);
        }

        .card-header h2 {
            font-size: 18px;
        }

        .status {
            padding: 7px 12px;
            color: #c8f8dc;
            background: rgba(54, 164, 105, .15);
            border: 1px solid rgba(111, 222, 157, .25);
            border-radius: 30px;
            font-size: 12px;
        }

        .content {
            padding: 30px;
        }

        .result {
            margin-top: 20px;
            padding: 23px;
            border: 1px solid rgba(207, 166, 255, .2);
            border-radius: 16px;
            background: rgba(168, 121, 232, .09);
        }

        .result:first-child {
            margin-top: 0;
        }

        .label {
            margin-bottom: 13px;
            color: #c59aff;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.2px;
        }

        .value {
            color: #fff;
            font-family: Consolas, "Courier New", monospace;
            font-size: 18px;
            overflow-wrap: anywhere;
        }

        .result.cleaned,
        .result.merged {
            background: linear-gradient(135deg, #60318c, #43205f);
            border-color: rgba(213, 181, 255, .35);
        }

        .result.cleaned .label,
        .result.merged .label {
            color: #e2c8ff;
        }

        .description {
            margin-top: 25px;
            padding: 22px;
            color: #d0c0e4;
            background: rgba(255, 255, 255, .035);
            border-left: 3px solid #b783f2;
            border-radius: 8px;
            line-height: 1.9;
            font-size: 14px;
        }

        .description strong {
            color: #fff;
        }

        code {
            color: #e2c8ff;
        }

        footer {
            padding: 25px 7%;
            border-top: 1px solid rgba(207, 166, 255, .2);
            color: #bda9d5;
            text-align: center;
            font-size: 12px;
            line-height: 1.9;
        }

        footer strong {
            color: #c59aff;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px 5%;
            }

            .brand {
                font-size: 25px;
            }

            .nav-label {
                display: none;
            }

            main {
                margin: 42px auto;
            }

            .content {
                padding: 20px;
            }

            .card-header {
                padding: 18px 20px;
            }

            .value {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="brand">
        Kursus<span>Ku</span>
        <small>Belajar &amp; Kembangkan Keahlianmu</small>
    </div>

    <div class="nav-label">Praktikum Pemrograman Web III</div>
</header>

<main>
    <section class="heading">
        <span class="eyebrow">PHP String Function</span>

        <h1>Pengujian Fungsi String</h1>

        <p>
            Mengenal fungsi trim() dan operator titik (.)
            untuk mengolah serta menggabungkan string menggunakan PHP.
        </p>
    </section>

    <section class="card">
        <div class="card-header">
            <h2>Pengujian Fungsi trim()</h2>
            <span class="status">● Berhasil</span>
        </div>

        <div class="content">
            <div class="result">
                <div class="label">TEKS SEBELUM DIPROSES</div>
                <div class="value">[<?= htmlspecialchars($teks, ENT_QUOTES, 'UTF-8') ?>]</div>
            </div>

            <div class="result cleaned">
                <div class="label">HASIL SETELAH trim()</div>
                <div class="value">[<?= htmlspecialchars($hasilTrim, ENT_QUOTES, 'UTF-8') ?>]</div>
            </div>

            <div class="description">
                <strong>Kesimpulan:</strong>
                Fungsi <code>trim()</code> menghapus spasi di awal
                dan akhir teks, tetapi mempertahankan spasi di antara kata.
            </div>
        </div>
    </section>

    <section class="card">
        <div class="card-header">
            <h2>Pengujian Operator String</h2>
            <span class="status">● Berhasil</span>
        </div>

        <div class="content">
            <div class="result">
                <div class="label">KODE PHP</div>
                <div class="value">
                    'Nama kursus: ' . $namaKursus
                </div>
            </div>

            <div class="result merged">
                <div class="label">HASIL PENGGABUNGAN STRING</div>
                <div class="value">
                    <?= htmlspecialchars($teksGabungan, ENT_QUOTES, 'UTF-8') ?>
                </div>
            </div>

            <div class="description">
                <strong>Kesimpulan:</strong>
                Operator titik (<code>.</code>) digunakan untuk
                menggabungkan string dengan nilai variabel di PHP.
                Dengan demikian, operator yang benar untuk soal nomor 6
                adalah <strong>C. . (titik)</strong>.
            </div>
        </div>
    </section>
</main>

<footer>
    <strong>KursusKu</strong> — Belajar dengan elegan, berkembang dengan percaya diri.
    <br>
    Waktu server: <?= htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') ?>
    <br>
    &copy; <?= date('Y') ?> KursusKu
</footer>

</body>
</html>
