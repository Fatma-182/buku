<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu-box {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            gap: 10px;
        }
        .menu-icon {
            font-size: 1.5rem;
        }
        @media (max-width: 768px) {
            .menu-box {
                height: auto;
                padding: 1rem;
                flex-direction: column;
            }
        }
    </style>
</head>
<body class="container py-5">

    <div class="text-end mb-3">
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>

    <h2>Selamat datang, <span class="text-primary"><?= htmlspecialchars($username) ?></span>!</h2>
    <p class="lead">Anda berada di halaman admin Buku Tamu.</p>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mt-4">

        <div class="col">
            <a href="index.php" class="btn btn-outline-primary w-100 menu-box">
                <span class="menu-icon">📋</span> Lihat Daftar Tamu
            </a>
        </div>

        <div class="col">
            <a href="laporan.php" class="btn btn-outline-info w-100 menu-box">
                <span class="menu-icon">📊</span> Laporan
            </a>
        </div>

        <div class="col">
            <a href="pengaturan.php" class="btn btn-outline-warning w-100 menu-box">
                <span class="menu-icon">⚙️</span> Pengaturan Sistem
            </a>
        </div>

    </div>

</body>
</html>
