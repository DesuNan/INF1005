<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Coursedemy</title>
        <?php
            include "INC/head.inc.php";
        ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top navbarScroll">
            <div class="container" style="color: white;">
                <a class="navbar-brand" style="color: white;" href="#">BS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" style="color: white;" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="#portfolio">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- main banner -->
        <section class="bgimage" id="home">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hero-text">
                        <h2 class="hero_title">Welcome to our website</h2>
                        <p class="hero_desc">We specialized in teaching for your future</p>
                    </div>
                </div>
            </div>
        </section>

        <main class="container">
            <section id="english">
                <h2>English</h2>
                <div class="row">
                    <article class="col-sm">
                        <figure>
                            <a target="_self" href="IMG/english_background.jpg" alt="English_Background" class="thumbnail"></a>
                            <figcaption>English Language</figcaption>
                        </figure>
                        <p>
                        Unlock the world with English! As the global language of communication, learning English opens doors to endless opportunities. 
                        Whether you're traveling, studying, or pursuing a career, English proficiency empowers you to connect with people from diverse 
                        cultures and backgrounds. From enhancing job prospects to enriching cultural experiences, mastering English enriches your life in countless ways.
                        </p>
                    </article>
                </div>
            </section>
        </main>
        <?php
            include "INC/footer.inc.php";
        ?>
    </body>
</html>
