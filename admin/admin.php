<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrasjon</title>
    <link rel="stylesheet" href="tables.css">
    <?php
    if (isset($_COOKIE['loggetinn'])) {
        $cookie_value = $_COOKIE['loggetinn'];
        echo "";
      } else {
        header("Location ../index.html");
      }
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
        $sql = "SELECT * FROM personer ORDER BY id ASC";
        $result = mysqli_query($conn, $sql);
    ?>
</head>
<body>
    <table>
        <tr>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Epost</th>
            <th>Telefonnummer</th>
            <th>Betalt</th>
            <th>ID</th>
        </tr>
        <?php
      if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $fornavn = $row['fornavn'];
          $etternavn = $row['etternavn'];
          $epost = $row['epost'];
          $tlf = $row['tlf'];
          $betalt = $row['betalt'];
          $id = $row['id'];
        
        echo "<tr>";
            echo "<td>$fornavn</td>";
            echo "<td>$etternavn</td>";
            echo "<td>$epost</td>";
            echo "<td>$tlf</td>";
            echo "<td>$betalt</td>";
            echo "<td>$id</td>";
        echo "</tr>";
        }}
        ?>

    </table>
    <h4>Søk etter personer <a href="søk-etter-pers.php">her</a>
</body>
</html>