<?php

require_once __DIR__ . '/helpers.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {

    $name = trim($_GET['name'] ?? '');
    $email = trim($_GET['email'] ?? '');
    $phone = trim($_GET['phone'] ?? '');
    $studyProgram = trim($_GET['study_program'] ?? '');
    $course = $_GET['course'] ?? '';
    $participantType = $_GET['participant_type'] ?? '';
    $interests = $_GET['interests'] ?? [];
    $note = trim($_GET['note'] ?? '');
    $source = $_GET['source'] ?? '';

} else {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $studyProgram = trim($_POST['study_program'] ?? '');
    $course = $_POST['course'] ?? '';
    $participantType = $_POST['participant_type'] ?? '';
    $interests = $_POST['interests'] ?? [];
    $note = trim($_POST['note'] ?? '');
    $source = $_POST['source'] ?? '';

}

if (!is_array($interests)) {
    $interests = [];
}

if (!is_array($interests)) {

    $interests = [];

}


/*
|--------------------------------------------------------------------------
| Nama kursus
|--------------------------------------------------------------------------
*/

$courseNames = [

    'web-dasar' =>
        'Web Dasar',

    'php-dasar' =>
        'PHP Dasar',

    'php-lanjutan' =>
        'PHP Lanjutan',

    'laravel-fundamental' =>
        'Laravel Fundamental',

    'mysql-dasar' =>
        'MySQL Dasar',

    'ui-web-dasar' =>
        'UI Web Dasar'

];


/*
|--------------------------------------------------------------------------
| Jenis peserta
|--------------------------------------------------------------------------
*/

$participantNames = [

    'mahasiswa' =>
        'Mahasiswa',

    'umum' =>
        'Umum'

];


/*
|--------------------------------------------------------------------------
| Nama minat
|--------------------------------------------------------------------------
*/

$interestNames = [

    'ui-ux' =>
        'UI/UX',

    'database' =>
        'Database',

    'backend' =>
        'Backend'

];


/*
|--------------------------------------------------------------------------
| Konversi nilai
|--------------------------------------------------------------------------
*/

$courseName =
    $courseNames[$course] ?? 'Tidak dipilih';

$participantName =
    $participantNames[$participantType]
    ?? 'Tidak dipilih';


$interestLabels = [];

foreach ($interests as $interest) {

    if (isset($interestNames[$interest])) {

        $interestLabels[] =
            $interestNames[$interest];

    }

}


$interestText =
    !empty($interestLabels)
    ? implode(', ', $interestLabels)
    : 'Tidak ada';


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
        Pendaftaran Berhasil - KursusKu
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

            <h1>
                KursusKu
            </h1>

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

            <div class="result-card">


                <!-- SUCCESS -->

                <div class="success-box">

                    <h1>
                        Pendaftaran Berhasil!
                    </h1>

                    <p>
                        Terima kasih.
                        Data pendaftaran Anda telah
                        diterima oleh KursusKu.
                    </p>

                </div>


                <!-- DATA -->

                <h2>
                    Data Pendaftaran
                </h2>


                <dl class="result-list">


                    <dt>
                        Nama Lengkap
                    </dt>

                    <dd>
                        <?= e($name); ?>
                    </dd>


                    <dt>
                        Email
                    </dt>

                    <dd>
                        <?= e($email); ?>
                    </dd>


                    <dt>
                        Nomor HP
                    </dt>

                    <dd>
                        <?= e($phone); ?>
                    </dd>


                    <dt>
                        Program Studi
                    </dt>

                    <dd>
                        <?= e($studyProgram); ?>
                    </dd>


                    <dt>
                        Pilihan Kursus
                    </dt>

                    <dd>
                        <?= e($courseName); ?>
                    </dd>


                    <dt>
                        Jenis Peserta
                    </dt>

                    <dd>
                        <?= e($participantName); ?>
                    </dd>


                    <dt>
                        Minat Belajar
                    </dt>

                    <dd>
                        <?= e($interestText); ?>
                    </dd>


                    <dt>
                        Catatan
                    </dt>

                    <dd>
                        <?= $note !== ''
                            ? e($note)
                            : 'Tidak ada catatan'; ?>
                    </dd>


                    <dt>
                        Sumber
                    </dt>

                    <dd>
                        <?= e($source); ?>
                    </dd>


                </dl>


                <br><br>


                <a
                    href="index.php"
                    class="button"
                >
                    ← Kembali ke Beranda
                </a>


                <a
                    href="registration.php"
                    class="button button-green"
                >
                    Daftar Lagi
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