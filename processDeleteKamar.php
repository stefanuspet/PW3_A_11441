<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}


if (!isset($_SESSION["Rooms"])) {
    $_SESSION["Rooms"] = [];
}

if (isset($_POST["delete"])){
    $key = $_POST["delete"];
    unset($_SESSION["Rooms"][$key]);
    header("Location: ./dashboard.php");
}

?>