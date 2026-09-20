<?php

require_once __DIR__ . '/helpers.php';

$tests = [
    [
        'name' => 'Format Rupiah',
        'result' => rupiah(350000),
        'expected' => 'Rp 350.000'
    ],
    [
        'name' => 'Status Penuh',
        'result' => statusKursus(25, 25),
        'expected' => 'Penuh'
    ],
    [
        'name' => 'Status Tersedia',
        'result' => statusKursus(25, 24),
        'expected' => 'Tersedia'
    ],
    [
        'name' => 'Sisa Kursi',
        'result' => sisaKursi(20, 0),
        'expected' => 20
    ],
    [
        'name' => 'Format Tanggal',
        'result' => formatTanggal('2026-10-01'),
        'expected' => '01-10-2026'
    ],
    [
        'name' => 'Sisa Kursi Penuh',
        'result' => sisaKursi(25, 25),
        'expected' => 0
    ]
];

echo "<h2>Hasil Test Functions</h2>";

foreach ($tests as $test) {
    if ($test['result'] === $test['expected']) {
        echo "PASS - " . $test['name'] . "<br>";
    } else {
        echo "FAIL - " . $test['name'] . "<br>";
    }
}
?>