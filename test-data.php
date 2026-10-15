```php
<?php
require_once 'data.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Data KursusKu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3e8ff;
            margin: 0;
            padding: 30px;
            color: #3b0764;
        }
        h1 {
            text-align: center;
            color: #6b21a8;
        }
        .container {
            max-width: 850px;
            margin: auto;
        }
        .card {
            background: white;
            padding: 22px;
            margin: 18px 0;
            border-radius: 14px;
            box-shadow: 0 4px 12px #00000012;
        }
        h2 {
            color: #7e22ce;
        }
        li {
            margin: 10px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Data Sistem KursusKu</h1>

    <div class="card">
        <h2>1. Daftar Kursus</h2>
        <ul>
            <?php foreach ($courses as $course): ?>
                <li>
                    <?= htmlspecialchars($course['name']) ?>
                    — Rp<?= number_format($course['fee'], 0, ',', '.') ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="card">
        <h2>2. Pilihan Minat</h2>
        <ul>
            <?php foreach ($interestOptions as $interest): ?>
                <li><?= htmlspecialchars($interest) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="card">
        <h2>3. Fasilitas Kursus</h2>
        <ul>
            <?php foreach ($facilities as $facility): ?>
                <li><?= htmlspecialchars($facility) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>
```