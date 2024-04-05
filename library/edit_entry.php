<?php
include "inc/head.inc.php";

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

$name = $category = $link = $errorMsg = $successMsg = "";
$id = 0;

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle GET request to populate form for editing
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("Location: library.php");
        exit;
    }

    $id = (int)$_GET["id"];

    // Prepare the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM Library WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: library.php");
        exit;
    }
    
    $name = sanitize_input($row["name"]);
    $category = sanitize_input($row["category"]);
    $link = sanitize_input($row["link"]);

    $stmt->close();
}

// Handle POST request to update record
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int)$_POST["id"];
    $name = sanitize_input($_POST["name"]);
    $category = sanitize_input($_POST["category"]);
    $link = $_POST["link"];

    // Validate URL
    if (!filter_var($link, FILTER_VALIDATE_URL)) {
        $errorMsg = "Invalid URL provided.";
    } else {
        // Check for empty fields
        if (empty($name) || empty($category) || empty($link)) {
            $errorMsg = "Please fill in all fields.";
        } else {
            // Prepare the UPDATE statement
            $stmt = $conn->prepare("UPDATE Library SET name = ?, category = ?, link = ?, last_updated = CURRENT_TIMESTAMP WHERE id = ?");
            $stmt->bind_param("sssi", $name, $category, $link, $id);
            if ($stmt->execute()) {
                $successMsg = "Updated successfully";
                $stmt->close();
                header("Location: library.php");
                exit;
            } else {
                $errorMsg = "Invalid query: " . $stmt->error;
                $stmt->close();
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container my-5">
        <h2>Edit Resource</h2>

        <?php
            if(!empty($errorMsg)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>" . htmlspecialchars($errorMsg) ."</strong>
                    <button type = 'button' class ='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
        ?>

        <form method="post">
            <input type="hidden" name = "id" value = "<?php echo $id; ?>">
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
                            <strong>" . htmlspecialchars($successMsg) . "</strong>
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
                    <a class="btn btn-outline-primary" href= "library/library.php" role="button">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>