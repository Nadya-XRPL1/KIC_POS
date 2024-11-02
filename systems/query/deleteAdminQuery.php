<?php
include_once __DIR__ . '/../connectdb.php';

if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];

    $stmt = db()->prepare("DELETE FROM admins WHERE admin_id = :admin_id");
    $stmt->bindParam(':admin_id', $admin_id);

    if ($stmt->execute()) {
        
        header("Location: ../../pages/manage_admin.php?message=Admin berhasil dihapus.");
        exit();
    } else {
        header("Location: ../../pages/manage_admin.php?message=Gagal menghapus admin.");
        exit();
    }
} else {
    header("Location: ../../pages/manage_admin.php");
    exit();
}
?>
