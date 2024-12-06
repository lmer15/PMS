<?php
include_once "db.php";

// Get the project ID from the request
$projectId = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete project from the database
$sql = "DELETE FROM projects WHERE id = $projectId";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error deleting project: ' . $conn->error]);
}

// Close the connection
$conn->close();
?>
