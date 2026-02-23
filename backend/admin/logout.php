<?php
session_start();
include "../config/koneksi.php";
include "../config/log_helper.php";

$nama_admin = isset($_SESSION['nama_admin']) ? $_SESSION['nama_admin'] : 'Admin';
catat_aktivitas($koneksi, $nama_admin, 'Logout dari sistem');
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/auth.js"></script>
</head>
<body>
<script>
    showAlert('success', 'Logout Berhasil', '', 'index.php');
</script>
</body>
</html>
