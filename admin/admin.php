<?php
   session_start();
   require_once('../include/database.php');
   
   if (!isset($_SESSION['isAdmin']) or empty($_SESSION['isAdmin']) or empty($_SESSION['isAdmin'])) {
      header("Location: /busTracker/home.php");
      exit();
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
      <div class="grid-container">
         <div class="box" id="top-left">
            <?php
               if (isset($_GET["status"]) && $_GET["status"] == "accountUpdateSuccess") {
                  echo "<div class='status'>The account has successfully been updated.</div>";
               }
               if (isset($_GET["status"]) && $_GET["status"] == "accountUpdateError") {
                  echo "<div class='status'>Update failed. Please try again.</div>";
               }
               if (isset($_GET["status"]) && $_GET["status"] == "accountDeleteSuccess") {
                  echo "<div class='status'>The account has successfully been deleted.</div>";
               }
               if (isset($_GET["status"]) && $_GET["status"] == "accountDeleteError") {
                  echo "<div class='status'>An error has occured trying to delete the account.</div>";
               }
               ?>
            <h2 style="text-align: center; font-weight: bold;">Manage Accounts</h2>
            <form method="post" action="/busTracker/admin/editAccount.php">
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label for="alertTextBox">Account List:</label>
                  </div>
                  <?php
                     $sql = "SELECT id, username FROM accounts";
                     $result = mysqli_query($conn, $sql);
                     if (mysqli_num_rows($result) > 0) {
                        echo '<select name="id" style="margin-left: 25px; margin-right: 25px;" class="bg-info-subtle form-control">';
                        while ($row = mysqli_fetch_assoc($result)) {
                           echo '<option value="' . $row['id'] . '">' . $row['username'] . '</option>';
                        }
                        echo '</select>';
                     }
                     ?>
                  <button class="btn btn-primary" type="submit">Edit Account</button>
               </div>
            </form>
            <form method="post" action="/busTracker/admin/newAccount.php">
               <?php
                  if (isset($_GET["status"]) && $_GET["status"] == "newAccountSuccess") {
                     echo "<div class='status'>The account has successfully been added to the database.</div>";
                  }
                  if (isset($_GET["status"]) && $_GET["status"] == "newAccountError") {
                     echo "<div class='status'>The username or email is already registered. Please try again.</div>";
                  }
                  ?>
               <div style="margin-top:20px;margin-left: 33%;" class="form-row">
                  <div class="form-group col-md-6">
                     <h2 style="text-align: center; font-weight: bold;">New Account</h2>
                     <label for="inputUser">Username</label>
                     <input type="text" class="bg-success-subtle form-control" id="inputUser" name="inputUser" placeholder="Username" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputEmail">E-mail</label>
                     <input type="email" class="bg-success-subtle form-control" id="inputEmail" name="inputEmail" placeholder="email@domain.com" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputPass">Password</label>
                     <input type="password" class="bg-success-subtle form-control" id="inputPassword4" name="inputPassword" placeholder="Password" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputPerms">Permissions</label>
                     <select id="inputPerms" name="inputPerms" class="bg-success-subtle form-control" required>
                        <option selected>User</option>
                        <option>Driver</option>
                     </select>
                  </div>
                  <button style="margin-top:15px;" type="submit" class="btn btn-success btn-lg">Create Account</button>
               </div>
            </form>
         </div>
         <div class="box" id="top-right">
            <?php
               if (isset($_GET["status"]) && $_GET["status"] == "busUpdateSuccess") {
                  echo "<div class='status'>The bus has successfully been updated.</div>";
               }
               if (isset($_GET["status"]) && $_GET["status"] == "busUpdateError") {
                  echo "<div class='status'>Error: This driver is already assigned to a bus. Please try again.</div>";
               }
               if (isset($_GET["status"]) && $_GET["status"] == "busDeleteSuccess") {
                  echo "<div class='status'>The bus has successfully been deleted.</div>";
               }
               if (isset($_GET["status"]) && $_GET["status"] == "busDeleteError") {
                  echo "<div class='status'>An error has occured trying to delete the bus.</div>";
               }
               ?>
            <h2 style="text-align: center; font-weight: bold;">Manage Buses</h2>
            <form method="post" action="/busTracker/admin/editBus.php">
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label for="alertTextBox">Bus List:</label>
                  </div>
                  <?php
                     $sql = "SELECT id FROM busses";
                     $result = mysqli_query($conn, $sql);
                     
                     if (mysqli_num_rows($result) > 0) {
                        echo '<select name="driverID" style="margin-left: 25px; margin-right: 25px;" class="bg-info-subtle form-control">';
                        while ($row = mysqli_fetch_assoc($result)) {
                           echo '<option value="' . $row['id'] . '"> Bus #' . $row['id'] . '</option>';
                        }
                        echo '</select>';
                     } else {
                        echo '<select style="margin-left: 25px; margin-right: 25px;" class="bg-info-subtle form-control">';
                        echo '<option value=0>Empty</option>';
                        echo '</select>';
                     }
                     ?>
                  </select>
                  <button class="btn btn-primary" type="submit">Edit Bus</button>
               </div>
            </form>
            <form method="post" action="/busTracker/admin/newBus.php">
               <?php
                  if (isset($_GET["status"]) && $_GET["status"] == "newBusSuccess") {
                     echo "<div class='status'>The bus has successfully been added to the database.</div>";
                  }
                  if (isset($_GET["status"]) && $_GET["status"] == "newBusError") {
                     echo "<div class='status'>Error: This driver is already assigned to a bus. Please try again.</div>";
                  }
                  ?>
               <div style="margin-top:20px;margin-left: 33%;" class="form-row">
                  <div class="form-group col-md-6">
                     <h2 style="text-align: center; font-weight: bold;">New Bus</h2>
                     <label for="driver">Driver</label>
                     <?php
                        $sql = "SELECT id, username FROM accounts WHERE isDriver = 1";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                           echo '<select name="id" class="bg-success-subtle form-control" required>';
                           while ($row = mysqli_fetch_assoc($result)) {
                              echo '<option value="' . $row['id'] . '">' . $row['username'] . '</option>';
                           }
                           echo '</select>';
                        }
                        ?>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="stop1">Stop #1</label>
                     <select id="stop1" name="stop1" class="bg-success-subtle form-control">
                        <option>None</option>
                        <option>Lot #60</option>
                        <option>The Village</option>
                        <option>NJ Transit Station</option>
                        <option>Fenwick Hall</option>
                        <option>Basie Hall</option>
                        <option>Sinatra Hall</option>
                        <option>Hawk Crossings</option>
                        <option>CarParc Diem</option>
                        <option>Red Hawk Deck</option>
                        <option>University Hall</option>
                        <option>The Heights</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="stop2">Stop #2</label>
                     <select id="stop2" name="stop2" class="bg-success-subtle form-control">
                        <option>None</option>
                        <option>Lot #60</option>
                        <option>The Village</option>
                        <option>NJ Transit Station</option>
                        <option>Fenwick Hall</option>
                        <option>Basie Hall</option>
                        <option>Sinatra Hall</option>
                        <option>Hawk Crossings</option>
                        <option>CarParc Diem</option>
                        <option>Red Hawk Deck</option>
                        <option>University Hall</option>
                        <option>The Heights</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="stop3">Stop #3</label>
                     <select id="stop3" name="stop3" class="bg-success-subtle form-control">
                        <option>None</option>
                        <option>Lot #60</option>
                        <option>The Village</option>
                        <option>NJ Transit Station</option>
                        <option>Fenwick Hall</option>
                        <option>Basie Hall</option>
                        <option>Sinatra Hall</option>
                        <option>Hawk Crossings</option>
                        <option>CarParc Diem</option>
                        <option>Red Hawk Deck</option>
                        <option>University Hall</option>
                        <option>The Heights</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="stop4">Stop #4</label>
                     <select id="stop4" name="stop4" class="bg-success-subtle form-control">
                        <option>None</option>
                        <option>Lot #60</option>
                        <option>The Village</option>
                        <option>NJ Transit Station</option>
                        <option>Fenwick Hall</option>
                        <option>Basie Hall</option>
                        <option>Sinatra Hall</option>
                        <option>Hawk Crossings</option>
                        <option>CarParc Diem</option>
                        <option>Red Hawk Deck</option>
                        <option>University Hall</option>
                        <option>The Heights</option>
                     </select>
                  </div>
                  <button style="margin-top:15px;" type="submit" class="btn btn-success btn-lg">Create Bus</button>
               </div>
            </form>
         </div>
         <div class="box" id="bottom-left">
            <h2 style="text-align: center; font-weight: bold;">Manage Alerts</h2>
            <form method="post" action="/busTracker/admin/updateAlerts.php">
               <?php
                  if (isset($_GET["status"]) && $_GET["status"] == "alertUpdateSuccess") {
                     echo "<div class='status'>Alerts have been successfully updated</div>";
                  }
                  if (isset($_GET["status"]) && $_GET["status"] == "alertUpdateError") {
                     echo "<div class='status'>An error has occured while updating alerts. Please try again.</div>";
                  }
                  if (isset($_GET["status"]) && $_GET["status"] == "alertCleared") {
                     echo "<div class='status'>Alerts have been successfully cleared.</div>";
                  }
                  ?>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label for="busID">Bus List:</label>
                  </div>
                  <?php
                     $sql = "SELECT id FROM busses";
                     $result = mysqli_query($conn, $sql);
                     
                     if (mysqli_num_rows($result) > 0) {
                       echo '<select id="busID" name="busID" style="margin-left: 25px; margin-right: 25px;" class="bg-info-subtle form-control">';
                       while ($row = mysqli_fetch_assoc($result)) {
                         echo '<option value="' . $row['id'] . '"> Bus #' . $row['id'] . '</option>';
                       }
                       echo '</select>';
                     } else {
                       echo '<select style="margin-left: 25px; margin-right: 25px;" class="bg-info-subtle form-control">';
                       echo '<option value=0>Empty</option>';
                       echo '</select>';
                     }
                     ?>
               </div>
               <div class="form-group">
                  <script src="/bustracker/scripts/getAlerts.js"></script>
                  <label for="alertTextBox">Alert Content:</label>
                  <div class="d-flex">
                     <?php
                        $sql = "SELECT id FROM busses";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        
                        $id = $row['id'];
                        $sql = "SELECT alert FROM busses WHERE id = $id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $alert = $row['alert'];
                        ?>
                     <textarea style="resize: none; width: 100%;" class="form-control form-control-lg bg-info-subtle" id="alertTextBox" name="alert" rows="8"><?php echo $alert; ?></textarea>
                  </div>
                  <button style="margin-top: 25px;" type="submit" class="btn btn-success btn-lg">Update</button>
                  <input style="margin-top:25px;" type="button" class="btn btn-danger btn-lg" onclick="window.location.href='/busTracker/admin/deleteAlerts.php?id=<?php echo $id; ?>'" value="Clear">
               </div>
            </form>
         </div>
         <iframe id="bottom-right" class="map" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11723.235426738438!2d-74.20639806382647!3d40.866602227674974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sTransit%20stations!5e1!3m2!1sen!2sus!4v1677620389376!5m2!1sen!2sus" width="1200px" height="550px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
         </iframe>
      </div>
   </body>
</html>