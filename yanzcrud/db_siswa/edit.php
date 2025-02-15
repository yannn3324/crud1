<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM siswa WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $umur = $_POST['umur'];

    $conn->query("UPDATE siswa SET nama='$nama', kelas='$kelas', umur='$umur' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Siswa</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" value="<?= $row['kelas'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Umur</label>
                <input type="number" name="umur" class="form-control" value="<?= $row['umur'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
