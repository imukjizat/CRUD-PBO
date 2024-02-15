<?php
require_once '../db.php'; // Sesuaikan path ke db.php jika perlu
require_once '../classes/Booking.php';

if(isset($_GET['no_booking'])) {
    $no_booking = $_GET['no_booking'];

    $booking = new Booking($db); // Menggunakan $db dari db.php
    $booking->no_booking = $no_booking;

    if($booking->delete()) {
        header("Location: ../index.php");
    } else {
        echo "Error: Delete Gagal";
    }
} else {
    echo "Error: Tidak Ada Data";
}
