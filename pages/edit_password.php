<?php
session_start(); 
include_once __DIR__ . '/../systems/connectdb.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'];
    $new_password = md5($_POST['new_password']);
    $sql = "UPDATE admins SET password = :password WHERE admin_id = :admin_id";
    $stmt = db()->prepare($sql);
    $stmt->bindParam(':password', $new_password);
    $stmt->bindParam(':admin_id', $admin_id);

    if ($stmt->execute()) {
        echo "<script>alert('Password berhasil diubah!'); window.location.href='manage_admin.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah password!'); window.location.href='manage_admin.php';</script>";
    }
}
?>
