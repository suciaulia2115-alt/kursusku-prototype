```php
<?php
date_default_timezone_set('Asia/Jakarta');

$serverTime = date('Y-m-d H:i:s');
$tanggal = date('d F Y');
$waktu = date('H:i:s');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waktu Server | KursusKu</title>

    <style>
        :root {
            --purple-dark: #160d24;
            --purple-deep: #25143a;
            --purple: #7950a5;
            --purple-light: #cbb2ed;
            --text: #f8f3ff;
            --muted: #c0b1d3;
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
            padding: 24px;
            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(
                    circle at top left,
                    #49305f 0,
                    transparent 40%
                ),
                radial-gradient(
                    circle at bottom right,
                    #392052 0,
                    transparent 40%
                ),
                linear-gradient(
                    135deg,
                    var(--purple-dark),
                    var(--purple-deep)
                );
        }

        .container {
            width: 100%;
            max-width: 680px;
        }

        .brand {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 62px;
            height: 62px;
            margin-bottom: 14px;
            border-radius: 20px;
            background: linear-gradient(
                135deg,
                #a47bd0,
                #65418e
            );
            box-shadow: 0 8px 30px #00000040;
            font-size: 30px;
        }

        .brand h1 {
            font-size: clamp(28px, 5vw, 38px);
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand h1 span {
            color: var(--purple-light);
        }

        .brand p {
            margin-top: 8px;
            color: var(--muted);
            font-size: 14px;
        }

        .card {
            padding: 36px 28px;
            text-align: center;
            border: 1px solid #ffffff20;
            border-radius: 28px;
            background: #ffffff0c;
            box-shadow: 0 24px 70px #00000040;
            backdrop-filter: blur(14px);
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            margin-bottom: 26px;
            border: 1px solid #8ce5b43d;
            border-radius: 30px;
            background: #4cbd8318;
            color: #9cf0bd;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #72e5a0;
            box-shadow: 0 0 12px #72e5a0;
        }

        .label {
            margin-bottom: 14px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .clock {
            color: #ffffff;
            font-size: clamp(38px, 9vw, 66px);
            font-weight: 800;
            letter-spacing: 2px;
            font-variant-numeric: tabular-nums;
            text-shadow: 0 0 35px #bd91ff40;
        }

        .date {
            margin-top: 12px;
            color: var(--purple-light);
            font-size: 16px;
        }

        .divider {
            height: 1px;
            margin: 30px 0;
            background: linear-gradient(
                90deg,
                transparent,
                #cbb2ed60,
                transparent
            );
        }

        .server-info {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            text-align: left;
        }

        .info-item {
            flex: 1;
            min-width: 0;
            padding: 16px;
            border: 1px solid #ffffff12;
            border-radius: 16px;
            background: #ffffff08;
        }

        .info-title {
            margin-bottom: 8px;
            color: var(--muted);
            font-size: 12px;
        }

        .info-value {
            overflow-wrap: anywhere;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
        }

        .footer {
            margin-top: 24px;
            color: #a99ab9;
            text-align: center;
            font-size: 12px;
            line-height: 1.8;
        }

        .footer span {
            color: var(--purple-light);
            font-weight: 600;
        }

        @media (max-width: 480px) {
            .card {
                padding: 28px 18px;
            }

            .server-info {
                flex-direction: column;
            }

            .info-item {
                padding: 14px;
            }
        }
    </style>
</head>

<body>

    <main class="container">

        <header class="brand">
            <div class="brand-icon">◷</div>
            <h1>Kursus<span>Ku</span></h1>
            <p>Informasi waktu dan status server</p>
        </header>

        <section class="card">

            <div class="status">
                <span class="status-dot"></span>
                SERVER AKTIF
            </div>

            <p class="label">Waktu Server Saat Ini</p>

            <div class="clock" id="clock">
                <?= htmlspecialchars($waktu) ?>
            </div>

            <p class="date" id="date">
                <?= htmlspecialchars($tanggal) ?>
            </p>

            <div class="divider"></div>

            <div class="server-info">
                <div class="info-item">
                    <p class="info-title">Zona Waktu</p>
                    <p class="info-value">WIB (UTC+7)</p>
                </div>

                <div class="info-item">
                    <p class="info-title">Tanggal & Waktu PHP</p>
                    <p class="info-value">
                        <?= htmlspecialchars($serverTime) ?>
                    </p>
                </div>
            </div>

        </section>

        <footer class="footer">
            &copy; <?= date('Y') ?> <span>KursusKu</span><br>
            Belajar & Kembangkan Keahlianmu di Satu Platform
        </footer>

    </main>

    <script>
        // Jam tampilan berjalan setiap detik.
        // Waktu awal diambil dari PHP pada server.
        const initialTime = <?= json_encode($waktu) ?>;
        const initialDate = <?= json_encode($tanggal) ?>;

        const clockElement = document.getElementById('clock');
        const dateElement = document.getElementById('date');

        let [hours, minutes, seconds] = initialTime
            .split(':')
            .map(Number);

        let currentDate = initialDate;

        function updateClock() {
            seconds++;

            if (seconds >= 60) {
                seconds = 0;
                minutes++;
            }

            if (minutes >= 60) {
                minutes = 0;
                hours++;
            }

            if (hours >= 24) {
                hours = 0;

                // Muat ulang agar tanggal mengikuti waktu server.
                window.location.reload();
                return;
            }

            clockElement.textContent = [
                hours,
                minutes,
                seconds
            ].map(value => String(value).padStart(2, '0')).join(':');
        }

        setInterval(updateClock, 1000);
    </script>

</body>
</html>
```