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
            echo "<h1>Registrer rolle på medlem</h1>";
            include "navbar.php";

        ?>
</body>
</html>