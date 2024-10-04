edit.php

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Edit Berita</h1>

        <form action="<?= site_url('/admin/berita/update/' . $berita['id']) ?>" method="post">
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="text" name="gambar" class="form-control" value="<?= $berita['gambar'] ?>" required>
            </div>
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" class="form-control" value="<?= $berita['judul'] ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" required><?= $berita['deskripsi'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" name="penulis" class="form-control" value="<?= $berita['penulis'] ?>" required>
            </div>
            <div class="form-group">
                <label for="jadwal">Jadwal:</label>
                <input type="date" name="jadwal" class="form-control" value="<?= $berita['jadwal'] ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="<?= site_url('/admin') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>