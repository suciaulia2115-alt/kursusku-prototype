<?php

session_start();

require_once __DIR__ . '/helpers.php';

$history = $_SESSION['riwayat_pendaftaran'] ?? [];

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
        History Pendaftaran - KursusKu
    </title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>


<body>


<header class="header">

    <div class="container header-container">

        <a
            href="index.php"
            class="brand"
        >

            <span class="brand-icon">
                K
            </span>

            <span>
                KursusKu
            </span>

        </a>


        <nav class="navbar">

            <a href="index.php">
                Beranda
            </a>

            <a href="register.php">
                Daftar Kursus
            </a>

            <a href="history-dumy.php">
                History
            </a>

        </nav>

    </div>

</header>


<main>


<section class="section">

    <div class="container">


        <div class="section-heading">

            <span class="section-label">
                HISTORY
            </span>

            <h1>
                Riwayat Pendaftaran
            </h1>

            <p>
                Semua pendaftaran yang berhasil dilakukan
                akan tampil otomatis di halaman ini.
            </p>

        </div>


        <?php if (empty($history)): ?>


            <!-- BELUM ADA HISTORY -->

            <div class="empty-history">

                <div class="empty-icon">
                    ♡
                </div>

                <h2>
                    Belum Ada Pendaftaran
                </h2>

                <p>
                    Anda belum memiliki riwayat pendaftaran.
                    Silakan pilih kursus terlebih dahulu.
                </p>

                <a
                    href="register.php"
                    class="btn btn-primary"
                >
                    Daftar Kursus
                </a>

            </div>


        <?php else: ?>


            <!-- JUMLAH HISTORY -->

            <div class="history-count">

                <strong>
                    <?= count($history); ?>
                </strong>

                <span>
                    pendaftaran ditemukan
                </span>

            </div>


            <!-- HISTORY LOOP -->

            <div class="history-list">

                <?php foreach ($history as $item): ?>


                    <article class="history-card">


                        <div class="history-header">

                            <div>

                                <span class="history-id">

                                    <?= htmlspecialchars($item['id']); ?>

                                </span>

                                <h2>

                                    <?= htmlspecialchars($item['kursus']); ?>

                                </h2>

                            </div>


                            <span class="history-status">

                                ✓ Terdaftar

                            </span>

                        </div>


                        <div class="history-grid">


                            <div class="history-field">

                                <span>
                                    Nama Peserta
                                </span>

                                <strong>
                                    <?= htmlspecialchars($item['nama']); ?>
                                </strong>

                            </div>


                            <div class="history-field">

                                <span>
                                    Email
                                </span>

                                <strong>
                                    <?= htmlspecialchars($item['email']); ?>
                                </strong>

                            </div>


                            <div class="history-field">

                                <span>
                                    Tanggal
                                </span>

                                <strong>
                                    <?= htmlspecialchars($item['tanggal']); ?>
                                </strong>

                            </div>


                            <div class="history-field">

                                <span>
                                    Jenis Peserta
                                </span>

                                <strong>
                                    <?= htmlspecialchars(
                                        ucfirst($item['jenis_peserta'])
                                    ); ?>
                                </strong>

                            </div>


                            <div class="history-field">

                                <span>
                                    Metode
                                </span>

                                <strong>
                                    <?= htmlspecialchars($item['metode']); ?>
                                </strong>

                            </div>


                            <div class="history-field">

                                <span>
                                    Jumlah Paket
                                </span>

                                <strong>
                                    <?= $item['jumlah']; ?>
                                </strong>

                            </div>


                        </div>


                        <!-- MINAT -->

                        <div class="history-interest">

                            <span>
                                Minat
                            </span>


                            <?php if (!empty($item['minat'])): ?>

                                <div class="tag-list">

                                    <?php foreach ($item['minat'] as $minat): ?>

                                        <span>

                                            <?= htmlspecialchars($minat); ?>

                                        </span>

                                    <?php endforeach; ?>

                                </div>

                            <?php else: ?>

                                <span>
                                    Belum memilih minat
                                </span>

                            <?php endif; ?>

                        </div>


                        <!-- TOTAL -->

                        <div class="history-total">

                            <span>
                                Total Pembayaran
                            </span>

                            <strong>
                                <?= rupiah($item['total']); ?>
                            </strong>

                        </div>


                    </article>


                <?php endforeach; ?>

            </div>


        <?php endif; ?>


    </div>

</section>


</main>


<footer class="footer">

    <div class="container">

        &copy;
        <?= date('Y'); ?>
        KursusKu

    </div>

</footer>


</body>

</html>