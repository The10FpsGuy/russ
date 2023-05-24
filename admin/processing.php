<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "russ";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);



$sql = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";

if ($result = mysqli_query($conn, $sql)) {
    $rowcount=mysqli_num_rows($result);
    if ($rowcount >= 1) {
      setcookie('loggetinn', 'True', time() + (86400 * 30), "/");
      header("Location: admin.php");
      exit();
    } else {
      header("Location: error/error401.html");    
    }
  } else {
    echo "Error: " . $sql . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>> 