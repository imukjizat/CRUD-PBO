<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Booking Bengkel</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body>
    <h1>Daftar Booking Bengkel</h1>
    <a href="create_booking.php" class="add-booking-link">Tambah Booking Baru</a>
    <table>
        <thead>
            <tr>
                <th>No. Booking</th>
                <th>Tgl. Booking</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>No. Polisi</th>
                <th>Merk</th>
                <th>Keluhan Pelanggan</th>
                <th>Pengantian Sparepart</th>
                <th>Estimasi Biaya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require_once 'db.php';
        require_once 'classes/Booking.php';
        
        $database = new Database();
        $db = $database->connect();
        $booking = new Booking($db);
        
        $result = $booking->read();

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $row['no_booking'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['tgl_booking'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['nama_pelanggan'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['alamat'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['no_hp'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['no_polisi'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['merk'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['keluhan_pelanggan'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['pengantian_sparepart'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['estimasi_biaya'] . "</td>";
                echo "<td style='text-align: center;'><a href='operations/edit.php?no_booking=" . $row['no_booking'] . "' class='button edit-button' onclick='return confirmEdit()'><img src='assets/css/pen.png' alt='Edit'></a> <a href='operations/delete.php?no_booking=" . $row['no_booking'] . "' class='button delete-button' onclick='return confirmDelete()'><img src='assets/css/delete.png' alt='Delete'></a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11' style='text-align: left;'>Belum ada data booking</td></tr>";
        }
        
            ?>
        </tbody>
    </table>
</body>
</html>
