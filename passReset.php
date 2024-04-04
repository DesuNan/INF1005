<!DOCTYPE html>
<html lang="en">

<head>
	<title>Reset Password</title>
    <?php
        include "inc/head.inc.php";
        require_once "zebra_session/session_start.php";
    ?>
</head>

<body class="loginpage">
    <?php
        include "inc/nav.inc.php";
    ?>
	<main class="container">
		<div class="login-container">
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
                        <span class="login100-form-title">
                            Reset Your Password
                        </span>
						
                        <div class="wrap-input100 validate-input">
                            <input required class="input100" type="password" id="new_pwd" name="new_pwd" placeholder="New Password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input required class="input100" type="password" id="confirm_pwd" name="confirm_pwd" placeholder="Confirm Password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="passreset_submit">
                                Reset Password
                            </button>
                        </div>
                    </form>
                    <?php
                } else {
                    //displays email submission form if no request
                    ?>
                    <form action="process_rstPass.php" method="post">
                        <span class="login100-form-title">
                            Reset Password
                        </span>
                        <br>
						<p1>Enter your email below.<p1><br>

                        <div class="wrap-input100 validate-input">
                            <i class="fas fa-envelope"></i>
                            <input required type="text" id="email" name="email" placeholder="Enter your email" />
                        </div>
                        <div>
                            <select id="accType" name="accType">
                                <option value="instructor">Instructor</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                        <div class="container-login100-form-btn">
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
