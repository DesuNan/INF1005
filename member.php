<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Member Page</title>
        <?php
            include "inc/head.inc.php";
            require_once "zebra_session/session_start.php";
        ?>
    </head>
    <body>
        <?php
            include "inc/nav.inc.php"
        ?>
        <main>
            <div id="app" class="memberProfile"></div>
            <script src="jsx/member_profile.js"></script>
        </main>
        <?php
            include "inc/footer.inc.php"
        ?>
    </body>
</html>