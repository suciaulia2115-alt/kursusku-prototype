
<?php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

// Pastikan data dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

// Mengambil data formulir
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$courseCode = trim($_POST['course_code'] ?? '');
$participantType = trim($_POST['participant_type'] ?? '');
$interests = $_POST['interests'] ?? [];
$learningMode = trim($_POST['learning_mode'] ?? '');
$packageCount = filter_var(
    $_POST['package_count'] ?? null,
    FILTER_VALIDATE_INT
);
$notes = trim($_POST['notes'] ?? '');

// Validasi data
$errors = [];

if ($name === '') {
    $errors[] = 'Nama lengkap wajib diisi.';
} elseif (strlen($name) > 100) {
    $errors[] = 'Nama lengkap maksimal 100 karakter.';
}

if ($email === '') {
    $errors[] = 'Alamat email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
} elseif (strlen($email) > 150) {
    $errors[] = 'Alamat email maksimal 150 karakter.';
}

// Validasi kursus
$course = findCourse($courses, $courseCode);

if ($course === null) {
    $errors[] = 'Silakan pilih kursus yang tersedia.';
}

// Validasi tipe peserta
$validParticipantTypes = ['mahasiswa', 'guru', 'umum'];

if (!in_array($participantType, $validParticipantTypes, true)) {
    $errors[] = 'Jenis peserta tidak valid.';
}

// Validasi metode pembelajaran
$validLearningModes = ['offline', 'online', 'hybrid'];

if (!in_array($learningMode, $validLearningModes, true)) {
    $errors[] = 'Metode pembelajaran tidak valid.';
}

// Validasi jumlah paket
if (
    $packageCount === false ||
    $packageCount < 1 ||
    $packageCount > 3
) {
    $errors[] = 'Jumlah paket harus antara 1 sampai 3.';
}

// Validasi minat belajar
if (!is_array($interests)) {
    $interests = [];
}

$interests = array_values(
    array_intersect(
        $interests,
        array_keys($interestOptions)
    )
);

// Validasi catatan
if (strlen($notes) > 500) {
    $errors[] = 'Catatan tambahan maksimal 500 karakter.';
}

