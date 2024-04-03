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

// function LoginSession($fname = null, $lname, $email, $admin)
// {
//     global $session;
//     if (!empty($fname)) {
//         $_SESSION['name'] = $fname . " " . $lname;
//         $_SESSION['email'] = $email;
//     } else {
//         $_SESSION['name'] = $lname;
//         $_SESSION['email'] = $email;
//     }

//     $_SESSION["logged_in"] = 1;
//     $_SESSION["admin"] = $admin;
// }


// // function RetrieveInfo(){
// //     global $session;
// //     return $_SESSION['name'];
// //     if (isset($_SESSION['name'])){
// //         return $_SESSION['name'];
// //     }else{
// //         return "TEST";
// //     }
// // }

// function RetrieveMoreInfo()
// {
//     global $session;
//     return $_SESSION['name'];
//     if (isset($_SESSION['name'])) {
//         return $_SESSION;
//     } else {
//         return "TEST";
//     }
// }

?>

