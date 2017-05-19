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

   echo "<form action='makeAppointment.php' method='post'>";

   $sql = "SELECT fname, branch FROM Doctor";
   $result = $conn->query($sql);

   echo "<p>Branch: <select name='Branch'>";

   //to fetch branches from database
   if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
      echo "<option value='".$row['branch']."'>" . $row['branch'] . "</option>";
    }

  }

  echo "</select></p>";

  $sql = "SELECT fname, id FROM Doctor";
  $result = $conn->query($sql);

  echo "<p>Doctor: <select name='Doctor'>";

  //to fetch branches from database
  if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
      echo "<option value='".$row['id']."'>" . $row['fname'] . "</option>";
    }

  }

  echo "</select></p>";
  echo "<p>Date: <select name='Date'>";
  $day_counts = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
  for ($i = 0; $i < 12; $i++) {
    for ($j = 1; $j <= $day_counts[$i]; $j++) {
      $date_value = "2017-" . ($i+1)."-".$j;
      echo "<option value='".$date_value."'>".($i+1)."/".$j."</option>";
    }
  }
  echo "</select></p>";




  echo "<p><input type='submit' /></p>";
  echo "</form>";  

  if (isset($_POST['Branch'])) {
    $sql = "SELECT hour FROM Appointment WHERE doctor_id=".$_POST['Doctor']." AND date='".$_POST['Date']."'";

    $hour_arr = "000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()){
      $hour_arr[intval($row['hour'])] = '1';
    }

    $row = $result->fetch_assoc();
    ?>
    <table>
      <tr>
        <?
        for ($i = 0; $i < 96; $i++) {
          $hour = sprintf("%02d", 8+intval($i/12));
          $min = sprintf("%02d", $i%12 * 5);

          if ($hour > 11) {
           $hour++;
         }
         if ($hour_arr[$i] == '1') {
          echo "<th><span class='busy'>" . $hour . ":" . $min . "</th>";
          continue;

        }


        
        ?>
        <th>
          <form action="makeApp.php" method="post">
            <input type="hidden" name="Hour" value="<? echo $i;?>">
            <input type="hidden" name="Date" value="<? echo $_POST['Date'];?>">

            <input type="hidden" name="Doctor" value="<?  echo $_POST['Doctor'];?>">

            <input type="submit" value="<?echo $hour.":".$min;?>">


          </form>
        </th>
        <?

        if (($i+1) % 12 == 0) {
         echo "</tr><tr>";
       }
     }

   }
   echo "</tr>";
   echo "</table>";


 }

 ?>

</body>
</html>