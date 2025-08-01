<?php
$host = "localhost";  // Localhost for local DB
$port = "5432";       // Default PostgreSQL port
$dbname = "traveltales";  // Your local DB name
$user = "postgres";       // Default local user
$pass = "";  // Replace with your local PostgreSQL password

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname;options='--client_encoding=UTF8'",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>