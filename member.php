<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>
        <?php
            include "inc/head.inc.php";
            require_once "zebra_session/session_start.php";
        ?>
    </head>
    <body>
        <?php
            include "inc/nav.inc.php"
        ?>
        <main class="container">
            <div id="app" class="memberProfile"></div>
            <script type="module" src="jsx/member_profile.js"></script>
        </main>
        <?php
            include "inc/footer.inc.php"
        ?>
    </body>
</html>