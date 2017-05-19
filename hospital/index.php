<html>
<head>
  <title>Home Page</title>
</head>
<body>
  <?php
  session_start();

  if (!isset($_SESSION['username'])) {
    $msg = "Please <a href = 'http://localhost/hospital/registration.php'>register</a> to view this page";
    echo $msg;
    ?>

    <form action="login.php" method="post">
     <p>Username: <input type="text" name="username" /></p>
     <p>Password: <input type="password" name="pass" /></p>
     <p><input type="submit" /></p>
   </form>  
   <?php      }else{
    ?>

    Welcome, <? echo $_SESSION['username'] ?>.

    <br />

    Click <a href = "http://localhost/hospital/logout.php">here</a> to log out.


    <?
  }
  ?>

</body>
</html>
