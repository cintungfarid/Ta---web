<?php
session_start();
include "../config/koneksi.php";
include "../config/log_helper.php";

$status = $_REQUEST['status'];

switch ($status) {
    case 'tambah':
        $id_merchandise = $_REQUEST['id_merchandise'];
        $judul_merchandise = $_REQUEST['judul_merchandise'];
        $harga_merchandise = $_REQUEST['harga_merchandise'];
        $detail_merchandise = $_REQUEST['detail_merchandise'];

        $asal = $_FILES['foto_merchandise']['tmp_name'];
        $simpan_gambar = "../uploads/".$_FILES['foto_merchandise']['name'];
        move_uploaded_file($asal, $simpan_gambar);

        $merchandise_input = mysqli_query($koneksi, 
        "INSERT INTO tb_merchandise (id_merchandise, judul_merchandise, harga_merchandise, detail_merchandise ) 
        VALUES ('$id_merchandise','$judul_merchandise','$harga_merchandise','$detail_merchandise')");

        if($merchandise_input){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menambah merchandise: $judul_merchandise");
            echo"<script>alert('INPUT BERHASIL'); window.location='index.php?page=merchandise_tampil';</script>";
        } else {
            echo"<script>alert('INPUT GAGAL'); window.location='index.php?page=merchandise_tampil';</script>";
        }
    break;

    case 'edit':
        $id_merchandise = $_REQUEST['id_merchandise'];
        $judul_merchandise = $_REQUEST['judul_merchandise'];
        $harga_merchandise = $_REQUEST['harga_merchandise'];
        $detail_merchandise = $_REQUEST['detail_merchandise'];

        $centang = isset($_REQUEST['centang']) ? $_REQUEST['centang'] : 0;

        if($centang == '1'){
            $asal = $_FILES['foto_merchandise']['tmp_name'];
            $simpan_gambar = "../uploads/".$_FILES['foto_merchandise']['name'];
            move_uploaded_file($asal, $simpan_gambar);
        } else {
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_merchandise FROM tb_merchandise WHERE id_merchandise='$id_merchandise'"));
            $simpan_gambar = $data['foto_merchandise'];
        }

        $merchandise_edit = mysqli_query($koneksi, 
        "UPDATE tb_merchandise SET judul_merchandise='$judul_merchandise', harga_merchandise='$harga_merchandise', detail_merchandise='$detail_merchandise', foto_merchandise='$simpan_gambar'
        WHERE id_merchandise='$id_merchandise'");

        if($merchandise_edit){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Mengedit merchandise: $judul_merchandise");
            echo"<script>alert('UPDATE BERHASIL'); window.location='index.php?page=merchandise_tampil';</script>";
        } else {
            echo"<script>alert('UPDATE GAGAL'); window.location='index.php?page=merchandise_tampil';</script>";
        }
    break;

    case 'hapus':
        $id_merchandise = $_REQUEST['id_merchandise'];
        $data_merch = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT judul_merchandise FROM tb_merchandise WHERE id_merchandise='$id_merchandise'"));
        $merchandise_hapus = mysqli_query($koneksi, "DELETE FROM tb_merchandise WHERE id_merchandise ='$id_merchandise' ");
        if($merchandise_hapus){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menghapus merchandise: " . $data_merch['judul_merchandise']);
            echo"<script>alert('HAPUS BERHASIL'); window.location='index.php?page=merchandise_tampil';</script>";
        } else {
            echo"<script>alert('HAPUS GAGAL'); window.location='index.php?page=merchandise_tampil';</script>";
        }
    break;
    default:
        echo "<script>window.location='index.php?page=merchandise_tampil';</script>";
    break;
}
?>