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
      } else {
        header("Location: error403.html");
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
<h4>Har vedkommende betalt? Skriv inn ID-en til personen under, og trykk enter, så blir det registrert. Hvis du ikke finner personen her, så kan du søke på etternavn <a href="søk-etter-pers.php">her</a> </h4>
    <form action="#" method="POST">
        <input name="id" type="number" placeholder="Skriv id her">
    </form>
    <h4>Du kan også bla gjennom lister <a href="lister.php">her</a>, over hvem som har betalt og hvem som ikke har betalt</h4>
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
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "russ";

        $id = $_POST['id'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE personer SET betalt='True' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<h2>Betalingen har blitt registrert</h2>";
            echo "<h2>For å se oppdateringen må du laste inn vinduet på nytt</h2>";

          } else {
            echo "Error updating record: " . $conn->error;
          }
    }
    ?>
</body>
</html>