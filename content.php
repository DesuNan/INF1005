<!DOCTYPE html>
<html lang="en">

<head>
	<title>BasicStudys Courses</title>
	<?php
	include "inc/head.inc.php";
	?>
</head>

<body>
    <?php
    include "inc/nav.inc.php";
    ?>

	<div class="c-container">
	   <h3 class="c-title">Courses</h3>
	   <div class="courses-container">
		  <div class="course" data-name="c-1">
			 <img src="img/english.jpg" alt="English">
			 <h3>English</h3>
			 <div class="description">Click to understand more</div>
		  </div>

		  <div class="course" data-name="c-2">
			 <img src="img/math.jpg" alt="Mathematics">
			 <h3>Mathematics</h3>
			 <div class="description">Click to understand more</div>
		  </div>

		  <div class="course" data-name="c-3">
			 <img src="img/chemistry.jpg" alt="Chemistry">
			 <h3>Chemistry</h3>
			 <div class="description">Click to understand more</div>
		  </div>

		  <div class="course" data-name="c-4">
			 <img src="img/physics.jpg" alt="Physics">
			 <h3>Physics</h3>
			 <div class="description">Click to understand more</div>
		  </div>
	   </div>
	</div>

	<div class="courses-preview">
	   <div class="preview c-active" data-target="c-1">
		  <i class="fas fa-times"></i>
		  <img src="img/english.jpg" alt="English">
		  <h3>English Language</h3>
		  <p>Unlock the world with English! As the global language of communication, learning English opens doors to endless opportunities. 
             Whether you're traveling, studying, or pursuing a career, English proficiency empowers you to connect with people from diverse 
             cultures and backgrounds. From enhancing job prospects to enriching cultural experiences, mastering English enriches your life in countless ways.
		  </p>
		  <div class="c-buttons">
			 <a href="english.php" class="view">View More</a>
			 <a href="#" class="sign-up">Sign Up</a>
		  </div>
	   </div>

	   <div class="preview" data-target="c-2">
		  <i class="fas fa-times"></i>
		  <img src="img/math.jpg" alt="Mathematics">
		  <h3>Mathematics</h3>
		  <p>Discover the magic of mathematics! Dive into a world where numbers, patterns, and equations come alive to solve problems and unlock 
             mysteries. Mathematics is the language of logic and reason, guiding us through the complexities of the universe. From calculating 
             everyday expenses to unraveling the secrets of the cosmos, math empowers us to understand the world around us and make informed decisions. 
             Embrace the beauty of numbers and embark on a journey of discovery that will sharpen your mind and enrich your life.
		  </p>
		  <div class="c-buttons">
			 <a href="math.php" class="view">View More</a>
			 <a href="#" class="sign-up">Sign Up</a>
		  </div>
	   </div>

	   <div class="preview" data-target="c-3">
		  <i class="fas fa-times"></i>
		  <img src="img/chemistry.jpg" alt="Chemistry">
		  <h3>Chemistry</h3>
		  <p>Embark on a journey into the fascinating world of chemistry! From the tiniest atoms to the complex molecules that make up our world, chemistry 
             is the science that reveals the secrets of matter and its transformations. By studying chemistry, you unlock a deeper understanding of everything 
             around you, from the air we breathe to the food we eat and the medicines that heal us. With chemistry, you gain the power to innovate, create, and 
             contribute to solving some of the world's most pressing challenges. Embrace the excitement of discovery and let chemistry ignite your passion for 
             understanding the building blocks of life itself!
		  </p>
		  <div class="c-buttons">
			 <a href="chemistry.php" class="view">View More</a>
			 <a href="#" class="sign-up">Sign Up</a>
		  </div>
	   </div>

	   <div class="preview" data-target="c-4">
		  <i class="fas fa-times"></i>
		  <img src="img/physics.jpg" alt="Physics">
		  <h3>Physics</h3>
		  <p>Embark on a thrilling journey into the boundless realms of physics! Physics is the fundamental science that unravels the mysteries of the universe, 
             from the smallest particles to the vastness of space and time. By studying physics, you delve into the laws and principles that govern motion, energy, 
             and matter, allowing you to comprehend the inner workings of the cosmos. Explore the wonders of quantum mechanics, delve into the mysteries of relativity, 
             and uncover the secrets of the forces that shape our world. Embrace the challenge of exploring the unknown and let physics ignite your curiosity, inspire 
             your imagination, and propel you toward a deeper understanding of the universe!
		  </p>
		  <div class="c-buttons">
			 <a href="physics.php" class="view">View More</a>
			 <a href="#" class="sign-up">Sign Up</a>
		  </div>
	   </div>
	</div>
	<?php
	include "inc/footer.inc.php"
	?>

</body>
</html>