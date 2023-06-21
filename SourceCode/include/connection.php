<?php
// Configuration file (e.g., config.php)
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'file_management';

// Create a new connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check the connection
if (!$conn) {
    // Handle the error gracefully (e.g., log error, display a user-friendly message)
    die("Connection error: " . mysqli_connect_error());
}
?>
