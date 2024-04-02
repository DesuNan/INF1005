<!DOCTYPE html>
<html lang="en">

<head>
    <title>BasicStudys Maths</title>
    <?php
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

    <!-- math content -->
    <main class="main-containerSub container">
        <!-- About and Chapters Section -->
        <div class="about-chapters-container">
            <section id="aboutSub">
                <div class="row">
                    <article class="col-sm">
                        <h1>About Mathematics</h1>
                        <p style="color: #666; line-height: 1.6;">
                            Discover the magic of mathematics! Dive into a world where numbers, patterns, and equations come alive to solve problems and unlock
                            mysteries. Mathematics is the language of logic and reason, guiding us through the complexities of the universe. From calculating
                            everyday expenses to unraveling the secrets of the cosmos, math empowers us to understand the world around us and make informed decisions.
                            Embrace the beauty of numbers and embark on a journey of discovery that will sharpen your mind and enrich your life.
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
                                    <h5 class="card-title">Chapter 1: Algebra</h5>
                                    <p class="card-text">Explore the basic concepts of algebra, including equations, inequalities, and functions.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 2 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h5 class="card-title">Chapter 2: Geometry</h5>
                                    <p class="card-text">Dive into the world of shapes, angles, and spatial relationships with geometry.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 3 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h5 class="card-title">Chapter 3: Calculus</h5>
                                    <p class="card-text">Learn the fundamental principles of calculus, including limits, derivatives, and integrals.</p>
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
            </div>
        </section>

    </main>
    <?php
    include "inc/footer.inc.php";
    ?>
</body>

</html>