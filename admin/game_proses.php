<?php
session_start();
include "../config/koneksi.php";
include "../config/log_helper.php";

$status = $_REQUEST['status'];

switch ($status) {
    case 'tambah':
        $id_game = $_REQUEST['id_game'];
        $judul_game = $_REQUEST['judul_game'];
        $tanggal_game =$_REQUEST['tanggal_game'];
        $detail_game = $_REQUEST['detail_game'];

        $asal = $_FILES['foto_game']['tmp_name'];
        $simpan_gambar = "../uploads/".$_FILES['foto_game']['name'];
        move_uploaded_file($asal, $simpan_gambar);

        $game_input = mysqli_query($koneksi,
        "INSERT INTO tb_game (id_game, judul_game, tanggal_game, detail_game, foto_game ) 
        VALUES ('$id_game','$judul_game','$tanggal_game','$detail_game','$simpan_gambar')");

        if($game_input){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menambah game: $judul_game");
            echo"<script>alert('INPUT BERHASIL'); window.location='index.php?page=game_tampil';</script>";
        } else {
            echo"<script>alert('INPUT GAGAL'); window.location='index.php?page=game_tampil';</script>";
        }
    break;

    case 'edit':
        $id_game = $_REQUEST['id_game'];
        $judul_game = $_REQUEST['judul_game'];
        $tanggal_game = $_REQUEST['tanggal_game'];
        $detail_game = $_REQUEST['detail_game'];

        $centang = isset($_REQUEST['centang']) ? $_REQUEST['centang'] : 0;

        if($centang == '1'){
            $asal = $_FILES['foto_game']['tmp_name'];
            $simpan_gambar = "../uploads/".$_FILES['foto_game']['name'];
            move_uploaded_file($asal, $simpan_gambar);
        } else {
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto_game FROM tb_game WHERE id_game='$id_game'"));
            $simpan_gambar = $data['foto_game'];
        }

        $game_edit = mysqli_query($koneksi, 
        "UPDATE tb_game SET judul_game='$judul_game', tanggal_game='$tanggal_game', detail_game='$detail_game', foto_game='$simpan_gambar'
        WHERE id_game='$id_game'");

        if($game_edit){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Mengedit game: $judul_game");
            echo"<script>alert('UPDATE BERHASIL'); window.location='index.php?page=game_tampil';</script>";
        } else {
            echo"<script>alert('UPDATE GAGAL'); window.location='index.php?page=game_tampil';</script>";
        }
    break;

    case 'hapus':
        $id_game = $_REQUEST['id_game'];
        $data_game = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT judul_game FROM tb_game WHERE id_game='$id_game'"));
        $game_hapus = mysqli_query($koneksi, "DELETE FROM tb_game WHERE id_game ='$id_game' ");
        if($game_hapus){
            catat_aktivitas($koneksi, $_SESSION['nama_admin'], "Menghapus game: " . $data_game['judul_game']);
            echo"<script>alert('HAPUS BERHASIL'); window.location='index.php?page=game_tampil';</script>";
        } else {
            echo"<script>alert('HAPUS GAGAL'); window.location='index.php?page=game_tampil';</script>";
        }
    break;
    default:
        echo "<script>window.location='index.php?page=game_tampil';</script>";
    break;
}
?>