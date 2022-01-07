<?php
  include '../db/db.php';
  session_start();
  $id            =  $_POST["id"];
  $title         =  $_POST["updatedTitle"];
  $description   =  $_POST["updatedDescription"];
  $date          =  date("Y-m-d H:i:s");
  $updatedArticle = mysqli_query($conn,"UPDATE articles SET `title` = '$title' , `description` = '$description', `updatedAt` = '$date' WHERE id = '$id'");
  if ($updatedArticle == 1) {
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
