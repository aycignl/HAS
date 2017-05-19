<html>
<head>
  <title>Create a Branch</title>
</head>
<body>
  <?
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hospital";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  ?>
  <form action="createBranch.php" method="post">
   <p>Branch name: <input type="text" name="name" /></p>

   <p><input type="submit" /></p>
 </form>  

 <br />

 Click <a href = "http://localhost/hospital/logout.php">here</a> to log out.



</body>
</html>
