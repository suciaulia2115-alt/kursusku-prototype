```php
<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus | KursusKu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple-dark: #29134d;
            --purple: #6336a0;
            --purple-light: #9864d0;
            --lavender: #f2eaff;
            --gold: #f3d58b;
            --text: #332348;
            --muted: #81748f;
            --border: #e8def3;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "DM Sans", sans-serif;
            color: var(--text);
            background: #f8f5fc;
            line-height: 1.6;
            min-height: 100vh;
        }

        header {
            background: linear-gradient(120deg, #29134d, #56317f);
            box-shadow: 0 5px 25px rgba(41, 19, 77, .2);
        }

        .navbar {
            max-width: 1200px;
            min-height: 76px;
            margin: auto;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            color: white;
            font: 800 27px "Plus Jakarta Sans", sans-serif;
            text-decoration: none;
        }

        .logo span {
            color: var(--gold);
        }

        .nav-link {
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 10px;
            transition: .25s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,.13);
            color: var(--gold);
        }

        .hero {
            padding: 65px 20px 100px;
            text-align: center;
            color: white;
            background:
                radial-gradient(circle at 15% 20%, rgba(255,255,255,.12), transparent 25%),
                radial-gradient(circle at 85% 80%, rgba(243,213,139,.15), transparent 25%),
                linear-gradient(135deg, #32165f, #6336a0 55%, #9460c8);
        }

        .hero-label {
            display: inline-block;
            padding: 7px 15px;
            margin-bottom: 18px;
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 30px;
            color: #fff4d6;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero h1 {
            font: 800 clamp(30px, 5vw, 48px)/1.2 "Plus Jakarta Sans", sans-serif;
            margin-bottom: 16px;
        }

        .hero h1 span {
            color: var(--gold);
        }

        .hero p {
            max-width: 620px;
            margin: auto;
            color: #eee4fa;
        }

        .form-wrapper {
            width: min(920px, 92%);
            margin: -48px auto 65px;
            position: relative;
        }

        .form-container {
            padding: 40px;
            background: rgba(255,255,255,.98);
            border: 1px solid white;
            border-radius: 24px;
            box-shadow: 0 25px 75px rgba(54,25,92,.13);
        }

        .form-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding-bottom: 24px;
            margin-bottom: 28px;
            border-bottom: 1px solid #eee7f5;
        }

        .form-heading h2 {
            font: 700 24px "Plus Jakarta Sans", sans-serif;
            color: var(--purple-dark);
        }

        .form-heading p {
            margin-top: 5px;
            color: var(--muted);
            font-size: 14px;
        }

        .form-icon {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            width: 58px;
            height: 58px;
            border-radius: 17px;
            background: var(--lavender);
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 23px;
        }

        .form-label {
            display: block;
            margin-bottom: 9px;
            color: #40235f;
            font-size: 14px;
            font-weight: 700;
        }

        .required {
            color: #d64d76;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: #fdfbff;
            color: var(--text);
            font: inherit;
            outline: none;
            transition: border-color .25s, box-shadow .25s, background .25s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--purple-light);
            background: white;
            box-shadow: 0 0 0 4px rgba(152,100,208,.12);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .form-hint {
            margin-top: 7px;
            color: var(--muted);
            font-size: 12px;
        }

        .choice-options {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .choice-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fdfbff;
            cursor: pointer;
            transition: .2s;
        }

        .choice-card:hover {
            border-color: var(--purple-light);
            background: #f7f0ff;
        }

        .choice-card input {
            width: 17px;
            height: 17px;
            accent-color: var(--purple);
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 48px;
            padding: 12px 22px;
            border: 0;
            border-radius: 11px;
            font: 700 14px "DM Sans", sans-serif;
            text-decoration: none;
            cursor: pointer;
            transition: .25s;
        }

        .btn-primary {
            flex: 1;
            color: white;
            background: linear-gradient(135deg, var(--purple-dark), var(--purple));
            box-shadow: 0 8px 20px rgba(99,54,160,.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(99,54,160,.27);
        }

        .btn-secondary {
            color: var(--purple-dark);
            background: var(--lavender);
        }

        .btn-secondary:hover {
            background: #e7d8f8;
        }

        footer {
            padding: 24px 15px;
            text-align: center;
            color: var(--muted);
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 14px 18px;
            }

            .logo {
                font-size: 23px;
            }

            .nav-link {
                padding: 8px 11px;
                font-size: 12px;
            }

            .hero {
                padding: 48px 18px 80px;
            }

            .form-wrapper {
                width: 94%;
                margin-top: -35px;
            }

            .form-container {
                padding: 24px 18px;
                border-radius: 18px;
            }

            .form-heading h2 {
                font-size: 20px;
            }

            .form-icon {
                width: 46px;
                height: 46px;
                font-size: 23px;
            }

            .choice-options {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<header>
    <div class="navbar">
        <a href="index.php" class="logo">Kursus<span>Ku</span></a>
        <a href="index.php" class="nav-link">← Kembali ke Beranda</a>
    </div>
</header>

<section class="hero">
    <div class="hero-label">✦ Pendaftaran Kursus</div>
    <h1>Mulai Perjalanan <span>Belajarmu</span></h1>
    <p>Lengkapi formulir berikut untuk mendaftar dan mengembangkan keahlian bersama KursusKu.</p>
</section>

<main class="form-wrapper">
    <section class="form-container">
        <div class="form-heading">
            <div>
                <h2>Formulir Pendaftaran</h2>
                <p>Isi data dengan benar. Kolom bertanda * wajib diisi.</p>
            </div>
            <div class="form-icon">📝</div>
        </div>

        <form action="process-registration.php" method="POST">
            <div class="form-group">
                <label class="form-label" for="nama">
                    Nama Lengkap <span class="required">*</span>
                </label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="email">
                    Alamat Email <span class="required">*</span>
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="nama@email.com"
                    required
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="telepon">
                    Nomor Telepon <span class="required">*</span>
                </label>
                <input
                    type="tel"
                    id="telepon"
                    name="telepon"
                    placeholder="Contoh: 081234567890"
                    required
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="program">
                    Jenis Program <span class="required">*</span>
                </label>
                <select id="program" name="program" required>
                    <option value="">-- Pilih Jenis Program --</option>
                    <option value="online">Online</option>
                    <option value="offline">Offline</option>
                    <option value="hybrid">Hybrid</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="kursus">
                    Pilihan Kursus <span class="required">*</span>
                </label>
                <select id="kursus" name="kursus" required>
                    <option value="">-- Pilih Kursus --</option>
                    <option value="WEB-01">Web Dasar</option>
                    <option value="PHP-01">PHP Dasar</option>
                    <option value="PHP-02">PHP Lanjutan</option>
                    <option value="LAR-01">Laravel Fundamental</option>
                    <option value="DB-01">MySQL Dasar</option>
                    <option value="UI-01">UI Web Dasar</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="package_count">
                    Jumlah Paket <span class="required">*</span>
                </label>

                <select id="package_count" name="package_count" required>
                    <option value="">-- Pilih Jumlah Paket --</option>

                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <option value="<?= $i ?>">
                            <?= $i ?> Paket
                        </option>
                    <?php endfor; ?>

                </select>

                <p class="form-hint">
                    Pilih jumlah paket yang ingin Anda ikuti, dari 1 sampai 3 paket.
                </p>
            </div>

            <div class="form-group">
                <label class="form-label" for="jenis_peserta">
                    Jenis Peserta <span class="required">*</span>
                </label>
                <select id="jenis_peserta" name="jenis_peserta" required>
                    <option value="">-- Pilih Jenis Peserta --</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="guru">Guru</option>
                    <option value="umum">Umum</option>
                </select>
            </div>

            <div class="form-group">
                <span class="form-label">Minat Pembelajaran</span>
                <div class="choice-options">
                    <label class="choice-card">
                        <input type="checkbox" name="minat[]" value="pemrograman">
                        <span>Pemrograman</span>
                    </label>

                    <label class="choice-card">
                        <input type="checkbox" name="minat[]" value="desain">
                        <span>Desain Web</span>
                    </label>

                    <label class="choice-card">
                        <input type="checkbox" name="minat[]" value="database">
                        <span>Database</span>
                    </label>

                    <label class="choice-card">
                        <input type="checkbox" name="minat[]" value="pengembangan_web">
                        <span>Pengembangan Web</span>
                    </label>
                </div>
                <p class="form-hint">Anda dapat memilih lebih dari satu minat.</p>
            </div>

            <div class="form-group">
                <label class="form-label" for="catatan">Catatan Tambahan</label>
                <textarea
                    id="catatan"
                    name="catatan"
                    placeholder="Tuliskan pertanyaan atau catatan jika ada..."
                ></textarea>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-primary">
                    Kirim Pendaftaran&nbsp; →
                </button>
                <button type="reset" class="btn btn-secondary">
                    Reset Formulir
                </button>
            </div>
        </form>
    </section>
</main>

<footer>
    © <?= date('Y') ?> KursusKu · Belajar dan berkembang bersama kami.
</footer>
</body>
</html>
```