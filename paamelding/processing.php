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

$fornavn = $_POST['fornavn'];
$etternavn = $_POST['etternavn'];
$epost = $_POST['epost'];
$tlf = $_POST['tlf'];

$sql = "INSERT INTO personer (fornavn, etternavn, epost, tlf, betalt)
VALUES ('$fornavn', '$etternavn', '$epost', '$tlf', 'False')";

if ($conn->query($sql) === TRUE) {
    header("Location: success.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 