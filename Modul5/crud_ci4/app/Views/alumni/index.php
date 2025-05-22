<!DOCTYPE html>
<html lang="id">

<head>
  <title>Data Alumni</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container">
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <h2 class="my-3">Data Alumni</h2>
  <a href="/alumni/create" class="btn btn-primary mb-3">Tambah Alumni</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Angkatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($alumni as $item): ?>
        <tr>
          <td><?= esc($item['id']) ?></td>
          <td><?= esc($item['nim']) ?></td>
          <td><?= esc($item['nama']) ?></td>
          <td><?= esc($item['jurusan']) ?></td>
          <td><?= esc($item['angkatan']) ?></td>
          <td>
            <a href="/alumni/edit/<?= esc($item['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="/alumni/delete/<?= esc($item['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>