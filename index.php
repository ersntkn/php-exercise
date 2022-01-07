<!DOCTYPE html>
<html lang="en">
<head>
  <?php
      session_start();
      if (isset($_SESSION['id'])) {
        header("Location:panel.php");
      }
   ?>
    <?php include 'include/head.php';?>
</head>
<body>
  <?php include 'login/index.php';?>
  <?php include 'include/include_script.php';?>
</body>
</html>
