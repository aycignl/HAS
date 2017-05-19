<html>
<head>
  <title>Home Page</title>
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
  <form action="deleteDoctor.php" method="post">
   <select name="Old_Doctor">
    <?
    $id_doctor_query = "SELECT id, fname, lname FROM Doctor";
    $id_result = $conn->query($id_doctor_query);
    while ($row2 = $id_result->fetch_assoc()) {
      echo "<option value='".$row2['id']."'>" . $row2['fname'] . " " . $row2['lname'] . "</option>";
    }
    ?>
    
  </select>

  <p><input type="submit" /></p>
</form>  

<br />

Click <a href = "http://localhost/hospital/logout.php">here</a> to log out.



</body>
</html>
