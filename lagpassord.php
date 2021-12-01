<!DOCTYPE html>
<html>
    <head>
        <title>Lag passord </title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Lag passord</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" placeholder="Skriv inn ditt brukernavn" name="brukernavn" required>
            <input type="password" placeholder="Skriv inn ønsket passord" minlength="8" maxlength="50" name="passord" required>
            <input type="submit" value="Ferdig" name="lagpassord">
        </form>

        <?php
            if(isset($_POST['lagpassord'])) {
                $hashetPassord = password_hash($_POST['passord'], PASSWORD_DEFAULT);

                $tilkobling = new mysqli("localhost", "root", "root", "medlemdatabase");
                $spørring = "UPDATE medlem SET passord = '";
                $spørring .= $hashetPassord;
                $spørring .= "' WHERE brukernavn = '";
                $spørring .= $_POST['brukernavn'];
                $spørring .= "';";

                if($tilkobling->query($spørring)) {
                    echo "Passordet ditt ble lagret.";
                } else {
                    echo "Det skjedde en feil. Passordet ditt ble ikke lagret.";
                    echo $spørring;
                }
                mysqli_close($tilkobling);
            }

        ?><br><br>
        <a href="index.html">Til startsiden</a>
    </body>
</html>