<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Booking Baru</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Tambah Booking Bengkel</h1>
    <form action="operations/create.php" method="post" autocomplete="off">
        <label for="tgl_booking">Tanggal Booking:</label>
        <input type="date" id="tgl_booking" name="tgl_booking" required>

        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>

        <label for="no_hp">No. HP:</label>
        <input type="text" id="no_hp" name="no_hp" required>

        <label for="no_polisi">No. Polisi:</label>
        <input type="text" id="no_polisi" name="no_polisi" required>

        <label for="merk">Merk:</label>
        <input type="text" id="merk" name="merk" required>

        <label for="keluhan_pelanggan">Keluhan Pelanggan:</label>
        <textarea id="keluhan_pelanggan" name="keluhan_pelanggan" required></textarea>

        <label for="pengantian_sparepart">Pengantian Sparepart:</label>
        <input type="text" id="pengantian_sparepart" name="pengantian_sparepart" required>

        <label for="estimasi_biaya">Estimasi Biaya:</label>
        <input type="number" id="estimasi_biaya" name="estimasi_biaya" required>

        <input type="submit" value="Tambah Booking">
    </form>
</body>
</html>
