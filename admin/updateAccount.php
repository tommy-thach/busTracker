<?php
   session_start();
   require_once('../include/database.php');
   
   if (!isset($_SESSION['isAdmin']) or empty($_SESSION['isAdmin'])) {
           header("Location: /busTracker/home.php");
           exit();
         }
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $id = $_GET['id'];
           $username = $_POST['inputUser'];
           $email = $_POST['inputEmail'];
           $isDriver = ($_POST['inputPerms'] == 'Driver') ? 1 : 0;
        
           $sql = "UPDATE accounts SET username = '$username', email = '$email', isDriver = $isDriver WHERE id = '$id'";
           if (mysqli_query($conn, $sql)) {
              header("Location: /bustracker/admin/admin.php?status=accountUpdateSuccess");
              exit();
           } else {
                   header("Location: /bustracker/admin/admin.php?status=accountUpdateError");
           }
        }
   ?>