<!DOCTYPE html>
<html lang="en">

<head>
    <title>BasicStudys English</title>
    <?php
    include "inc/head.inc.php";
    require_once "zebra_session/session_start.php";
    ?>
</head>

<body id="content_body">

    <?php
    include "inc/nav.inc.php";
    ?>
    
    <!-- english content -->
    <main class="main-containerSub container">
        <!-- About and Chapters Section -->
        <div class="about-chapters-container">
            <section id="aboutSub">
                <div class="row">
                    <article class="col-sm">
                        <h1>About English</h1>
                        <p>
                            Unlock the world with English! As the global language of communication, learning English opens doors to endless opportunities. Whether you're traveling, studying, or pursuing a career, English proficiency empowers you to connect with people from diverse cultures and backgrounds. From enhancing job prospects to enriching cultural experiences, mastering English enriches your life in countless ways.
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
                <div id="a-row" class="row">
                    <div class="col-lg-12 mt-4">
                        <!-- Add notification border with text -->
                        <div class="announcement-border">
                            No new announcement
                        </div>
                    </div>
                </div>
    </main>
</body>
<footer>
    <?php
    include "inc/footer.inc.php";
    ?>
</footer>
</html>