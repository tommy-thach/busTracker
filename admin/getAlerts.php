<?php
   session_start();
   require_once('../include/database.php');
   
   $busID = $_GET['busID'];
   $sql = "SELECT alert FROM busses WHERE id = $busID";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   $alert = $row['alert'];
   
   echo json_encode(array('alert' => $alert));
   ?>