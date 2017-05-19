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
    $old_doctor = $_POST["Old_Doctor"];

    $sql = "DELETE FROM Doctor WHERE id = '".$old_doctor."' ";

    $result = $conn->query($sql);
}


$conn->close();
header("Location:http://localhost/hospital/admin.php");
die();
?>

</body>
</html>
