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
  $id = $_POST["username"];
  $pass = $_POST["pass"];

  $sql = "SELECT Username, id FROM Patient WHERE Username = '" . $id . "' AND Password = '" . $pass . "' " ;

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    session_start();
    $_SESSION['username'] = $id;
    $_SESSION['id'] = $result->fetch_assoc()['id'];

    header("Location:http://localhost/hospital/homepage_user.php");
    die();
  }else{
    $sql2 = "SELECT fname FROM Admins WHERE fname = '" . $id . "' AND password = '" . $pass . "' " ;

    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
      session_start();
      $_SESSION['username'] = $id;

      header("Location:http://localhost/hospital/admin.php");
      die();
    }else
    
    $conn->close();
    die("Wrong username or password");
  }
}


?>
