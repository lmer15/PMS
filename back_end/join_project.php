<?php
require_once('db.php');
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['ad_name']) || !isset($_SESSION['ad_ID'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to join a project.']);
    exit();
}

$name = $_SESSION['ad_name'];
$userId = $_SESSION['ad_ID'];

// Make sure data is being sent correctly in the request body
$data = json_decode(file_get_contents('php://input'), true);

// Check if projectCode exists in the request body
if (!isset($data['projectCode']) || empty($data['projectCode']) || strlen($data['projectCode']) != 6) {
    echo json_encode(['success' => false, 'message' => 'Invalid project code.']);
    exit();
}

$projectCode = $data['projectCode']; // Get the project code from the request

try {
    // Check if the project exists with the given code
    $stmt = $conn->prepare("SELECT * FROM projects WHERE access_code = ?");
    if (!$stmt) {
        throw new Exception('Database error: ' . $conn->error);
    }

    $stmt->bind_param("s", $projectCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid project code.']);
        exit();
    }

    // Fetch the project data
    $project = $result->fetch_assoc();
    $projectId = $project['id'];
    $projectOwnerId = $project['owner'];

    // Check if the user is trying to join their own project
    if ($userId == $projectOwnerId) {
        echo json_encode(['success' => false, 'message' => 'You cannot join your own project.']);
        exit();
    }

    // Check if the user is already a member of the project
    $checkStmt = $conn->prepare("SELECT * FROM project_members WHERE user_id = ? AND project_id = ?");
    if (!$checkStmt) {
        throw new Exception('Database error: ' . $conn->error);
    }
    $checkStmt->bind_param("ii", $userId, $projectId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'You are already a member of this project.']);
        exit();
    }

    // Add the user to the project
    $insertStmt = $conn->prepare("INSERT INTO project_members (user_id, project_id, status) VALUES (?, ?, 'active')");
    if (!$insertStmt) {
        throw new Exception('Database error: ' . $conn->error);
    }
    $insertStmt->bind_param("ii", $userId, $projectId);
    $insertStmt->execute();

    echo json_encode(['success' => true, 'message' => 'You have successfully joined the project.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} finally {
    if (isset($stmt)) $stmt->close();
    if (isset($checkStmt)) $checkStmt->close();
    if (isset($insertStmt)) $insertStmt->close();
    $conn->close();
}
?>
