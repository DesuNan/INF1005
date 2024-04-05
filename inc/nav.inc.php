<header>
    <a href="/index.php" class="basicstudy" style="font-family: Verdana;">BasicStudys</a>
    <div class="menu">
        <div class="btn">
            <i class="fas fa-times close-btn"></i>
        </div>
        <a href="/">Home</a>
        <a href="/#about">About</a>
        <a href="/#portfolio">Instructors</a>
        <a href="/content.php">Content</a>
        <a href="/forum.php">Forum</a>
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['userID']) && $_SESSION['userID'] !== NULL) {
            // User is logged in, display welcome message and button to go to member.php
            $fname = $_SESSION['fname'];
            $lname = $_SESSION["lname"];
            echo '<a href="/library/library.php">Library</a>';
            echo '<a href="/member.php">' . $fname . " " . $lname . '</a>';
            echo '<a href="/process_logout.php">Logout</a>';
        } else {
            // User is not logged in, display Register/Login link
            echo '<a href="/login.php">Register/Login</a>';
        }
        ?>
    </div>
    <div class="btn">
        <i class="fas fa-bars menu-btn"></i>
    </div>
</header>