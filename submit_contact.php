<?php
// Include the database connection file
include 'db.php';

// Get form data
$name = $_POST['address'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert data into the database
try {
    $sql = "INSERT INTO contacts (address email, message) VALUES (:name, :email, :message)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    echo "Thank you for contacting us! We will get back to you soon.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>