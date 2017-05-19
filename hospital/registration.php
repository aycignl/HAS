<html>
<head>
  <title>Home Page</title>
</head>
<body>
  <?php
  session_start();

  if (!isset($_SESSION['username'])) {
    ?>

    <form action="create_user.php" method="post">
     <p>Username: <input type="text" name="id" /></p>
     <p>Password: <input type="password" name="pass" /></p>
     <p>First Name: <input type="text" name="fname" /></p>
     <p>Last Name: <input type="text" name="lname" /></p>
     <p><input type="submit" /></p>
   </form>  
   <?php      }else{
     ?>
     <br />

     Click <a href = "http://localhost/hospital/logout.php">here</a> to log out.

     <?php 
   }
   ?>

 </body>
 </html>
