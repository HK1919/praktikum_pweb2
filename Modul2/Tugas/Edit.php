<?php
require_once "Pengumuman.php"; // Mengimpor kelas Pengumuman

// Jika ID pengumuman diberikan melalui URL
if (isset($_GET["id"])) {
    $pengumuman = new Pengumuman();
    $pengumuman->id = $_GET["id"];
    $stmt = $pengumuman->getById(); // Mengambil data pengumuman berdasarkan ID
    $data = $stmt->fetch(PDO::FETCH_ASSOC); // Mengambil data sebagai array

    // Jika data tidak ditemukan
    if (!$data) {
        echo "<div class='alert alert-danger'>Pengumuman tidak ditemukan!</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-danger'>ID pengumuman tidak diberikan!</div>";
    exit;
}

// Proses saat formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pengumuman->judul = $_POST["judul"];
    $pengumuman->deskripsi = $_POST["deskripsi"];
    $pengumuman->status = $_POST["status"];

    if ($pengumuman->update()) {
        echo "<div class='alert alert-success'>Pengumuman berhasil diperbarui!</div>";
        header("Location: latihan_02_06.php"); // Redirect setelah berhasil
    } else {
        echo "<div class='alert alert-danger'>Gagal memperbarui pengumuman.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Pengumuman</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Pengumuman</label>
                <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Pengumuman</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required><?php echo $data['deskripsi']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="aktif" <?php echo ($data['status'] == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                    <option value="non-aktif" <?php echo ($data['status'] == 'non-aktif') ? 'selected' : ''; ?>>Non-Aktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Perbarui Pengumuman</button>
            <a href="Menampilkan.php" class="btn btn-secondary">Kembali ke Daftar Pengumuman</a>
        </form>
    </div>
</body>

</html>