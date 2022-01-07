<?php
$servername = "localhost";
$database = "php-exercise";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
?>
