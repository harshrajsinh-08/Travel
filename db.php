<?php
$dbname = "traveltales";
$user = "postgres";
$pass = "";

// First, try using Unix socket (default on macOS)
$conn = @pg_connect("dbname=$dbname user=$user password=$pass");

if (!$conn) {
    // If Unix socket fails, try TCP on localhost:5432
    $conn = @pg_connect("host=localhost port=5432 dbname=$dbname user=$user password=$pass");
}

if (!$conn) {
    die("Database connection failed: " . pg_last_error());
}
?>