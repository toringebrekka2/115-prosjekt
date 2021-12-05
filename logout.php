<?php
    session_start();
    $_SESSION['bruker']['innlogget'] = false;
    header("Location: login.php");
    exit();
?>