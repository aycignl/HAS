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
    $old_branch = $_POST["Old_Branch"];
    $name = $_POST["name"];

    $sql = "UPDATE Branches SET name = '".$name."' WHERE id = '".$old_branch."' ";

    $result = $conn->query($sql);
}


$conn->close();
header("Location:http://localhost/hospital/admin.php");
die();
?>

</body>
</html>
