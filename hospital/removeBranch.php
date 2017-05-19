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
  <form action="deleteBranch.php" method="post">
   <select name="Old_Branch">
    <?
    $id_branch_query = "SELECT name, id FROM Branches";
    $id_result = $conn->query($id_branch_query);
    while ($row2 = $id_result->fetch_assoc()) {
      echo "<option value='".$row2['id']."'>" . $row2['name'] . "</option>";
    }
    ?>
    
  </select>

  <p><input type="submit" /></p>
</form>  

<br />

Click <a href = "http://localhost/hospital/logout.php">here</a> to log out.



</body>
</html>
