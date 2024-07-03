<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = intval($_POST['status']);
    $sql = "UPDATE state SET status = $status WHERE id = 1"; // Assuming you have a table with a single row for the status
    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT status FROM state WHERE id = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['status' => $row['status']]);
    } else {
        echo json_encode(['status' => 0]);
    }
}

$conn->close();
?>
