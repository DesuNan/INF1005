<?php
include "inc/head.inc.php";
?>

<?php
include "db_connect.php";
?>

<?php
    $name = $category = $link = $errorMsg = $successMsg = "";

    if($_SERVER['REQUEST METHOD'] == 'POST'){
        $name = $_POST["name"];
        $category = $_POST["category"];
        $link = $_POST["link"];

        do{
            if(empty($name) || empty($category) || empty($link)){
                $errorMsg = "Please fill in all fields.";
                break;
            }
        } while(false);
        
        // Add client to db
        $sql = "INSERT into Library (name, category, link)" . "VALUES ('$name','$category','$link')";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMsg = "Invalid query: " . $conn->error;
            return $errorMsg;
        }


        // Reset fields after adding client to db
        $name = $category = $link = "";

        $successMsg = "Entry added successfully";

        header("location: library.php");
        exit;
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
                    <input type="text" class="form-control" name="link" value="<?php echo $link;?>">
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