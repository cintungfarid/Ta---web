<?php
session_start();
include "../config/koneksi.php";
include "../config/log_helper.php";

$status = $_REQUEST['status'];

switch ($status) {
    case 'tambah':
        $id_komentar = $_REQUEST['id_komentar'];
        $nama_penulis = $_REQUEST['nama_penulis'];
        $tanggal_komentar =$_REQUEST['tanggal_komentar'];
        $detail_komentar = $_REQUEST['detail_komentar'];

        $komentar_input = mysqli_query($koneksi, 
        "INSERT INTO tb_komentar (id_komentar, nama_penulis, tanggal_komentar, detail_komentar ) 
        VALUES ('$id_komentar','$nama_penulis','$tanggal_komentar','$detail_komentar')");

        if($komentar_input){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menambah komentar dari: $nama_penulis");
            echo"<script>alert('INPUT BERHASIL'); window.location='index.php?page=komentar_tampil';</script>";
        } else {
            echo"<script>alert('INPUT GAGAL'); window.location='index.php?page=komentar_tampil';</script>";
        }
    break;

    case 'edit':
        $id_komentar = $_REQUEST['id_komentar'];
        $nama_penulis = $_REQUEST['nama_penulis'];
        $tanggal_komentar =$_REQUEST['tanggal_komentar'];
        $detail_komentar = $_REQUEST['detail_komentar'];

        $komentar_edit = mysqli_query($koneksi, 
        "UPDATE tb_komentar SET nama_penulis='$nama_penulis', tanggal_komentar='$tanggal_komentar', detail_komentar='$detail_komentar'
        WHERE id_komentar='$id_komentar'");

        if($komentar_edit){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Mengedit komentar dari: $nama_penulis");
            echo"<script>alert('UPDATE BERHASIL'); window.location='index.php?page=komentar_tampil';</script>";
        } else {
            echo"<script>alert('UPDATE GAGAL'); window.location='index.php?page=komentar_tampil';</script>";
        }
    break;

    case 'hapus':
        $id_komentar = $_REQUEST['id_komentar'];
        $data_komentar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_penulis FROM tb_komentar WHERE id_komentar='$id_komentar'"));
        $komentar_hapus = mysqli_query($koneksi, "DELETE FROM tb_komentar WHERE id_komentar ='$id_komentar' ");
        if($komentar_hapus){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menghapus komentar dari: " . $data_komentar['nama_penulis']);
            echo"<script>alert('HAPUS BERHASIL'); window.location='index.php?page=komentar_tampil';</script>";
        } else {
            echo"<script>alert('HAPUS GAGAL'); window.location='index.php?page=komentar_tampil';</script>";
        }
    break;
    default:
        echo "<script>window.location='index.php?page=komentar_tampil';</script>";
    break;
}
?>