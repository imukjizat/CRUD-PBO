<?php

$database = new Database(); // Assuming you have a Database class for database connection
$db = $database->connect();
$booking = new Booking($db);

class Booking {
    // Database connection and table name
    private $conn;
    private $table_name = "bookings";

    // Object properties
    public $no_booking;
    public $tgl_booking;
    public $nama_pelanggan;
    public $alamat;
    public $no_hp;
    public $no_polisi;
    public $merk;
    public $keluhan_pelanggan;
    public $pengantian_sparepart;
    public $estimasi_biaya;

    // Constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all bookings
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Create a new booking
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET tgl_booking=:tgl_booking, 
                      nama_pelanggan=:nama_pelanggan, 
                      alamat=:alamat, 
                      no_hp=:no_hp, 
                      no_polisi=:no_polisi, 
                      merk=:merk, 
                      keluhan_pelanggan=:keluhan_pelanggan, 
                      pengantian_sparepart=:pengantian_sparepart, 
                      estimasi_biaya=:estimasi_biaya";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":tgl_booking", $this->tgl_booking);
        $stmt->bindParam(":nama_pelanggan", $this->nama_pelanggan);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":no_hp", $this->no_hp);
        $stmt->bindParam(":no_polisi", $this->no_polisi);
        $stmt->bindParam(":merk", $this->merk);
        $stmt->bindParam(":keluhan_pelanggan", $this->keluhan_pelanggan);
        $stmt->bindParam(":pengantian_sparepart", $this->pengantian_sparepart);
        $stmt->bindParam(":estimasi_biaya", $this->estimasi_biaya);

        return $stmt->execute();
    }

    // Update a booking
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET tgl_booking=:tgl_booking, 
                      nama_pelanggan=:nama_pelanggan, 
                      alamat=:alamat, 
                      no_hp=:no_hp, 
                      no_polisi=:no_polisi, 
                      merk=:merk, 
                      keluhan_pelanggan=:keluhan_pelanggan, 
                      pengantian_sparepart=:pengantian_sparepart, 
                      estimasi_biaya=:estimasi_biaya 
                  WHERE no_booking = :no_booking";

        $stmt = $this->conn->prepare($query);

        $this->sanitize();

        if (!empty($this->tgl_booking)) {
            $stmt->bindParam(':tgl_booking', $this->tgl_booking);
        } else {
            $stmt->bindValue(':tgl_booking', null, PDO::PARAM_NULL);
        }

        $stmt->bindParam(':tgl_booking', $this->tgl_booking);
        $stmt->bindParam(':nama_pelanggan', $this->nama_pelanggan);
        $stmt->bindParam(':alamat', $this->alamat);
        $stmt->bindParam(':no_hp', $this->no_hp);
        $stmt->bindParam(':no_polisi', $this->no_polisi);
        $stmt->bindParam(':merk', $this->merk);
        $stmt->bindParam(':keluhan_pelanggan', $this->keluhan_pelanggan);
        $stmt->bindParam(':pengantian_sparepart', $this->pengantian_sparepart);
        $stmt->bindParam(':estimasi_biaya', $this->estimasi_biaya);
        $stmt->bindParam(':no_booking', $this->no_booking);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Delete a booking
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE no_booking = :no_booking";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":no_booking", $this->no_booking);

        return $stmt->execute();
    }

    // Read one booking
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE no_booking = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->no_booking);
        $stmt->execute();

        return $stmt;
    }

    // Sanitize data
    private function sanitize() {
        $this->tgl_booking = htmlspecialchars(strip_tags($this->tgl_booking ?? ''));
        $this->nama_pelanggan = htmlspecialchars(strip_tags($this->nama_pelanggan ?? ''));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat ?? ''));
        $this->no_hp = htmlspecialchars(strip_tags($this->no_hp ?? ''));
        $this->no_polisi = htmlspecialchars(strip_tags($this->no_polisi ?? ''));
        $this->merk = htmlspecialchars(strip_tags($this->merk ?? ''));
        $this->keluhan_pelanggan = htmlspecialchars(strip_tags($this->keluhan_pelanggan ?? ''));
        $this->pengantian_sparepart = htmlspecialchars(strip_tags($this->pengantian_sparepart ?? ''));
        $this->estimasi_biaya = htmlspecialchars(strip_tags($this->estimasi_biaya ?? ''));
        $this->no_booking = htmlspecialchars(strip_tags($this->no_booking ?? ''));
    }
}
?>
