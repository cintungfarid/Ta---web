<?php
session_start();
include "../config/koneksi.php";
include "../config/log_helper.php";
$user_name = $_POST['user_name'];
$password = md5($_POST['password']);
$login = mysqli_query ($koneksi, "SELECT * FROM tb_admin
WHERE user_name='$user_name' AND password='$password'");
$jumlah_login = mysqli_num_rows($login);
if($jumlah_login==0)
{
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: 'Username atau password salah!',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location='login.php';
        });
    </script>
    </body>
    </html>
    <?php
}else{
    $data_login = mysqli_fetch_array($login);
    $_SESSION['nama_admin']=$data_login['nama_admin'];
    $_SESSION['user_name']=$data_login['user_name'];
    
    catat_aktivitas($koneksi, $data_login['nama_admin'], 'Login ke sistem');
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Login Berhasil',
            text: 'Selamat datang <?php echo $data_login['nama_admin']; ?>!',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location='index.php';
        });
    </script>
    </body>
    </html>
    <?php
}
?>