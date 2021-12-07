<!DOCTYPE html>
<html>
    <head>
        <title>Visning </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/white.css">
    </head>
    <body>
        <h1> Medlemsoversikt </h1>
        <?php include 'navbar.php'; ?>
        <form action="visning.php" method="post">
        <label for="kontigent">Sortér etter kontigent:</label>
        <select name="kontigent" id="kontigent">
        <option value="Tom1"></option>    
        <option value="Betalt">Betalt</option>
        <option value="IkkeBetalt">Ikke Betalt</option>
    </select>
    <br>
    <input type="submit" name = "submit1" value="Sortér">
</form>

<form action="visning.php" method="post">
        <label for="medlemsiden">Sortér etter innemeldingsdato:</label>
        <select name="medlemsiden" id="medlemsiden">
        <option value="Tom2"></option>
        <option value="Synkende">Synkende</option>
        <option value="Økende">Økende</option>
    </select>
    <br>
    <input type="submit" name = "submit2" value="Sortér">
</form>
    <?php

    if(!isset($_SESSION['bruker']['innlogget']) || $_SESSION['bruker']['innlogget'] !== true) {
        header("Location: login.php");
        exit();
                }
    $conn = new mysqli("localhost", "root", "Passord123", "medlemdatabase");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
        
    $check = "SELECT id, fornavn, etternavn, adresse, postnr, mobilnr, epost, fødselsdato, kjønn, interesser, medlemsiden, kontigentstatus FROM medlem";
    $sql = $check;

    switch(!empty($_POST)){
           
        case @$_POST['kontigent'] == "Betalt":
            $sql .= " ORDER BY kontigentstatus";
            makeTable ($conn, $sql);
        break;

        case @$_POST['kontigent'] == "IkkeBetalt":
            $sql .= " ORDER BY kontigentstatus DESC";
            makeTable ($conn, $sql);
        break;

        case @$_POST['medlemsiden'] == "Økende":
            $sql .= " ORDER BY medlemsiden ASC";
            makeTable ($conn, $sql);
        break;

        case @$_POST['medlemsiden'] == "Synkende":
            $sql .= " ORDER BY medlemsiden DESC";
            makeTable ($conn, $sql);  
        break;
        
        case @$_POST['medlemsiden'] == "Tom2" || @$_POST['kontigent'] == "Tom1":
            makeTable ($conn, $sql);  
        break;

      }


    function makeTable ($conn, $sql) {
        $result = $conn->query($sql);
        echo "
        <table>
    <tr>
        <th>ID</th>
        <th>Fornavn</th>
        <th>Etternavn</th>
        <th>Addresse</th>
        <th>Postnummer</th>
        <th>Mobilnummer</th>
        <th>E-postadresse</th>
        <th>Fødselsdato</th>
        <th>Kjønn</th>
        <th>Interesser</th>
        <th>Medlem siden</th>
        <th>Kontigentstatus</th>
    </tr>";

        while($row = $result->fetch_assoc()) {
    echo
    "<tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['fornavn'] . "</td>
        <td>" . $row['etternavn'] . "</td>
        <td>" . $row['adresse'] . "</td>
        <td>" . $row['postnr'] . "</td>
        <td>" . $row['mobilnr'] . "</td>
        <td>" . $row['epost'] . "</td>
        <td>" . $row['fødselsdato'] . "</td>
        <td>" . $row['kjønn'] . "</td>
        <td>" . $row['interesser'] . "</td>
        <td>" . $row['medlemsiden'] . "</td>
        <td>" . $row['kontigentstatus'] . "</td>
    </tr>";
    }

    echo "</table>;";
}
?>
    </body>
</html>