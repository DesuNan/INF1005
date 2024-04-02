<!DOCTYPE html>
<html lang="en">

<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<link rel="icon" type="image/png" href="assets/brightbuys.ico" />

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/login.png" alt="Page Image">
				</div>
                
                <div class="login100-pic js-tilt" data-tilt>
                <?php

                $resultMsg = ''; //first define password reset result
                
                //when submit button is pressed
                if(isset($_POST['new_password_reset_submit'])) {
                    $otp = $_POST['otp']; //URL passed into input in form
                    $new_password = $_POST['new_password']; //from form
                    $confirm_password = $_POST['confirm_password']; //from form

                    //validate inputs
                    if (empty($otp) || empty($new_password) || empty($confirm_password)) {
                        throw new Exception("All fields are required.");
                    }

                    //validate OTP format
                    if (!preg_match('/^[a-zA-Z0-9]{10}$/', $otp)) {
                        echo "Invalid OTP format.";
                        exit();
                    }

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

                        //checks if OTP already exists in the passReset table
                        $stmt_check = $conn->prepare("SELECT email FROM passReset WHERE otp = ?");
                        $stmt_check->bind_param("s", $otp); // Assuming $otp contains the OTP value
                        $stmt_check->execute();
                        $result = $stmt_check->get_result();
            
                        if ($result-> num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $email = $row['email']; //stored in $email variable                            
                            //updates user's password in the users table
                            $updateQuery = $conn->prepare("UPDATE Students SET password = ? WHERE email = ?");
                            $updateQuery->bind_param("ss", password_hash($new_password, PASSWORD_DEFAULT), $email);
                            $updateQuery->execute();
                            $affected_rows = $updateQuery->affected_rows;
                            $updateQuery->close();
                            if ($affected_rows > 0) {
                                echo "Password updated succesfully.";
                                echo '<a class="txt2" href="login.php"><br>';
                                echo '    Go back to Login';
                                echo '    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>';
                                echo '</a>';
                            } else {
                                echo "Failed to update with new password.";
                            }

                        } else {
                            //if email not found in passReset table
                            echo "Email not found for provided OTP.";
                        }       
                        $stmt_check->close(); // Close the statement      
                        $conn->close();
                
                    } catch (Exception $e) {
                        $errorMsg = "Error: " . $e->getMessage();
                    }
                } else {
                    exit();
                }
                ?>
                </div>

			</div>
		</div>
	</div>

	<div id="faceio-modal"></div>
	<script src="https://cdn.faceio.net/fio.js"></script>

</body>

</html>
