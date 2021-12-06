<!DOCTYPE html>
<html>
    <head>
        <title>Registrer medlem</title>
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
        ?>

        <div class="nav-bar">
            <a class="active" href="index.php">Hjem</a>
            <a href="#">Vis alle</a>
            <a href="#">Sorter</a>
            <a href="registrermedlem.php">Registrer</a>
            <a href="logout.php">Logg ut</a>
        </div><br><br>
        <?php
            

        ?>
</body>
</html>