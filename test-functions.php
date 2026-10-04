<?php
require_once 'helpers.php';

$tests = [
    [
        'name' => 'Format rupiah',
        'expected' => 'Rp 250.000',
        'actual' => rupiah(250000)
    ],
    [
        'name' => 'Status kursus penuh',
        'expected' => 'Penuh',
        'actual' => statusKursus(25, 25)
    ],
    [
        'name' => 'Status kursus tersedia',
        'expected' => 'Tersedia',
        'actual' => statusKursus(30, 29)
    ],
    [
        'name' => 'Sisa kursi tersedia',
        'expected' => 20,
        'actual' => sisaKursi(20, 0)
    ],
    [
        'name' => 'Sisa kursi kursus penuh',
        'expected' => 0,
        'actual' => sisaKursi(25, 25)
    ],
    [
        'name' => 'Format tanggal',
        'expected' => '15-09-2026',
        'actual' => formatTanggal('2026-09-15')
    ]
];

$totalPass = 0;
$totalFail = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Functions - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="section">
        <div class="container">
            <div class="section-heading">
                <span class="eyebrow">PENGUJIAN PHP</span>
                <h1>Test Functions</h1>
                <p>Hasil pengujian fungsi pada Pertemuan 4.</p>
            </div>

            <div class="table-wrapper">
                <table class="course-table">
                    <thead>
                        <tr>
                            <th>Nama Pengujian</th>
                            <th>Hasil yang Diharapkan</th>
                            <th>Hasil Aktual</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($tests as $test): ?>
                            <?php
                            $pass = $test['expected'] === $test['actual'];

                            if ($pass) {
                                $totalPass++;
                            } else {
                                $totalFail++;
                            }
                            ?>

                            <tr>
                                <td>
                                    <?= htmlspecialchars($test['name']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        (string) $test['expected']
                                    ); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        (string) $test['actual']
                                    ); ?>
                                </td>

                                <td>
                                    <?php if ($pass): ?>
                                        <span class="status-badge badge-available">
                                            PASS
                                        </span>
                                    <?php else: ?>
                                        <span class="status-badge badge-full">
                                            FAIL
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="string-card">
                <h2>Ringkasan Pengujian</h2>
                <p>Total pengujian: <?= count($tests); ?></p>
                <p>Total PASS: <?= $totalPass; ?></p>
                <p>Total FAIL: <?= $totalFail; ?></p>
            </div>

            <a href="index.php" class="btn btn-primary">
                Kembali ke Katalog
            </a>
        </div>
    </main>
</body>
</html>