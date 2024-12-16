<?php
session_start();
require_once 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['ad_ID'])) {
    echo json_encode(["message" => "User not logged in."]);
    exit;
}

$creatorID = $_SESSION['ad_ID'];  // User's ID from the session

// Modified query to fetch the latest 4 ongoing projects where the user is either the owner or a member
$query = "
    SELECT projects.* 
    FROM projects
    LEFT JOIN project_members ON projects.id = project_members.project_id
    WHERE (projects.owner = ? OR project_members.user_id = ?)
    AND projects.status = 'Ongoing'  -- Assuming 'status' indicates project status
    ORDER BY projects.start_date DESC  -- Sorting by the latest start date
    LIMIT 4";  // Limit the result to the latest 4 ongoing projects

// Prepare and execute the query
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $creatorID, $creatorID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Error handling
if (!$result) {
    echo json_encode(["error" => "Database query failed."]);
    exit;
}

$projects = [];
while ($row = mysqli_fetch_assoc($result)) {
    $projects[] = $row;
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

// Return the projects in JSON format
echo json_encode($projects);
?>
