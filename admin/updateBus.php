<?php
   session_start();
   require_once('../include/database.php');
   
   if (!isset($_SESSION['isAdmin']) or empty($_SESSION['isAdmin'])) {
           header("Location: /busTracker/home.php");
       exit();
   }
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $id = $_GET['id'];
       $driverID = $_POST['driverID'];
       $stop1 = $_POST['stop1'];
       $stop2 = $_POST['stop2'];
       $stop3 = $_POST['stop3'];
       $stop4 = $_POST['stop4'];
   
       $sql = "SELECT * FROM busses WHERE driverID = '$driverID' AND id != '$id'";
       $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
           header("Location: /bustracker/admin/admin.php?status=busUpdateError");
           exit();
       }
   
       $sql = "UPDATE busses SET driverID = '$driverID', stop1 = '$stop1', stop2 = '$stop2', stop3 = '$stop3', stop4 = '$stop4' WHERE id = '$id'";
       if (mysqli_query($conn, $sql)) {
           header("Location: /bustracker/admin/admin.php?status=busUpdateSuccess");
           exit();
       } 
   }
   
   mysqli_close($conn);
   ?>