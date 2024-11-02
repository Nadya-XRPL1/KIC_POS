<?php
include_once __DIR__ . '/../connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); 
    $sql = "INSERT INTO admins (email, password) VALUES (:email, :password)";

    try {
        
        $db = db(); 
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {

            header("Location: ../../pages/view_admins.php?success=1");
            exit();
        } else {
            echo "Gagal menambahkan admin.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
