<!DOCTYPE html>
<html lang="en">

<head>
    <title>BasicStudys</title>
    <?php
    include "inc/head.inc.php";
    require_once "zebra_session/session_start.php";
    ?>
</head>


<body class="d-flex flex-column min-vh-100">
    <?php
    include "inc/nav.inc.php";
    ?>

    <!-- Main Content -->
    <main class="flex-grow-1">
        <div class="container mt-5">
            <div class="row">
                <article class="col-sm">
                    <h1>Chapter 1: Introduction to English</h1>
                </article>
            </div>
            <!-- Tabs -->
            <section id="tabs">
                <div class="row">
                    <div class="col">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">Part 1 - Introduction to English PDF</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Part 2 - Recap</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">Additional Resources</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                <!-- PDF Reader -->
                                <iframe src="pdf/intro_to_english.pdf" class="d-block w-100" height="1000px"></iframe>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                <!-- Carousel -->
                                <div id="recap_carousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="img/intro_eng.png" alt="Slide 1">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="img/grammer.png" alt="Slide 2">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="img/noun.png" alt="Slide 3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                <iframe width="1212" height="682" src="https://www.youtube.com/embed/juKd26qkNAw" title="Learn English in 30 Minutes - ALL the English Basics You Need" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </main>

</body>
<footer>
    <?php
    include "inc/footer.inc.php";
    ?>
</footer>

</html>