<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM makanan WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    $conn->query("UPDATE makanan SET nama='$nama', kategori='$kategori', harga='$harga' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Makanan</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Makanan</label>
                <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?= $row['kategori'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="<?= $row['harga'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
