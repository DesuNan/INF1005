<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coursedemy</title>
    <?php
    include "inc/head.inc.php";
    include "inc/head.inc.php";
    ?>
    <style>
        .main-containerSub {
            display: flex;
        }

        .navbar-courses {
            text-align: center;
            border: 2px solid black;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        #aboutSub,
        #chapters {
            flex: 1;
            margin-right: 20px;
            /* Adjust as needed */
            width: 100%;
        }

        #announcement {
            width: 30px;
        }

        .announcement-border {
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
            padding-top: 10px;
            width: 100%;
            height: 500px;
            overflow: auto;
            text-align: center;
        }

        .chapter-border {
            border: 2px solid black;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
        }

        .chapters-align {
            text-align: center;
        }

        @media (max-width: 768px) {
            .main-containerSub {
                flex-direction: column;
            }

            #aboutSub,
            #chapters,
            #announcements {
                width: 100%;
                margin-right: 0;
            }
        }
    </style>
</head>

<body style="padding-top: 110px;">
    <?php
    include "inc/nav.inc.php";
    ?>

    <nav class="navbar navbar-expand-lg navbar-courses">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="content.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="#aboutSub">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="#announcements">Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="#chapters">Chapters</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- english content -->
    <main class="main-containerSub container">
        <!-- About and Chapters Section -->
        <div class="about-chapters-container">
            <section id="aboutSub">
                <div class="row">
                    <article class="col-sm">
                        <h1>About English</h1>
                        <p style="color: #666; line-height: 1.6;">
                            Unlock the world with English! As the global language of communication, learning English opens doors to endless opportunities. Whether you're traveling, studying, or pursuing a career, English proficiency empowers you to connect with people from diverse cultures and backgrounds. From enhancing job prospects to enriching cultural experiences, mastering English enriches your life in countless ways.
                        </p>
                    </article>
                </div>
            </section>

            <section id="chapters" style="padding-top: 65px">
                <div class="container">
                    <h1>Chapters</h1>
                    <div class="row chapter-border">
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 1 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h5 class="card-title">Chapter 1: Introduction to English</h5>
                                    <p class="card-text">Learn the basics of the English language and its importance in today's world.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 2 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h5 class="card-title">Chapter 2: Grammar Essentials</h5>
                                    <p class="card-text">Explore the fundamental grammar rules and improve your language skills.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 3 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h5 class="card-title">Chapter 3: Vocabulary Expansion</h5>
                                    <p class="card-text">Expand your vocabulary and learn new words and phrases for effective communication.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Announcements Section -->
        <section id="announcements">
            <div class="container">
                <h1>Announcements</h1>
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <!-- Add notification border with text -->
                        <div class="announcement-border">
                            No new announcement
                        </div>
                    </div>
                </div>
                <main class="container">
                    <section id="english">
                        <h2>English</h2>
                        <div class="row">
                            <article class="col-sm">
                                <figure>
                                    <a target="_self" href="img/english_background.jpg" alt="English_Background" class="thumbnail"></a>
                                    <figcaption>English Language</figcaption>
                                </figure>
                                <p color="black">
                                    Unlock the world with English! As the global language of communication, learning English opens doors to endless opportunities.
                                    Whether you're traveling, studying, or pursuing a career, English proficiency empowers you to connect with people from diverse
                                    cultures and backgrounds. From enhancing job prospects to enriching cultural experiences, mastering English enriches your life in countless ways.
                                </p>
                            </article>
                        </div>
                    </section>

                </main>
                <?php
    include "inc/footer.inc.php";
    ?>
</body>

<footer>

</footer>

</html>