<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Pelarian Timun Mas</title>
    <link rel="icon" type="image/png" href="../uploads/Teks paragraf Anda (2).png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="main-wrapper">
        <div id="kiri">
            <?php include "menu.php"; ?>
        </div>
        <div id="kanan">
            <?php include "isi.php"; ?>
        </div>
    </div>
    <script src="js/admin.js"></script>
</body>
</html>
