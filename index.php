<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BasicStudys</title>
        <?php
            include "INC/head.inc.php";
        ?>
    </head>
    <body>
        <?php
            include "INC/nav.inc.php";
        ?>
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

        <!-- about section-->
        <main class="container">
            <section id="about">
                <div class="container mt-4 pt-4">
                    <h1 class="text-center">About Me</h1>
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <img src="img/bg.jpeg" class="imageAboutPage" alt="">
                        </div>

                         <div class="col-lg-8">
                            <p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </p>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <ul>
                                        <li>Name: David Parker</li>
                                        <li>Age: 28</li>
                                        <li>Occupation: Web Developer</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>Name: David Parker</li>
                                        <li>Age: 28</li>
                                        <li>Occupation: Web Developer</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                </p>
                            </div>
                        </div>
                    </div>
            </section>

            <!-- services section-->
            <section id="services">
                <div class="container">
                    <h1 class="text-center">Services</h1>
                    <div class="row">
                        <div class="col-lg-4 mt-4">
                            <div class="card servicesText">
                                <div class="card-body">
                                    <i class="fas servicesIcon fa-clock"></i>
                                    <h4 class="card-title mt-3">Website Development</h4>
                                    <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4">
                            <div class="card servicesText">
                                <div class="card-body">
                                    <i class='fas servicesIcon fa-layer-group'></i>
                                    <h4 class="card-title mt-3">Website Design</h4>
                                    <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-4">
                            <div class="card servicesText">
                                <div class="card-body">
                                    <i class='far servicesIcon fa-check-circle'></i>
                                    <h4 class="card-title mt-3">Website Deployment</h4>
                                    <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mt-4">
                            <div class="card servicesText">
                                <div class="card-body">
                                    <i class='fas servicesIcon fa-search'></i>
                                    <h4 class="card-title mt-3">SEO</h4>
                                    <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-4">
                            <div class="card servicesText">
                                <div class="card-body">
                                    <i class='fas servicesIcon fa-shield-alt'></i>
                                    <h4 class="card-title mt-3">DevOps</h4>
                                    <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-4">
                            <div class="card servicesText">
                                <div class="card-body">
                                    <i class='fas servicesIcon fa-wrench'></i>
                                    <h4 class="card-title mt-3">QA</h4>
                                    <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- footer section-->
        <?php
            include "INC/footer.inc.php";
        ?>
    </body>
</html>