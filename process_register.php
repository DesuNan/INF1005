<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Registration Results</title>
        <?php
            include "inc/head.inc.php";
        ?>
        <link rel="stylesheet" href="css/login.css">    
    </head>
    <body>
        <?php
        include "inc/nav.inc.php";
        ?>
        <main class="login-container">
            <section class="forms">
            <?php
                $email = $pwd = $fname = $lname = $accType = $errorMsg = "";
                $success = true;

                if (empty($_POST["email"])) {
                    $errorMsg .= "Email is required.<br>";
                    $success = false;
                }
                else if (empty($_POST["pwd"]) || empty($_POST["pwd_confirm"])) {
                   $errorMsg .= "Password is required.<br>";
                   $success = false;
                }
                else if (!check_password($_POST["pwd"])) {
                    $errorMsg .= "Password should be at least 12 characters in length and should include at least one upper case letter, one number, and one special character.<br>";
                    $success = false;
                }
                else if ($_POST["pwd"] != $_POST["pwd_confirm"]) {
                    $errorMsg .= "Passwords do not match.";
                    $success = false;
                }
                else {
                    $email = sanitize_input($_POST["email"]);
                    $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
                    $fname = sanitize_input($_POST["fname"]);
                    $lname = sanitize_input($_POST["lname"]);
                    $accType = sanitize_input($_POST["accType"]);

                    // Additional check to make sure e-mail address is well-formed.
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errorMsg .= "Invalid email format.";
                        $success = false;
                    }

                    // Save to DB
                    if ($success) {
                        saveMemberToDB();
                    }
                }

                if ($success) {
                    echo "<h2>Your registration is successful!</h2>";
                    echo "<h4>Thank you for signing up, " . $fname . " " . $lname . ".</h4>";
                    echo "<button type='login' class='btn btn-success' onclick=\"location.href='login.php'\">Log-in</button>";
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
                function saveMemberToDB() {
                    global $fname, $lname, $email, $pwd, $accType, $errorMsg, $success;

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
                                $checkStmt = $conn->prepare("Select * From Students WHERE email=?");
                            } else if ($accType == "instructor") {
                                $checkStmt = $conn->prepare("Select * From Instructors WHERE email=?");
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
                                    $insertStmt = $conn->prepare("INSERT INTO Students (fname, lname, email, password) VALUES (?, ?, ?, ?)");
                                } else if ($accType == "instructor") {
                                    $insertStmt = $conn->prepare("INSERT INTO Instructors (fname, lname, email, password) VALUES (?, ?, ?, ?)");
                                }

                                // Bind & execute the query statement:
                                $insertStmt -> bind_param("ssss", $fname, $lname, $email, $pwd);

                                if(!$insertStmt -> execute()) {
                                    $errorMsg = "Execution failed: (" . $insertStmt -> errno . ") " . $insertStmt -> error;
                                    $success = false;
                                }

                                $insertStmt -> close();
                            }
                            
                            $checkStmt -> close();
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