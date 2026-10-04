
<?php

// ==========================================
// 1. MENGAMANKAN OUTPUT TEKS
// ==========================================
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// ==========================================
// 2. FORMAT ANGKA MENJADI RUPIAH
// ==========================================
function formatRupiah(int $amount): string
{
    return 'Rp' . number_format($amount, 0, ',', '.');
}

// Alias untuk kode katalog versi sebelumnya
function rupiah(int $amount): string
{
    return formatRupiah($amount);
}

// ==========================================
// 3. MENCARI DATA KURSUS BERDASARKAN KODE
// ==========================================
function findCourse(array $courses, string $code): ?array
{
    foreach ($courses as $course) {
        if ($course['code'] === $code) {
            return $course;
        }
    }

    return null;
}

// ==========================================
// 4. MENENTUKAN DISKON PESERTA
// ==========================================
function getDiscountPercent(string $participantType): int
{
    if ($participantType === 'mahasiswa') {
        return 20;
    } elseif ($participantType === 'guru') {
        return 15;
    }

    return 0;
}

// ==========================================
// 5. LABEL METODE BELAJAR
// ==========================================
function getLearningModeLabel(string $mode): string
{
    switch ($mode) {
        case 'offline':
            return 'Tatap Muka';

        case 'online':
            return 'Online';

        case 'hybrid':
            return 'Hybrid';

        default:
            return 'Tidak diketahui';
    }
}

// ==========================================
// 6. MENENTUKAN STATUS KURSUS
// ==========================================
function statusKursus(int $quota, int $registered): string
{
    if ($registered >= $quota) {
        return 'Penuh';
    }

    return 'Tersedia';
}

// ==========================================
// 7. MENGHITUNG SISA KURSI
// ==========================================
function sisaKursi(int $quota, int $registered): int
{
    return max(0, $quota - $registered);
}

// ==========================================
// 8. MEMFORMAT TANGGAL
// ==========================================
function formatTanggal(string $date): string
{
    $timestamp = strtotime($date);

    if ($timestamp === false) {
        return '-';
    }

    return date('d-m-Y', $timestamp);
}