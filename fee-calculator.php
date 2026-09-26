<?php

require_once __DIR__ . '/helpers.php';

$courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 1;
$discountPercent = 0;
$adminFee = 25000;
$isActive = true;

$subtotal = $fee * $participantCount;

$discount =
    $subtotal * $discountPercent / 100;

$totalAfterDiscount =
    $subtotal - $discount;

$total =
    $totalAfterDiscount + $adminFee;

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
        Kalkulator Biaya Kursus - KursusKu
    </title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

<header class="site-header">

    <div class="header-top">

        <div class="container">

            <h1>KursusKu</h1>

            <p>
                Belajar Skill Baru, Raih Masa Depan
            </p>

        </div>

    </div>

</header>


<nav class="navbar">

    <div class="container">

        <nav aria-label="Navigasi utama">

            <a href="index.php">
                Beranda
            </a>

            <a href="index.php#keunggulan">
                Keunggulan
            </a>

            <a href="index.php#katalog">
                Katalog
            </a>

            <a href="registration.php">
                Daftar Kursus
            </a>

        </nav>

    </div>

</nav>


<main>

    <section class="section">

        <div class="container">

            <div class="section-title">

                <h2>
                    Kalkulator Biaya Kursus
                </h2>

                <p>
                    Contoh perhitungan biaya berdasarkan
                    variabel pada Pertemuan 3.
                </p>

            </div>


            <div class="calculator-card">

                <div class="calculation-row">

                    <span class="calculation-label">
                        Nama kursus
                    </span>

                    <span class="calculation-value">
                        <?= e($courseName); ?>
                    </span>

                </div>


                <div class="calculation-row">

                    <span class="calculation-label">
                        Biaya per peserta
                    </span>

                    <span class="calculation-value">
                        <?= rupiah($fee); ?>
                    </span>

                </div>


                <div class="calculation-row">

                    <span class="calculation-label">
                        Jumlah peserta
                    </span>

                    <span class="calculation-value">
                        <?= e($participantCount); ?>
                    </span>

                </div>


                <div class="calculation-row">

                    <span class="calculation-label">
                        Subtotal
                    </span>

                    <span class="calculation-value">
                        <?= rupiah($subtotal); ?>
                    </span>

                </div>


                <div class="calculation-row">

                    <span class="calculation-label">
                        Diskon <?= e($discountPercent); ?>%
                    </span>

                    <span class="calculation-value">
                        <?= rupiah($discount); ?>
                    </span>

                </div>


                <div class="calculation-row">

                    <span class="calculation-label">
                        Biaya admin
                    </span>

                    <span class="calculation-value">
                        <?= rupiah($adminFee); ?>
                    </span>

                </div>


                <div class="calculation-total">

                    <span>
                        TOTAL AKHIR
                    </span>

                    <strong>
                        <?= rupiah($total); ?>
                    </strong>

                </div>


                <br>


                <p>
                    Status kursus:
                    <strong>
                        <?= $isActive ? 'Aktif' : 'Tidak Aktif'; ?>
                    </strong>
                </p>


                <br>


                <a
                    href="index.php"
                    class="button"
                >
                    ← Kembali ke Beranda
                </a>

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
            Belajar Skill Baru, Raih Masa Depan
        </p>

        <p>
            &copy; <?= date('Y'); ?> KursusKu.
            Semua Hak Dilindungi.
        </p>

    </div>

</footer>

</body>

</html>