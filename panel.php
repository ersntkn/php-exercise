<!DOCTYPE html>
<html lang="en">
<head>
  <?php
      session_start();
      if (!isset($_SESSION['id'])) {
        header("Location:index.php");
      }
   ?>
    <?php include 'panel/panel_include/head.php';?>
</head>
<body>
  <?php include 'panel/index.php';?>
  <?php include 'panel/panel_include/include_script.php';?>
</body>
</html>
