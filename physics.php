<!DOCTYPE html>
<html lang="en">

<head>
    <title>BasicStudys Physics</title>
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
            margin-right: 20px; /* Adjust as needed */
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

    <!-- physics content -->
    <main class="main-containerSub container">
        <!-- About and Chapters Section -->
        <div class="about-chapters-container">
            <section id="aboutSub">
                <div class="row">
                    <article class="col-sm">
                        <h1>About Physics</h1>
                        <p style="color: #666; line-height: 1.6;">
                        Embark on a thrilling journey into the boundless realms of physics! Physics is the fundamental science that unravels the mysteries of the universe, 
                        from the smallest particles to the vastness of space and time. By studying physics, you delve into the laws and principles that govern motion, energy, 
                        and matter, allowing you to comprehend the inner workings of the cosmos. Explore the wonders of quantum mechanics, delve into the mysteries of relativity, 
                        and uncover the secrets of the forces that shape our world. Embrace the challenge of exploring the unknown and let physics ignite your curiosity, inspire 
                        your imagination, and propel you toward a deeper understanding of the universe!
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
                                    <h5 class="card-title">Chapter 1: Mechanics</h5>
                                    <p class="card-text">Explore the fundamental principles of motion, forces, and energy in mechanics.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 2 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h5 class="card-title">Chapter 2: Electricity and Magnetism</h5>
                                    <p class="card-text">Understand the behavior of electric charges, currents, and magnetic fields.</p>
                                    <a href="#" class="btn btn-primary">Read Chapter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 chapters-align">
                            <!-- Chapter card 3 -->
                            <div class="card chapter-card">
                                <div class="card-body">
                                    <h5 class="card-title">Chapter 3: Thermodynamics</h5>
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
