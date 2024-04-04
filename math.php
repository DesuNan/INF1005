<!DOCTYPE html>
<html lang="en">

<head>
    <title>BasicStudys Maths</title>
    <?php
    include "inc/head.inc.php";
    require_once "zebra_session/session_start.php";
    ?>
</head>

<body id="content_body">
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
                        <p>
                            Discover the magic of mathematics! Dive into a world where numbers, patterns, and equations come alive to solve problems and unlock
                            mysteries. Mathematics is the language of logic and reason, guiding us through the complexities of the universe. From calculating
                            everyday expenses to unraveling the secrets of the cosmos, math empowers us to understand the world around us and make informed decisions.
                            Embrace the beauty of numbers and embark on a journey of discovery that will sharpen your mind and enrich your life.
                        </p>
                    </article>
                </div>
            </section>

            <section id="chapters">
                <div id="chapters_container" class="container">
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
                <div id="a-row" class="row">
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
</body>
<footer>
    <?php
    include "inc/footer.inc.php";
    ?>
</footer>

</html>