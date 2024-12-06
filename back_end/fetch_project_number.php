<?php
session_start();
require_once 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['ad_ID'])) {
    echo json_encode(["message" => "User not logged in."]);
    exit;
}

$creatorID = $_SESSION['ad_ID'];

// Fetch the count of ongoing (In Progress) projects
$queryInProgress = "SELECT COUNT(*) FROM projects WHERE owner = ? AND status = 'Ongoing'";
$stmtInProgress = mysqli_prepare($conn, $queryInProgress);
mysqli_stmt_bind_param($stmtInProgress, 's', $creatorID);
mysqli_stmt_execute($stmtInProgress);
$resultInProgress = mysqli_stmt_get_result($stmtInProgress);
$rowInProgress = mysqli_fetch_row($resultInProgress);
$inProgressCount = $rowInProgress[0];

// Fetch the count of completed projects
$queryCompleted = "SELECT COUNT(*) FROM projects WHERE owner = ? AND status = 'Completed'";
$stmtCompleted = mysqli_prepare($conn, $queryCompleted);
mysqli_stmt_bind_param($stmtCompleted, 's', $creatorID);
mysqli_stmt_execute($stmtCompleted);
$resultCompleted = mysqli_stmt_get_result($stmtCompleted);
$rowCompleted = mysqli_fetch_row($resultCompleted);
$completedCount = $rowCompleted[0];

// Fetch the count of archived projects
$queryArchived = "SELECT COUNT(*) FROM projects WHERE owner = ? AND status = 'Archived'";
$stmtArchived = mysqli_prepare($conn, $queryArchived);
mysqli_stmt_bind_param($stmtArchived, 's', $creatorID);
mysqli_stmt_execute($stmtArchived);
$resultArchived = mysqli_stmt_get_result($stmtArchived);
$rowArchived = mysqli_fetch_row($resultArchived);
$archivedCount = $rowArchived[0];

// Fetch the count of total projects
$queryTotal = "SELECT COUNT(*) FROM projects WHERE owner = ?";
$stmtTotal = mysqli_prepare($conn, $queryTotal);
mysqli_stmt_bind_param($stmtTotal, 's', $creatorID);
mysqli_stmt_execute($stmtTotal);
$resultTotal = mysqli_stmt_get_result($stmtTotal);
$rowTotal = mysqli_fetch_row($resultTotal);
$totalCount = $rowTotal[0];

// Return the counts in JSON format
echo json_encode([
    'inProgress' => $inProgressCount,
    'completed' => $completedCount,
    'total' => $totalCount,
    'archived' => $archivedCount
]);

// Close the statements and connection
mysqli_stmt_close($stmtInProgress);
mysqli_stmt_close($stmtCompleted);
mysqli_stmt_close($stmtArchived);
mysqli_stmt_close($stmtTotal);
mysqli_close($conn);
?>
