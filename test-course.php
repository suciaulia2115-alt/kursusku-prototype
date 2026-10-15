
<?php
require_once 'data.php';
require_once 'helpers.php';

$keyword = $_GET['code'] ?? 'laravel';
$result = findCourse($courses, $keyword);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Kursus | KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5efff, #e8dcfa);
            color: #352047;
        }

        header {
            background: linear-gradient(110deg, #281238, #63358a, #8052b0);
            color: white;
            padding: 22px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 5px 25px #39204b30;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 25px;
            font-weight: 800;
        }

        .logo {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: #f2d68c;
            color: #422453;
            font-size: 25px;
        }

        nav {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }

        nav a {
            color: #f5eafa;
            text-decoration: none;
            font-weight: 600;
        }

        nav a:hover {
            color: #f2d68c;
        }

        .hero {
            text-align: center;
            padding: 65px 20px 35px;
        }

        .hero .tag {
            display: inline-block;
            padding: 8px 16px;
            background: #e3d2f6;
            color: #63358a;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-size: clamp(30px, 5vw, 43px);
            margin-bottom: 12px;
            color: #39204f;
        }

        .hero p {
            color: #776783;
            line-height: 1.7;
        }

        main {
            width: 90%;
            max-width: 850px;
            margin: 0 auto 65px;
        }

        .card {
            background: white;
            border: 1px solid #e9def4;
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 20px 50px #47226015;
        }

        .card h2 {
            font-size: 23px;
            margin-bottom: 8px;
        }

        .description {
            color: #81718d;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .search-form {
            display: flex;
            gap: 12px;
            margin-bottom: 28px;
        }

        .search-form input {
            min-width: 0;
            flex: 1;
            padding: 15px 17px;
            border: 1px solid #d9c8e8;
            border-radius: 12px;
            outline: none;
            font-size: 15px;
        }

        .search-form input:focus {
            border-color: #8052b0;
            box-shadow: 0 0 0 4px #8052b01c;
        }

        .search-form button {
            border: none;
            border-radius: 12px;
            padding: 14px 22px;
            background: linear-gradient(135deg, #8052b0, #603584);
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .search-form button:hover {
            background: #482361;
        }

        .status {
            display: inline-block;
            background: #e6f8ec;
            color: #247443;
            padding: 8px 13px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 420px;
        }

        th {
            text-align: left;
            padding: 16px 14px;
            color: #6b4787;
            background: #f5effb;
            font-size: 13px;
        }

        td {
            padding: 20px 14px;
            border-bottom: 1px solid #eee6f5;
            font-size: 14px;
        }

        .course-name {
            font-weight: 800;
            color: #422456;
        }

        .code {
            display: inline-block;
            background: #eee3fa;
            color: #673b91;
            padding: 6px 10px;
            border-radius: 8px;
            font-weight: 700;
        }

        .price {
            font-weight: 800;
            color: #694092;
            white-space: nowrap;
        }

        .notice {
            margin-top: 24px;
            padding: 17px;
            border-radius: 12px;
            background: #f6f0fc;
            color: #705587;
            font-size: 13px;
            line-height: 1.7;
        }

        .not-found {
            background: #fff0f0;
            color: #a12b42;
            border-radius: 12px;
            padding: 20px;
            line-height: 1.7;
        }

        footer {
            text-align: center;
            padding: 25px 15px;
            color: #f3e9fb;
            background: #281238;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            header {
                padding: 18px 5%;
            }

            .brand {
                font-size: 22px;
            }

            nav {
                gap: 14px;
                font-size: 13px;
            }

            .hero {
                padding-top: 45px;
            }

            .card {
                padding: 23px 17px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-form button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<header>
    <div class="brand">
        <span class="logo">K</span>
        <span>KursusKu</span>
    </div>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="index.php#katalog">Katalog</a>
        <a href="registration.php">Daftar Kursus</a>
    </nav>
</header>

<section class="hero">
    <span class="tag">✦ SISTEM INFORMASI KURSUS ✦</span>
    <h1>Pencarian Data Kursus</h1>
    <p>Temukan informasi kursus dengan cepat dan mudah.</p>
</section>

<main>
    <section class="card">
        <h2>Hasil Pencarian</h2>
        <p class="description">
            Masukkan kode kursus untuk melihat detail kursus yang tersedia.
        </p>

        <form class="search-form" method="GET" action="">
            <input
                type="text"
                name="code"
                placeholder="Contoh: laravel"
                value="<?= e($keyword) ?>"
                required
            >
            <button type="submit">⌕ Cari Kursus</button>
        </form>

        <?php if ($result !== null): ?>
            <span class="status">✓ Kursus ditemukan</span>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Kode Kursus</th>
                            <th>Nama Kursus</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="code">
                                    <?= e($result['code']) ?>
                                </span>
                            </td>
                            <td class="course-name">
                                <?= e($result['name']) ?>
                            </td>
                            <td class="price">
                                <?= e(formatRupiah($result['fee'])) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="notice">
                <strong>Informasi:</strong><br>
                Data ditampilkan berdasarkan pencocokan kode kursus
                secara persis menggunakan fungsi
                <code>findCourse()</code>.
            </div>
        <?php else: ?>
            <div class="not-found">
                <strong>Kursus tidak ditemukan.</strong><br>
                Tidak ada kursus dengan kode
                <strong><?= e($keyword) ?></strong>.
                Periksa kembali kode yang dimasukkan.
            </div>
        <?php endif; ?>
    </section>
</main>

<footer>
    &copy; <?= date('Y') ?> KursusKu · Belajar dan Berkembang Bersama
</footer>
</body>
</html>
