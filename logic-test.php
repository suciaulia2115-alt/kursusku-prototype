<?php
$quota = 30;
$registered = 18;
$isFull = $registered >= $quota;
$hasSeat = $registered < $quota;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logic Test | KursusKu</title>

    <style>
        :root {
            --bg: #10091b;
            --card: #1d1230;
            --purple: #9b6dff;
            --lavender: #d7c1ff;
            --text: #f7f1ff;
            --muted: #b5a5cb;
            --border: rgba(196, 159, 255, 0.22);
            --success: #75e0b0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 28px 18px;
            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(125, 67, 210, 0.22),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 85% 85%,
                    rgba(92, 46, 156, 0.2),
                    transparent 35%
                ),
                var(--bg);
        }

        .utility-card {
            position: relative;
            width: 100%;
            max-width: 680px;
            padding: 42px;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 26px;
            background: linear-gradient(
                145deg,
                rgba(42, 26, 65, 0.98),
                rgba(24, 14, 40, 0.98)
            );
            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.4),
                0 0 35px rgba(139, 92, 246, 0.08);
        }

        .utility-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 10%;
            width: 80%;
            height: 2px;
            background: linear-gradient(
                90deg,
                transparent,
                var(--purple),
                var(--lavender),
                transparent
            );
        }

        .brand {
            display: inline-block;
            margin-bottom: 25px;
            padding: 8px 14px;
            border: 1px solid var(--border);
            border-radius: 30px;
            color: var(--lavender);
            background: rgba(155, 109, 255, 0.09);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        h1 {
            margin-bottom: 12px;
            font-size: clamp(30px, 5vw, 42px);
            font-weight: 750;
            letter-spacing: -1px;
        }

        h1 span {
            color: var(--lavender);
        }

        .description {
            margin-bottom: 30px;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.8;
        }

        .section-title {
            margin-bottom: 16px;
            color: var(--lavender);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .info-box {
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.025);
        }

        .info-box small {
            display: block;
            margin-bottom: 9px;
            color: var(--muted);
            font-size: 12px;
        }

        .info-box strong {
            font-size: 27px;
        }

        .result-box {
            margin-top: 12px;
            padding: 22px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: rgba(10, 6, 19, 0.42);
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 15px 0;
            border-bottom: 1px solid rgba(196, 159, 255, 0.12);
        }

        .result-row:last-child {
            border-bottom: none;
        }

        .result-name {
            color: var(--muted);
            font-size: 14px;
        }

        .status {
            padding: 7px 13px;
            border: 1px solid rgba(117, 224, 176, 0.25);
            border-radius: 9px;
            color: var(--success);
            background: rgba(117, 224, 176, 0.08);
            font-family: Consolas, monospace;
            font-size: 13px;
            font-weight: 700;
        }

        .summary {
            margin-top: 22px;
            padding: 16px;
            border-left: 3px solid var(--purple);
            border-radius: 0 10px 10px 0;
            color: var(--lavender);
            background: rgba(155, 109, 255, 0.08);
            font-size: 13px;
            line-height: 1.8;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-top: 28px;
            padding: 13px 22px;
            border: 1px solid rgba(215, 193, 255, 0.3);
            border-radius: 12px;
            color: white;
            background: linear-gradient(135deg, #8050d8, #6235a8);
            box-shadow: 0 8px 24px rgba(113, 65, 190, 0.22);
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(113, 65, 190, 0.35);
        }

        .footer {
            margin-top: 28px;
            color: #827296;
            font-size: 11px;
            text-align: center;
            letter-spacing: 0.5px;
        }

        @media (max-width: 520px) {
            .utility-card {
                padding: 26px 20px;
                border-radius: 20px;
            }

            .info-grid {
                gap: 10px;
            }

            .info-box {
                padding: 15px;
            }

            .info-box strong {
                font-size: 23px;
            }

            .result-box {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <main class="utility-card">
        <div class="brand">KURSUSKU · MILESTONE 6</div>

        <h1>Logic <span>Test.</span></h1>

        <p class="description">
            Pengujian logika kondisi untuk memeriksa status kuota
            dan ketersediaan kursi pada program kursus.
        </p>

        <div class="section-title">Data Pengujian</div>

        <div class="info-grid">
            <div class="info-box">
                <small>Total Kuota</small>
                <strong><?= $quota ?></strong>
            </div>

            <div class="info-box">
                <small>Peserta Terdaftar</small>
                <strong><?= $registered ?></strong>
            </div>
        </div>

        <div class="section-title">Hasil Pemeriksaan</div>

        <div class="result-box">
            <div class="result-row">
                <span class="result-name">var_dump($isFull)</span>
                <span class="status">
                    <?= $isFull ? 'bool(true)' : 'bool(false)' ?>
                </span>
            </div>

            <div class="result-row">
                <span class="result-name">var_dump($hasSeat)</span>
                <span class="status">
                    <?= $hasSeat ? 'bool(true)' : 'bool(false)' ?>
                </span>
            </div>
        </div>

        <div class="summary">
            <strong>Kesimpulan:</strong><br>
            Kuota belum penuh. Masih tersedia
            <strong><?= max(0, $quota - $registered) ?> kursi</strong>
            untuk calon peserta.
        </div>

        <a href="index.php" class="back-button">
            &#8592; Kembali ke Katalog
        </a>

        <div class="footer">
            © <?= date('Y') ?> KURSUSKU · LOGIC TESTING
        </div>
    </main>
</body>
</html>