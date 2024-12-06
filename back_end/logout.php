<?php
session_start(); 

// Destroy session
session_unset();
session_destroy();

// Delete cookies if they exist (for Remember Me functionality)
if (isset($_COOKIE['remember_user'])) {
    setcookie('remember_user', '', time() - 3600, '/'); // Expire the cookie
}

// Redirect to the login page
header("Location: signin.html");
exit();
?>
