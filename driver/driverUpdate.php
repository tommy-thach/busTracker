<?php
   session_start();
   require_once('../include/database.php');
   
   if (!isset($_SESSION['isDriver']) or empty($_SESSION['isDriver'])) {
       header("Location: /busTracker/home.php");
       exit();
   }
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $id = $_SESSION['id'];
       $stop1 = $_POST['stop1'];
       $stop2 = $_POST['stop2'];
       $stop3 = $_POST['stop3'];
       $stop4 = $_POST['stop4'];
       $alert = $_POST['alert'];
   
       $sql = "UPDATE busses SET stop1 = '$stop1', stop2 = '$stop2', stop3 = '$stop3', stop4 = '$stop4', alert = '$alert' WHERE driverID = '$id'";
       if (mysqli_query($conn, $sql)) {
           header("Location: /bustracker/driver/driver.php?status=updateSuccess");
           exit();
       } 
   }
   
   mysqli_close($conn);
   
   ?>