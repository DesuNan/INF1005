<!DOCTYPE html>
<html lang="en">
<?php
include "inc/head.inc.php";
?>

<body>
    <div class="container my-5">
        <h2>List of Resources</h2>
        <a class="btn btn-primary" href="library/create_entry.php" role="button">New Resource</a>
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
                include_once "db_connect.php"; 

                $sql = "SELECT * FROM Library";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['category']}</td>
                        <td><a href='{$row['link']}'>Link</a></td> <!-- Made the link clickable -->
                        <td>{$row['last_updated']}</td>
                        <td>
                            <a class='btn btn-secondary btn-sm' href='library/edit_entry.php?id={$row['id']}'>Edit</a> <!-- Corrected the href -->
                            <a class='btn btn-danger btn-sm' href='library/delete_entry.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this?\");'>Delete</a> <!-- Corrected the href and added a confirmation dialog -->
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
