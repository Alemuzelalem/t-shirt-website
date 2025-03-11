<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tshirt_store";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'];
$address = $data['address'];
$cart = $data['cart'];

$sql = "SELECT gift_orders FROM contacts WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Order_gift = $row['Order_gift'];

    if ($Order_gift >= 2) {
        echo json_encode(['success' => false, 'message' => 'You have reached the maximum number of gift orders.']);
        exit;
    } else {
        $Order_gift++;
        $sql = "UPDATE contacts SET Order_gift = $Order_gift WHERE email = '$email'";
        $conn->query($sql);
    }
} else {
    $sql = "INSERT INTO contacts (email, home_address, Order_gift) VALUES ('$email', '$address', 1)";
    $conn->query($sql);
}

echo json_encode(['success' => true]);

$conn->close();
?>