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
        <br><br><form>
            Skriv inn ID på medlemmet du vil slette: <input type="number" name="id" required>
            <input type="submit" name="submit" value="Ok">
        </form>
        <?php
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $tilkobling = new mysqli("localhost", "root", "root", "medlemdatabase");
                $sjekkForRegAktivitet = "SELECT * FROM medlemaktivitet WHERE medlem = '" . $id . "';";
                $res1 = $tilkobling->query($sjekkForRegAktivitet);
                if (empty($res1)) {
                    $tilkobling->query("DELETE FROM medlem WHERE id = '" . $id . "';");
                } else {
                    $tilkobling->query("DELETE FROM medlemaktivitet WHERE medlem = '" . $id . "';");
                    $tilkobling->query("DELETE FROM medlem WHERE id = '" . $id . "';");
                }
            }
        ?>
</body>
</html>