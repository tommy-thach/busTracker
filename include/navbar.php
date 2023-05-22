<?php 
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="/bustracker/styles/navbar-styles.css">
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
         <div class="container-fluid">
            <img src="https://montclairathletics.com/images/logos/site/site.png" style="max-height:40px;"/>
            <b style="margin-right:50px;">Montclair State University Bus Tracker</b>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav buttons">
               <li class="nav-item">
                  <?php if (isset($_SESSION['username'])) { ?>
                  <a class="nav-link" href="/busTracker/home.php">Home</a>
                  <?php } else { ?>
                  <a class="nav-link" href="/busTracker/login.php">Home</a>
                  <?php } ?>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/busTracker/contact.php">Contact Us</a>
               </li>
            </ul>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
               <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                     <?php if (isset($_SESSION['username'])) { ?>
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Signed in as: <?php echo $_SESSION['username']; ?>
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item settings" href="#">Settings</a></li>
                        <?php if ($_SESSION['isAdmin']) { ?>
                        <li><a class="dropdown-item admin" href="/busTracker/admin/admin.php">Admin Panel</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['isDriver']) { ?>
                        <li><a class="dropdown-item driver" href="/busTracker/driver/driver.php">Driver Panel</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item sign-out" href="/busTracker/logout.php">Sign Out</a></li>
                     </ul>
                     <?php } else { ?>
                     <?php } ?>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </body>
</html>