<?php
   $conn = mysqli_connect("localhost:3307", "root", "");
   
   if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
   }
   
   // Create database if it doesn't exist
   $sql = "CREATE DATABASE IF NOT EXISTS bustrackerdb";
   if (mysqli_query($conn, $sql)) {
           #echo "Database created successfully";
   } else {
           echo "Error creating database: " . mysqli_error($conn);
   }
   
   mysqli_select_db($conn, "bustrackerdb");
   
   // Create the accounts table if it doesn't exist
   $sql = "CREATE TABLE IF NOT EXISTS accounts (
           id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
           username VARCHAR(50) NOT NULL,
           password VARCHAR(255) NOT NULL,
           email VARCHAR(50) NOT NULL,
           isDriver BOOLEAN NOT NULL,
           isAdmin BOOLEAN NOT NULL
           )";
   if (mysqli_query($conn, $sql)) {
           #echo "Table accounts created successfully";
   } else {
           echo "Error creating table: " . mysqli_error($conn);
   }
   
   $sql = "CREATE TABLE IF NOT EXISTS busses (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        driverID INT(6),
        stop1 VARCHAR(50),
        stop2 VARCHAR(50),
        stop3 VARCHAR(50),
        stop4 VARCHAR(50),
        alert VARCHAR(255)
        )";
   if (mysqli_query($conn, $sql)) {
        #echo "Table busses created successfully";
   } else {
        echo "Error creating table: " . mysqli_error($conn);
   }
   
   ?>