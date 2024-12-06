<?php
require_once('db.php');
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

// Check if the user is logged in
if (!isset($_SESSION['ad_ID'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit;
}

// Get the project ID from the request
$data = json_decode(file_get_contents('php://input'), true);

// Check if project ID is valid
if (!isset($data['projectId']) || empty($data['projectId'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid or missing project ID.']);
    exit;
}

$projectId = $data['projectId'];

// Prepare the SQL query to update the project status
$query = "UPDATE projects SET status = 'archived' WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);

// Check if the query preparation was successful
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database query preparation failed.']);
    exit;
}

mysqli_stmt_bind_param($stmt, 'i', $projectId);
mysqli_stmt_execute($stmt);

// Check if the update was successful
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo json_encode(['success' => true, 'message' => 'Project archived successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'No changes were made. Project might already be archived.']);
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
