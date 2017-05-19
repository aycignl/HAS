<html>
<head>
  <title>Make an Appointment Page</title>
</head>
<body>
  <?php


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hospital";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  if($conn->connect_error){
   die("Connection failed: " . $conn->connect_error);
 } else {
  session_start();

  $query = "SELECT * FROM Appointment WHERE patient_id = " .  $_SESSION['id'] . "";

  $result = $conn->query($query);
  ?>
  <table border="1">
    <?

    while ($row2 = $result->fetch_assoc()){
      $hour = sprintf("%02d", 8+intval($row2['hour']/12));
      $min = sprintf("%02d", $row2['hour']%12 * 5);
      $sql = "SELECT fname, lname FROM Doctor WHERE id = '" .  $row2['doctor_id'] . "'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc(); 
      echo "<tr><th>" . $row['fname'] . " " . $row['lname'] .  "," . $hour . ":" . $min . "</th>";
      ?>
      <th>
        <form action="cancelApp.php" method="post">
          <input type="hidden" name="app" value="<? echo $row2['id'];?>">
          <input type="submit" value="cancel">


        </form>

      </th>
    </tr>

    <? 
  }

}
?>
</table>  

</body>
</html>