<?php
include 'db.php';
session_start();
$user_id = $_SESSION['user']['id'];
$isLogoutQuery = mysqli_query($conn,"UPDATE users SET `isLogin` = 0 WHERE id = '$user_id'");
unset($_SESSION["id"]);
unset($_SESSION["user"]);
header("Location:../index.php");
?>
