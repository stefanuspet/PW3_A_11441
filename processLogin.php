<?php 
session_start();

if (isset($_SESSION["user"])) {
    header("Location: ./dashboard.php");
    exit;
}

if (isset($_POST["mencoba_login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $_SESSION["error"] = "Username dan password harus diisi!";
        header("Location: ./login.php");
        exit;
    }
    if(!isset($_FILES["bukti_ngantor"])){
        $_SESSION["error"] = "Bukti ngantor harus diisi!";
        header("Location: ./login.php");
        exit;
    }

    $buktiNgantor = $_FILES["bukti_ngantor"];
    $tmpFile = $buktiNgantor["tmp_name"];

    $folderTujuan = "./bukti_ngantor/";
    $namaFile = $buktiNgantor["name"];  
    $alamatFile = $folderTujuan . $namaFile;

    if(!move_uploaded_file($tmpFile, $alamatFile)){
        $_SESSION["error"] = "Bukti ngantor gagal diupload!";
        header("Location: ./login.php");
        exit;
    }

    $_SESSION["user"] = [
        "username" => $username,
        "password" => $password,
        "bukti_ngantor" => $alamatFile,
        "login_at" => date("Y-m-d H:i:s")
    ];
    header("Location: ./dashboard.php");
}
