<?php
   session_start();
   require_once('./include/database.php');
   ?>
<!DOCTYPE html>
<html lang="en">
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
      background-image: url("https://www.montclair.edu/responsive-media/cache/soaring-together/wp-content/uploads/sites/258/2022/11/121020_3635_College-Hall-Aerial-3-scaled-1.jpeg.5.1x.generic.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      z-index: -1;
      font-family: Arial, sans-serif;
      margin: 252;
      }
   </style>
   <body>
      <div id="navbar"></div>
      <div class="container">
         <div style="font-size:35px; padding-top:20px;"><b><u>Schedule</u></b></div>
         <div style="font-size:25px; padding-top:5px;">The shuttle operates on Monday through Friday from 6:00 AM to 1:00 AM</div>
         <div style="font-size:20px; padding-top:20px;"><b>Select a bus:</b></div>
         <?php
            $sql = "SELECT id, stop1, stop2, stop3, stop4, alert FROM busses";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
              echo '<select id="busID" name="busID" onchange="getBusInfo()" style="margin-left: 25px; margin-right: 25px;">';
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '"> Bus #' . $row['id'] . '</option>';
              }
              echo '</select>';
            } else {
              echo '<select style="margin-left: 25px; margin-right: 25px;">';
              echo '<option value=0>Empty</option>';
              echo '</select>';
            }
            ?>
         <div id="busInfo">
            <script src="/bustracker/scripts/getBusInfo.js"></script>
            <div style="font-size:20px; padding-top:40px;"><b>Stops</b></div>
            <ul>
               <li><a href="#">Stop 1</a></li>
               <li><a href="#">Stop 2</a></li>
               <li><a href="#">Stop 3</a></li>
               <li><a href="#">Stop 4</a></li>
            </ul>
            <div class="alerts">
               <div style="font-size:35px; padding-top:20px;"><b><u>Alerts</u></b></div>
               <div style="font-size:18px; padding-top:10px;">There are currently no new alerts.</div>
            </div>
         </div>
      </div>
      <div class="main">
         <div class="map">
            <div class="mainText">
               <b><span style="font-size:25px;color: white; text-shadow: 2px 4px 4px black;">The Montclair State University shuttle service is available throughout campus. All shuttles are ADA accessible and available to any visitors.</span></b>
            </div>
            <h1 style="margin-top:25px; color: white; text-shadow: 2px 4px 4px black;">Map</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11723.235426738438!2d-74.20639806382647!3d40.866602227674974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sTransit%20stations!5e1!3m2!1sen!2sus!4v1677620389376!5m2!1sen!2sus" width="700" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
      </div>
   </body>
</html>