<?php
session_start();
include '../config/database.php';

$query = $conn->query("SELECT 
    id,
    nama AS nama_lengkap, 
    waktu_masuk AS waktu_checkin, 
    waktu_keluar AS waktu_checkout,
    lokasi, 
    keperluan 
FROM tamu 
WHERE DATE(waktu_masuk) = CURDATE()");

if (!$query) {
    die("Query error: " . $conn->error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Aktivitas Tamu Hari Ini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 2rem; }
        h2 { margin-bottom: 2rem; }
        table { border-collapse: collapse; width: 100%; }
        th { background-color: #f8f9fa; }
        th, td { border: 1px solid #dee2e6; padding: 8px; text-align: left; }
    </style>
</head>
<body>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Laporan Aktivitas Tamu - <?= date('d M Y') ?></h2>
        <a href="dashboard.php" class="btn btn-secondary">← Kembali ke Dashboard</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Lokasi</th>
                <th>Keperluan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($query->num_rows > 0): ?>
            <?php while ($row = $query->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                <td><?= $row['waktu_checkin'] ?></td>
                <td><?= $row['waktu_checkout'] ?: '<span class="text-muted">Belum keluar</span>' ?></td>
                <td><?= htmlspecialchars($row['lokasi']) ?></td>
                <td><?= htmlspecialchars($row['keperluan']) ?></td>
                <td>
                    <?php if (!$row['waktu_checkout']): ?>
                        <a href="checkout.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Check Out</a>
                    <?php else: ?>
                        <span class="text-muted">Selesai</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center text-muted">Tidak ada data tamu hari ini.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
