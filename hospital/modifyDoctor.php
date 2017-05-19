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
    $branch = $_POST["Branch"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    $sql = "UPDATE Doctor SET fname = '".$fname."', lname = '".$lname."', branch = '".$branch."' WHERE id = '".$old_doctor."' ";

    $result = $conn->query($sql);
}


$conn->close();
header("Location:http://localhost/hospital/admin.php");
die();
?>

</body>
</html>
