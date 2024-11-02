<?php
include_once __DIR__ . '/../connectdb.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $stmt = db()->prepare("SELECT * FROM admins WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['admin_id'] = $user['admin_id'];
        header("Location: ../../pages/dashboard.php");
        exit();
    } else {
        header("Location: ../../index.php?error=Email atau password salah!");
        exit();
    }
}
?>
