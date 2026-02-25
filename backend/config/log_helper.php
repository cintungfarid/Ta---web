<?php
function catat_aktivitas($koneksi, $nama_admin, $aktivitas) {
    $nama_admin = mysqli_real_escape_string($koneksi, $nama_admin);
    $aktivitas = mysqli_real_escape_string($koneksi, $aktivitas);
    $waktu = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO tb_log_aktivitas (admin_name, aksi, waktu) VALUES ('$nama_admin', '$aktivitas', '$waktu')";
    
    return mysqli_query($koneksi, $query);
}
?>
