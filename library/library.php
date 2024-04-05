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
    <?php
    include "../inc/nav.inc.php";
    ?>
    <div class="container my-5">
        <h2>List of Resources</h2>
        <?php
        if ($_SESSION["accType"] == "instructor") : ?>
            <a class="btn btn-primary" href="create_entry.php" role="button">New Resource</a>
        <?php endif; ?>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Link</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM Library";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['category']}</td>
                        <td><a href='{$row['link']}'>Link</a></td>
                        <td>{$row['last_updated']}</td>
                        <td>
                            <a class='btn btn-secondary btn-sm' href='edit_entry.php?id={$row['id']}'>Edit</a> 
                            <a class='btn btn-danger btn-sm' href='delete_entry.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this?\");'>Delete</a> 
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

<?php
include "../inc/footer.inc.php"
?>

</html>