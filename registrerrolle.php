<!DOCTYPE html>
<html>
    <head>
        <title>Registrer rolle</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/white.css">
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION['bruker']['innlogget']) || $_SESSION['bruker']['innlogget'] !== true) {
                header("Location: login.php");
                exit();
            }
            echo "<h1>Registrer rolle på et medlem</h1>";
            include "navbar.php";
        ?>
        <br><br>
        <form action="registrerrolle.php" method="get">
            Hvilket medlem vil du registrere en rolle på? <input type="number" name="id" placeholder="Skriv inn en ID..." required>
            <input type="submit" name="idsubmit" value="Finn medlem">
        </form><br>
        <?php
            $id;
            if(isset($_GET['idsubmit'])) {
                $id = $_GET['id'];
                $tilkobling = new mysqli("localhost", "root", "root", "medlemdatabase");
                $hentMedlemSQL = "SELECT * FROM medlem WHERE id = '" . $_GET['id'] . "';";
                $resultat = $tilkobling->query($hentMedlemSQL);
                $rad = $resultat->fetch_assoc();
                
                if(!empty($rad)) {
                    echo "Fant dette medlemmet: ";
                    echo $rad['fornavn'] . " " . $rad['etternavn'];
                    echo "<br><br><br>Hvilken rolle vil du registrere på medlemmet? (velg én rolle...)" . "<br><br>";
                    $fantMedlem = true;
                } else {
                    echo "Fant ikke medlem med id $id ...";
                }
            }
            $fornavn = $rad['fornavn'];
            $etternavn = $rad['etternavn'];
            $resultat->close();
            mysqli_close($tilkobling);
        ?>
        <?php if($fantMedlem) : ?>
            <form action="registrerrolle.php" method="post">
                Leder: <input type="checkbox" name="Leder" value="Leder">
                Nestleder: <input type="checkbox" name="Nestleder" value="Nestleder">
                Kasserer: <input type="checkbox" name="Kasserer" value="Kasserer">
                Aktivitetsansvarlig: <input type="checkbox" name="Aktivitetsansvarlig" value="Aktivitetsansvarlig"><br><br>
                <input type="submit" name="regsubmit" value="Registrer">
            </form>
        <?php endif; ?>
        <?php
            if(isset($_POST['regsubmit'])) {
                $rolle;
                
                if(isset($_POST['Leder'])) {
                    $rolle = $_POST['Leder'];
                } elseif(isset($_POST['Nestleder'])) {
                    $rolle = $_POST['Nestleder'];
                } elseif(isset($_POST['Kasserer'])) {
                    $rolle = $_POST['Kasserer'];
                } elseif(isset($_POST['Aktivitetsansvarlig'])) {
                    $rolle = $_POST['Aktivitetsansvarlig'];
                } else {
                    echo "Velg en rolle!";
                }
                
                $tilkobling2 = new mysqli("localhost", "root", "root", "medlemdatabase");
                
                $hentRolleID = "SELECT id FROM roller WHERE navn = '" . $rolle . "';";
                $resultat2 = $tilkobling2->query($hentRolleID);
                $rolleid = $resultat2->fetch_assoc();
                print_r($rolleid);
                $regSQL = "INSERT INTO medlemrolle (medlem, rolle) VALUES ('" . $id . "', '" . $rolleid['id'] . "');";
                if($tilkobling2->query($regSQL)) {
                    echo "Rollen $rolle ble registrert på " . $fornavn . $etternavn . ".";
                } else {
                    echo "Noe gikk galt... Rollen ble ikke registrert.";
                }
            }
        ?>
</body>
</html>