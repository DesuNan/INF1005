<!DOCTYPE html>
<html lang="en">
<?php
include_once("forum_db_connect.php");

$deleteComments = $conn->prepare("DELETE FROM Forum");

if ($deleteComments->execute()) {
    $message = '<label class="text-success">Comment deleted successfully.</label>';
    $status = array(
        'error' => 0,
        'message' => $message
    );
} else {
    $message = '<label class="text-danger">Error: Comments not deleted.</label>';
    $status = array(
        'error' => 1,
        'message' => $message
    );
}
$deleteComments->close();

echo json_encode($status);
?>
