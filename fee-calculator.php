<?php

$courseName = 'Laravel Fundamental';
$fee = 2500000;
$participantCount = 3;
$discountPercent = 10;
$adminFee = 50000;
$isActive = true;

$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount + $adminFee;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Biaya Kursus</title>
</head>
<body>

<h1>Kalkulator Biaya Kursus</h1>

<table border="1" cellpadding="8">
    <tr>
        <td>Nama kursus</td>
        <td><?php echo $courseName; ?></td>
    </tr>
    <tr>
        <td>Biaya per peserta</td>
        <td>Rp <?php echo number_format($fee, 0, ',', '.'); ?></td>
    </tr>
    <tr>
        <td>Jumlah peserta</td>
        <td><?php echo $participantCount; ?></td>
    </tr>
    <tr>
        <td>Subtotal</td>
        <td>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
    </tr>
    <tr>
        <td>Diskon <?php echo $discountPercent; ?>%</td>
        <td>Rp <?php echo number_format($discount, 0, ',', '.'); ?></td>
    </tr>
    <tr>
        <td>Biaya admin</td>
        <td>Rp <?php echo number_format($adminFee, 0, ',', '.'); ?></td>
    </tr>
    <tr>
        <td><strong>Total akhir</strong></td>
        <td><strong>Rp <?php echo number_format($total, 0, ',', '.'); ?></strong></td>
    </tr>
</table>

</body>
</html>