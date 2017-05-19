<html>
<head>
  <title>User Home Page</title>
</head>
<body>
  <?php
  session_start();

  if (!isset($_SESSION['username'])) {
    $msg = "Please <a href = 'http://localhost/hospital/index.php'>register</a> to view this page";
    echo $msg;
    ?> 
    <?php      }else{
      ?>

      Welcome, <? echo $_SESSION['username'] ?>.

      <br />

      Click <a href = "http://localhost/hospital/logout.php">here</a> to log out.
      <br>
      <a href = 'http://localhost/hospital/makeAppointment.php'>Make an appointment</a>
      <br>
      <a href = 'http://localhost/hospital/cancelAppointment.php'>Cancel an appointment</a>
      <br>
      <a href = 'http://localhost/hospital/editAppointment.php'>Edit an appointment</a>


      <?
    }
    ?>

  </body>
  </html>
