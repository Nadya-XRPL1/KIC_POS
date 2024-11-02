<?php
include_once __DIR__ . '/../systems/connectdb.php'; 
include_once __DIR__ . '/../templates/header.php';


try {
    $db = db(); 
    echo "";
} catch (Exception $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}


$adminCount = db()->query("SELECT COUNT(*) FROM admins")->fetchColumn();
$customerCount = db()->query("SELECT COUNT(*) FROM customers")->fetchColumn();
$productCount = db()->query("SELECT COUNT(*) FROM products")->fetchColumn();
$orderCount = db()->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$totalSales = db()->query("SELECT SUM(total_payment) FROM orders")->fetchColumn();
?>
