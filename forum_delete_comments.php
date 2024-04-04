<!DOCTYPE html>
<html lang="en">
<?php
include_once("forum_db_connect.php");

if (!empty($_POST["commentId"])) {
    $deleteComments = $conn->prepare("DELETE FROM Forum WHERE id = ?");
    $deleteComments->bind_param("i", $_POST["commentId"]);
	$deleteComments->execute();
    $result = $deleteComments->get_result();

    if ($result->num_rows > 0) {
        $message = '<label class="text-success">Comment deleted successfully.</label>';
        $status = array(
            'error' => 0,
            'message' => $message
        );
    } else {
        $message = '<label class="text-danger">Error: Comment not deleted.</label>';
        $status = array(
            'error' => 1,
            'message' => $message
        );
    }
	$deleteComments->close();
} else {
    $message = '<label class="text-danger">Error: Invalid comment ID.</label>';
    $status = array(
        'error' => 1,
        'message' => $message
    );
}
echo json_encode($status);
?>
