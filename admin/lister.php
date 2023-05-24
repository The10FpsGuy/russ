<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lister over personer</title>
    <link rel="stylesheet" href="tables.css">
</head>
<body>
    <form action="#" method="POST">
        <label for="cars">Velg hvilken liste:</label>
        <select id="cars" name="sortering">
          <option value="alle">Alle</option>
          <option value="betalt">Betalt</option>
          <option value="ikke-betalt">Ikke betalt</option>
        </select> 
        <input type="submit" value="Submit">
    </form>
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "russ";

        $sortering = $_POST['sortering'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        if ($sortering == "alle") {
            $sql = "SELECT * FROM personer";
        } elseif ($sortering == "betalt") {
            $sql = "SELECT * FROM personer WHERE betalt = 'True'";
        } elseif ($sortering == "ikke-betalt") {
            $sql = "SELECT * FROM personer WHERE betalt = 'False'";
        }

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
    }
    ?>
    </table>
</body>
</html>