<?php
// Database configuration
$host = 'localhost'; // Replace with your database host
$dbname = 'tshirt_company'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

// Create a connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; // For testing purposes
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>