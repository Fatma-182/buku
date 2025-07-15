<?php
session_start();
include '../config/database.php';

// Ambil pengaturan aktif
$query = $conn->query("SELECT * FROM pengaturan LIMIT 1");
$pengaturan = $query->fetch_assoc();

// Tangani form POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_sistem = $_POST['nama_sistem'];
    $zona_waktu  = $_POST['zona_waktu'];
    $mode        = $_POST['mode'];
    $catatan     = $_POST['catatan'];

    $stmt = $conn->prepare("UPDATE pengaturan SET nama_sistem = ?, zona_waktu = ?, mode = ?, catatan = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nama_sistem, $zona_waktu, $mode, $catatan, $pengaturan['id']);
    $stmt->execute();

    header("Location: pengaturan.php?berhasil=1");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengaturan Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 2rem; }
    </style>
</head>
<body class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>⚙️ Pengaturan Sistem</h2>
        <a href="dashboard.php" class="btn btn-secondary">← Kembali</a>
    </div>

    <?php if (isset($_GET['berhasil'])): ?>
        <div class="alert alert-success">Pengaturan berhasil disimpan!</div>
    <?php endif; ?>

    <form method="POST" class="border p-4 rounded shadow-sm bg-light">
        <div class="mb-3">
            <label class="form-label">Nama Sistem</label>
            <input type="text" name="nama_sistem" class="form-control" value="<?= htmlspecialchars($pengaturan['nama_sistem']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Zona Waktu</label>
            <select name="zona_waktu" class="form-select">
                <option value="Asia/Jakarta"  <?= $pengaturan['zona_waktu'] == 'Asia/Jakarta' ? 'selected' : '' ?>>WIB - Jakarta</option>
                <option value="Asia/Makassar"<?= $pengaturan['zona_waktu'] == 'Asia/Makassar' ? 'selected' : '' ?>>WITA - Makassar</option>
                <option value="Asia/Jayapura"<?= $pengaturan['zona_waktu'] == 'Asia/Jayapura' ? 'selected' : '' ?>>WIT - Jayapura</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Mode Sistem</label>
            <select name="mode" class="form-select">
                <option value="aktif"     <?= $pengaturan['mode'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="nonaktif"  <?= $pengaturan['mode'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Catatan / Pengumuman</label>
            <textarea name="catatan" class="form-control" rows="3"><?= htmlspecialchars($pengaturan['catatan']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">💾 Simpan Pengaturan</butto
