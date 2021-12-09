<!DOCTYPE html>
<html>
    <head>
        <title>Medlemsystem</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/white.css">
    </head>
    <body>
    <h1>Neo Ungdomsklubb</h1>
        <?php
            include 'navbar.php';
            function sjekkInnlogget() {
                if(!isset($_SESSION['bruker']['innlogget']) || $_SESSION['bruker']['innlogget'] !== true) {
                    header("Location: login.php");
                    exit();
                }
            }
            echo "<br><br><h3>Velkommen til Neo Ungdomsklubbs lederside.</h3><h4>Bruk menyen over for å gjøre handlinger.</h4>"
        ?>
    </body>
</html>