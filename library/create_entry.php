<?php
include "inc/head.inc.php";
include "db_connect.php";

$name = $category = $link = $errorMsg = $successMsg = "";

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitize_input($_POST["name"]);
    $category = sanitize_input($_POST["category"]);
    //Not sanitized because we need the slashes, sanitize output instead
    $link = $_POST["link"];

    if (empty($name) || empty($category) || empty($link)) {
        $errorMsg = "Please fill in all fields.";
    } else {
        // Use prepared statement to insert into the database
        $stmt = $conn->prepare("INSERT INTO Library (name, category, link) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $category, $link);

        if ($stmt->execute()) {
            $successMsg = "Entry added successfully";
            // Reset fields after adding to db
            $name = $category = $link = "";
        } else {
            $errorMsg = "Invalid query: " . $conn->error;
        }
        $stmt->close();
        header("Location: library.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container my-5">
        <h2>New Resource</h2>

        <?php
            if(!empty($errorMsg)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMsg</strong>
                    <button type = 'button' class ='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Resource Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="category" value="<?php echo $category;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Link</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="link" value="<?php echo htmlspecialchars(filter_var($link, FILTER_SANITIZE_URL)); ?>">
                </div>
            </div>
            
            <?php
            if(!empty($errorMsg)){
                echo "
                <div class='row mb-3'>
                    <div class-'offset-sm-3 col-sm-6'>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$successMsg</strong>
                            <button type = 'button' class ='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";  
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-6 d-grid">
                    <a class="btn btn-outline-primary" href= "library.php" role="button">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>