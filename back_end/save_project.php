<?php
include_once "db.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['ad_ID'])) {
    echo json_encode(["message" => "User not logged in. Please log in first."]);
    exit;
}

$creatorID = $_SESSION['ad_ID'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a unique access code
function generateAccessCode() {
    return strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
}

// Function to calculate days left for the project
function calculateDaysLeft($finishDate) {
    $currentDate = new DateTime(); 
    $endDate = new DateTime($finishDate); 
    $interval = $currentDate->diff($endDate); 
    return $interval->format('%r%a'); 
}

// Process POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $finishDate = mysqli_real_escape_string($conn, $_POST['finishDate']);
    $colorTheme = mysqli_real_escape_string($conn, $_POST['colorTheme']);
    
    // Validate required fields
    if (empty($name) || empty($category) || empty($startDate) || empty($finishDate)) {
        echo json_encode(["message" => "All fields are required."]);
        exit;
    }

    if (strtotime($startDate) < time()) {
        echo json_encode(["message" => "Start date cannot be in the past."]);
        exit;
    }

    if (strtotime($finishDate) < strtotime($startDate)) {
        echo json_encode(["message" => "Finish date cannot be before the start date."]);
        exit;
    }
    $accessCode = generateAccessCode();
    $daysLeft = calculateDaysLeft($finishDate);
    $status = $daysLeft < 0 ? "Overdue" : "Ongoing"; 
    $stmt = $conn->prepare("INSERT INTO projects (owner, name, category, start_date, finish_date, access_code, color, days_left, status) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $creatorID, $name, $category, $startDate, $finishDate, $accessCode, $colorTheme, $daysLeft, $status);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Project created successfully!", "accessCode" => $accessCode]);
    } else {
        echo json_encode(["message" => "Error creating project", "error" => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
