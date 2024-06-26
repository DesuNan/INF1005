<?php
include "db_connect.php";
include "Zebra_Session.php";

$session = new Zebra_Session($link, 'sEcUr1tY_c0dE');

// Check if user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // User is logged in, allow access to features
    $userID = $_SESSION['userID'];

    // Set session timeout
    $_SESSION['timeout'] = time() + (10 * 60); // 10 minutes
}

// Check for session timeout
if (isset($_SESSION['timeout']) && $_SESSION['timeout'] < time()) {
    // Session expired, destroy session and log the user out
    session_destroy();
    exit();
}

?>

