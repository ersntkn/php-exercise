<?php
  include '../db/db.php';
  $id =  $_POST["id"];
  $result = mysqli_query($conn,"SELECT * FROM articles WHERE id='" . $id . "'");
  $row  = mysqli_fetch_array($result);
  echo json_encode($row);
  mysqli_close($conn);

?>
