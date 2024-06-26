<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Results</title>
    <?php
    include "inc/head.inc.php";
    require_once "zebra_session/session_start.php";
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
            $email = $pwd_hashed = $fname = $lname = $accType = $errorMsg = $userID = "";
            $success = true;

            if (empty($_POST["email"])) {
                $errorMsg .= "Email is required.<br>";
                $success = false;
            } else if (empty($_POST["pwd"])) {
                $errorMsg .= "Password is required.<br>";
                $success = false;
            } else {
                $email = sanitize_input($_POST["email"]);
                $accType = sanitize_input($_POST["accType"]);

                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorMsg .= "Invalid email format.";
                    $success = false;
                }

                authenticateUser();
            }

            if ($success) {
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['accType'] = $accType;
                $_SESSION['userID'] = $userID;
                header("Location: /content.php");
                exit();
            } else {
                echo "<h2>Oops!</h2>";
                echo "<h4>The following errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<button type='login' class='btn btn-warning' onclick=\"location.href='login.php'\">Return to Login</button>";
            }

            /*
                 * Helper function that checks input for malicious or unwanted content.
                 */
            function sanitize_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            /*
                 * Helper function to write member data to the database.
                 */
            function authenticateUser()
            {
                global $fname, $lname, $email, $pwd_hashed, $userID, $accType, $errorMsg, $success;

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
                        if ($accType == "student") {
                            $stmt = $conn->prepare("Select * From Students WHERE email=?");
                        } else if ($accType == "instructor") {
                            $stmt = $conn->prepare("Select * From Instructors WHERE email=?");
                        }

                        // Bind & execute the query statement:
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            // Note that email field is unique, so should only have one row in the result set.
                            $row = $result->fetch_assoc();
                            $fname = $row["fname"];
                            $lname = $row["lname"];
                            if ($accType == "student") {
                                $userID = $row["studentID"];
                            } else if ($accType == "instructor") {
                                $userID = $row["instructorID"];
                            }
                            $pwd_hashed = $row["password"];

                            // Check if the password matches:
                            if (!password_verify($_POST["pwd"], $pwd_hashed)) {
                                // Don't be too specific with the error message - hackers don't need to which one they got right or wrong.
                                $errorMsg = "Email not found or password does not match.";
                                $success = false;
                            }
                        } else {
                            $errorMsg = "Email not found or password does not match";
                            $success = false;
                        }
                    }

                    $result->close();
                    $stmt->close();
                }

                $conn->close();
            }
            ?>
        </section>
    </main>
    <?php
    include "inc/footer.inc.php";
    ?>
</body>

</html>