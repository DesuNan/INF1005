<?php

$config = parse_ini_file('/var/www/private/db-config-zebra.ini');

$conn = new mysqli(
  $config['servername'],
  $config['username'],
  $config['password'],
  $config['dbname']
);

if ($conn->connect_error) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (isset($_GET["id"])) {
    // The id should be an integer, so we ensure it is by casting it
    $id = (int) $_GET["id"];

    // Prepare the DELETE statement with a placeholder for the id
    $stmt = $conn->prepare("DELETE FROM Library WHERE id = ?");
    
    // Bind the $id variable to the placeholder in the prepared statement
    $stmt->bind_param("i", $id); // "i" indicates the parameter type is an integer
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Close the statement
    $stmt->close();
}

// Redirect to the library.php page
header("Location: library.php");
exit;
?>
