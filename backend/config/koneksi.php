<?php
$server = "localhost";
$username = "pplgrolas_0085661301";
$password = "0085661301";
$database = "pplgrolas_0085661301";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8");
?>
