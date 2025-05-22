<!DOCTYPE html>
<html lang="id">

<head>
  <title>Edit Alumni</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4">
  <h2 class="mb-4">Edit Alumni</h2>
  <form action="/alumni/update/<?= esc($alumni['id']) ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="POST">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= esc($alumni['nama']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Jurusan</label>
      <input type="text" name="jurusan" class="form-control" value="<?= esc($alumni['jurusan']) ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Angkatan (Tahun)</label>
      <input type="number" name="angkatan" class="form-control" value="<?= esc($alumni['angkatan']) ?>" min="1900" max="2099">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
  </form>
</body>

</html>