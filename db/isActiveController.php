<?php
include 'db.php';

$id =  $_POST["id"];
$date =  date("Y-m-d H:i:s");
$result = mysqli_query($conn,"SELECT * FROM articles WHERE id = '$id'");
$data   = mysqli_fetch_array($result);
  if ($data["isActive"] == 1) {
      $isActiveQuery = mysqli_query($conn,"UPDATE articles SET `isActive` = 0 , updatedAt = '$date' WHERE id = '$id'");
      echo json_encode(array(
         "statusCode"=>200
       ));
  }else {
      $isActiveQuery = mysqli_query($conn,"UPDATE articles SET `isActive` = 1 , updatedAt = '$date' WHERE id = '$id'");
      echo json_encode(array(
         "statusCode"=>200
       ));
  }










?>
