<!DOCTYPE html>
<html lang=en>

<?php
$config = parse_ini_file('/var/www/private/db-config-zebra.ini');
$successFlag = true;
$name = $comment = $date = $reply_id = "";

function sanitize_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(!$config){
    die("Failed to read database config file.");
} else {
    $conn = mysqli_connect($config['servername'],$config['username'], $config['password'], $config['dbname']);
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
}
if(isset($_POST["submit"])){
    $name = sanitize_input($_POST["name"]);
    $comment = sanitize_input($_POST["comment"]);
    $date = date('F d Y, h:i:s A');
    $reply_id = sanitize_input($_POST["reply_id"]);
  
    // Prepare statements before inserting for security
    $query = $conn->prepare("INSERT INTO tb_data (name, comment, date, reply_id) VALUES (?, ?, ?, ?)");
    $query->bind_param("sssi", $name, $comment, $date, $reply_id);
    $query->execute();
    mysqli_query($conn, $query);
}

?>

<html>
<style>
    *{
      margin: 0px;
      padding: 0px;
    }
    body{
      background: #212523;
    }
    .container{
      background: white;
      width: 700px;
      margin: 0 auto;
      padding-top: 1px;
      padding-bottom: 5px;
    }
    .comment, .reply{
      margin-top: 5px;
      padding: 10px;
      border-bottom: 1px solid black;
    }
    .reply{
      border: 1px solid #ccc;
    }
    p{
      margin-top: 5px;
      margin-bottom: 5px;
    }
    form{
      margin: 10px;
    }
    form h3{
      margin-bottom: 5px;
    }
    form input, form textarea{
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
    }
    form button.submit, button{
      background: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      padding: 10px 20px;
      width: 100%;
    }
    button.reply{
      background: orange;
    }
  </style>
  <body>
    <?php 
    include "INC/nav.inc.php"; 
    ?>
    <div class="container">
      <?php
      $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = 0"); // only select comment and not select reply
      foreach($datas as $data) {
        require 'comment.php';
      }
      ?>
      <form action = "" method = "post">
        <h3 id = "title">Got a question for us? Leave a comment here!</h3>
        <input type="hidden" name="reply_id" id="reply_id">
        <input type="text" name="name" placeholder="Your name" required>
        <textarea name="comment" placeholder="Your comment" required></textarea>
        <button class = "submit" type="submit" name="submit">Submit</button>
      </form>
    </div>

    <script>
      function reply(id, name){
        title = document.getElementById('title');
        title.innerHTML = "Reply to " + name;
        document.getElementById('reply_id').value = id;
      }
    </script>
  </body>
</html>