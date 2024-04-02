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

                    //displays new password reset form
                    ?>
                    <form action="process_newPass.php" method="post">
                        <input type="hidden" name="otp" value="<?php echo $otp; ?>">
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
						<p1>Enter your email below.<p1><br>

                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="email" id="email" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="resetpass_submit">
                                Submit
                            </button>
                        </div>

                        <div class="text-center p-t-136">
                            <a class="txt2" href="login.php">
                                Go Back
                                <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                            </a>
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
