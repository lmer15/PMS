<?php
include_once "db.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get all projects
$sql = "SELECT id, owner, name, category, description, start_date, finish_date, access_code, color, days_left, status FROM projects ORDER BY start_date DESC";
$result = $conn->query($sql);

// Fetch the projects and return them as JSON
$projects = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}

// Close the connection
$conn->close();

// Return the projects as JSON
echo json_encode($projects);
?>
