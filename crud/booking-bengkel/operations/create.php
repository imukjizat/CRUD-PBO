<?php
require_once __DIR__ . '/../db.php'; 
require_once __DIR__ . '/../classes/Booking.php';

$database = new Database();
$db = $database->connect();
$booking = new Booking($db);

// Menangkap data dari form dan menyimpan ke properti objek
$booking->tgl_booking = $_POST['tgl_booking'];
$booking->nama_pelanggan = $_POST['nama_pelanggan'];
$booking->alamat = $_POST['alamat'];
$booking->no_hp = $_POST['no_hp'];
$booking->no_polisi = $_POST['no_polisi'];
$booking->merk = $_POST['merk'];
$booking->keluhan_pelanggan = $_POST['keluhan_pelanggan'];
$booking->pengantian_sparepart = $_POST['pengantian_sparepart'];
$booking->estimasi_biaya = $_POST['estimasi_biaya'];

if($booking->create()) {
    header("Location: ../index.php?bookingAdded");
} else {
    echo "<script>alert('Gagal membuat booking'); window.location.href='../index.php';</script>";
}
?>
