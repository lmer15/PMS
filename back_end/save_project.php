<?php
include_once "db.php";
session_start();

// Check if user is logged in (if 'ad_ID' is set in session)
if (!isset($_SESSION['ad_ID'])) {
    echo json_encode(["message" => "User not logged in. Please log in first."]);
    exit;
}

$creatorID = $_SESSION['ad_ID']; // The ID of the logged-in user

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a 6-digit alphanumeric access code
function generateAccessCode() {
    return strtoupper(substr(bin2hex(random_bytes(3)), 0, 6)); // Generates 6 characters from random bytes
}

// Function to calculate the number of days left
function calculateDaysLeft($finishDate) {
    $currentDate = new DateTime(); // Current date and time
    $endDate = new DateTime($finishDate); // Finish date
    $interval = $currentDate->diff($endDate); // Difference between current and finish date
    return $interval->format('%r%a'); // Return number of days, with a sign
}

// Check if the request is a POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $finishDate = mysqli_real_escape_string($conn, $_POST['finishDate']);
    $colorTheme = mysqli_real_escape_string($conn, $_POST['colorTheme']);
    
    // Validate if required fields are present
    if (empty($name) || empty($category) || empty($description) || empty($finishDate)) {
        echo json_encode(["message" => "All fields are required."]);
        exit;
    }

    // Date validation - Ensure the start date is not in the past
    if (strtotime($startDate) < time()) {
        echo json_encode(["message" => "Start date cannot be in the past."]);
        exit;
    }

    // Date validation - Ensure the finish date is not before the start date
    if (strtotime($finishDate) < strtotime($startDate)) {
        echo json_encode(["message" => "Finish date cannot be before the start date."]);
        exit;
    }

    // Generate a unique 6-digit access code
    $accessCode = generateAccessCode();

    // Calculate the days left until finish date
    $daysLeft = calculateDaysLeft($finishDate);

    // Determine the status based on the finish date and current date
    $status = $daysLeft < 0 ? "Overdue" : "Ongoing"; // If daysLeft < 0, status is "Overdue"

    // Prepare the SQL query to insert the project, including the creator's ID, days_left, and status
    $stmt = $conn->prepare("INSERT INTO projects (owner, name, category, description, start_date, finish_date, access_code, color, days_left, status) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $creatorID, $name, $category, $description, $startDate, $finishDate, $accessCode, $colorTheme, $daysLeft, $status);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(["message" => "Project created successfully!", "accessCode" => $accessCode]);
    } else {
        echo json_encode(["message" => "Error creating project", "error" => $stmt->error]);
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
