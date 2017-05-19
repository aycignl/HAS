<?
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
  session_start();

  $edit_query = "UPDATE Appointment SET date = '" . $_POST['Date'] . "' , hour = ".$_POST['new_hour'].", doctor_id = ".$_POST['new_doctor']." WHERE id = '" . $_POST['app'] . "'";
  $result = $conn->query($edit_query);

  echo "Appointment edited successfully.<br/>";



}
?>