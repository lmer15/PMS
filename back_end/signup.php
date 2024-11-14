<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        header("Location: ../signin.html?error=password_mismatch");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signin.html?error=invalid_email_format");
        exit();
    }

    // Check if the username already exists
    $checkUsername = "SELECT * FROM accountsdetails WHERE ad_username = ?";
    $stmt = mysqli_prepare($conn, $checkUsername);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../signin.html?error=username_exists");
        exit();
    }

    // Check if the email already exists
    $checkEmail = "SELECT * FROM accountsdetails WHERE ad_email = ?";
    $stmt = mysqli_prepare($conn, $checkEmail);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../signin.html?error=email_exists");
        exit();
    }

    // Hash the password using password_hash()
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $query = "INSERT INTO accountsdetails (ad_name, ad_username, ad_email, ad_password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../signin.html?signup=success");
        exit();
    } else {
        error_log(mysqli_error($conn)); // Log any errors
        header("Location: ../signin.html?error=server_error");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn); // Close the connection
}
?>
