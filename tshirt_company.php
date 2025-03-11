<?php
// Database configuration
$host = 'localhost'; // Replace with your database host
$dbname = 'tshirt_company'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    address VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
?>