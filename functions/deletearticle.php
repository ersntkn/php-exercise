<?php
  include '../db/db.php';
  $id     =  $_POST["id"];
  $deleteRequest = mysqli_query($conn,"DELETE FROM articles WHERE id = '$id'");
  if ($deleteRequest == 1) {
    echo json_encode(array(
       "statusCode"=>200
     ));
  } else {
    echo json_encode(array(
       "statusCode"=>201
     ));
  }
  mysqli_close($conn);
?>
