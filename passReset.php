<!DOCTYPE html>
<html lang="en">

<head>
	<title>BasicStudys</title>
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
		<div class="forms">
            <?php
                //checks if OTP is provided in the URL
                if (isset($_GET['otp'])) {
                    $otp = $_GET['otp'];
                    $accType = $_GET['acc'];

                    //displays new password reset form
                    ?>
                    <form action="process_newPass.php" method="post">
                        <input type="hidden" name="otp" value="<?php echo $otp; ?>">
                        <input type="hidden" name="accType" value="<?php echo $accType; ?>">
                        <h1>Reset Your Password</h1>
						
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input required type="password" id="new_pwd" name="new_pwd" placeholder="New Password">
                        </div>

                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input required type="password" id="confirm_pwd" name="confirm_pwd" placeholder="Confirm Password">
                        </div>
                        <br>
                        <div class="button input-box">
                            <button class="btn btn-primary" type="submit" name="passreset_submit">Reset Password</button>
                        </div>
                    </form>
                    <?php
                } else {
                    //displays email submission form if no request
                    ?>
                    <form action="process_rstPass.php" method="post">
                        <h1>Reset Password</h1>
						<p1>Enter your email below.<p1>
                        <br>
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input required type="text" id="email" name="email" placeholder="Enter your email" />
                        </div>
                        <div class="input-box">
                            <i class="fas fa-user-alt"></i>
                            <select id="accType" name="accType">
                                <option value="instructor">Instructor</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                        <br>
                        <div class="button input-box">
                            <a href="login.php" class="btn btn-danger" role="button">Go Back</a>
                            <button class="btn btn-primary" type="submit" name="resetpass_submit">Submit</button>
                        </div>
                    </form>
                    <?php
                }
            ?>
		</div>
    </main>
    <?php
        include "inc/footer.inc.php";
    ?>
</body>

</html>
