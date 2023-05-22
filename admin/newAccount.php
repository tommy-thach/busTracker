<?php
   session_start();
   require_once('../include/database.php');
   	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
   		if (!isset($_SESSION['isAdmin']) or empty($_SESSION['isAdmin'])) {
   			header("Location: /busTracker/home.php");
   			exit();
   		      }
         
   	  $username = $_POST['inputUser'];
   	  $password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
   	  $email = $_POST['inputEmail'];
             $permission = $_POST['inputPerms'];
   
         if ($permission == 'User') {
            $isDriver = 0;
         } else if ($permission == 'Driver') {
            $isDriver = 1;
         }
        
   
   	  $sql = "SELECT * FROM accounts WHERE username='$username' OR email='$email'";
   	  $result = mysqli_query($conn, $sql);
         
        if (mysqli_num_rows($result) > 0) {
   		header("Location: admin.php?status=error");
   	  } else {
   	    
   	    $sql = "INSERT INTO accounts (username, password, email, isDriver)
   	    VALUES ('$username', '$password', '$email', '$isDriver')";
   	    
   	    if (mysqli_query($conn, $sql)) {
   	      header("Location: admin.php?status=newAccountSuccess");
   	    } else {
   		header("Location: admin.php?status=newAccountError");
   	    }
   	  }
         
   	  mysqli_close($conn);
   	}
   	?>