<!DOCTYPE html>
<html lang="en">
<?php
include "INC/head.inc.php";
?>
  <style>
      * {
        margin: 0px;
        padding: 0px;
      }
      body {
        background: #212523;
      }
      .container {
        background: white;
        width: 700px;
        margin: 0 auto;
        padding-top: 1px;
        padding-bottom: 5px;
      }
      .comment, .reply {
        margin-top: 5px;
        padding: 10px;
        border-bottom: 1px solid black;
      }
      .reply {
        border: 1px solid #ccc;
      }
      p {
        margin-top: 5px;
        margin-bottom: 5px;
      }
      form {
        margin: 10px;
      }
      form h3 {
        margin-bottom: 5px;
      }
      form input, form textarea {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
      }
      form button.submit, button {
        background: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        padding: 10px 20px;
        width: 100%;
      }
      button.reply {
        background: orange;
      }
  </style>
<body>
    <?php
    include "INC/nav.inc.php";
    ?>
    <?php 

    $config = parse_ini_file('/var/www/private/db-config-zebra.ini');
    $successFlag = true;
    $name = $comment = $date = $reply_id = $errorMsg = "";

    function sanitize_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if(!$config){
        die("Failed to read database config file.");
        // Change to error messages later
    } else {
        $conn = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
        if($conn->connect_error){
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    if(isset($_POST["submit"])){
        $name = sanitize_input($_POST["name"]);
        $comment = sanitize_input($_POST["comment"]);
        $date = date('F d Y, h:i:s A');
        $reply_id = sanitize_input($_POST["reply_id"]);
      
        $stmt = $conn->prepare("INSERT INTO forum_data (name, comment, date, reply_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $comment, $date, $reply_id);
        $stmt->execute();

        $conn->close();
    }

    if(isset($_POST["delete"]) && isset($_POST["id"])) {
      $id = intval($_POST["id"]); // Ensure the ID is an integer to avoid SQL injection
  
      // First, check if it's a comment or a reply
      $stmt = $conn->prepare("SELECT reply_id FROM forum_data WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($row = $result->fetch_assoc()) {
          if ($row['reply_id'] == 0) {
              // It's a comment, delete the comment and all associated replies
              $delStmt = $conn->prepare("DELETE FROM tb_data WHERE id = ? OR reply_id = ?");
              $delStmt->bind_param("ii", $id, $id);
              $delStmt->execute();
              $delStmt->close();
          } else {
              // It's a reply, delete only the reply
              $delStmt = $conn->prepare("DELETE FROM tb_data WHERE id = ?");
              $delStmt->bind_param("i", $id);
              $delStmt->execute();
              $delStmt->close();
          }
      }
      $stmt->close();
  
      // Redirect to avoid form resubmission
      header("Location: forum.php");
      exit();
    }
  
  
    ?>
    
    <div class="container">
        <?php
        $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = 0");
        foreach($datas as $data) {
            require 'comment.php';
        }
        ?>
        <form action="" method="post">
            <h3 id="title">Got a question for us? Leave a comment here!</h3>
            <input type="hidden" name="reply_id" id="reply_id">
            <input type="text" name="name" placeholder="Your name" required>
            <textarea name="comment" placeholder="Your comment" required></textarea>
            <button class="submit" type="submit" name="submit">Submit</button>
        </form>
    </div>

    <script>
        function reply(id, name){
            var title = document.getElementById('title');
            title.innerHTML = "Reply to " + name;
            document.getElementById('reply_id').value = id;
        }
    </script>
</body>
</html>
