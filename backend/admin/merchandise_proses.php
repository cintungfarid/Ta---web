<?php
session_start();
include "../config/koneksi.php";
include "../config/log_helper.php";

$status = $_REQUEST['status'];

switch ($status) {
    case 'tambah':
        $judul_merchandise = $_REQUEST['judul_merchandise'];
        $harga_merchandise = $_REQUEST['harga_merchandise'];
        $stock_merchandise = $_REQUEST['stock_merchandise'];
        $detail_merchandise = $_REQUEST['detail_merchandise'];

        $asal = $_FILES['foto_merchandise']['tmp_name'];
        $nama_file = $_FILES['foto_merchandise']['name'];
        $simpan_gambar_path = "../uploads/".$nama_file;
        $simpan_gambar_db = "uploads/".$nama_file;
        move_uploaded_file($asal, $simpan_gambar_path);

        $merchandise_input = mysqli_query($koneksi, 
        "INSERT INTO tb_merchandise (judul_merchandise, harga_merchandise, stock_merchandise, detail_merchandise, foto_merchandise ) 
        VALUES ('$judul_merchandise','$harga_merchandise','$stock_merchandise','$detail_merchandise','$simpan_gambar_db')");

        if($merchandise_input){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menambah merchandise: $judul_merchandise");
            echo"<script>window.location='index.php?page=merchandise_tampil';</script>";
        } else {
            echo"<script>window.location='index.php?page=merchandise_tampil';</script>";
        }
    break;

    case 'edit':
        $id_merchandise = $_REQUEST['id_merchandise'];
        $judul_merchandise = $_REQUEST['judul_merchandise'];
        $harga_merchandise = $_REQUEST['harga_merchandise'];
        $stock_merchandise = $_REQUEST['stock_merchandise'];
        $detail_merchandise = $_REQUEST['detail_merchandise'];

        if(!empty($_FILES['foto_merchandise']['name'])){
            $asal = $_FILES['foto_merchandise']['tmp_name'];
            $nama_file = $_FILES['foto_merchandise']['name'];
            $simpan_gambar_path = "../uploads/".$nama_file;
            $simpan_gambar_db = "uploads/".$nama_file;
            move_uploaded_file($asal, $simpan_gambar_path);
        } else {
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_merchandise FROM tb_merchandise WHERE id_merchandise='$id_merchandise'"));
            $simpan_gambar_db = $data['foto_merchandise'];
        }

        $merchandise_edit = mysqli_query($koneksi, 
        "UPDATE tb_merchandise SET judul_merchandise='$judul_merchandise', harga_merchandise='$harga_merchandise', stock_merchandise='$stock_merchandise', detail_merchandise='$detail_merchandise', foto_merchandise='$simpan_gambar_db'
        WHERE id_merchandise='$id_merchandise'");

        if($merchandise_edit){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Mengedit merchandise: $judul_merchandise");
            echo"<script>window.location='index.php?page=merchandise_tampil';</script>";
        } else {
            echo"<script>window.location='index.php?page=merchandise_tampil';</script>";
        }
    break;

    case 'hapus':
        $id_merchandise = $_REQUEST['id_merchandise'];
        $data_merch = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT judul_merchandise FROM tb_merchandise WHERE id_merchandise='$id_merchandise'"));
        $merchandise_hapus = mysqli_query($koneksi, "DELETE FROM tb_merchandise WHERE id_merchandise ='$id_merchandise' ");
        if($merchandise_hapus){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menghapus merchandise: " . $data_merch['judul_merchandise']);
            $_SESSION['swal'] = ['icon' => 'success', 'title' => 'Berhasil!', 'text' => 'Merchandise berhasil dihapus.'];
            echo"<script>window.location='index.php?page=merchandise_tampil';</script>";
        } else {
            $_SESSION['swal'] = ['icon' => 'error', 'title' => 'Gagal!', 'text' => 'Merchandise gagal dihapus.'];
            echo"<script>window.location='index.php?page=merchandise_tampil';</script>";
        }
    break;
    default:
        echo "<script>window.location='index.php?page=merchandise_tampil';</script>";
    break;
}
?>