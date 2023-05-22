<?php
   session_start();
   require_once('./include/database.php');
   $busID = $_GET['busID'];
   
   $sql = "SELECT stop1, stop2, stop3, stop4, alert FROM busses WHERE id = $busID";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   
   $html = '<div style="font-size:20px; padding-top:40px;"><b>Stops</b></div><ul>';
   if ($row['stop1'] !== "None") {
           $html .= '<li><a href="#">'.$row['stop1'].'</a></li>';
         }
         if ($row['stop2'] !== "None") {
           $html .= '<li><a href="#">'.$row['stop2'].'</a></li>';
         }
         if ($row['stop3'] !== "None") {
           $html .= '<li><a href="#">'.$row['stop3'].'</a></li>';
         }
         if ($row['stop4'] !== "None") {
           $html .= '<li><a href="#">'.$row['stop4'].'</a></li>';
         }
   $html .= '</ul><div class="alerts"><div style="font-size:35px; padding-top:20px;"><b><u>Alerts</u></b></div>';
   
   if ($row['alert']) {
     $html .= '<div style="font-size:18px; padding-top:10px;">'.$row['alert'].'</div>';
   } else {
     $html .= '<div style="font-size:18px; padding-top:10px;">There are currently no new alerts.</div>';
   }
   
   $html .= '</div>';
   
   echo $html;
   mysqli_close($conn);
   ?>