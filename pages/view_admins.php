<?php
include_once __DIR__ . '/../systems/connectdb.php';

$sql = "SELECT * FROM admins";
$admins = db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Admin</title>
</head>
<body>
    <h2>Daftar Admin</h2>

    <?php if (isset($_GET['success'])): ?>
        <script>alert("Berhasil menambahkan admin.");</script>
    <?php endif; ?>

    <table border="1">
        <tr>
            <th>Admin ID</th>
            <th>Email</th>
        </tr>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?php echo htmlspecialchars($admin['admin_id']); ?></td>
                <td><?php echo htmlspecialchars($admin['email']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <br>
    <a href="add_admins.php">Tambah Admin Baru</a> <br> <br/>
    <a href="dashboard.php">Kembali Ke Halaman Utama</a> <br> <br/>
    <a href="manage_admin.php">Manage Admin</a>


</body>
</html>
