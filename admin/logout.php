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
</head>
<body>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Logout Berhasil',
        confirmButtonText: 'OK'
    }).then(() => {
        window.location='index.php';
    });
</script>
</body>
</html>