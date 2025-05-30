<!DOCTYPE html>
<html lang="id">

<head>
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-3">
    <h2 class="mb-4">Edit Data Mahasiswa</h2>

    <?php if (session()->getFlashdata('validation')): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach (session()->getFlashdata('validation')->getErrors() as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="/mahasiswa/update/<?= esc($mahasiswa['id']); ?>" method="post">
      <input type="hidden" name="_method" value="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= old('nama', $mahasiswa['nama'] ?? '') ?>" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= old('email', $mahasiswa['email'] ?? '') ?>" required>
      </div>

      <button type="submit" class="btn btn-success">Update Data</button>
      <a href="/mahasiswa" class="btn btn-secondary">Batal</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>