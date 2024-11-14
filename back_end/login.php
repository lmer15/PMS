<?php
session_start();
require_once 'db.php';  // Database connection

// Check if form is submitted
if (isset($_POST['lusername']) && isset($_POST['lpassword'])) {
    $lusername = trim($_POST['lusername']);  // Trim any extra spaces
    $lpassword = trim($_POST['lpassword']);  // Trim any extra spaces

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM accountsdetails WHERE ad_username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $lusername); // Bind username parameter
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password with the hashed password in the database
        if (password_verify($lpassword, $user['ad_password'])) {
            $_SESSION['ad_ID'] = $user['ad_ID'];
            $_SESSION['ad_username'] = $user['ad_username'];
            $_SESSION['ad_name'] = $user['ad_name'];
            $_SESSION['ad_email'] = $user['ad_email'];

            // Check if "Remember Me" is checked
            if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
                // Set cookies for the user (expiry of 30 days)
                setcookie("remember_username", $lusername, time() + (30 * 24 * 60 * 60), "/");  // 30 days
                setcookie("remember_password", $lpassword, time() + (30 * 24 * 60 * 60), "/");  // 30 days
            } else {
                // Clear cookies if "Remember Me" is not checked
                setcookie("remember_username", "", time() - 3600, "/");
                setcookie("remember_password", "", time() - 3600, "/");
            }


            // Redirect to dashboard
            header("Location: ../leader_dashbrd.php");
            exit();
        } else {
            // Invalid password
            header("Location: ../signin.html?error=invalid_password");
            exit();
        }
    } else {
        // Username not found
        header("Location: ../signin.html?error=username_not_found");
        exit();
    }
} else {
    // Missing data (username or password)
    header("Location: ../signin.html?error=missing_data");
    exit();
}
?>
