<?php
function catat_aktivitas($koneksi, $admin_name, $aksi) {
    $waktu = date('Y-m-d H:i:s');
    $query = "INSERT INTO tb_log_aktivitas (admin_name, aksi, waktu) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sss", $admin_name, $aksi, $waktu);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>
