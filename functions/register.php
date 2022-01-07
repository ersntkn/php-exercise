<?php
  include '../db/db.php';
  $name =  $_POST["name"];
  $surname =  $_POST["surname"];
  $email =  $_POST["email"];
  $password =   md5($_POST["password"]);
  $date =  date("Y-m-d H:i:s");
  $isLogin =  0;
  $ip_address =  $_SERVER['REMOTE_ADDR'];
  $result = $conn->query("SELECT email FROM users WHERE email = '$email'");
  $countChecker = count($result->fetch_all(MYSQLI_ASSOC));
  if ($countChecker == 0) {
    $query = "INSERT INTO users (name, surname, email, password, createdAt, ipAddress, isLogin) VALUES ('$name','$surname','$email','$password','$date','$ip_address','$isLogin')";
    if (mysqli_query($conn, $query)) {
      echo json_encode(array(
         "statusCode"=>200
       ));
    } else {
      echo json_encode(array(
         "statusCode"=>201
       ));
    }
  }else {
    echo json_encode(array(
       "statusCode"=>202
     ));
  }
  mysqli_close($conn);
?>
