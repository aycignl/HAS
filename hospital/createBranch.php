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
    $name = $_POST["name"];

    $sql = "INSERT INTO Branches (name) VALUES ('" . $name . "')";

    $result = $conn->query($sql);
}


$conn->close();
header("Location:http://localhost/hospital/admin.php");
die();
?>

</body>
</html>
