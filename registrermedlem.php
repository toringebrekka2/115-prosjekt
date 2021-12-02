<!DOCTYPE html>
<html>
    <head>
        <title>Registrer medlem</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION['bruker']['innlogget']) || $_SESSION['bruker']['innlogget'] !== true) {
                header("Location: login.php");
                exit();
            }
            echo "<h1>Registrer nytt medlem</h1>";
        ?>
        <form action="registrermedlem.php" method="post">
        Fornavn: <input type="text" name="fornavn" maxlength="50" required><br>
        Etternavn: <input type="text" name="etternavn" maxlength="50" required><br>
        Adresse: <input type="text" name="adresse" maxlength="50" required><br>
        Postnr: <input type="number" minlength="4" maxlength="4" name="postnr" required><br>
        Mobilnr: <input type="number" minlength="8" maxlength="12" name="mobilnr"><br>
        Epost: <input type="email" name="epost" maxlength="40" required><br>
        Fødselsdato: <input type="date" min="1900-01-01" name="fdato" required><br>
        Kjønn: <input type="text" name="kjønn" maxlength="10" required><br>
        Interesser: <input type="text" name="interesser" maxlength="50"><br>
        Kursaktiviteter:<br>
        <input type="checkbox" name="aktiviteter1" value="Gitarkurs">Gitarkurs<br>
        <input type="checkbox" name="aktiviteter2" value="Paintballturnering">Paintballturnering<br>
        <input type="checkbox" name="aktiviteter3" value="Brettspilldag">Brettspilldag<br>
        <input type="checkbox" name="aktiviteter4" value="Volleyballturnering">Volleyballturnering<br>
        <input type="checkbox" name="aktiviteter5" value="Playstationkveld">Playstationkveld<br>
        <input type="checkbox" name="aktiviteter6" value="Kjøkkendag">Kjøkkendag<br>
        Medlem siden: <input type="date" min="2000-01-01" name="medlemsiden" required><br>
        Kontigentstatus: <input type="text" name="kstatus" maxlength="50" required><br><br>
        <input type="submit" name="registrer" value="Registrer">
        <?php
        if(isset($_POST['registrer'])) {
            $aktiviteter = array();
            if(isset($_POST['aktiviteter1'])){
                $aktiviteter[] = $_POST['aktiviteter1'];
            }
            if (isset($_POST['aktiviteter2'])) {
                $aktiviteter[] = $_POST['aktiviteter2'];
            }
            if (isset($_POST['aktiviteter3'])) {
                $aktiviteter[] = $_POST['aktiviteter3'];
            }
            if (isset($_POST['aktiviteter4'])) {
                $aktiviteter[] = $_POST['aktiviteter4'];
            }
            if (isset($_POST['aktiviteter5'])) {
                $aktiviteter[] = $_POST['aktiviteter5'];
            }
            if (isset($_POST['aktiviteter6'])) {
                $aktiviteter[] = $_POST['aktiviteter6'];
            }
            $nyttMedlem = new Medlem($_POST['fornavn'], $_POST['etternavn'], $_POST['adresse'], $_POST['postnr'], $_POST['mobilnr'], $_POST['epost'], $_POST['fdato'], $_POST['kjønn'], $_POST['interesser'], $aktiviteter, $_POST['medlemsiden'], $_POST['kstatus']);
            $nyttMedlem->registrerMedlem();
        }
        ?>
    </form>
    </body>
</html>