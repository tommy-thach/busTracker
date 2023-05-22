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
      <h1 style="margin-top: 35px; color: white; text-shadow: 2px 4px 4px black;">Register</h1>
      <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         
              
           $username = $_POST['username'];
           $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
           $email = $_POST['email'];
              
           $sql = "SELECT * FROM accounts WHERE username='$username' OR email='$email'";
           $result = mysqli_query($conn, $sql);
              
           if (mysqli_num_rows($result) > 0) {
         	header("Location: register.php?status=error");
           } else {
             
             $sql = "INSERT INTO accounts (username, password, email)
             VALUES ('$username', '$password', '$email')";
             
             if (mysqli_query($conn, $sql)) {
               header("Location: login.php?status=success");
             } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
             }
           }
              
           mysqli_close($conn);
         }
         ?>
      <form method="post" action="">
         <?php
            if (isset($_GET["status"]) && $_GET["status"] == "error") {
               echo "<div class='status'>The username or email is already registered. Please try again.</div>";
            }
            ?>
         <label for="username">Username:</label>
         <input type="text" id="username" name="username" required><br>
         <label for="password">Password:</label>
         <input type="password" id="password" name="password" required><br>
         <label for="email">Email:</label>
         <input type="email" id="email" name="email" required>
         <input type="submit" value="Register">
         <input type="button" onclick="window.location.href='login.php'" value="Back">
      </form>
   </body>
</html>