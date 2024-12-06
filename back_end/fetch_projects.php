<?php
session_start();
require_once 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['ad_ID'])) {
    echo json_encode(["message" => "User not logged in."]);
    exit;
}

$creatorID = $_SESSION['ad_ID'];

// Fetch the projects the user owns where the status is 'Ongoing'
$queryOwner = "SELECT * FROM projects WHERE owner = ? AND status = 'Ongoing'";
$stmtOwner = mysqli_prepare($conn, $queryOwner);
mysqli_stmt_bind_param($stmtOwner, 's', $creatorID);
mysqli_stmt_execute($stmtOwner);
$resultOwner = mysqli_stmt_get_result($stmtOwner);

$projects = [];
while ($row = mysqli_fetch_assoc($resultOwner)) {
    $projects[] = $row;
}

// Fetch the projects the user has joined where the status is 'Ongoing'
$queryJoined = "SELECT p.* FROM projects p 
                JOIN project_members pm ON p.id = pm.project_id
                WHERE pm.user_id = ? AND p.status = 'Ongoing'";
$stmtJoined = mysqli_prepare($conn, $queryJoined);
mysqli_stmt_bind_param($stmtJoined, 's', $creatorID);
mysqli_stmt_execute($stmtJoined);
$resultJoined = mysqli_stmt_get_result($stmtJoined);

while ($row = mysqli_fetch_assoc($resultJoined)) {
    // Avoid adding the same project twice (user could be both an owner and a member)
    if (!in_array($row, $projects)) {
        $projects[] = $row;
    }
}

mysqli_stmt_close($stmtOwner);
mysqli_stmt_close($stmtJoined);
mysqli_close($conn);

// Return the projects in JSON format
echo json_encode($projects);
?>
