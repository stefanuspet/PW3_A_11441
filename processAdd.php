<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel & Resort",
    "page_title" => "Admin Panel - Grand Atma Hotel & Resort",
    "logo" => "./assets/images/crown.png"
];

$kamar = [];

if (!isset($_SESSION["Rooms"])) {
    $_SESSION["Rooms"] = [];
}

if (isset($_POST["saveRoom"])) {
    $namaKamar = $_POST["namaKamar"];
    $deskripsiKamar = $_POST["Deskripsi"];
    $tipekamar = $_POST["tipeKamar"];
    $hargaKamar = $_POST["hargaKamar"];

    $kamar = [
        "namaKamar" => $namaKamar,
        "Deskripsi" => $deskripsiKamar,
        "tipeKamar" => $tipekamar,
        "hargaKamar" => $hargaKamar
    ];

    array_push($_SESSION["Rooms"], $kamar);
    header("Location: ./dashboard.php");
}
?>