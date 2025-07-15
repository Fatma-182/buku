<?php
// Aktifkan error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include '../config/database.php';

// Ambil filter dari form (jika ada)
$cari     = isset($_GET['cari']) ? trim($_GET['cari']) : '';
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';

// Query dasar
$sql = "SELECT * FROM tamu WHERE 1";

// Filter cari nama / keperluan
if (!empty($cari)) {
    $cari_esc = $conn->real_escape_string($cari);
    $sql .= " AND (nama LIKE '%$cari_esc%' OR keperluan LIKE '%$cari_esc%')";
}

// Filter tanggal masuk tunggal
if (!empty($tanggal)) {
    $sql .= " AND DATE(waktu_masuk) = '$tanggal'";
}

$sql .= " ORDER BY waktu_masuk DESC";

$result = $conn->query($sql);
if (!$result) die("Query error: " . $conn->error);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Daftar Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Tamu</h2>
        <a href="dashboard.php" class="btn btn-secondary">← Kembali ke Dashboard</a>
    </div>

    <!-- Form Filter -->
    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-6">
            <input type="text" name="cari" class="form-control" placeholder="Cari nama / keperluan" value="<?= htmlspecialchars($cari) ?>">
        </div>
        <div class="col-md-4">
            <input type="date" name="tanggal" class="form-control" value="<?= htmlspecialchars($tanggal) ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No WA</th>
                <th>Lokasi</th>
                <th>Keperluan</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['no_wa']) ?></td>
                <td><?= htmlspecialchars($row['lokasi']) ?></td>
                <td><?= htmlspecialchars($row['keperluan']) ?></td>
                <td><?= $row['waktu_masuk'] ?></td>
                <td><?= $row['waktu_keluar'] ?: '<em>Belum Keluar</em>' ?></td>
                <td>
                    <?php if (is_null($row['waktu_keluar'])): ?>
                        <a href="keluar.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning mb-1">Tandai Keluar</a>
                    <?php else: ?>
                        <span class="text-success">Selesai</span>
                    <?php endif; ?>
                    <br>
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Hapus tamu ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="8" class="text-center">Tidak ada data ditemukan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
