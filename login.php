<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login/Register</title>
    <?php
        include "inc/head.inc.php";
    ?>
</head>
<body class="loginpage">
    <?php
        include "inc/nav.inc.php";
    ?>
    <main class="login-container">
        <div>
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                    <img class="frontImg" src="img/math.jpg" alt="">
                    <div class="text">
                        <span class="text-1">Every new friend is a <br> new adventure</span>
                        <span class="text-2">Let's get connected</span>
                    </div>
                </div>
                <div class="back">
                    <img class="backImg" src="img/physics.jpg" alt="">
                    <div class="text">
                        <span class="text-1">Complete miles of journey <br> with one step</span>
                        <span class="text-2">Let's get started</span>
                    </div>
                </div>
            </div>
            <div class="forms">
                <div class="form-content">
                    <div id="login-form" class="login-form"></div>
                    <script src="jsx/login.js"></script>
                    <div class="signup-form">
                        <div class="title">Signup</div>
                        <form action="process_register.php" method="post">
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-user"></i>
                                    <input maxlength="45" type="text" id="fname" name="fname" placeholder="Enter your first name">
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-user"></i>
                                    <input required maxlength="45" type="text" id="lname" name="lname" placeholder="Enter your last name" >
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input required maxlength="45" type="text" id="email" name="email" placeholder="Enter your email" >
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input required minlength="12" type="password" id="pwd" name="pwd" placeholder="Enter your password">
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input required minlength="12" type="password" id="pwd_confirm" name="pwd_confirm" placeholder="Enter your password">
                                </div>
                                <div class="button input-box">
                                    <input type="submit" value="Submit">
                                </div>
                                <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--<script src="jsx/login_register.js"></script>-->
    </main>
    <?php
        include "inc/footer.inc.php";
    ?>
</body>
</html>
