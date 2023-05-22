<?php
   session_start();
   require_once('../include/database.php');
   
   if (!isset($_SESSION['isAdmin']) or empty($_SESSION['isAdmin'])) {
      header("Location: /busTracker/home.php");
      exit();
    }
   
      $id = $_POST['id'];
      $sql = "SELECT username, email, isDriver FROM accounts WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);
   
      if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
             $username = $row['username'];
             $email = $row['email'];
             $isDriver = $row['isDriver'];
         }
      }
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Panel</title>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="/bustracker/scripts/navbar.js"></script>
      <link rel="stylesheet" type="text/css" href="/bustracker/styles/admin-styles.css">
   </head>
   <body>
      <div id="navbar"></div>
      <div style="margin-left:33%;" class="grid-container">
      <div class="box" id="top-left">
         <h2 style="padding-top: 40px;text-align: center; font-weight: bold;">Edit Account</h2>
         <div style="margin-top:20px;" class="form-row">
            <form method="post" action="updateAccount.php?id=<?php echo $id; ?>">
               <div style="width:100% !important;margin-left:25%;" class="form-group col-md-6">
                  <label for="inputId">ID: <?php echo $_POST['id']; ?></label>
                  <div class="form-group col-md-6">
                     <label for="inputUser">Username</label>
                     <input type="text" class="bg-success-subtle form-control" id="inputUser" name="inputUser" value="<?php echo $username; ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputEmail">E-mail</label>
                     <input type="text" class="bg-success-subtle form-control" id="inputEmail" name="inputEmail" value="<?php echo $email; ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputPerms">Permissions</label>
                     <select id="inputPerms" name="inputPerms" class="bg-success-subtle form-control" required>
                        <option <?php if ($isDriver == 0) { echo "selected"; } ?>>User</option>
                        <option <?php if ($isDriver == 1) { echo "selected"; } ?>>Driver</option>
                     </select>
                  </div>
                  <button style="margin-top:15px; padding-left: 13px; padding-right: 13px;" type="submit" class="btn btn-success btn-lg">Update</button>
                  <input  style="margin-top:15px;" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='/busTracker/admin/admin.php'" value="Cancel">
                  <input style="margin-top:15px;" type="button" class="btn btn-danger btn-lg" onclick="window.location.href='/busTracker/admin/deleteAccount.php?id=<?php echo $id; ?>'" value="Delete">
            </form>
            </div>
         </div>
      </div>
   </body>
</html>