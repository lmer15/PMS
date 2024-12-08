<?php
session_start();
include_once "db.php";

// Check if user is logged in
if (isset($_SESSION['ad_ID'])) {
    $user_id = $_SESSION['ad_ID'];
} else {
    echo "You need to log in first.";
    exit;
}

// Determine the selected plan based on the query string
$plan_id = 0;
$plan_name = "";
if (isset($_GET['plan'])) {
    switch ($_GET['plan']) {
        case 'basic':
            $plan_id = 1;
            $plan_name = "Basic";
            break;
        case 'standard':
            $plan_id = 2;
            $plan_name = "Standard";
            break;
        case 'professional':
            $plan_id = 3;
            $plan_name = "Professional";
            break;
        default:
            echo "Invalid plan selected.";
            exit;
    }
}

// Update the `plan_id` in the `accountsdetails` table to the selected plan
$updatePlanQuery = "UPDATE accountsdetails SET plan_id = ? WHERE ad_ID = ?";
$updatePlanStmt = mysqli_prepare($conn, $updatePlanQuery);
mysqli_stmt_bind_param($updatePlanStmt, "ii", $plan_id, $user_id);

if (mysqli_stmt_execute($updatePlanStmt)) {
    // Insert subscription details into `subscription` table
    $subStatus = 'Active';
    $insertSubscriptionQuery = "INSERT INTO subscription (plan_id, user_ID, sub_status) VALUES (?, ?, ?)";
    $insertSubStmt = mysqli_prepare($conn, $insertSubscriptionQuery);
    mysqli_stmt_bind_param($insertSubStmt, "iis", $plan_id, $user_id, $subStatus);

    if (mysqli_stmt_execute($insertSubStmt)) {
        // Retrieve the `sub_id` of the newly inserted subscription
        $subId = mysqli_insert_id($conn);

        // Insert payment details into `payment` table
        $payStatus = 'Completed';
        $payDate = date('Y-m-d');
        $insertPaymentQuery = "INSERT INTO payment (sub_id, pay_date, pay_status) VALUES (?, ?, ?)";
        $insertPayStmt = mysqli_prepare($conn, $insertPaymentQuery);
        mysqli_stmt_bind_param($insertPayStmt, "iss", $subId, $payDate, $payStatus);

        if (mysqli_stmt_execute($insertPayStmt)) {
            // Payment was successful, proceed to success page
        } else {
            echo "Error inserting payment: " . mysqli_error($conn);
            exit;
        }
    } else {
        echo "Error inserting subscription: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "Error updating user plan: " . mysqli_error($conn);
    exit;
}

// Close all statements
mysqli_stmt_close($updatePlanStmt);
mysqli_stmt_close($insertSubStmt);
mysqli_stmt_close($insertPayStmt);

// Close the database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Payment</title>
    <link rel="stylesheet" href="payment.css"/>
</head>
<body>
<div class="successContainer">
    <div class="paymentSuc">
        <h1>Payment Successful</h1>
        <p>Thank you for subscribing to the <?php echo $plan_name; ?> plan. You can now enjoy premium features.</p>
        <div class="btn-return">
            <button onclick="window.location.href='../leader_dashbrd.php'">Return to Dashboard</button>
        </div>
    </div>
</div>
</body>
</html>
