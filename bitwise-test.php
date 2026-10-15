
<?php
// ========================================
// BITWISE PERMISSION TEST
// ========================================

$READ = 1;
$WRITE = 2;
$DELETE = 4;

// Menggabungkan izin READ dan WRITE
$permission = $READ | $WRITE;

// Memeriksa setiap izin
$canRead = ($permission & $READ) === $READ;
$canWrite = ($permission & $WRITE) === $WRITE;
$canDelete = ($permission & $DELETE) === $DELETE;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bitwise Permission Test | KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #f8f3ff;
            background:
                radial-gradient(circle at top right, #49246f, transparent 35%),
                linear-gradient(135deg, #13091f, #24113e 60%, #351650);
        }

        header {
            padding: 24px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            border-bottom: 1px solid rgba(207, 166, 255, .25);
            background: rgba(15, 7, 28, .6);
        }

        .brand {
            font-size: 29px;
            font-weight: 800;
        }

        .brand span {
            color: #c59aff;
        }

        .brand small {
            display: block;
            margin-top: 5px;
            color: #c5b3dc;
            font-size: 12px;
            font-weight: 400;
        }

        .nav-label {
            color: #e2d0ff;
            font-size: 13px;
        }

        main {
            width: min(800px, 90%);
            margin: 70px auto;
        }

        .heading {
            margin-bottom: 32px;
            text-align: center;
        }

        .eyebrow {
            display: inline-block;
            padding: 8px 16px;
            margin-bottom: 18px;
            color: #e4d0ff;
            background: rgba(168, 121, 232, .14);
            border: 1px solid rgba(207, 166, 255, .3);
            border-radius: 30px;
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        h1 {
            margin-bottom: 14px;
            font-size: clamp(28px, 5vw, 40px);
        }

        .heading p {
            color: #c5b3dc;
            line-height: 1.8;
        }

        .card {
            overflow: hidden;
            border: 1px solid rgba(207, 166, 255, .3);
            border-radius: 22px;
            background: rgba(255, 255, 255, .055);
            box-shadow: 0 22px 65px rgba(0, 0, 0, .28);
        }

        .card-header {
            padding: 22px 26px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            background: rgba(168, 121, 232, .13);
            border-bottom: 1px solid rgba(207, 166, 255, .2);
        }

        .card-header h2 {
            font-size: 18px;
        }

        .badge {
            padding: 7px 12px;
            color: #e7d5ff;
            background: #60318c;
            border-radius: 30px;
            font-size: 12px;
        }

        .content {
            padding: 28px;
        }

        .summary {
            margin-bottom: 24px;
            padding: 18px 20px;
            color: #e0caff;
            background: rgba(168, 121, 232, .09);
            border: 1px solid rgba(207, 166, 255, .2);
            border-radius: 14px;
            line-height: 1.8;
        }

        .permissions {
            display: grid;
            gap: 15px;
        }

        .permission-item {
            padding: 21px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            background: rgba(168, 121, 232, .08);
            border: 1px solid rgba(207, 166, 255, .2);
            border-radius: 15px;
        }

        .permission-info h3 {
            margin-bottom: 6px;
            font-size: 17px;
        }

        .permission-info p {
            color: #c5b3dc;
            font-size: 13px;
            line-height: 1.6;
        }

        .status {
            min-width: 94px;
            padding: 9px 13px;
            text-align: center;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
        }

        .active {
            color: #bff5d4;
            background: rgba(49, 153, 94, .2);
            border: 1px solid rgba(111, 222, 157, .3);
        }

        .inactive {
            color: #ffc8d2;
            background: rgba(200, 70, 105, .16);
            border: 1px solid rgba(255, 142, 165, .25);
        }

        .conclusion {
            margin-top: 24px;
            padding: 22px;
            color: #d0c0e4;
            background: rgba(255, 255, 255, .035);
            border-left: 3px solid #b783f2;
            border-radius: 8px;
            line-height: 1.9;
            font-size: 14px;
        }

        .conclusion strong {
            color: #fff;
        }

        .back-link {
            display: inline-block;
            margin-top: 26px;
            padding: 12px 21px;
            color: white;
            text-decoration: none;
            background: linear-gradient(135deg, #8747c8, #60318c);
            border: 1px solid rgba(207, 166, 255, .25);
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            transition: transform .2s, box-shadow .2s;
        }

        .back-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(135, 71, 200, .3);
        }

        footer {
            padding: 25px 7%;
            border-top: 1px solid rgba(207, 166, 255, .2);
            color: #bda9d5;
            text-align: center;
            font-size: 12px;
            line-height: 1.9;
        }

        footer strong {
            color: #c59aff;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px 5%;
            }

            .brand {
                font-size: 25px;
            }

            .nav-label {
                display: none;
            }

            main {
                margin: 40px auto;
            }

            .content {
                padding: 18px;
            }

            .permission-item {
                padding: 16px;
            }

            .status {
                min-width: 78px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="brand">
        Kursus<span>Ku</span>
        <small>Belajar & Kembangkan Keahlianmu</small>
    </div>

    <div class="nav-label">Praktikum Pemrograman Web III</div>
</header>

<main>
    <section class="heading">
        <span class="eyebrow">PHP Bitwise Operator</span>

        <h1>Bitwise Permission Test</h1>

        <p>
            Pengujian hak akses menggunakan operator bitwise
            untuk menentukan izin yang aktif.
        </p>
    </section>

    <section class="card">
        <div class="card-header">
            <h2>Hasil Pemeriksaan Izin</h2>
            <span class="badge">Permission</span>
        </div>

        <div class="content">
            <div class="summary">
                <strong>Konfigurasi izin:</strong><br>
                READ = 1 &nbsp; | &nbsp;
                WRITE = 2 &nbsp; | &nbsp;
                DELETE = 4
                <br><br>
                Izin yang digabungkan:
                <strong>READ | WRITE = <?= $permission ?></strong>
            </div>

            <div class="permissions">
                <div class="permission-item">
                    <div class="permission-info">
                        <h3>Izin READ</h3>
                        <p>Hak untuk membaca data.</p>
                    </div>

                    <span class="status <?= $canRead ? 'active' : 'inactive' ?>">
                        <?= $canRead ? '✓ Aktif' : '✕ Tidak Aktif' ?>
                    </span>
                </div>

                <div class="permission-item">
                    <div class="permission-info">
                        <h3>Izin WRITE</h3>
                        <p>Hak untuk menulis atau mengubah data.</p>
                    </div>

                    <span class="status <?= $canWrite ? 'active' : 'inactive' ?>">
                        <?= $canWrite ? '✓ Aktif' : '✕ Tidak Aktif' ?>
                    </span>
                </div>

                <div class="permission-item">
                    <div class="permission-info">
                        <h3>Izin DELETE</h3>
                        <p>Hak untuk menghapus data.</p>
                    </div>

                    <span class="status <?= $canDelete ? 'active' : 'inactive' ?>">
                        <?= $canDelete ? '✓ Aktif' : '✕ Tidak Aktif' ?>
                    </span>
                </div>
            </div>

            <div class="conclusion">
                <strong>Kesimpulan:</strong>
                Izin READ dan WRITE aktif karena keduanya digabungkan
                ke dalam variabel permission. Izin DELETE tidak aktif
                karena flag DELETE tidak digabungkan.
            </div>

            <a class="back-link" href="index.php">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </section>
</main>

<footer>
    <strong>KursusKu</strong> — Belajar dengan elegan, berkembang dengan percaya diri.
    <br>
    &copy; <?= date('Y') ?> KursusKu
</footer>

</body>
</html>
