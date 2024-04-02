<?php
require_once "zebra_session/session_start.php";


$_SESSION = array();

$session->stop();
session_destroy();
header("Location: /index.php");
?>