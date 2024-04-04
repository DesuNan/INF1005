<!DOCTYPE html>
<html lang="en">
<?php 
include('inc/head.inc.php');
require_once "zebra_session/session_start.php";
?>
<br>
<title>Basic Studies General Q&A Board</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="js/forum_comments.js"></script>

<?php 
include('inc/nav.inc.php');
?>
<body>
	<div class="container">		
		<h2>Basic Studies General Q&A Board</h2>		
		<br>		
		<form method="POST" id="commentForm">
			<div class="form-group">
				<input hidden name="name" id="name" class="form-control" value="<?php echo (!empty($_SESSION["fname"])) ? $_SESSION["fname"] . " " . $_SESSION["lname"] : $_SESSION["lname"] ?>"></input>
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
		<form method="POST" id="deleteForm">	
			<?php if ($_SESSION["accType"] == "instructor") : ?>
				<input type="submit" name="delete" id="delete" class="btn btn-danger" value="Delete All" />
			<?php endif; ?>
		</form>	
		<br>
		<div id="showComments"></div>   
	</div>
	<?php 
		include('inc/footer.inc.php');
	?>
</body>
</html>


