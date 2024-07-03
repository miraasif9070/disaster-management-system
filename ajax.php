<?php
include 'connection.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['audio'])) {
        $audio = $_FILES['audio'];
        $uploadDirectory = 'uploads/';
        $filePath = $uploadDirectory . uniqid() . '.wav';

        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        if (move_uploaded_file($audio['tmp_name'], $filePath)) {
            // Save file path to database
            $stmt = $conn->prepare("INSERT INTO messages (message) VALUES (?)");
            $stmt->bind_param("s", $filePath);
            if ($stmt->execute()) {
                echo 'Audio uploaded and path saved successfully.';
            } else {
                echo 'Failed to save audio path to database.';
            }
            $stmt->close();
        } else {
            echo 'Failed to upload audio.';
        }
    } else {
        echo 'No audio file received.';
    }
} else {
    echo 'Invalid request method.';
}

$conn->close();
?>
