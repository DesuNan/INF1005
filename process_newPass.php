<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include "inc/head.inc.php";
    ?>
</head>

<body class="loginpage">
    <?php
        include "inc/nav.inc.php";
    ?>
	<main class="container">
		<div class="login-container">
            <?php
                $resultMsg = ''; //first define password reset result
                $success = true;
                
                //when submit button is pressed
                if(isset($_POST['passreset_submit'])) {
                    $otp = $_POST['otp']; //URL passed into input in form
                    $new_pwd = $_POST['new_pwd']; //from form
                    $confirm_pwd = $_POST['confirm_pwd']; //from form
                    $accType = $_POST['accType'];

                    //validate inputs
                    if (empty($otp) || empty($new_pwd) || empty($confirm_pwd)) {
                        $errorMsg = "All fields are required.";
                        $success = false;
                    } else if ($new_pwd != $confirm_pwd) {
                        $errorMsg = "Passwords do not match<br>";
                        $success = false;
                    } else if (!check_password($new_pwd)) {
                        $errorMsg = "Password should be at least 12 characters in length and should include at least one upper case letter, one number, and one special character.<br>";
                        $success = false;
                    }

                    //validate OTP format
                    if (!preg_match('/^[a-zA-Z0-9]{10}$/', $otp)) {
                        echo "Invalid OTP format.";
                        exit();
                    }

                    if ($success) {
                        try {
                            //database connection
                            $config = parse_ini_file('/var/www/private/db-config-zebra.ini');
                            if (!$config) {
                                throw new Exception("Failed to read database config file.");
                            }
                            $conn = new mysqli(
                                $config['servername'],
                                $config['username'],
                                $config['password'],
                                $config['dbname']
                            );
                            if ($conn->connect_error) {
                                throw new Exception("Connection failed: " . $conn->connect_error);
                            }
    
                            //checks if OTP already exists in the resetPass table
                            $stmt = $conn->prepare("SELECT email FROM resetPass WHERE otp = ?");
                            $stmt->bind_param("s", $otp); // Assuming $otp contains the OTP value
                            $stmt->execute();
                            $result = $stmt->get_result();
                
                            if ($result-> num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $email = $row['email']; //stored in $email variable                            
                                //updates user's password in the users table
                                if ($accType == "student") {
                                    $updateStmt = $conn->prepare("UPDATE Students SET password = ? WHERE email = ?");
                                } else if ($accType == "instructor") {
                                    $updateStmt = $conn->prepare("UPDATE Instructors SET password = ? WHERE email = ?");
                                }
                                $updateStmt->bind_param("ss", password_hash($new_pwd, PASSWORD_DEFAULT), $email);
                                $updateStmt->execute();
                                $affected_rows = $updateStmt->affected_rows;
                                $updateStmt->close();
                                if ($affected_rows > 0) {
                                    echo "Password updated succesfully.<br>";
                                    echo "<button type='login' class='btn btn-success' onclick=\"location.href='login.php'\">Log-in</button>";
                                } else {
                                    echo "Failed to update with new password.";
                                }
    
                            } else {
                                //if email not found in passReset table
                                echo "Email not found for provided OTP.<br>";
                            }       
                            $stmt->close(); // Close the statement      
                            $conn->close();
                    
                        } catch (Exception $e) {
                            $errorMsg = "Error: " . $e->getMessage();
                        }
                    } else {
                        echo "<h2>Oops!</h2>";
                        echo "<h4>The following errors were detected:</h4>";
                        echo "<p>" . $errorMsg . "</p>";
                        echo "<button type='register' class='btn btn-danger' onclick=\"location.href='login.php'\">Return to Sign Up</button>";
                    }
                } else {
                    exit();
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
            ?>
		</div>
    </main>
    <?php
        include "inc/footer.inc.php";
    ?>
</body>

</html>
