<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama      = $_POST['nama'] ?? '';
    $email     = $_POST['email'] ?? '';
    $no_wa     = $_POST['no_wa'] ?? '';
    $lokasi = $_POST['lokasi'] ?? '';
    $keperluan = $_POST['keperluan'] ?? '';
    // Validasi wajib
    if (empty($nama)) {
        die("Nama wajib diisi.");
    }

    $sql = "INSERT INTO tamu (nama, email, no_wa, lokasi, keperluan) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $nama, $email, $no_wa, $lokasi, $keperluan);
    $stmt->execute();

    $sukses = "Terima kasih, data Anda telah tercatat!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="mb-4">Form Buku Tamu</h2>

    <?php if (!empty($sukses)): ?>
        <div class="alert alert-success"><?= $sukses ?></div>
    <?php endif; ?>

    <form method="POST" class="border p-4 rounded shadow-sm">
        <div class="mb-3">
            <label>Nama Lengkap <span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>No. WA</label>
            <input type="text" name="no_wa" class="form-control">
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>
        <div class="mb-3">
            <label>Keperluan</label>
            <input type="text" name="keperluan" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</body>
</html>
