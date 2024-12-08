<?php
session_start();
require_once 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['ad_ID'])) {
    echo json_encode(["message" => "User not logged in."]);
    exit;
}

$creatorID = $_SESSION['ad_ID'];

// Modified query to fetch projects where the user is the owner or a member
$query = "
    SELECT projects.*, 
           CASE WHEN projects.owner = ? THEN 1 ELSE 0 END AS isOwner 
    FROM projects
    LEFT JOIN project_members ON projects.id = project_members.project_id
    WHERE projects.owner = ? OR project_members.user_id = ?
";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'sss', $creatorID, $creatorID, $creatorID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$projects = [];
while ($row = mysqli_fetch_assoc($result)) {
    $projects[] = $row;
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

// Return the projects in JSON format
echo json_encode($projects);
?>
