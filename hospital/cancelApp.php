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


  $del_query = "DELETE FROM Appointment WHERE id = " . $_POST['app'];
  $result = $conn->query($del_query);

  echo "Appointment canceled successfully.<br/>";



}
?>