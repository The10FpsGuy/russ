<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Søke Funksjon</title>
</head>
<body>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    body{
    background: #f2f2f2;
    font-family: 'Open Sans', sans-serif;
    }

    .search {
    width: 100%;
    position: relative;
    display: flex;
    }

    .searchTerm {
    width: 100%;
    border: 3px solid black;
    border-right: none;
    padding: 5px;
    height: 40px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
    }

    .searchTerm:focus{
    color: #00B4CC;
    }

    .searchButton {
    width: 56px;
    height: 56px;
    border: 1px solid #00B4CC;
    background: #00B4CC;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
    }

    /*Resize the wrap to see the search bar change!*/
    .wrap{
    width: 30%;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
    </style>
    <div class="wrap">
        <form action="#" method="POST">
        <div class="search">
           <input name="etternavn" type="text" class="searchTerm" placeholder="Søk på etternavn her">
           <button type="submit" class="searchButton">
             <i class="fa fa-search"></i>
          </button>
        </div>
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
        if (isset($_COOKIE['loggetinn'])) {
          $cookie_value = $_COOKIE['loggetinn'];
        } else {
          header("Location: error403.html");
        }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "russ";
      
            $etternavn = $_POST['etternavn'];
      
              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
              }
              $sql = "SELECT * FROM personer WHERE etternavn = '$etternavn' ORDER BY id ASC";
              $result = mysqli_query($conn, $sql);
            
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
        }}}
        ?>

    </table>
     </div>
</body>
</html>