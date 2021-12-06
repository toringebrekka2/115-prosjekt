<!DOCTYPE html>
<html>
    <head>
        <title>Visning </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/white.css">
    </head>
    <body>
        <h1> Medlemsoversikt </h1>
    <?php
     include 'navbar.php';
    if(!isset($_SESSION['bruker']['innlogget']) || $_SESSION['bruker']['innlogget'] !== true) {
        header("Location: login.php");
        exit();
                }
    $conn = new mysqli("localhost", "root", "Passord123", "medlemdatabase");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    $sql = "SELECT fornavn, etternavn, adresse, postnr, mobilnr, epost, fødselsdato, kjønn, interesser, medlemsiden, kontigentstatus FROM medlem";
    $result = $conn->query($sql);
    echo "
    <table>
  <tr>
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
    echo "</table>;"
?>
    </body>
</html>