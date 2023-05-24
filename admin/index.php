<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrering</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="register-form" action="#" method="POST">
            <input name="username" type="text" placeholder="name"/>
            <input name="password" type="password" placeholder="password"/>
            <button>Lag Bruker</button>
            <p>Har du allerede bruker? <a href="logginn.php">Logg inn her</a></p>
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);


$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

if (mysqli_query($conn, $sql)) {
  sleep(5);
  echo ("Opprettet bruker. Vennligst vent 5 sekunder og logg inn.");
  header("Location: logginn.php");
  exit(); // Make sure to include this to stop the script from executing further
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>