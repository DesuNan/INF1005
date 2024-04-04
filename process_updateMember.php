<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include "inc/head.inc.php";
            require_once "zebra_session/session_start.php";
        ?>
    </head>
    <body>
        <?php
        include "inc/nav.inc.php";
        ?>
        <main class="container">
            <section class="updateMember">
            <?php
                $email = $pwd = $fname = $lname = $userID = $errorMsg = "";
                $success = true;
                $userID = $_SESSION["userID"];
                $accType = $_SESSION["accType"];

                if (!empty($_POST["email"])) {
                    // Additional check to make sure e-mail address is well-formed.
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errorMsg .= "Invalid email format.";
                        $success = false;
                    }

                    $email = sanitize_input($_POST["email"]);

                    // Update email to DB
                    if ($success) {
                        UpdateEmailToDB();
                    }
                }
                if (!empty($_POST["pwd"]) && !empty($_POST["pwd_confirm"])) {
                    if ($_POST["pwd"] != $_POST["pwd_confirm"]) {
                        $errorMsg .= "Passwords do not match.";
                        $success = false;
                    } else if (!check_password($_POST["pwd"])) {
                        $errorMsg .= "Password should be at least 12 characters in length and should include at least one upper case letter, one number, and one special character.<br>";
                        $success = false;
                    }

                    $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

                    // Update pwd to DB
                    if ($success) {
                        UpdatePWDToDB();
                    }
                }
                if (!empty($_POST["fname"])) {
                    $fname = sanitize_input($_POST["fname"]);

                    // Update fname to DB
                    if ($success) {
                        UpdateFNameToDB();
                    }
                }
                if (!empty($_POST["lname"])) {
                    $fname = sanitize_input($_POST["fname"]);

                    // Update lname to DB
                    if ($success) {
                        UpdateLNameToDB();
                    }
                }

                if ($success) {
                    echo "<h2>Your profile has been updated!</h2>";
                    echo "UserID: " . $userID . "<br>";
                }
                else {
                    echo "<h2>Oops!</h2>";
                    echo "<h4>The following errors were detected:</h4>";
                    echo "<p>" . $errorMsg . "</p>";
                    echo "<button type='register' class='btn btn-danger' onclick=\"location.href='login.php'\">Return to Sign Up</button>";
                }

                /*
                 * Helper function that checks input for malicious or unwanted content.
                 */
                function sanitize_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                /*
                 * A function that checks password strength
                 */
                function check_password($data) {
                    // Validate password strength
                    $uppercase = preg_match('@[A-Z]@', $data);
                    $lowercase = preg_match('@[a-z]@', $data);
                    $number = preg_match('@[0-9]@', $data);
                    $specialChars = preg_match('@[^\w]@', $data);

                    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data) < 12) {
                        return false;
                    }
                    else {
                        return true;
                    }
                }
                /*
                 * Helper function to write member data to the database.
                 */
                function UpdateFNameToDB() {
                    global $fname, $userID, $accType, $errorMsg, $success;

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

                        // Check connection
                        if($conn -> connect_error) {
                            $errorMsg = "Connection failed: " . $conn -> connect_error;
                            $success = false;
                        }
                        else {
                            // Prepare the statement:
                            if ($accType == "student") {
                                $updateStmt = $conn->prepare("UPDATE Students SET fname = ? WHERE studentID = ?");
                            } else if ($accType == "instructor") {
                                $updateStmt = $conn->prepare("UPDATE Instructors SET fname = ? WHERE instructorID = ?");
                            }

                            // Bind & execute the query statement:
                            $updateStmt -> bind_param("si", $fname, $userID);

                            if(!$updateStmt -> execute()) {
                                $errorMsg = "Execution failed: (" . $updateStmt -> errno . ") " . $updateStmt -> error;
                                $success = false;
                            }

                            $updateStmt -> close();
                        }

                        $conn -> close();
                    }
                }
                function UpdateLNameToDB() {
                    global $lname, $userID, $accType, $errorMsg, $success;

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

                        // Check connection
                        if($conn -> connect_error) {
                            $errorMsg = "Connection failed: " . $conn -> connect_error;
                            $success = false;
                        }
                        else {
                            // Prepare the statement:
                            if ($accType == "student") {
                                $updateStmt = $conn->prepare("UPDATE Students SET lname = ? WHERE studentID = ?");
                            } else if ($accType == "instructor") {
                                $updateStmt = $conn->prepare("UPDATE Instructors SET lname = ? WHERE instructorID = ?");
                            }

                            // Bind & execute the query statement:
                            $updateStmt -> bind_param("si", $lname, $userID);

                            if(!$updateStmt -> execute()) {
                                $errorMsg = "Execution failed: (" . $updateStmt -> errno . ") " . $updateStmt -> error;
                                $success = false;
                            }

                            $updateStmt -> close();
                        }

                        $conn -> close();
                    }
                }
                function UpdateEmailToDB() {
                    global $email, $userID, $accType, $errorMsg, $success;

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

                        // Check connection
                        if($conn -> connect_error) {
                            $errorMsg = "Connection failed: " . $conn -> connect_error;
                            $success = false;
                        }
                        else {
                            // Check if the email already exists in the database
                            if ($accType == "student") {
                                $checkStmt = $conn->prepare("SELECT email FROM Students WHERE email = ?");
                            } else if ($accType == "instructor") {
                                $checkStmt = $conn->prepare("SELECT email FROM Instructors WHERE email = ?");
                            }
                            $checkStmt -> bind_param("s", $email);
                            $checkStmt -> execute();
                            $checkStmt -> store_result();

                            if ($checkStmt->num_rows > 0) {
                                // Email already exists, set an error message
                                $errorMsg = "Email already exists. Please use a different email.";
                                $success = false;
                            } else {
                                // Prepare the statement:
                                if ($accType == "student") {
                                    $updateStmt = $conn->prepare("UPDATE Students SET email = ? WHERE studentID = ?");
                                } else if ($accType == "instructor") {
                                    $updateStmt = $conn->prepare("UPDATE Instructors SET email = ? WHERE instructorID = ?");
                                }

                                // Bind & execute the query statement:
                                $updateStmt -> bind_param("si", $email, $userID);

                                if(!$updateStmt -> execute()) {
                                    $errorMsg = "Execution failed: (" . $updateStmt -> errno . ") " . $updateStmt -> error;
                                    $success = false;
                                }

                                $updateStmt -> close();
                            }
                            
                            $checkStmt -> close();
                        }

                        $conn -> close();
                    }
                }
                function UpdatePWDToDB() {
                    global $userID, $accType, $errorMsg, $success;

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

                        // Check connection
                        if($conn -> connect_error) {
                            $errorMsg = "Connection failed: " . $conn -> connect_error;
                            $success = false;
                        }
                        else {
                            // Prepare the statement:
                            if ($accType == "student") {
                                $updateStmt = $conn->prepare("UPDATE Students SET password = ? WHERE studentID = ?");
                            } else if ($accType == "instructor") {
                                $updateStmt = $conn->prepare("UPDATE Instructors SET password = ? WHERE instructorID = ?");
                            }

                            // Bind & execute the query statement:
                            $updateStmt -> bind_param("si", $pwd, $userID);

                            if(!$updateStmt -> execute()) {
                                $errorMsg = "Execution failed: (" . $updateStmt -> errno . ") " . $updateStmt -> error;
                                $success = false;
                            }

                            $updateStmt -> close();
                        }

                        $conn -> close();
                    }
                }
            ?>
            </section>
        </main>
        <?php
            include "inc/footer.inc.php";
        ?>
    </body>
</html>