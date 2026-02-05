<?php
include "../config/koneksi.php";

$id_komentar = "";
$nama_penulis = "";
$tanggal_komentar = "";
$detail_komentar = "";

if (isset($_REQUEST['id_komentar'])) {  
    $id_komentar = $_REQUEST['id_komentar'];
    
    $query = mysqli_query($koneksi, "SELECT * FROM tb_komentar WHERE id_komentar = '$id_komentar'") or die(mysqli_error($koneksi));
    $komentar_edit = mysqli_fetch_array($query);

    $nama_penulis = $komentar_edit['nama_penulis'];
}
?>
<h2 align="center">DATA KOMENTAR</h2>

<form action="komentar_proses.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="status" value="<?php echo isset($_REQUEST['id_komentar']) ? 'edit' : 'tambah'; ?>">

    <table>
        <tr>
            <td>ID KOMENTAR</td>
            <td>:</td>
            <td><input type="text" maxlength="11" size="50" name="id_komentar" value="<?php echo @$komentar_edit['id_komentar']; ?>" <?php echo isset($_REQUEST['id_komentar']) ? 'readonly' : ''; ?> required></td>
        </tr>

        <tr>
            <td>NAMA PENULIS</td>
            <td>:</td>
            <td><input type="text" maxlength="30" size="50" name="nama_penulis" value="<?php echo @$komentar_edit['nama_penulis']; ?>" required></td>
        </tr>
        
        <tr>
         <td>TANGGAL KOMENTAR</td>
         <td>:</td>
         <td>
           <input type="date" name="tanggal_komentar" 
              value="<?php echo @$komentar_edit['tanggal_komentar']; ?>" required>
         </td>
       </tr>

        <tr>
           <td>DESKRIPSI BERITA</td>
           <td>:</td>
           <td><textarea style="width:300px; height:100px;" name="detail_komentar"> <?php echo @$berita_edit['detail_komentar']; ?></textarea></td>
       </tr>

       <tr>
             </td>
        </tr>
     
        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="SIMPAN">
                <input type = "button" value = "BATAL" onclick="window.location.href='index.php?page=komentar_tampil'">  
            </td>
        </tr>
    </table>
</form>