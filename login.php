<!DOCTYPE html>
<html>
    <head>
        <title>Medlemsystem</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Logg inn</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="brukernavn">Brukernavn</label>
            <input type="text" placeholder="Skriv inn brukernavn..." name="brukernavn" required><br><br>
            <label for="passord">Passord</label>
            <input type="password" placeholder="Skriv inn ditt passord..." name="passord" required><br><br>
            <input type="submit" value="Logg inn" name="logginn">
        </form>
        <p>Har du ikke passord? Lag et :<a href="lagpassord.php">her</a></p>

        <?php
            if(isset($_POST['logginn'])) {
                $tilkobling = new mysqli("localhost", "root", "root", "medlemdatabase");
                $spørring = "SELECT fornavn, passord FROM leder WHERE brukernavn = '";
                $spørring .= $_POST['brukernavn'];
                $spørring .= "';";
                $resultat = $tilkobling->query($spørring);
                $rad = $resultat->fetch_assoc();
                $dbPassord = $rad['passord'];

                if(password_verify($_POST['passord'], $dbPassord)) {
                    session_start();
                    $_SESSION['bruker']['innlogget'] = true;
                    $_SESSION['bruker']['fornavn'] = $rad['fornavn'];
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Brukernavn eller passord er ikke riktig...";
                }
            }

            $resultat->close();
            mysqli_close($tilkobling);

        ?><br><br>
        <a href="index.html">Til startsiden</a>
    </body>
</html>