<?php
include 'db.php';
session_start();
$email =  $_POST["mail"];
$password =   md5($_POST["pass"]);
$result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $email . "' and password = '". $password."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
  $_SESSION["id"] = $row['id'];
  $_SESSION["user"] = $row;
    $date =  date("Y-m-d H:i:s");
    $user_id = $_SESSION['user']['id'];
    $isLoginQuery = mysqli_query($conn,"UPDATE users SET `isLogin` = 1 , lastLogin = '$date' WHERE id = '$user_id'");
    echo json_encode(array(
       "statusCode"=>200
     ));
    } else {
        echo json_encode(array(
           "statusCode"=>201
         ));
  }
?>
