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
    <?php 
        include 'navbar.php';

        $conn = new mysqli("localhost", "root", "root", "medlemdatabase");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM medlem";
        
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
        <input type="checkbox" name="aktiviteter1' . $row['id'] . '"  value="Gitarkurs">Gitarkurs<br>
        <input type="checkbox" name="aktiviteter2' . $row['id'] . '" value="Paintballturnering">Paintballturnering<br>
        <input type="checkbox" name="aktiviteter3' . $row['id'] . '" value="Brettspilldag">Brettspilldag<br>
        <input type="checkbox" name="aktiviteter4' . $row['id'] . '" value="Volleyballturnering">Volleyballturnering<br>
        <input type="checkbox" name="aktiviteter5' . $row['id'] . '" value="Playstationkveld">Playstationkveld<br>
        <input type="checkbox" name="aktiviteter6' . $row['id'] . '" value="Kjøkkendag">Kjøkkendag<br>
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
        $msg[] = (@findAk($row['id'], $_POST['aktiviteter1'  . $row['id'] . ''], $conn, "Gitarkurs"));
        $msg[] = (@findAk($row['id'], $_POST['aktiviteter2'  . $row['id'] . ''], $conn, "Paintballturnering"));
        $msg[] = (@findAk($row['id'], $_POST['aktiviteter3'  . $row['id'] . ''], $conn, "Brettspilldag"));
        $msg[] = (@findAk($row['id'], $_POST['aktiviteter4'  . $row['id'] . ''], $conn, "Volleyballturnering"));
        $msg[] = (@findAk($row['id'], $_POST['aktiviteter5'  . $row['id'] . ''], $conn, "Playstationkveld"));
        $msg[] = (@findAk($row['id'], $_POST['aktiviteter6'  . $row['id'] . ''], $conn, "Kjøkkendag"));


    foreach($msg as $key => $val)
    echo $val; 
}

}

function findAk ($idMem, $post, $conn, $aktName){
$dupe = false;
$aktivitetcheck = $conn->query(
    "SELECT id, aktivitetsnavn FROM aktivitet");
$aktivitet = array();
$aktivitetarr = array();
while($row = $aktivitetcheck->fetch_assoc()) {
    $aktivitetarr[$row['aktivitetsnavn']] = $row['id'];

}


$aktivitetNavn = $conn->query(
    "SELECT  * FROM medlemaktivitet");


while($row = $aktivitetNavn->fetch_assoc()) {
    if (!empty($post)){
       if($idMem == $row['medlemID'] && $aktivitetarr[$post] == $row['aktivitet']){
        $dupe = true;   
       }
        }
        }
        if ($dupe != true) {
            $aktivitet[$idMem] = $post;
    }  else { 
            return "Aktiviteten <b>$post</b> er allerede registrert på medlemsnummer <b>$idMem</b> <br>";
    }

foreach ($aktivitet as $key => $val){
    $conn->query(
        "INSERT INTO medlemaktivitet (medlemID, aktivitet)
        VALUES ($key, (SELECT id FROM aktivitet WHERE aktivitetsnavn = '$val'))");
}
echo $post;
if(empty($post)){
   $check = $conn->query(
        "DELETE from medlemaktivitet 
        WHERE medlemID = '$idMem' 
        AND aktivitet = '$aktivitetarr[$aktName]'");
        if($conn->affected_rows > 0){
        return "<b>$aktName</b> har blitt fjernet fra medlemsnummer <b>$idMem</b> <br>";
        }
}

if($dupe == false && !empty($post)){
return "Aktiviteten <b>$post</b> har blitt registrert på medlemsnummer <b>$idMem</b><br>";
}
}

function compareAndUpdate ($input, $data, $columnname, $conn, $id){
    if ($input != $data){
        if (!empty($input) && !empty($data)) {
                $conn->query(
                "UPDATE medlem SET $columnname = '$input' 
                WHERE id = $id;");
            }
        
        return "Du har endret <b>$input</b> i <b>$columnname</b> fra <b>$data</b> <br>";
        }  elseif(empty($input)) { return "Could not insert, as data is missing for $columnname";}
    } 
?>

    </body>
</html>