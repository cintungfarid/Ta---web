<?php
session_start();
include "../config/koneksi.php";
include "../config/log_helper.php";

$status = $_REQUEST['status'];

switch ($status) {
    case 'tambah':
        $nama_admin = $_REQUEST['nama_admin'];
        $user_name = $_REQUEST['user_name'];
        $password = md5($_REQUEST['password']);

        $cek_username = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE user_name='$user_name'");

        if (mysqli_num_rows($cek_username) > 0) {
            $_SESSION['swal'] = ['icon' => 'error', 'title' => 'Gagal!', 'text' => 'Username admin sudah digunakan.'];
            echo "<script>window.location='index.php?page=admin_tampil';</script>";
            exit;
        }

        $admin_input = mysqli_query($koneksi,
        "INSERT INTO tb_admin (user_name, password, nama_admin)
        VALUES ('$user_name','$password','$nama_admin')");

        if($admin_input){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menambah admin: $nama_admin");
            $_SESSION['swal'] = ['icon' => 'success', 'title' => 'Berhasil!', 'text' => 'Admin berhasil ditambahkan.'];
            echo"<script>window.location='index.php?page=admin_tampil';</script>";
        } else {
            $_SESSION['swal'] = ['icon' => 'error', 'title' => 'Gagal!', 'text' => 'Admin gagal ditambahkan.'];
            echo"<script>window.location='index.php?page=admin_tampil';</script>";
        }
    break;

    case 'edit':
        $user_name_lama = $_REQUEST['user_name_lama'];
        $nama_admin = $_REQUEST['nama_admin'];
        $user_name = $_REQUEST['user_name'];
        $password_baru = isset($_REQUEST['password']) ? trim($_REQUEST['password']) : '';

        $cek_username = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE user_name='$user_name' AND user_name!='$user_name_lama'");

        if (mysqli_num_rows($cek_username) > 0) {
            $_SESSION['swal'] = ['icon' => 'error', 'title' => 'Gagal!', 'text' => 'Username admin sudah digunakan.'];
            echo "<script>window.location='index.php?page=admin_tampil';</script>";
            exit;
        }

        if ($password_baru !== '') {
            $password = md5($password_baru);
            $admin_edit = mysqli_query($koneksi,
            "UPDATE tb_admin SET user_name='$user_name', password='$password', nama_admin='$nama_admin'
            WHERE user_name='$user_name_lama'");
        } else {
            $admin_edit = mysqli_query($koneksi,
            "UPDATE tb_admin SET user_name='$user_name', nama_admin='$nama_admin'
            WHERE user_name='$user_name_lama'");
        }

        if($admin_edit){
            if (isset($_SESSION['user_name']) && $_SESSION['user_name'] == $user_name_lama) {
                $_SESSION['user_name'] = $user_name;
                $_SESSION['nama_admin'] = $nama_admin;
            }

            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Mengedit admin: $nama_admin");
            $_SESSION['swal'] = ['icon' => 'success', 'title' => 'Berhasil!', 'text' => 'Data admin berhasil diubah.'];
            echo"<script>window.location='index.php?page=admin_tampil';</script>";
        } else {
            $_SESSION['swal'] = ['icon' => 'error', 'title' => 'Gagal!', 'text' => 'Data admin gagal diubah.'];
            echo"<script>window.location='index.php?page=admin_tampil';</script>";
        }
    break;

    case 'hapus':
        $user_name = $_REQUEST['user_name'];
        $data_admin = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_admin FROM tb_admin WHERE user_name='$user_name'"));
        $jumlah_admin = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total_admin FROM tb_admin"));

        if ($jumlah_admin['total_admin'] <= 1) {
            $_SESSION['swal'] = ['icon' => 'error', 'title' => 'Gagal!', 'text' => 'Admin tidak bisa dihapus karena hanya tersisa 1 akun admin.'];
            echo"<script>window.location='index.php?page=admin_tampil';</script>";
            exit;
        }

        if (isset($_SESSION['user_name']) && $_SESSION['user_name'] == $user_name) {
            $_SESSION['swal'] = ['icon' => 'error', 'title' => 'Gagal!', 'text' => 'Akun admin yang sedang login tidak dapat dihapus.'];
            echo"<script>window.location='index.php?page=admin_tampil';</script>";
            exit;
        }

        $admin_hapus = mysqli_query($koneksi, "DELETE FROM tb_admin WHERE user_name='$user_name'");

        if($admin_hapus){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menghapus admin: " . $data_admin['nama_admin']);
            $_SESSION['swal'] = ['icon' => 'success', 'title' => 'Berhasil!', 'text' => 'Admin berhasil dihapus.'];
            echo"<script>window.location='index.php?page=admin_tampil';</script>";
        } else {
            $_SESSION['swal'] = ['icon' => 'error', 'title' => 'Gagal!', 'text' => 'Admin gagal dihapus.'];
            echo"<script>window.location='index.php?page=admin_tampil';</script>";
        }
    break;

    default:
        echo "<script>window.location='index.php?page=admin_tampil';</script>";
    break;
}
?>
