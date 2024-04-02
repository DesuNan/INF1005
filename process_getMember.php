<?php
        require_once "zebra_session/session_start.php";
        $fname = $lname = $email = $pwd_hashed = $errorMsg = "";
        $success = true;
        $userID = $_SESSION["userID"];

        // Create database connection.
        $config = parse_ini_file('/var/www/private/db-config-zebra.ini');
        if (!$config) {
            $errorMsg = "Failed to read database config file.";
            $success = false;
        } else {
            $conn = new mysqli(
                $config['servername'],
                $config['username'],
                $config['password'],
                $config['dbname']
            );

            // Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            } else {
                // Prepare the statement:
                $stmt = $conn->prepare("Select fname, lname, email From Instructors WHERE studentID=?");

                // Bind & execute the query statement:
                $stmt->bind_param("i", $userID);
                $stmt->execute();
                $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                // Note that email field is unique, so should only have one row in the result set.
                $row = $result->fetch_assoc();
                $fname = $row["fname"];
                $lname = $row["lname"];
                $email= $row["email"];
            } else {
                $errorMsg = "User not found";
                $success = false;
            }
        }

        $stmt->close();
    }

    $conn->close();
?>