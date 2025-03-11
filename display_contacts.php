<?php
// Include the database connection file
include 'db.php';

// Fetch data from the database
try {
    $sql = "SELECT * FROM contacts ORDER BY created_at DESC";
    $stmt = $conn->query($sql);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Submissions</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Contact Submissions</h1>
  <table>
    <thead>
      <tr>
        <th>address</th>
         <th>Email</th>
        <th>Message</th>
        <th>Submitted At</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($contacts as $contact): ?>
        <tr>
          <td><?php echo $contact['address']; ?></td>
          <td><?php echo $contact['email']; ?></td>
          <td><?php echo $contact['message']; ?></td>
          <td><?php echo $contact['created_at']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>