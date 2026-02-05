<?php
include "../config/koneksi.php";

$id_merchandise = "";
$judul_merchandise = "";
$harga_merchandise = "";
$detail_merchandise = "";
$foto_merchandise = "";

if (isset($_REQUEST['id_merchandise'])) {  
    $id_merchandise = $_REQUEST['id_merchandise'];
    
    $query = mysqli_query($koneksi, "SELECT * FROM tb_merchandise WHERE id_merchandise = '$id_merchandise'") or die(mysqli_error($koneksi));
    $merchandise_edit = mysqli_fetch_array($query);

    $judul_merchandise = $merchandise_edit['judul_merchandise'];
}
?>
<h2 align="center">DATA MERCHANDISE</h2>

<form action="merchandise_proses.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="status" value="<?php echo isset($_REQUEST['id_merchandise']) ? 'edit' : 'tambah'; ?>">

    <table>
        <tr>
            <td>ID MERCHANDISE</td>
            <td>:</td>
            <td><input type="text" maxlength="11" size="50" name="id_merchandise" value="<?php echo @$merchandise_edit['id_merchandise']; ?>" <?php echo isset($_REQUEST['id_merchandise']) ? 'readonly' : ''; ?> required></td>
        </tr>

        <tr>
            <td>NAMA MERCHANDISE</td>
            <td>:</td>
            <td><input type="text" maxlength="30" size="50" name="judul_merchandise" value="<?php echo @$merchandise_edit['judul_merchandise']; ?>" required></td>
        </tr>

        <tr>
           <td>HARGA MERCHANDISE</td>
           <td>:</td>
           <td><textarea style="width:300px; height:100px;" name="harga_merchandise"> <?php echo @$merchandise_edit['harga_merchandise']; ?></textarea></td>
       </tr>

       <tr>
           <td>DESKRIPSI MERCHANDISE</td>
           <td>:</td>
           <td><textarea style="width:300px; height:100px;" name="detail_merchandise"> <?php echo @$merchandise_edit['detail_merchandise']; ?></textarea></td>
       </tr>

       <tr>
             <td>FOTO MERCHANDISE</td>
        <td>:</td>
        <td>
            <?php
                if(isset($_REQUEST['id_merchandise']))
                {
                    echo "<img src='$merchandise_edit[foto_merchandise]' width=100 height=100>";
                }
            ?>
            </br>
            <input type="file" name="foto_merchandise">
            <?php
                if(isset($_REQUEST['id_merchandise']))
                {
                     ?>
                        </br>  
                        <input type="checkbox" name="centang" value="1">Centang jika ingin ganti foto 
                     <?php    
                }
            ?>
             </td>
        </tr>
     
        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="SIMPAN">
                <input type = "button" value = "BATAL" onclick="window.location.href='index.php?page=merchandise_tampil'">  
            </td>
        </tr>
    </table>
</form>