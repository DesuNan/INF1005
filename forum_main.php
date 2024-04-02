<!DOCTYPE html>
<html lang="en">
<?php 
include('INC/head.inc.php');
?>
<title>Basic Studies General Q&A Board</title>
<script src="js/comments.js"></script>
<?php 
include('INC/nav.inc.php');
?>
<html>
<?php 
include('INC/header.inc.php');
?>
<body>
	<div class="container">		
		<h2>Basic Studies General Q&A Board</h2>		
		<br>		
		<form method="POST" id="commentForm">
			<div class="form-group">
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required />
			</div>
			<div class="form-group">
				<textarea name="comment" id="comment" class="form-control" placeholder="Enter Comment" rows="5" required></textarea>
			</div>
			<span id="message"></span>
			<br>
			<div class="form-group">
				<input type="hidden" name="commentId" id="commentId" value="0"/>
				<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Post Comment"/>
			</div>
		</form>		
		<br>
		<div id="showComments"></div>   
	</div>
</body>
</html>
<?php 
include('INC/footer.inc.php');
?>


