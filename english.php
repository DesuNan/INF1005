<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coursedemy</title>
    <?php
    include "inc/head.inc.php";
    ?>
</head>

<body>
    <?php
    include "inc/header.inc.php";
    ?>

    <!-- Simplified navigation for English section -->
    <nav class="navbar navbar-expand-lg navbar-courses">
        <div class="container">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#notifications">Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#chapters">Chapters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- english content - about -->
    <main class="container">
        <section id="about">
            <div class="row">
                <article class="col-sm">
                    <figure>
                        <a target="_self" href="img/english_background.jpg" alt="English_Background" class="background"></a>
                    </figure>
                    <h1 style="color:#555;">About English</h1>
                    <p style="color: #666; line-height: 1.6;">
                        Unlock the world with English! As the global language of communication, learning English opens doors to endless opportunities. Whether you're traveling, studying, or pursuing a career, English proficiency empowers you to connect with people from diverse cultures and backgrounds. From enhancing job prospects to enriching cultural experiences, mastering English enriches your life in countless ways.
                    </p>
                </article>
            </div>
        </section>

        <!-- english content - notifications -->
        <section id="notifications" style="margin-right: 0;">
            <div class="container">
                <h1 class="text-center">Notifications</h1>
                <div class="row">
                    <div class="col-lg-4 mt-4 ml-auto">
                        <!-- Add notification border with text -->
                        <div class="notification-border">
                            No new notifications
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include "inc/footer.inc.php";
    ?>
</body>

</html>
