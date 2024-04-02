<!DOCTYPE html>
<html lang = en>
<div class="comment">
  <h4><?php echo htmlspecialchars($data['name']); ?></h4>
  <p><?php echo htmlspecialchars($data['date']); ?></p>
  <p><?php echo htmlspecialchars($data['comment']); ?></p>
  <?php $reply_id = $data['id']; ?>
  <button class="reply" onclick="reply(<?php echo htmlspecialchars($reply_id); ?>, '<?php echo htmlspecialchars(addslashes($data['name'])); ?>');">Reply</button>

  <!-- Delete button for the reply -->
  <form method="POST" action="forum.php" onsubmit="return confirm('Are you sure you want to delete this reply?');">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <input type="submit" name="delete" value="Delete">
  </form>
  
  <?php
  unset($datas);
  $query = $conn->prepare("SELECT * FROM tb_data WHERE reply_id = ?");
  $query->bind_param("i", $reply_id);
  $query->execute();
  $result = $query->get_result();
  if($result->num_rows > 0) {
    while ($data = $result->fetch_assoc()) {
      require 'reply.php';
    }
  }
  $query->close();
  ?>
</div>
