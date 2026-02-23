<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_gamevalen";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8");
?>
