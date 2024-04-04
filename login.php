<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login/Register</title>
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
                    <div id="signup-form" class="signup-form"></div>
                    <script src="jsx/register.js"></script>
                </div>
            </div>
        </div>
    </main>
</body>
<?php
    include "inc/footer.inc.php";
?>
</html>
