<?php
// Misalkan kita sudah memiliki $no_booking dari request GET
$no_booking = $_GET['no_booking'];

require_once '../db.php';
require_once '../classes/Booking.php';

$database = new Database();
$db = $database->connect();
$booking = new Booking($db);

// Menggunakan metode readOne untuk mendapatkan detail booking
$booking->no_booking = $no_booking;
$bookingDetails = $booking->readOne();

if ($bookingDetails) {
    $row = $bookingDetails->fetch(PDO::FETCH_ASSOC);
    // Extract $row untuk memudahkan akses variabel pada form
    extract($row);
} else {
    // Jika data booking tidak ditemukan, berikan nilai default pada variabel
    $tgl_booking = '';
    $nama_pelanggan = '';
    $alamat = '';
    $no_hp = '';
    $no_polisi = '';
    $merk = '';
    $keluhan_pelanggan = '';
    $pengantian_sparepart = '';
    $estimasi_biaya = '';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Edit Booking Bengkel</h1>
    <form action="update.php" method="post" autocomplete="off">
        <input type="hidden" name="no_booking" value="<?php echo $no_booking; ?>">

        <label for="tgl_booking">Tgl Booking:</label>
        <input type="text" name="tgl_booking" id="tgl_booking" value="<?php echo $tgl_booking; ?>" required>

        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="<?php echo $alamat; ?>" required>

        <label for="no_hp">No HP:</label>
        <input type="text" name="no_hp" id="no_hp" value="<?php echo $no_hp; ?>" required>

        <label for="no_polisi">No Polisi:</label>
        <input type="text" name="no_polisi" id="no_polisi" value="<?php echo $no_polisi; ?>" required>

        <label for="merk">Merk:</label>
        <input type="text" name="merk" id="merk" value="<?php echo $merk; ?>" required>

        <label for="keluhan_pelanggan">Keluhan Pelanggan:</label>
        <input type="text" name="keluhan_pelanggan" id="keluhan_pelanggan" value="<?php echo $keluhan_pelanggan; ?>" required>

        <label for="pengantian_sparepart">Pengantian Sparepart:</label>
        <input type="text" name="pengantian_sparepart" id="pengantian_sparepart" value="<?php echo $pengantian_sparepart; ?>" required>

        <label for="estimasi_biaya">Estimasi Biaya:</label>
        <input type="text" name="estimasi_biaya" id="estimasi_biaya" value="<?php echo $estimasi_biaya; ?>" required>

        <input type="submit" value="Update Booking">
    </form>
</body>
</html>
