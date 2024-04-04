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
                use PHPMailer\PHPMailer\PHPMailer as PHPMailer;
                use PHPMailer\PHPMailer\SMTP;

                $emailSentMsg = ''; // define emailSentMsg
                
                if(isset($_POST['resetpass_submit'])) {
                    $email = $_POST['email'];
                    $accType = $_POST['accType'];
                    
                    //PHPMailer autoload and exceptions
                    require 'vendor/autoload.php';
                
                    //instantiate and pass `true` enables exceptions
                    $mail = new PHPMailer(true);
                
                    try {
                        //create database connection
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
                        //check db connection
                        if ($conn->connect_error) {
                            throw new Exception("Connection failed: " . $conn->connect_error);
                        }
                
                        //checks if email exists in the users table
                        $getStmt = $conn->prepare("SELECT email FROM Students WHERE email = ?");
                        $getStmt->bind_param("s", $email);
                        $getStmt->execute();
                        $getResult = $getStmt->get_result();
                        echo "Email: " . $email;
                
                        if ($getResult->num_rows === 0) {
                            //if does not exist, email is not sent and displays following message
                            $emailSentMsg = "Email does not exist.";
                            echo $emailSentMsg;
                            echo '<a href="passReset.php" class="btn btn-info" role="button"></a>';
                            exit();

                        } else { //email exists in users table
                            //email server settings
                            $mail = new PHPMailer(); //new mail instance
                            $mail->isSMTP(); //send using SMTP
                            //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //for debugging
                            $mail->Host = 'smtp.gmail.com'; //sets SMTP server to send through
                            $mail->SMTPAuth = true; //enables SMTP authentication
                            $mail->Username = 'helpdesk.coursedemy@gmail.com'; //SMTP username
                            $mail->Password = 'ozfk cnjt puwt xnqz'; //SMTP password (using app password as more secure)
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $mail->Port = 465; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                            //email recipients
                            $mail->setFrom('helpdesk.coursedemy@gmail.com', 'Admin');
                            $mail->addAddress($email);                                  // Add a recipient
                
                            $otp = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10); //OTP creation
                
                            //email content
                            $mail->isHTML(true);                                       // Set email format to HTML
                            $mail->Subject = 'Password Reset Request for Coursedemy';
                            $mail->Body = "Hi,<br><br>"
                                        . "We have received your request to reset your account's password. "
                                        . 'To reset your password, please click <a href="http://35.212.224.236/passReset.php?otp='.$otp.'&acc='.$accType.'">here</a>.' . '.<br>'
                                        . "If you did not make this request, please contact us as soon as you can.<br>"
                                        . "Yours sincerely,<br>"
                                        . "Coursdemy Membership Services";
                
                            //send email
                            if (!$mail->send()) {
                                echo 'Message fail to send.';
                                throw new Exception("Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
                            } else {
                                $emailSentMsg = "Email sent successfully. Please check your email for the OTP.";
                            }
                            
                            //checks if email address already exists in the resetPass table
                            $stmt = $conn->prepare("SELECT email FROM resetPass WHERE email = ?");
                            $stmt->bind_param("s", $email);
                            $stmt->execute();
                            $result = $stmt->get_result();
                
                            if ($result->num_rows > 0) {
                                //email already exists in resetPass table, so OTP will only be updated for record
                                $updateStmt = $conn->prepare("UPDATE resetPass SET otp = ? WHERE email = ?");
                                $updateStmt->bind_param("ss", $otp, $email);

                                if (!$updateStmt->execute()) {
                                    throw new Exception("Error updating record: " . $conn->error);
                                }

                                $emailSentMsg = "OTP updated. Please check your email for the OTP.";
                                
                                $updateStmt->close();
                            } else {
                                //when email address exists in users but not yet in resetPass, insert a new record
                                $insertStmt = $conn->prepare("INSERT INTO resetPass (email, otp) VALUES (?, ?)");
                                $insertStmt->bind_param("ss", $email, $otp);

                                if (!$insertStmt->execute()) {
                                    throw new Exception("Error inserting record: " . $conn->error);
                                }

                                $emailSentMsg .= "Email sent successfully. Please check your email for the OTP.";
                                
                                $insertStmt->close();
                            }
                            echo $emailSentMsg;
                
                            $stmt->close();
                        }
                
                        $stmt_user_check->close();
                        $conn->close();
                
                    } catch (Exception $e) {
                        $errorMsg = "Error: " . $e->getMessage();
                    }
                } else {
                    echo "password_reset_submit is not set"; //for debugging
                    exit();
                }
            ?>
		</div>
    </main>
    <?php
        include "inc/footer.inc.php";
    ?>
</body>

</html>
