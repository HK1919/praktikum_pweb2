<?php
require_once "../latihan_02_04.php"; // Menghubungkan kelas Database

class Pengumuman
{
    private $conn;
    private $table_name = "pengumuman";

    public $id;
    public $judul;
    public $deskripsi;
    public $tanggal;
    public $status;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->conn = $db;
    }

    // Menambahkan pengumuman
    public function add()
    {
        $query = "INSERT INTO " . $this->table_name . " (judul, deskripsi, status) 
        VALUES (:judul, :deskripsi, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":judul", $this->judul);
        $stmt->bindParam(":deskripsi", $this->deskripsi);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    // Mengambil semua pengumuman
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY tanggal DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Mengambil pengumuman berdasarkan ID
    public function getById()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    // Mengupdate pengumuman
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET judul = :judul, deskripsi = :deskripsi, status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":judul", $this->judul);
        $stmt->bindParam(":deskripsi", $this->deskripsi);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    // Menghapus pengumuman
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
