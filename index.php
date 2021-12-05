<!DOCTYPE html>
<html>
    <head>
        <title>Medlemsystem</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/black.css">
    </head>
    <body>
        <?php
            session_start();
            function sjekkInnlogget() {
                if(!isset($_SESSION['bruker']['innlogget']) || $_SESSION['bruker']['innlogget'] !== true) {
                    header("Location: login.php");
                    exit();
                }
            }
        ?>
        <h1>Neo Ungdomsklubb - medlemsoversikt</h1>
        <br><br>
        <p>Registrer nytt medlem <a href="registrermedlem.php">her.</a></p>
        <a id="loggut-knapp" href="logout.php">Logg ut</a>
    </body>
</html>