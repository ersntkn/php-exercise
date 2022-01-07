<?php
  include '../db/db.php';
  session_start();
  $user_id     =  $_SESSION["user"]["name"];
  $title       =  $_POST["title"];
  $description =  $_POST["description"];
  $date        =   date("Y-m-d H:i:s");
  $query = "INSERT INTO articles (whoIsAdd, title, description, isActive, createdAt) VALUES ('$user_id','$title','$description',1,'$date')";
  if (mysqli_query($conn, $query)) {
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
