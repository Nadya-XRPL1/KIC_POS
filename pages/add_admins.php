<?php
include_once __DIR__ . '/../templates/header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Admin</title>
    
</head>
<body>
    <h2>Tambah Admin</h2>
    <form method="POST" action="../systems/query/addadminQuery.php">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Tambah Admin">
    </form>
</body>
</html>
