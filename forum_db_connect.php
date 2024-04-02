<?php
$config = parse_ini_file('/var/www/private/db-zebra-config.ini');

$conn = new mysqli(
  $config['servername'],
  $config['username'],
  $config['password'],
  $config['dbname']
);

if ($conn->connect_error) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>