<!DOCTYPE html>
<html>
    <head>
        <?php
            include "inc/head.inc.php";
            require_once "zebra_session/session_start.php";
        ?>
    </head>
    <body>
        <?php
        include "inc/nav.inc.php";
        ?>
        <main class="container">
            <section class="updateMember">
            <?php
                $email = $fname = $lname = $userID = $errorMsg = "";
                $success = true;
                $userID = $_SESSION["userID"];
                $accType = $_SESSION["accType"];
                $fname = $_SESSION["fname"];
                $lname = $_SESSION["lname"];

                $config = parse_ini_file('/var/www/private/db-config-zebra.ini');

                if(!$config) {
                    $errorMsg = "Failed to read database config file.";
                    $success = false;
                }
                else {
                    $conn = new mysqli(
                        $config['servername'],
                        $config['username'],
                        $config['password'],
                        $config['dbname']
                    );

                    // Check connection
                    if($conn -> connect_error) {
                        $errorMsg = "Connection failed: " . $conn -> connect_error;
                        $success = false;
                    }
                    else {
                        // Prepare the statement:
                        if ($accType == "student") {
                            $deleteStmt = $conn->prepare("DELETE FROM Students WHERE studentID = ?");
                        } else if ($accType == "instructor") {
                            $deleteStmt = $conn->prepare("DELETE FROM Instructors WHERE instructorID = ?");
                        }

                        // Bind & execute the query statement:
                        $deleteStmt -> bind_param("i", $userID);

                        if(!$deleteStmt -> execute()) {
                            $errorMsg = "Execution failed: (" . $deleteStmt -> errno . ") " . $deleteStmt -> error;
                            $success = false;
                        }

                        $deleteStmt -> close();
                    }

                    $conn -> close();
                }

                if ($success) {
                    echo "<h2>Your profile has been deleted!</h2>";
                    echo "<h2>Goodbye, ".$fname." ".$lname."</h2>";
                }
                else {
                    echo "<h2>Oops!</h2>";
                    echo "<h4>The following errors were detected:</h4>";
                    echo "<p>" . $errorMsg . "</p>";
                    echo "<button type='register' class='btn btn-danger' onclick=\"location.href='member.php'\">Return to Member Profile</button>";
                }
            ?>
            </section>
        </main>
        <?php
            include "inc/footer.inc.php";
        ?>
    </body>
</html>