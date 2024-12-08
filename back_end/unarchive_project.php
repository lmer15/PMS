<?php
require_once('db.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

if (!isset($_SESSION['ad_ID'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['projectId']) || empty($data['projectId'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid or missing project ID.']);
    exit;
}

$projectId = $data['projectId'];

$query = "UPDATE projects SET status = 'Ongoing' WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database query preparation failed.']);
    exit;
}

mysqli_stmt_bind_param($stmt, 'i', $projectId);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo json_encode(['success' => true, 'message' => 'Project unarchived successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'No changes were made. Project might already be active.']);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
