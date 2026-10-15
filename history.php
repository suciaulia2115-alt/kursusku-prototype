
<?php
require_once 'helpers.php';

// DATA RIWAYAT PENDAFTARAN DUMMY
$registrations = [
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

// RINGKASAN DATA
$totalPeserta = count($registrations);
$totalPembayaran = array_sum(
    array_column($registrations, 'total')
);

$tahun = date('Y');

// FUNGSI FORMAT RUPIAH
function formatPembayaran($nominal)
{
    return 'Rp ' . number_format(
        $nominal,
        0,
        ',',
        '.'
    );
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Pendaftaran - KursusKu</title>

    <style>
        :root {
            --dark: #241432;
            --deep: #38204f;
            --purple: #65418a;
            --medium: #8964ad;
            --lavender: #cdb5e6;
            --light: #f7f2fc;
            --white: #ffffff;
            --text: #352443;
            --muted: #83738f;
            --border: #eadff3;
            --success: #43856c;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            padding: 35px 20px;
            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(
                    circle at top left,
                    #65418a 0,
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #21112f,
                    #38204f 55%,
                    #53356e
                );
        }

        .container {
            width: 100%;
            max-width: 1180px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 28px;
            color: var(--white);
        }

        .brand {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand span {
            color: var(--lavender);
        }

        .subtitle {
            margin-top: 7px;
            color: #d9c9e7;
            font-size: 14px;
        }

        .year-badge {
            padding: 10px 17px;
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 30px;
            color: #f3eaff;
            background: rgba(255,255,255,.09);
            font-size: 13px;
        }

        .main-card {
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 24px;
            background: var(--white);
            box-shadow: 0 25px 70px rgba(12, 4, 22, .3);
        }

        .hero {
            padding: 35px;
            color: var(--white);
            background:
                linear-gradient(
                    120deg,
                    #38204f,
                    #65418a 65%,
                    #8964ad
                );
        }

        .hero-label {
            display: inline-block;
            margin-bottom: 14px;
            padding: 7px 12px;
            border: 1px solid rgba(255,255,255,.25);
            border-radius: 30px;
            background: rgba(255,255,255,.1);
            color: #f0e4fc;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .hero h1 {
            margin-bottom: 10px;
            font-size: clamp(25px, 4vw, 35px);
        }

        .hero p {
            max-width: 650px;
            color: #e8dcf3;
            line-height: 1.7;
            font-size: 14px;
        }

        .content {
            padding: 30px 35px 35px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 32px;
        }

        .summary-card {
            position: relative;
            overflow: hidden;
            padding: 23px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: linear-gradient(
                135deg,
                #fff,
                var(--light)
            );
        }

        .summary-card::after {
            position: absolute;
            top: -25px;
            right: -20px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(137,100,173,.09);
            content: "";
        }

        .summary-label {
            margin-bottom: 12px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
        }

        .summary-value {
            color: var(--deep);
            font-size: clamp(22px, 3vw, 30px);
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .table-heading h2 {
            color: var(--deep);
            font-size: 20px;
        }

        .count-badge {
            padding: 7px 12px;
            border-radius: 30px;
            color: var(--purple);
            background: #f0e7f8;
            font-size: 12px;
            font-weight: 700;
        }

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 15px;
        }

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
        }

        thead {
            color: var(--white);
            background: linear-gradient(
                90deg,
                var(--deep),
                var(--purple)
            );
        }

        th {
            padding: 17px 18px;
            text-align: left;
            font-size: 12px;
            letter-spacing: .4px;
            text-transform: uppercase;
        }

        td {
            padding: 18px;
            border-bottom: 1px solid #f0e9f5;
            font-size: 14px;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #faf7fd;
        }

        .number {
            display: inline-flex;
            width: 30px;
            height: 30px;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: var(--purple);
            background: #f0e7f8;
            font-weight: 700;
        }

        .participant {
            color: var(--deep);
            font-weight: 700;
        }

        .course-name {
            color: #766586;
        }

        .payment {
            color: var(--success);
            font-weight: 800;
            white-space: nowrap;
        }

        .empty {
            padding: 35px;
            color: var(--muted);
            text-align: center;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 27px;
            padding-top: 23px;
            border-top: 1px solid var(--border);
        }

        .footer p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .back-button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 12px;
            color: var(--white);
            background: linear-gradient(
                135deg,
                var(--deep),
                var(--purple)
            );
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: .2s ease;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(56,32,79,.22);
        }

        @media (max-width: 600px) {
            body {
                padding: 18px 12px;
            }

            .header {
                align-items: flex-start;
            }

            .hero {
                padding: 25px 22px;
            }

            .content {
                padding: 23px 18px;
            }

            .summary {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .summary-card {
                padding: 20px;
            }

            .footer {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <header class="header">
            <div>
                <div class="brand">Kursus<span>Ku</span></div>
                <p class="subtitle">
                    Platform belajar dan pengembangan keahlian
                </p>
            </div>

            <div class="year-badge">
                Tahun <?= htmlspecialchars($tahun, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        </header>

        <main class="main-card">

            <section class="hero">
                <div class="hero-label">Dashboard Pendaftaran</div>

                <h1>Riwayat Pendaftaran Kursus</h1>

                <p>
                    Lihat ringkasan peserta dan pembayaran kursus
                    yang tersimpan dalam data riwayat dummy KursusKu.
                </p>
            </section>

            <section class="content">

                <div class="summary">
                    <div class="summary-card">
                        <div class="summary-label">
                            Total Peserta
                        </div>

                        <div class="summary-value">
                            <?= $totalPeserta; ?>
                            <span style="font-size:15px;font-weight:500;">
                                peserta
                            </span>
                        </div>
                    </div>

                    <div class="summary-card">
                        <div class="summary-label">
                            Total Pembayaran
                        </div>

                        <div class="summary-value">
                            <?= htmlspecialchars(
                                formatPembayaran($totalPembayaran),
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </div>
                    </div>
                </div>

                <div class="table-heading">
                    <h2>Data Riwayat Peserta</h2>

                    <span class="count-badge">
                        <?= $totalPeserta; ?> Data
                    </span>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Peserta</th>
                                <th>Program Kursus</th>
                                <th>Total Pembayaran</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($registrations)): ?>
                                <?php foreach ($registrations as $index => $item): ?>
                                    <tr>
                                        <td>
                                            <span class="number">
                                                <?= $index + 1; ?>
                                            </span>
                                        </td>

                                        <td class="participant">
                                            <?= htmlspecialchars(
                                                $item['name'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ); ?>
                                        </td>

                                        <td class="course-name">
                                            <?= htmlspecialchars(
                                                $item['course'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ); ?>
                                        </td>

                                        <td class="payment">
                                            <?= htmlspecialchars(
                                                formatPembayaran($item['total']),
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="empty">
                                        Belum ada data riwayat pendaftaran.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <footer class="footer">
                    <p>
                        <strong>KursusKu</strong><br>
                        Data ini merupakan data contoh untuk pembelajaran PHP.
                    </p>

                    <a href="index.php" class="back-button">
                        ← Kembali ke Beranda
                    </a>
                </footer>

            </section>
        </main>
    </div>
</body>
</html>
