<?php
require_once '../db.php';
require_once '../classes/Booking.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->connect();

    $booking = new Booking($db);

    // Set properties
    $booking->no_booking = $_POST['no_booking'];
    $booking->tgl_booking = $_POST['tgl_booking'];
    $booking->nama_pelanggan = $_POST['nama_pelanggan'];
    $booking->alamat = $_POST['alamat'];
    $booking->no_hp = $_POST['no_hp'];
    $booking->no_polisi = $_POST['no_polisi'];
    $booking->merk = $_POST['merk'];
    $booking->keluhan_pelanggan = $_POST['keluhan_pelanggan'];
    $booking->pengantian_sparepart = $_POST['pengantian_sparepart'];
    $booking->estimasi_biaya = $_POST['estimasi_biaya'];

    // Check if update is successful
    if ($booking->update()) {
        echo "<script>alert('Booking berhasil diupdate'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate booking'); window.location.href='../index.php';</script>";
    }
}

?>
