<!DOCTYPE html>
<html>
    <head>
        <title>Avmeld medlem</title>
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
            echo "<h1>Avmeld medlem</h1>";
            include "navbar.php";

        ?>
</body>
</html>