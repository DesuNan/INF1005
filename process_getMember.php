<?php
require_once "zebra_session/session_start.php";

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    // If the user is not logged in, return an error message
    echo json_encode(array('error' => 'User is not logged in'));
    exit;
}

// Create database connection.
$config = parse_ini_file('/var/www/private/db-config-zebra.ini');

if(!$config) {
    $errorMsg = "Failed to read database config file.";
    $success = false;
}
else {
    $conn = new mysqli(
        $config['servername'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );
}

// Check the database connection
if ($conn->connect_error) {
    // If the connection fails, return an error message
    echo json_encode(array('error' => 'Database connection failed: ' . $conn->connect_error));
    exit;
}

// Prepare and execute a SQL query to fetch user details
$stmt = $conn->prepare("SELECT * FROM Students WHERE studentID = ?");
$stmt->bind_param("i", $_SESSION['userID']);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // Fetch the user details as an associative array
    $row = $result->fetch_assoc();
    
    // Return the user details as JSON
    echo json_encode($row);
} else {
    // If no rows were returned, return an error message
    echo json_encode(array('error' => 'No user found with the specified ID'));
}

// Close the database connection
$stmt->close();
$conn->close();
?>
