<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Data Mahasiswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    .table th,
    .table td {
      vertical-align: middle;
    }
  </style>
</head>

<body>

  <div class="container my-5">
    <div class="card p-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Data Mahasiswa</h3>
        <a href="/mahasiswa/create" class="btn btn-primary">+ Tambah Mahasiswa</a>
      </div>

      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Email</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($mahasiswa as $mhs): ?>
              <tr>
                <td><?= $mhs['id'] ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['email'] ?></td>
                <td class="text-center">
                  <a href="/mahasiswa/edit/<?= esc($mhs['id']) ?>" class="btn btn-sm btn-warning me-2">Edit</a>
                  <form action="/mahasiswa/delete/<?= esc($mhs['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa bernama <?= esc($mhs['nama']) ?>?');">
                    <input type="hidden" name="_method" value="POST">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (opsional, untuk komponen interaktif) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>