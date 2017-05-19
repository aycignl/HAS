<html>
<head>
  <title>Edit Branch Page</title>
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
  <form action="modifyBranch.php" method="post">
    <select name="Old_Branch">
      <?
      $id_branch_query = "SELECT id, name FROM Branches";
      $id_result = $conn->query($id_branch_query);
      while ($row2 = $id_result->fetch_assoc()) {
        echo "<option value='".$row2['id']."'>" . $row2['name'] . "</option>";
      }
      ?>

    </select>
    
  </select>
  <p>Branch Name: <input type="text" name="name" /></p>

  <p><input type="submit" /></p>
</form>  

<br />

Click <a href = "http://localhost/hospital/logout.php">here</a> to log out.



</body>
</html>
