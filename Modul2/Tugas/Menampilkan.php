<?php
require_once "Pengumuman.php"; // Mengimpor kelas Pengumuman

$pengumuman = new Pengumuman();
$stmt = $pengumuman->getAll(); // Mengambil semua pengumuman dari database

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengumuman Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Daftar Pengumuman</h2>
        <a href="Tambah.php" class="btn btn-primary mb-3">Tambah Pengumuman</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['judul']; ?></td>
                        <td><?php echo substr($row['deskripsi'], 0, 100) . '...'; ?></td> <!-- Menampilkan deskripsi singkat -->
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo isset($row['status']) ? ucfirst($row['status']) : 'Tidak ada status'; ?></td>

                        <td>
                            <a href="Edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="Hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>