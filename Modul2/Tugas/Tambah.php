<?php
require_once "Pengumuman.php"; // Mengimpor kelas Pengumuman

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pengumuman = new Pengumuman();
    $pengumuman->judul = $_POST["judul"];
    $pengumuman->deskripsi = $_POST["deskripsi"];
    $pengumuman->status = $_POST["status"];

    if ($pengumuman->add()) {
        echo "<div class='alert alert-success'>Pengumuman berhasil ditambahkan!</div>";
        header("Location: Menampilkan.php"); // Setelah berhasil, redirect ke daftar pengumuman
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan pengumuman.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Tambah Pengumuman</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Pengumuman</label>
                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul pengumuman" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Pengumuman</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi pengumuman" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="aktif">Aktif</option>
                    <option value="non-aktif">Non-Aktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan Pengumuman</button>
            <a href="latihan_02_06.php" class="btn btn-secondary">Kembali ke Daftar Pengumuman</a>
        </form>
    </div>
</body>

</html>