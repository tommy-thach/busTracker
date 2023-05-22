<?php
   session_start();
   require_once('./include/database.php');
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="/bustracker/scripts/navbar.js"></script>
      <link rel="stylesheet" type="text/css" href="/bustracker/styles/form-styles.css">
   </head>
   <style>
      body {
         background-image: url("https://i.ytimg.com/vi/lqnaf0ckOz8/maxresdefault.jpg");
         background-repeat: no-repeat;
         background-size: cover;
         z-index: -1;
         font-family: Arial, sans-serif;
         margin: 0;
      }
   </style>
   <body>
      <div id="navbar"></div>
      <h1 style="margin-top: 35px; color: white; text-shadow: 2px 4px 4px black;">Login</h1>
      <form action="" method="POST">
         <?php
            if (isset($_GET["status"]) && $_GET["status"] == "success") {
               echo "<div class='status'>Account successfully created. Please sign in below.</div>";
            }
            if (isset($_GET["status"]) && $_GET["status"] == "error") {
               echo "<div class='status'>Invalid username or password. Please try again.</div>";
            }
            ?>
         <label for="username">Username:</label>
         <input type="text" id="username" name="username" required>
         <label for="password">Password:</label>
         <input type="password" id="password" name="password" required>
         <input type="submit" value="Login">
         <input type="button" onclick="window.location.href='register.php'" value="Register">
      </form>
      <?php
         if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM accounts WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) == 1) {
               $row = mysqli_fetch_assoc($result);
               if (password_verify($password, $row['password'])) {
                  $_SESSION['id'] = $row['id'];
                  $_SESSION['username'] = $row['username'];
                  $_SESSION['isDriver'] = $row['isDriver'];
                  $_SESSION['isAdmin'] = $row['isAdmin'];
                  header("Location: home.php");
                  exit();
               }
            }
            
               header("Location: login.php?status=error");
               
               mysqli_close($conn);
         }
         ?>
   </body>
</html>