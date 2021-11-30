<!DOCTYPE html>
<html>
    <head>
        <title>Medlemsystem</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION['bruker']['innlogget']) || $_SESSION['bruker']['innlogget'] !== true) {
                header("Location: login.php");
                exit();
            }
            echo "<h1>Velkommen inn!</h1>";
        ?>
    </body>
</html>