<?php
require_once('db.php');
session_start();

header('Content-Type: application/json'); 

if (isset($_SESSION['ad_name']) && isset($_SESSION['ad_ID'])) {
    $name = $_SESSION['ad_name']; 
    $userId = $_SESSION['ad_ID'];
} else {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to join a project.']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);
$projectCode = $data['projectCode']; 

if (empty($projectCode) || strlen($projectCode) != 6) {
    echo json_encode(['success' => false, 'message' => 'Invalid project code']);
    exit();
}

$stmt = $conn->prepare("SELECT * FROM projects WHERE access_code = ?");
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit();
}

$stmt->bind_param("s", $projectCode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $project = $result->fetch_assoc();
    $projectId = $project['id'];
    $projectOwnerId = $project['owner']; 

    if ($userId == $projectOwnerId) {
        echo json_encode(['success' => false, 'message' => 'You cannot join your own project.']);
        exit();
    }

    $checkStmt = $conn->prepare("SELECT * FROM project_members WHERE user_id = ? AND project_id = ?");
    if (!$checkStmt) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
        exit();
    }

    $checkStmt->bind_param("ii", $userId, $projectId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'You have already joined this project.']);
        exit();
    }

    $insertStmt = $conn->prepare("INSERT INTO project_members (user_id, project_id) VALUES (?, ?)");
    if (!$insertStmt) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
        exit();
    }

    $insertStmt->bind_param("ii", $userId, $projectId);
    $insertStmt->execute();

    echo json_encode(['success' => true, 'message' => 'Joined successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid project code']);
}

$stmt->close();
$checkStmt->close();
$insertStmt->close();
$conn->close();
?>
