<?php
   session_start();
   require_once('../include/database.php');

   if (!isset($_SESSION['isAdmin']) or empty($_SESSION['isAdmin'])) {
        header("Location: /busTracker/home.php");
        exit();
      }

      $id = $_GET['id'];

        $sql = "UPDATE busses SET alert = '' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
           header("Location: /bustracker/admin/admin.php?status=alertCleared");
           exit();
        }

        mysqli_close($conn);
?>