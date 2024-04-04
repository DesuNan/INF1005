<!DOCTYPE html>
<html lang="en">

<head>
    <title>BasicStudys</title>
    <?php
    include "inc/head.inc.php";
    require_once "zebra_session/session_start.php";
    ?>
</head>

<body id="content_body">
    <?php
    include "inc/nav.inc.php";
    ?>

    <!-- physics content -->
    <main class="main-containerSub container">
        <!-- About and Chapters Section -->
        <div class="about-chapters-container">
            <section id="aboutSub">
                <div class="row">
                    <article class="col-sm">
                        <h1>About Physics</h1>
                        <p>
                            Embark on a thrilling journey into the boundless realms of physics! Physics is the fundamental science that unravels the mysteries of the universe,
                            from the smallest particles to the vastness of space and time. By studying physics, you delve into the laws and principles that govern motion, energy,
                            and matter, allowing you to comprehend the inner workings of the cosmos. Explore the wonders of quantum mechanics, delve into the mysteries of relativity,
                            and uncover the secrets of the forces that shape our world. Embrace the challenge of exploring the unknown and let physics ignite your curiosity, inspire
                            your imagination, and propel you toward a deeper understanding of the universe!
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
                                    <h2 class="card-title" style="font-size: 22px;">Chapter 1: Mechanics</h2>
                                    <p class="card-text">Explore the fundamental principles of motion, forces, and energy in mechanics.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 2 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h2 class="card-title" style="font-size: 22px;">Chapter 2: Electricity and Magnetism</h2>
                                    <p class="card-text">Understand the behavior of electric charges, currents, and magnetic fields.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 3 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h2 class="card-title" style="font-size: 22px;">Chapter 3: Thermodynamics</h2>
                                    <p class="card-text">Learn about the principles governing heat, temperature, and energy transfer in thermodynamics.</p>
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
<?php
include "inc/footer.inc.php";
?>

</html>