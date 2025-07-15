<?php include '../config/database.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $instansi = $_POST['instansi'];
    $keperluan = $_POST['keperluan'];

    $stmt = $conn->prepare("INSERT INTO tamu (nama, instansi, keperluan) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $instansi, $keperluan);
    $stmt->execute();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2 class="mb-4">Form Tambah Tamu</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Instansi:</label>
            <input type="text" name="instansi" class="form-control">
        </div>
        <div class="mb-3">
            <label>Keperluan:</label>
            <textarea name="keperluan" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
