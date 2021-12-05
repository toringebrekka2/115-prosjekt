<!DOCTYPE html>
<html>
    <head>
        <title>Medlemsystem</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/white.css">
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
        <div class="nav-bar">
            <a class="active" href="index.php">Hjem</a>
            <a href="#">Vis alle</a>
            <a href="#">Sorter</a>
            <a href="registrermedlem.php">Registrer</a>
            <a href="logout.php">Logg ut</a>
        </div>
        
    </body>
</html>