<?php
require_once "Pengumuman.php"; // Mengimpor kelas Pengumuman

$pengumuman = new Pengumuman();

if (isset($_GET["id"])) {
    $pengumuman->id = $_GET["id"]; // Mengambil ID pengumuman dari URL
    if ($pengumuman->delete()) {
        header("Location: Menampilkan.php"); // Redirect ke halaman daftar pengumuman
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus pengumuman.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>ID pengumuman tidak diberikan!</div>";
}
