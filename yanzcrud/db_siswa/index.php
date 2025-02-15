<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Data Siswa</h2>
        <a href="add.php" class="btn btn-success mb-3">Tambah Siswa</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Umur</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM siswa");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['kelas']}</td>
                            <td>{$row['umur']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
