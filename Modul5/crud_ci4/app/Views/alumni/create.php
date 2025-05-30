<!DOCTYPE html>
<html lang="id">

<head>
  <title>Tambah Alumni</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4">
  <h2 class="mb-4">Tambah Alumni</h2>
  <form action="/alumni/store" method="post"> <?= csrf_field() ?>
    <div class="mb-3">
      <label class="form-label">NIM</label>
      <input type="text" name="nim" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Jurusan</label>
      <input type="text" name="jurusan" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Angkatan (Tahun)</label>
      <input type="number" name="angkatan" class="form-control" min="1900" max="2099">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</body>

</html>