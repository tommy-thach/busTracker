<?php
   session_start();
   require_once('../include/database.php');
   
   if (!isset($_SESSION['isDriver']) or empty($_SESSION['isDriver'])) {
      header("Location: /busTracker/home.php");
      exit();
    }
   
    
   $id = $_SESSION['id'];
   $sql = "SELECT stop1, stop2, stop3, stop4, alert FROM busses
           WHERE driverID = '$id'";
   $result = mysqli_query($conn, $sql);
   
   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $stop1 = $row['stop1'];
          $stop2 = $row['stop2'];
          $stop3 = $row['stop3'];
          $stop4 = $row['stop4'];
          $alert = $row['alert'];
          
      }
   }
   else{
      
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
            <h2 style="padding-top: 40px;text-align: center; font-weight: bold;">Driver Panel</h2>
            <?php
               if (isset($_GET["status"]) && $_GET["status"] == "updateSuccess") {
                  echo "<div class='status'>Update successful</div>";
               }
               if (isset($_GET["status"]) && $_GET["status"] == "updateError") {
                  echo "<div class='status'>An error occured while updating. Please try again.</div>";
               }
               ?>
            <div style="width:100% !important;margin-left:25%;" class="form-group col-md-6">
               <label for="inputId">ID: <?php echo $_SESSION['id']; ?></label>
               <form method="post" action="/busTracker/driver/driverUpdate.php?id=<?php echo $id; ?>">
                  <div class="form-group col-md-6">
                     <label for="stop1">Stop #1</label>
                     <select id="stop1" name="stop1" class="bg-success-subtle form-control">
                        <option <?php if ($stop1 == "None") echo "selected"; ?>>None</option>
                        <option <?php if ($stop1 == "Lot #60") echo "selected"; ?>>Lot #60</option>
                        <option <?php if ($stop1 == "The Village") echo "selected"; ?>>The Village</option>
                        <option <?php if ($stop1 == "NJ Transit Station") echo "selected"; ?>>NJ Transit Station</option>
                        <option <?php if ($stop1 == "Fenwick Hall") echo "selected"; ?>>Fenwick Hall</option>
                        <option <?php if ($stop1 == "Basie Hall") echo "selected"; ?>>Basie Hall</option>
                        <option <?php if ($stop1 == "Sinatra Hall") echo "selected"; ?>>Sinatra Hall</option>
                        <option <?php if ($stop1 == "Hawk Crossings") echo "selected"; ?>>Hawk Crossings</option>
                        <option <?php if ($stop1 == "CarParc Diem") echo "selected"; ?>>CarParc Diem</option>
                        <option <?php if ($stop1 == "Red Hawk Deck") echo "selected"; ?>>Red Hawk Deck</option>
                        <option <?php if ($stop1 == "University Hall") echo "selected"; ?>>University Hall</option>
                        <option <?php if ($stop1 == "The Heights") echo "selected"; ?>>The Heights</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="stop2">Stop #2</label>
                     <select id="stop2" name="stop2" class="bg-success-subtle form-control">
                        <option <?php if ($stop2 == "None") echo "selected"; ?>>None</option>
                        <option <?php if ($stop2 == "Lot #60") echo "selected"; ?>>Lot #60</option>
                        <option <?php if ($stop2 == "The Village") echo "selected"; ?>>The Village</option>
                        <option <?php if ($stop2 == "NJ Transit Station") echo "selected"; ?>>NJ Transit Station</option>
                        <option <?php if ($stop2 == "Fenwick Hall") echo "selected"; ?>>Fenwick Hall</option>
                        <option <?php if ($stop2 == "Basie Hall") echo "selected"; ?>>Basie Hall</option>
                        <option <?php if ($stop2 == "Sinatra Hall") echo "selected"; ?>>Sinatra Hall</option>
                        <option <?php if ($stop2 == "Hawk Crossings") echo "selected"; ?>>Hawk Crossings</option>
                        <option <?php if ($stop2 == "CarParc Diem") echo "selected"; ?>>CarParc Diem</option>
                        <option <?php if ($stop2 == "Red Hawk Deck") echo "selected"; ?>>Red Hawk Deck</option>
                        <option <?php if ($stop2 == "University Hall") echo "selected"; ?>>University Hall</option>
                        <option <?php if ($stop2 == "The Heights") echo "selected"; ?>>The Heights</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="stop3">Stop #3</label>
                     <select id="stop3" name="stop3" class="bg-success-subtle form-control">
                        <option <?php if ($stop3 == "None") echo "selected"; ?>>None</option>
                        <option <?php if ($stop3 == "Lot #60") echo "selected"; ?>>Lot #60</option>
                        <option <?php if ($stop3 == "The Village") echo "selected"; ?>>The Village</option>
                        <option <?php if ($stop3 == "NJ Transit Station") echo "selected"; ?>>NJ Transit Station</option>
                        <option <?php if ($stop3 == "Fenwick Hall") echo "selected"; ?>>Fenwick Hall</option>
                        <option <?php if ($stop3 == "Basie Hall") echo "selected"; ?>>Basie Hall</option>
                        <option <?php if ($stop3 == "Sinatra Hall") echo "selected"; ?>>Sinatra Hall</option>
                        <option <?php if ($stop3 == "Hawk Crossings") echo "selected"; ?>>Hawk Crossings</option>
                        <option <?php if ($stop3 == "CarParc Diem") echo "selected"; ?>>CarParc Diem</option>
                        <option <?php if ($stop3 == "Red Hawk Deck") echo "selected"; ?>>Red Hawk Deck</option>
                        <option <?php if ($stop3 == "University Hall") echo "selected"; ?>>University Hall</option>
                        <option <?php if ($stop3 == "The Heights") echo "selected"; ?>>The Heights</option>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="stop4">Stop #4</label>
                     <select id="stop4" name="stop4" class="bg-success-subtle form-control">
                        <option <?php if ($stop4 == "None") echo "selected"; ?>>None</option>
                        <option <?php if ($stop4 == "Lot #60") echo "selected"; ?>>Lot #60</option>
                        <option <?php if ($stop4 == "The Village") echo "selected"; ?>>The Village</option>
                        <option <?php if ($stop4 == "NJ Transit Station") echo "selected"; ?>>NJ Transit Station</option>
                        <option <?php if ($stop4 == "Fenwick Hall") echo "selected"; ?>>Fenwick Hall</option>
                        <option <?php if ($stop4 == "Basie Hall") echo "selected"; ?>>Basie Hall</option>
                        <option <?php if ($stop4 == "Sinatra Hall") echo "selected"; ?>>Sinatra Hall</option>
                        <option <?php if ($stop4 == "Hawk Crossings") echo "selected"; ?>>Hawk Crossings</option>
                        <option <?php if ($stop4 == "CarParc Diem") echo "selected"; ?>>CarParc Diem</option>
                        <option <?php if ($stop4 == "Red Hawk Deck") echo "selected"; ?>>Red Hawk Deck</option>
                        <option <?php if ($stop4 == "University Hall") echo "selected"; ?>>University Hall</option>
                        <option <?php if ($stop4 == "The Heights") echo "selected"; ?>>The Heights</option>
                     </select>
                     <div class="form-group">
                        <label for="alertTextbox">Alert</label>
                        <textarea style="resize: none; width: 100%;" class="form-control form-control-lg bg-success-subtle" id="alertTextBox" name="alert" rows="8"><?php echo $alert; ?></textarea>
                     </div>
                  </div>
                  <button style="margin-top:15px; padding-left: 13px; padding-right: 13px;" type="submit" class="btn btn-success btn-lg">Update</button>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>