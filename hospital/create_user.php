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
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    $sql = "INSERT INTO Patient (username, password, fname, lname) VALUES ('" . $id . "', '" . $pass . "', '" . $fname . "', '" . $lname . "')";

    $result = $conn->query($sql);
}


$conn->close();
header("Location:http://localhost/hospital/index.php");
die();
?>

</body>
</html>
