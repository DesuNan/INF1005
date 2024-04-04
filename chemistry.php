<!DOCTYPE html>
<html lang="en">

<head>
    <title>Basicstudy</title>
    <?php
    include "inc/head.inc.php";
    require_once "zebra_session/session_start.php";
    ?>
</head>

<body id="content_body">
    <?php
    include "inc/nav.inc.php";
    ?>

    <!-- chemistry content -->
    <main class="main-containerSub container">
        <!-- About and Chapters Section -->
        <div class="about-chapters-container">
            <section id="aboutSub">
                <div class="row">
                    <article class="col-sm">
                        <h1>About Chemistry</h1>
                        <p>
                            Embark on a journey into the fascinating world of chemistry! From the tiniest atoms to the complex molecules that make up our world, chemistry
                            is the science that reveals the secrets of matter and its transformations. By studying chemistry, you unlock a deeper understanding of everything
                            around you, from the air we breathe to the food we eat and the medicines that heal us. With chemistry, you gain the power to innovate, create, and
                            contribute to solving some of the world's most pressing challenges. Embrace the excitement of discovery and let chemistry ignite your passion for
                            understanding the building blocks of life itself!
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
                                    <h2 class="card-title" style="font-size: 22px;">Chapter 1: Atomic Structure</h2>
                                    <p class="card-text">Explore the basic building blocks of matter, including atoms, isotopes, and atomic models.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 2 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h2 class="card-title" style="font-size: 22px;">Chapter 2: Chemical Bonding</h2>
                                    <p class="card-text">Understand the forces that hold atoms together to form molecules and compounds.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 3 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h2 class="card-title" style="font-size: 22px;">Chapter 3: Stoichiometry</h2>
                                    <p class="card-text">Learn about the quantitative relationships between reactants and products in chemical reactions.</p>
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