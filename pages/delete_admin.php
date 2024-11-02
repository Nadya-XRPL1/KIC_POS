<?php
session_start();
require_once __DIR__ . '/../systems/connectdb.php'; 
if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];
    $database = db(); 
    $query = "DELETE FROM admins WHERE admin_id = :admin_id";
    $statement = $database->prepare($query);
    $statement->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
    if ($statement->execute()) {
        echo "<script>
                alert('Admin berhasil dihapus!');
                window.location.href = 'manage_admin.php'; // Alihkan ke halaman daftar admin setelah penghapusan
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus admin!');
                window.location.href = 'manage_admin.php'; // Alihkan ke halaman daftar admin walaupun gagal
              </script>";
    }
} else {
    echo "<script>
            alert('ID Admin tidak ditemukan!');
            window.location.href = 'manage_admin.php';
          </script>";
}
?>
