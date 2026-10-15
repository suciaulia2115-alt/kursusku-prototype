<?php
$fee = 350000;
$participants = 2;
$subtotal = $fee * $participants;
$comparisonPositive = $fee > 0;
$comparisonStrict = $fee === 350000;
$message = 'Biaya: Rp ' . $fee;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Test | KursusKu</title>

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
            align-items: center;
            justify-content: center;
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
                    rgba(92, 46, 156, 0.20),
                    transparent 35%
                ),
                var(--bg);
        }

        .utility-card {
            position: relative;
            width: 100%;
            max-width: 760px;
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
                0 25px 70px rgba(0, 0, 0, 0.40),
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
            margin-bottom: 15px;
            color: var(--lavender);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .data-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 28px;
        }

        .data-box {
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.025);
        }

        .data-box small {
            display: block;
            margin-bottom: 9px;
            color: var(--muted);
            font-size: 12px;
        }

        .data-box strong {
            color: var(--text);
            font-size: 25px;
        }

        .result-list {
            display: grid;
            gap: 12px;
        }

        .result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 18px 20px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: rgba(10, 6, 19, 0.38);
        }

        .result-label {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .result-label strong {
            display: block;
            margin-bottom: 4px;
            color: var(--text);
            font-size: 14px;
        }

        .result-value {
            flex-shrink: 0;
            padding: 8px 12px;
            border: 1px solid rgba(117, 224, 176, 0.25);
            border-radius: 9px;
            color: var(--success);
            background: rgba(117, 224, 176, 0.08);
            font-family: Consolas, monospace;
            font-size: 13px;
            font-weight: 700;
        }

        .summary {
            margin-top: 24px;
            padding: 17px 19px;
            border-left: 3px solid var(--purple);
            border-radius: 0 12px 12px 0;
            color: var(--lavender);
            background: rgba(155, 109, 255, 0.08);
            font-size: 13px;
            line-height: 1.9;
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
            color: #fff;
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
                padding: 26px 19px;
                border-radius: 20px;
            }

            .data-grid {
                gap: 10px;
            }

            .data-box {
                padding: 15px;
            }

            .data-box strong {
                font-size: 21px;
            }

            .result-item {
                align-items: flex-start;
                padding: 15px;
            }

            .result-value {
                font-size: 11px;
            }
        }
    </style>
</head>

<body>
    <main class="utility-card">
        <div class="brand">KURSUSKU · MILESTONE 6</div>

        <h1>Operator <span>Test.</span></h1>

        <p class="description">
            Pengujian operator PHP untuk memeriksa operasi aritmetika,
            perbandingan, identitas tipe data, dan penggabungan string.
        </p>

        <div class="section-title">Data Pengujian</div>

        <div class="data-grid">
            <div class="data-box">
                <small>Biaya per Peserta</small>
                <strong>Rp <?= number_format($fee, 0, ',', '.') ?></strong>
            </div>

            <div class="data-box">
                <small>Jumlah Peserta</small>
                <strong><?= $participants ?> orang</strong>
            </div>
        </div>

        <div class="section-title">Hasil Pengujian Operator</div>

        <div class="result-list">
            <div class="result-item">
                <div class="result-label">
                    <strong>Perkalian</strong>
                    $fee * $participants
                </div>
                <div class="result-value">
                    Rp <?= number_format($subtotal, 0, ',', '.') ?>
                </div>
            </div>

            <div class="result-item">
                <div class="result-label">
                    <strong>Comparison</strong>
                    $fee &gt; 0
                </div>
                <div class="result-value">
                    <?= $comparisonPositive ? 'true' : 'false' ?>
                </div>
            </div>

            <div class="result-item">
                <div class="result-label">
                    <strong>Strict Comparison</strong>
                    $fee === 350000
                </div>
                <div class="result-value">
                    <?= $comparisonStrict ? 'true' : 'false' ?>
                </div>
            </div>

            <div class="result-item">
                <div class="result-label">
                    <strong>String Concatenation</strong>
                    Penggabungan teks dengan operator titik
                </div>
                <div class="result-value">
                    <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
                </div>
            </div>
        </div>

        <div class="summary">
            <strong>Kesimpulan Pengujian</strong><br>
            Total biaya untuk <?= $participants ?> peserta adalah
            <strong>Rp <?= number_format($subtotal, 0, ',', '.') ?></strong>.
            Kedua kondisi perbandingan menghasilkan
            <strong>true</strong>, dan operator titik berhasil
            menggabungkan teks dengan nilai biaya.
        </div>

        <a href="fee-calculator.php" class="back-button">
            &#8592; Kembali ke Kalkulator
        </a>

        <div class="footer">
            © <?= date('Y') ?> KURSUSKU · PHP OPERATOR TEST
        </div>
    </main>
</body>
</html>