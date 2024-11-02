<?php 
require "config.php";

function connection() {
    try {
        $serverAddress = DB_HOST;
        $databaseName = DB_DATABASE;
        $username = DB_USERNAME;
        $password = DB_PASSWORD;
        $database = new PDO(
            "mysql:host={$serverAddress};dbname={$databaseName}",
            $username,
            $password
        );
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $database;
    } catch (\Exception $e) {
        die("Gagal koneksi => " . $e->getMessage());
    }
}

function db() {
    return connection(); 
}
