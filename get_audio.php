<?php
include 'connection.php'; // Include database connection

$sql = "SELECT message FROM messages ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row['message']);
} else {
    echo json_encode(null);
}

$conn->close();
?>
