<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Daftar Berita</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <a href="<?= site_url('/admin/berita/create') ?>" class="btn btn-primary mb-3">Tambah Berita</a>
        <a href="<?php echo base_url('/logout') ?>" class="btn btn-danger mb-3">Logout</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Penulis</th>
                    <th>Jadwal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($berita)): ?>
                    <tr>
                        <td colspan="6" class="text-center">No berita available</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($berita as $b): ?>
                        <tr>
                            <td><?= $b['id'] ?></td>
                            <td><?= $b['judul'] ?></td>
                            <td><?= $b['deskripsi'] ?></td>
                            <td><?= $b['penulis'] ?></td>
                            <td><?= $b['jadwal'] ?></td>
                            <td>
                                <a href="<?= site_url('/admin/berita/edit/' . $b['id']) ?>" class="btn btn-warning">Edit</a>
                                <a href="<?= site_url('/admin/berita/delete/' . $b['id']) ?>" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>