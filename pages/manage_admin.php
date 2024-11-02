<?php
session_start(); 
include_once __DIR__ . '/../systems/connectdb.php'; 
include_once __DIR__ . '/../templates/header.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit(); 
}

$admins = db()->query("SELECT * FROM admins")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admins</title>
    <link rel="stylesheet" href="../assets/js/css/style.css"> 
</head>
<body>
    <div class="container">
        <h1>Manage Admins</h1>

        <table>
            <thead>
                <tr>
                    <th>Admin ID</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td><?php echo $admin['admin_id']; ?></td>
                        <td><?php echo $admin['email']; ?></td>
                        <td>
                            <a href="delete_admin.php?id=<?php echo $admin['admin_id']; ?>">Hapus</a>
                            <button onclick="document.getElementById('editPassword<?php echo $admin['admin_id']; ?>').style.display='block'">Edit Password</button>

                            <div id="editPassword<?php echo $admin['admin_id']; ?>" style="display:none;">
                                <form action="edit_password.php" method="POST">
                                    <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id']; ?>">
                                    <label for="new_password">New Password:</label>
                                    <input type="password" name="new_password" required>
                                    <input type="submit" value="Update Password">
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
