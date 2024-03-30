<?php
$config = parse_ini_file('/var/www/private/db-config-zebra.ini');
if(!$config){
    die("Failed to read database config file.");
} else {
    $conn = mysqli_connect($config['servername'],$config['username'], $config['password'], $config['dbname']);
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $date = date('F d Y, h:i:s A');
    $reply_id = $_POST["reply_id"];
  
    $query = "INSERT INTO tb_data VALUES('', '$name', '$comment', '$date', '$reply_id')";
    mysqli_query($conn, $query);
}

?>

<html>
  <body>
    <div class="container">
      <?php
      $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = 0"); // only select comment and not select reply
      foreach($datas as $data) {
        require 'comment.php';
      }
      ?>
      <form action = "" method = "post">
        <h3 id = "title">Leave a Comment</h3>
        <input type="hidden" name="reply_id" id="reply_id">
        <input type="text" name="name" placeholder="Your name">
        <textarea name="comment" placeholder="Your comment"></textarea>
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