// Jika validasi gagal, tampilkan halaman error
if (!empty($errors)):
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Pendaftaran | KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f7f4fc;
            color: #302449;
            min-height: 100vh;
        }

        header {
            background: #24143f;
            padding: 20px 6%;
            box-shadow: 0 4px 20px rgba(28, 13, 53, 0.2);
        }

        .container {
            max-width: 1150px;
            margin: auto;
        }

        .logo {
            color: white;
            font-size: 25px;
            font-weight: 850;
        }

        .result-page {
            min-height: calc(100vh - 75px);
            padding: 65px 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            position: relative;
            overflow: hidden;
        }

        .error-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 650px;
            padding: 40px;
            background: white;
            border: 1px solid #eee5f8;
            border-radius: 25px;
            box-shadow: 0 15px 45px rgba(56, 32, 95, 0.1);
            animation: slideUp 0.7s ease both;
        }

        .error-icon {
            width: 75px;
            height: 75px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #fff0e8;
            color: #c46b37;
            font-size: 35px;
            font-weight: 800;
            animation: popIn 0.6s ease 0.2s both;
        }

        .error-heading {
            text-align: center;
            margin-bottom: 25px;
        }

        .error-heading h1 {
            color: #49345f;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .error-heading p {
            color: #766985;
            font-size: 14px;
        }

        .error-list {
            list-style: none;
            margin: 20px 0 28px;
            display: grid;
            gap: 12px;
        }

        .error-list li {
            padding: 13px 16px;
            background: #fff8f4;
            border: 1px solid #f4dfd1;
            border-radius: 10px;
            color: #8e4f2b;
            font-size: 14px;
            animation: slideUp 0.5s ease both;
        }

        .error-list li:nth-child(2) {
            animation-delay: 0.1s;
        }

        .error-list li:nth-child(3) {
            animation-delay: 0.2s;
        }

        .error-list li:nth-child(4) {
            animation-delay: 0.3s;
        }

        .error-list li:nth-child(5) {
            animation-delay: 0.4s;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 48px;
            padding: 12px 22px;
            border-radius: 11px;
            background: linear-gradient(135deg, #8052bd, #56318e);
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            transition: 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(86, 49, 142, 0.25);
        }

        .error-actions {
            text-align: center;
        }

        .decoration {
            position: absolute;
            border-radius: 50%;
            background: rgba(130, 85, 190, 0.07);
            animation: float 7s ease-in-out infinite alternate;
        }

        .decoration-one {
            width: 240px;
            height: 240px;
            top: -80px;
            left: -70px;
        }

        .decoration-two {
            width: 300px;
            height: 300px;
            bottom: -130px;
            right: -100px;
            animation-delay: 1s;
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

        @keyframes popIn {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            70% {
                transform: scale(1.12);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes float {
            from {
                transform: translate(0, 0);
            }
            to {
                transform: translate(20px, 20px);
            }
        }

        @media (max-width: 600px) {
            .error-card {
                padding: 28px 20px;
            }

            .error-heading h1 {
                font-size: 23px;
            }

            .btn {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <h1 class="logo">KursusKu</h1>
    </div>
</header>

<main class="result-page">
    <div class="decoration decoration-one"></div>
    <div class="decoration decoration-two"></div>

    <section class="error-card">
        <div class="error-icon">!</div>

        <div class="error-heading">
            <h1>Data Belum Valid</h1>
            <p>
                Periksa kembali data yang kamu masukkan
                sebelum mengirim pendaftaran.
            </p>
        </div>

        <ul class="error-list">
            <?php foreach ($errors as $error): ?>
                <li><?= e($error) ?></li>
            <?php endforeach; ?>
        </ul>

        <div class="error-actions">
            <a href="register.php" class="btn">
                Kembali ke Formulir
            </a>
        </div>
    </section>
</main>

</body>
</html>
<?php
exit;
endif;

// Menghitung biaya
$pricePerPackage = (int) $course['fee'];
$subtotal = $pricePerPackage * $packageCount;

// Menghitung diskon
$discountPercent = getDiscountPercent($participantType);
$discountAmount = (int) ($subtotal * $discountPercent / 100);
$totalPayment = $subtotal - $discountAmount;

// Menyiapkan label minat
$interestLabels = [];

foreach ($interests as $interest) {
    $interestLabels[] = $interestOptions[$interest];
}

// Menyiapkan label metode belajar
$learningModeLabel = getLearningModeLabel($learningMode);

// Label jenis peserta
$participantLabels = [
    'mahasiswa' => 'Mahasiswa',
    'guru' => 'Guru',
    'umum' => 'Umum'
];

$participantLabel = $participantLabels[$participantType];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hasil Pendaftaran | KursusKu</title>

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
            background: #f7f4fc;
            color: #302449;
            line-height: 1.6;
        }

        /* HEADER */
        .result-header {
            padding: 18px 6%;
            background: #24143f;
            box-shadow: 0 4px 20px rgba(28, 13, 53, 0.2);
        }

        .header-container {
            max-width: 1150px;
            margin: auto;
        }

        .logo {
            color: white;
            font-size: 25px;
            font-weight: 850;
        }

        /* BACKGROUND */
        .result-page {
            min-height: calc(100vh - 75px);
            padding: 60px 20px 80px;
            position: relative;
            overflow: hidden;
        }

        .background-decoration {
            position: fixed;
            z-index: 0;
            border-radius: 50%;
            background: rgba(130, 85, 190, 0.07);
            pointer-events: none;
            animation: float 8s ease-in-out infinite alternate;
        }

        .decoration-one {
            width: 260px;
            height: 260px;
            top: 100px;
            left: -100px;
        }

        .decoration-two {
            width: 330px;
            height: 330px;
            right: -130px;
            bottom: 50px;
            animation-delay: 1.5s;
        }

        /* RESULT CARD */
        .result-card {
            position: relative;
            z-index: 1;
            max-width: 850px;
            margin: auto;
            padding: 42px;
            background: white;
            border: 1px solid #eee5f8;
            border-radius: 25px;
            box-shadow: 0 15px 55px rgba(56, 32, 95, 0.1);
            animation: slideUp 0.8s ease both;
        }

        /* SUCCESS HEADING */
        .success-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .success-icon {
            width: 82px;
            height: 82px;
            margin: 0 auto 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background: #e4f5eb;
            color: #28744e;
            font-size: 42px;
            font-weight: 900;
            box-shadow: 0 0 0 10px #f1faf4;
            animation: successPop 0.8s cubic-bezier(.2, .8, .3, 1.4) 0.2s both;
        }

        .success-heading h1 {
            color: #49345f;
            font-size: 32px;
            margin-bottom: 8px;
            animation: fadeIn 0.8s ease 0.4s both;
        }

        .success-heading p {
            color: #766985;
            font-size: 15px;
            animation: fadeIn 0.8s ease 0.55s both;
        }

        .success-tag {
            display: inline-block;
            padding: 6px 14px;
            margin-top: 14px;
            border-radius: 30px;
            background: #f0eafa;
            color: #6c459f;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            animation: fadeIn 0.8s ease 0.7s both;
        }

        /* SECTION */
        .section-title {
            color: #49345f;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        /* TABLE */
        .detail-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border: 1px solid #eadff0;
            border-radius: 14px;
            margin: 20px 0 32px;
        }

        .detail-table th,
        .detail-table td {
            padding: 15px 17px;
            border-bottom: 1px solid #eadff0;
            text-align: left;
            vertical-align: top;
            font-size: 14px;
        }

        .detail-table th {
            width: 38%;
            background: #f8f3fc;
            color: #49345f;
            font-weight: 750;
        }

        .detail-table td {
            color: #5c506d;
            background: white;
        }

        .detail-table tr:last-child th,
        .detail-table tr:last-child td {
            border-bottom: none;
        }

        .detail-table tr {
            animation: fadeIn 0.6s ease both;
        }

        .detail-table tr:nth-child(1) { animation-delay: 0.1s; }
        .detail-table tr:nth-child(2) { animation-delay: 0.2s; }
        .detail-table tr:nth-child(3) { animation-delay: 0.3s; }
        .detail-table tr:nth-child(4) { animation-delay: 0.4s; }
        .detail-table tr:nth-child(5) { animation-delay: 0.5s; }
        .detail-table tr:nth-child(6) { animation-delay: 0.6s; }
        .detail-table tr:nth-child(7) { animation-delay: 0.7s; }
        .detail-table tr:nth-child(8) { animation-delay: 0.8s; }

        /* PAYMENT */
        .payment-box {
            padding: 25px;
            border: 1px solid #e9dff5;
            border-radius: 18px;
            background: linear-gradient(135deg, #faf7ff, #f5effc);
            animation: slideUp 0.7s ease 0.3s both;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            padding: 11px 0;
            color: #5c4175;
            font-size: 14px;
        }

        .payment-row strong {
            color: #49345f;
            text-align: right;
        }

        .payment-total {
            margin-top: 14px;
            padding-top: 20px;
            border-top: 2px solid #d9c9e5;
            color: #49345f;
            font-size: 20px;
            font-weight: 850;
        }

        .payment-total strong {
            color: #7044a8;
            font-size: 23px;
        }

        /* ACTIONS */
        .result-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 32px;
            animation: fadeIn 0.8s ease 0.7s both;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 12px 20px;
            border-radius: 11px;
            background: linear-gradient(135deg, #8052bd, #56318e);
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 800;
            transition: 0.3s ease;
            box-shadow: 0 6px 16px rgba(86, 49, 142, 0.16);
        }

        .btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(86, 49, 142, 0.25);
        }

        .btn-secondary {
            color: #64448e;
            background: #f0eafa;
            border: 1px solid #e3d7f3;
            box-shadow: none;
        }

        .btn-secondary:hover {
            background: #e6daf7;
            box-shadow: 0 8px 18px rgba(86, 49, 142, 0.12);
        }

        /* FOOTER */
        .result-footer {
            padding: 22px 15px;
            text-align: center;
            background: #24143f;
            color: #ded2ef;
            font-size: 13px;
        }

        /* ANIMATIONS */
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes successPop {
            0% {
                opacity: 0;
                transform: scale(0.3) rotate(-20deg);
            }
            65% {
                opacity: 1;
                transform: scale(1.15) rotate(5deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }

        @keyframes float {
            from {
                transform: translate(0, 0);
            }
            to {
                transform: translate(20px, 25px);
            }
        }

        /* RESPONSIVE */
        @media (max-width: 650px) {
            .result-page {
                padding: 35px 14px 55px;
            }

            .result-card {
                padding: 26px 18px;
                border-radius: 19px;
            }

            .success-heading h1 {
                font-size: 25px;
            }

            .section-title {
                font-size: 18px;
            }

            .detail-table th,
            .detail-table td {
                padding: 11px 10px;
                font-size: 13px;
            }

            .detail-table th {
                width: 40%;
            }

            .payment-box {
                padding: 18px 15px;
            }

            .payment-row {
                font-size: 13px;
                gap: 10px;
            }

            .payment-total {
                font-size: 17px;
            }

            .payment-total strong {
                font-size: 18px;
            }

            .result-actions {
                flex-direction: column;
            }

            .result-actions .btn {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>

<header class="result-header">
    <div class="header-container">
        <h1 class="logo">KursusKu</h1>
    </div>
</header>

<main class="result-page">

    <div class="background-decoration decoration-one"></div>
    <div class="background-decoration decoration-two"></div>

    <section class="result-card">

        <div class="success-heading">
            <div class="success-icon" aria-label="Berhasil">✓</div>

            <h1>Pendaftaran Berhasil!</h1>

            <p>
                Terima kasih telah mendaftar di KursusKu.
                Berikut adalah detail pendaftaran dan rincian pembayaran Anda.
            </p>

            <span class="success-tag">
                PENDAFTARAN TERCATAT
            </span>
        </div>

        <h2 class="section-title">Detail Peserta</h2>

        <table class="detail-table">
            <tbody>
                <tr>
                    <th>Nama Lengkap</th>
                    <td><?= e($name) ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?= e($email) ?></td>
                </tr>

                <tr>
                    <th>Nama Kursus</th>
                    <td><?= e($course['name']) ?></td>
                </tr>

                <tr>
                    <th>Jenis Peserta</th>
                    <td><?= e($participantLabel) ?></td>
                </tr>

                <tr>
                    <th>Minat Belajar</th>
                    <td>
                        <?php if (!empty($interestLabels)): ?>
                            <?= e(implode(', ', $interestLabels)) ?>
                        <?php else: ?>
                            Belum memilih minat
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <th>Metode Pembelajaran</th>
                    <td><?= e($learningModeLabel) ?></td>
                </tr>

                <tr>
                    <th>Jumlah Paket</th>
                    <td><?= e((string) $packageCount) ?> paket</td>
                </tr>

                <tr>
                    <th>Catatan</th>
                    <td>
                        <?= $notes !== ''
                            ? nl2br(e($notes))
                            : 'Tidak ada catatan.' ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2 class="section-title">Rincian Pembayaran</h2>

        <div class="payment-box">

            <div class="payment-row">
                <span>Harga per paket</span>
                <strong>
                    <?= e(formatRupiah($pricePerPackage)) ?>
                </strong>
            </div>

            <div class="payment-row">
                <span>Jumlah paket</span>
                <strong>
                    <?= e((string) $packageCount) ?>
                </strong>
            </div>

            <div class="payment-row">
                <span>Subtotal</span>
                <strong>
                    <?= e(formatRupiah($subtotal)) ?>
                </strong>
            </div>

            <div class="payment-row">
                <span>
                    Diskon (<?= e((string) $discountPercent) ?>%)
                </span>
                <strong>
                    - <?= e(formatRupiah($discountAmount)) ?>
                </strong>
            </div>

            <div class="payment-row payment-total">
                <span>Total Pembayaran</span>
                <strong>
                    <?= e(formatRupiah($totalPayment)) ?>
                </strong>
            </div>

        </div>

        <div class="result-actions">
            <a href="register.php" class="btn">
                Daftar Lagi
            </a>

            <a href="history.php" class="btn btn-secondary">
                Lihat Riwayat
            </a>

            <a href="index.php" class="btn btn-secondary">
                Kembali ke Beranda
            </a>
        </div>

    </section>
</main>

<footer class="result-footer">
    <p>
        &copy; <?= date('Y') ?> KursusKu. Semua hak dilindungi.
    </p>
</footer>

</body>
</html>