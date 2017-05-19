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

    $make_query = "INSERT INTO Appointment (doctor_id, patient_id, hour, date) VALUES ('".$_POST['Doctor']."', '".$_SESSION['id']."', '".$_POST['Hour']."' , '".$_POST['Date']."')";
    $result = $conn->query($make_query);

    echo "Appointment created successfully.<br/>";



}
?>