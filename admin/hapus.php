<?php
include '../config/database.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM tamu WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: index.php?msg=deleted");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
