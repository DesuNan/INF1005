<!DOCTYPE html>
<html lang="en">
<?php
$config = parse_ini_file('/var/www/private/db-config-zebra.ini');

$conn = new mysqli(
    $config['servername'],
    $config['username'],
    $config['password'],
    $config['dbname']
);

if ($conn->connect_error) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>

<head>
    <title>Resource Library</title>
    <?php
    include "../inc/head.inc.php";
    require_once "../zebra_session/session_start.php";
    ?>
</head>

<body>
    <main>
        <?php
        include "../inc/nav.inc.php";
        ?>
        <div class="container my-5">
            <h1>List of Additional Resources</h1>
            <br>
            <?php
            if ($_SESSION["accType"] == "instructor") : ?>
                <a class="btn btn-primary" href="create_entry.php" role="button">New Resource</a>
            <?php endif; ?>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Link</th>
                        <th>Last Updated</th>
                        <?php if ($_SESSION["accType"] == "instructor") : ?>
                            <th>Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM Library";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "
                    <tr>
                        <td>{$row['name']}</td>
                        <td>{$row['category']}</td>
                        <td><a href='{$row['link']}' onclick='return confirm(\"Are you sure you want to navigate to this link?\");'>{$row['link']}</a></td>
                        <td>{$row['last_updated']}</td>";
                        if ($_SESSION["accType"] == "instructor") {
                            echo "
                            <td>
                                <a class='btn btn-secondary btn-sm' href='edit_entry.php?id={$row['id']}'>Edit</a> 
                                <a class='btn btn-danger btn-sm' href='delete_entry.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this?\");'>Delete</a> 
                            </td>
                        </tr>";
                        } else {
                            echo "</tr";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

<?php
include "../inc/footer.inc.php"
?>

</html>