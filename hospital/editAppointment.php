<html>
<head>
  <title>Edit an Appointment Page</title>
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

  $query = "SELECT * FROM Appointment WHERE patient_id = " .  $_SESSION['id'];

  $result = $conn->query($query);
  ?>
  <table border="1">
    <?

    while ($row2 = $result->fetch_assoc()){
      $hour = sprintf("%02d", 8+intval($row2['hour']/12));
      $min = sprintf("%02d", $row2['hour']%12 * 5);
      $sql  = "SELECT fname, lname FROM Doctor WHERE id = '" .  $row2['doctor_id'] . "'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc(); 
      if ($hour >= 12) {
        $hour++;
        # code...
      }
      echo "<tr><th>" . $row['fname'] . " " . $row['lname'] .  "," . $hour . ":" . $min . "</th></tr>";
      ?>
      <th>
        <form action="editApp.php" method="post">
          <input type="hidden" name="app" value="<? echo $row2['id'];?>">
          <select name="new_doctor">
            <?
            $id_doctor_query = "SELECT fname, lname, id FROM Doctor";
            $id_result = $conn->query($id_doctor_query);
            while ($row2 = $id_result->fetch_assoc()) {
              echo "<option value='".$row2['id']."'>" . $row2['fname'] . "</option>";
                          # code...
            }
            ?>
          </select>
          <?
          echo "<p>Date: <select name='Date'>";
          $day_counts = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
          for ($i = 0; $i < 12; $i++) {
            for ($j = 1; $j <= $day_counts[$i]; $j++) {
              $date_value = "2017-" . ($i+1)."-".$j;
              echo "<option value='".$date_value."'>".($i+1)."/".$j."</option>";
            }
          }

          echo "</select></p>";
          ?>
          <select name="new_hour">
            <?

            for ($j=0; $j < 96; $j++) { 
             $hour = sprintf("%02d", 8 + intval($j/12));
             $min = sprintf("%02d", $j%12 * 5);
             if ($hour > 11) {
           $hour++;
         }
             
             echo "<option value='". $j ."'>" . $hour . ":" . $min . "</option>";

           }
           ?>
         </select>
         <input type="submit" value="edit">


       </form>

     </th>
     <?


   }
   ?>
 </table>  
 <?
}
?>


</body>
</html>