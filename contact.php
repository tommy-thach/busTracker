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
      background-image: url("https://www.montclair.edu/responsive-media/cache/student-services/wp-content/uploads/sites/14/2019/06/2019-06-24-campus-aerial.jpg.2.2x.generic.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      z-index: -1;
      font-family: Arial, sans-serif;
      margin: 0;
      }
   </style>
   <body>
      <div id="navbar"></div>
      <h1 style="color: white; text-shadow: 2px 4px 4px black;">Contact Us</h1>
      <div class="form">
         <form>
            <b style="color: white; text-shadow: 2px 4px 4px black;">Feel free to contact us at any time using the form below, or by calling our number at (973) 655-4000.</b>
            <label>Name:</label>
            <input type="text" id="firstName" name="firstName" autofocus/>
            <br>
            <label>Phone:</label>
            <input type="number" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
            <br>
            <label>E-mail Address:</label>
            <input type="email" id="email" name="email" placeholder="name@domain.com"/>
            <br>
            <label>Your Comments:</label>
            <textarea style="vertical-align:top;height:60;width:220;margin-top:5px" required></textarea>
            <br>
            <input type="submit" value="Submit">
         </form>
      </div>
   </body>
</html>