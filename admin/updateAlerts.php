<?php
   session_start();
   require_once('../include/database.php');
   
   if (!isset($_SESSION['isAdmin']) or empty($_SESSION['isAdmin'])) {
           header("Location: /busTracker/home.php");
     exit();
   }
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $id = $_POST['busID'];
     $alert = $_POST['alert'];
   
     $sql = "UPDATE busses SET alert = '$alert' WHERE id = '$id'";
     if (mysqli_query($conn, $sql)) {
       header("Location: /bustracker/admin/admin.php?status=alertUpdateSuccess");
       exit();
     } else {
       header("Location: /bustracker/admin/admin.php?status=alertUpdateError");
     }
   }
   ?>