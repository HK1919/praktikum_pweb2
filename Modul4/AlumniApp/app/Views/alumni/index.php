<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .action-buttons form {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
</head>

<body class="container mt-4">
    <h2 class="my-3">Data Alumni</h2>

    <?php if (session()->getFlashdata('status')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('status') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <a href="/alumni/create" class="btn btn-primary mb-3">Tambah Alumni</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($alumni) && is_array($alumni)): ?>
                <?php foreach ($alumni as $alumnus): ?>
                    <tr>
                        <td><?= esc($alumnus['id']) ?></td>
                        <td><?= esc($alumnus['nama']) ?></td>
                        <td><?= esc($alumnus['email']) ?></td>
                        <td><?= esc($alumnus['jurusan']) ?></td>
                        <td><?= esc($alumnus['angkatan']) ?></td>
                        <td class="action-buttons">
                            <a href="/alumni/edit/<?= esc($alumnus['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/alumni/delete/<?= esc($alumnus['id']) ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE"> <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data alumni.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>