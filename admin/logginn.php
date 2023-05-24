<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logg Inn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="login-form" action="#" method="POST">
            <input name="username" type="text" placeholder="username"/>
            <input name="password" type="password" placeholder="password"/>
            <button>login</button>
          </form>
        </div>
      </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "russ";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";


$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count >= 1){  
    setcookie('loggetinn', 'True', time() + (86400 * 30), "/");
    header("Location: admin.php");
}  
else{  
    header("Location: error403.html");  
}}
?>