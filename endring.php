<!DOCTYPE html>
<html>
    <head>
        <title>Visning </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/white.css">
        <link rel="stylesheet" href="css/form.css">
    </head>
    <body>
    <h1> Endre medlemsdata </h1>
    <?php include 'navbar.php'; ?>
    <?php
    $conn = new mysqli("localhost", "root", "Passord123", "medlemdatabase");
     if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, fornavn, etternavn, adresse, postnr, mobilnr, epost, fødselsdato, kjønn, interesser, medlemsiden, kontigentstatus FROM medlem";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        echo '
        
        <h2>Meldem ' . $row['id'] . '</h2>
        <form id="' . $row['id'] . '" class="form-inline" action="endring.php"  method="post">
        Fornavn: <input type="text" name="fornavn' . $row['id'] . '" value="' . $row['fornavn'] . '" maxlength="50" required>
        Etternavn:<input type="text" name="etternavn' . $row['id'] . '" value="' . $row['etternavn'] . '" maxlength="50" required>
        Adresse:  <input type="text" name="adresse' . $row['id'] . '" value="' . $row['adresse'] . '" maxlength="50" required>
        Postnr:  <input type="number" minlength="4" maxlength="4" name="postnr' . $row['id'] . '" value="' . $row['postnr'] . '" required>
        Mobilnr:  <input type="number" minlength="8" maxlength="12" name="mobilnr' . $row['id'] . '" value="' . $row['mobilnr'] . '">
        Epost:  <input type="email" name="epost' . $row['id'] . '" value="' . $row['epost'] . '" maxlength="40" required>
        Fødselsdato:  <input type="date" min="1900-01-01" name="fødselsdato' . $row['id'] . '" value="' . $row['fødselsdato'] . '" required>
        Kjønn:  <input type="text" name="kjønn' . $row['id'] . '" value="' . $row['kjønn'] . '" maxlength="10" required>
        Interesser:  <input type="text" name="interesser' . $row['id'] . '" value="' . $row['interesser'] .  '" maxlength="50">
        Medlem siden: <br> <input type="date" min="2000-01-01" value="' . $row['medlemsiden'] . '" name="medlemsiden' . $row['id'] . '" required><br>
        Kontigentstatus: <br> <input type="text" name="kontigentstatus' . $row['id'] . '" value="' . $row['kontigentstatus'] . '" maxlength="50" required>
        Kursaktiviteter:<br>
        <input type="checkbox" name="aktiviteter1" value="Gitarkurs">Gitarkurs<br>
        <input type="checkbox" name="aktiviteter2" value="Paintballturnering">Paintballturnering<br>
        <input type="checkbox" name="aktiviteter3" value="Brettspilldag">Brettspilldag<br>
        <input type="checkbox" name="aktiviteter4" value="Volleyballturnering">Volleyballturnering<br>
        <input type="checkbox" name="aktiviteter5" value="Playstationkveld">Playstationkveld<br>
        <input type="checkbox" name="aktiviteter6" value="Kjøkkendag">Kjøkkendag<br>
        <input type="submit" form="' . $row['id'] . '" name="registrer' . $row['id'] . '" value="Registrer">
</form>
<br><br>';

$msg = array();
$formname = 'registrer' . $row['id'] .'';

if(!empty($_POST[$formname])){

    if (isset($_POST['fornavn' . $row['id'] . ''])){
    $msg[] = (compareAndUpdate($_POST['fornavn' . $row['id'] . ''], $row['fornavn'], "fornavn", $conn, $row['id']));
    }

    if (isset($_POST['etternavn' . $row['id'] . ''])){
        $msg[] = (compareAndUpdate($_POST['etternavn' . $row['id'] . ''], $row['etternavn'], "etternavn", $conn, $row['id']));
    }
    
    if (isset($_POST['adresse' . $row['id'] . ''])){
        $msg[] = (compareAndUpdate($_POST['adresse' . $row['id'] . ''], $row['adresse'], "adresse", $conn, $row['id']));
    }
   
    if (isset($_POST['postnr' . $row['id'] . ''])){
        $msg[] = (compareAndUpdate($_POST['postnr' . $row['id'] . ''], $row['postnr'], "postnr", $conn, $row['id']));
    }

    if (isset($_POST['mobilnr' . $row['id'] . ''])){
        $msg[] = (compareAndUpdate($_POST['mobilnr' . $row['id'] . ''], $row['mobilnr'], "mobilnr", $conn, $row['id']));
    }

    if (isset($_POST['epost' . $row['id'] . ''])){
        $msg[] = (compareAndUpdate($_POST['epost' . $row['id'] . ''], $row['epost'], "epost", $conn, $row['id']));
    }

    if (isset($_POST['fødselsdato' . $row['id'] . ''])){
        $msg[] = (@compareAndUpdate($_POST['fødselsdato' . $row['id'] . ''], $row['fødselsdato'], "fødselsdato", $conn, $row['id']));
    }

    if (isset($_POST['kjønn' . $row['id'] . ''])){
        $msg[] = (compareAndUpdate($_POST['kjønn' . $row['id'] . ''], $row['kjønn'], "kjønn", $conn, $row['id']));
    }

    if (isset($_POST['interesser' . $row['id'] . ''])){
        $msg[] = (compareAndUpdate($_POST['interesser' . $row['id'] . ''], $row['interesser'], "interesser", $conn, $row['id']));
    }

    if (isset($_POST['medlemsiden' . $row['id'] . ''])){
        $msg[] = (compareAndUpdate($_POST['medlemsiden' . $row['id'] . ''], $row['medlemsiden'], "medlemsiden", $conn, $row['id']));
    }

    if (isset($_POST['kontigentstatus' . $row['id'] . ''])){
        $msg[] = (@compareAndUpdate($_POST['kontigentstatus' . $row['id'] . ''], $row['kontigentstatus'], "kontigentstatus", $conn, $row['id']));
    }
    foreach($msg as $key => $val)
    echo $val;
}

}

function compareAndUpdate ($input, $data, $columnname, $conn, $id){
    if ($input != $data){
        if (!empty($input) && !empty($data)) {
        $conn->query("UPDATE medlem SET $columnname = '$input' WHERE id = $id;");
        return "You have successfully insertet <b>$input</b> into <b>$columnname</b> while the data was <b>$data</b> <br>";
        } else return "Could not insert, as data is missing for $columnname";
    }
}
?>

    </body>
</html>