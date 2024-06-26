<!DOCTYPE html>
<html lang = en>
<?php
include_once("forum_db_connect.php");
require_once "zebra_session/session_start.php";
$commentQuery = "SELECT id, parent_id, comment, sender, date FROM Forum WHERE parent_id = '0' ORDER BY id DESC";
$commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
$commentHTML = '';
$username = $_SESSION["fname"]. " " .$_SESSION["lname"];
while($comment = mysqli_fetch_assoc($commentsResult)){
	$commentHTML .= '
		<div class="panel panel-primary">
		<div class="panel-heading">By <b>'.$comment["sender"].'</b> on <i>'.$comment["date"].'</i></div>
		<div class="panel-body">'.$comment["comment"].'</div>
		<div class="panel-footer" align="right"><button type="button" class="btn btn-primary reply" id="'.$comment["id"].'">Reply</button>';
		if ($comment["sender"] == $username || $_SESSION["accType"] == "instructor") {
			$commentHTML .= '<button type="button" class="btn btn-danger delete" id="'.$comment["id"].'">Delete</button>';
		}
		$commentHTML .= '</div>
		</div> ';
	$commentHTML .= getCommentReply($conn, $comment["id"]);
}
echo $commentHTML;

function getCommentReply($conn, $parentId = 0, $marginLeft = 0) {
	global $username;
	$commentHTML = '';
	$commentQuery = "SELECT id, parent_id, comment, sender, date FROM Forum WHERE parent_id = '".$parentId."'";	
	$commentsResult = mysqli_query($conn, $commentQuery);
	$commentsCount = mysqli_num_rows($commentsResult);
	if($parentId == 0) {
		$marginLeft = 0;
	} else {
		$marginLeft = $marginLeft + 48;
	}
	if($commentsCount > 0) {
		while($comment = mysqli_fetch_assoc($commentsResult)){  
			$commentHTML .= '
				<div class="panel panel-primary" style="margin-left:'.$marginLeft.'px">
				<div class="panel-heading">By <b>'.$comment["sender"].'</b> on <i>'.$comment["date"].'</i></div>
				<div class="panel-body">'.$comment["comment"].'</div>
				<div class="panel-footer" align="right"><button type="button" class="btn btn-primary reply" id="'.$comment["id"].'">Reply</button>';
				if ($comment["sender"] == $username || $_SESSION["accType"] == "instructor") {
					$commentHTML .= '<button type="button" class="btn btn-danger delete" id="'.$comment["id"].'">Delete</button>';
				}
				$commentHTML .= '</div>
				</div> ';
			$commentHTML .= getCommentReply($conn, $comment["id"], $marginLeft);
		}
	}
	return $commentHTML;
}
?>
</html>