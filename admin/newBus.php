<?php
   session_start();
   require_once('../include/database.php');
   
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
      if (!isset($_SESSION['isAdmin']) or empty($_SESSION['isAdmin'])) {
        header("Location: /busTracker/home.php");
         exit();
      }
   
      $driverID = $_POST['id'];
      $stop1 = $_POST['stop1'];
      $stop2 = $_POST['stop2'];
      $stop3 = $_POST['stop3'];
      $stop4 = $_POST['stop4'];
   
      $sql = "SELECT * FROM busses WHERE driverID = '$driverID'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
   
         header("Location: admin.php?status=newBusError");
         exit();
      }
   
      $sql = "INSERT INTO busses (driverID, stop1, stop2, stop3, stop4)
              VALUES ('$driverID', '$stop1', '$stop2', '$stop3', '$stop4')";
   
      if (mysqli_query($conn, $sql)) {
         header("Location: admin.php?status=newBusSuccess");
      }
   }
   
   mysqli_close($conn);
   
   ?>