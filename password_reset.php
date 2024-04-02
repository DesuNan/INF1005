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

                <?php

                //checks if OTP is provided in the URL
                if (isset($_GET['otp'])) {
                    $otp = $_GET['otp'];

                    //displays new password reset form
                    ?>
                    <form action="process_password_new.php" method="post">
                        <input type="hidden" name="otp" value="<?php echo $otp; ?>">
                        <span class="login100-form-title">
                            Reset Your Password
                        </span>
						
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="password" id="new_password" name="new_password" placeholder="New Password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="new_password_reset_submit">
                                Reset Password
                            </button>
                        </div>
                    </form>
                    <?php
                } else {
                    //displays email submission form if no request
                    ?>
                    <form action="process_password_reset.php" method="post">
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
                            <button class="login100-form-btn" type="submit" name="password_reset_submit">
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
		</div>
	</div>

	<div id="faceio-modal"></div>
	<script src="https://cdn.faceio.net/fio.js"></script>

</body>

</html>
