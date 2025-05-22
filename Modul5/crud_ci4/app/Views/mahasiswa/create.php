<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tambah Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-4">Tambah Mahasiswa</h2>

    <?php if (session()->getFlashdata('validation')): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach (session()->getFlashdata('validation')->getErrors() as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="/mahasiswa/store" method="post">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= old('nama', $mahasiswa['nama'] ?? '') ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= old('email', $mahasiswa['email'] ?? '') ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
</body>

</html>