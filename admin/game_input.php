<?php
include "../config/koneksi.php";

$id_game = "";
$judul_game = "";
$tanggal_game = "";
$detail_game = "";
$foto_game = "";

if (isset($_REQUEST['id_game'])) {  
    $id_game = $_REQUEST['id_game'];
    
    $query = mysqli_query($koneksi, "SELECT * FROM tb_game WHERE id_game = '$id_game'") or die(mysqli_error($koneksi));
    $game_edit = mysqli_fetch_array($query);

    $judul_game = $game_edit['judul_game'];
}
?>
<h2 align="center">DATA GAME</h2>

<form action="game_proses.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="status" value="<?php echo isset($_REQUEST['id_game']) ? 'edit' : 'tambah'; ?>">

    <table>
        <tr>
            <td>ID GAME</td>
            <td>:</td>
            <td><input type="text" maxlength="11" size="50" name="id_game" value="<?php echo @$game_edit['id_game']; ?>" <?php echo isset($_REQUEST['id_game']) ? 'readonly' : ''; ?> required></td>
        </tr>

        <tr>
            <td>JUDUL GAME</td>
            <td>:</td>
            <td><input type="text" maxlength="30" size="50" name="judul_game" value="<?php echo @$game_edit['judul_game']; ?>" required></td>
        </tr>
        
        <tr>
         <td>TANGGAL GAME</td>
         <td>:</td>
         <td>
           <input type="date" name="tanggal_game" 
              value="<?php echo @$game_edit['tanggal_game']; ?>" required>
         </td>
       </tr>

        <tr>
           <td>DESKRIPSI GAME</td>
           <td>:</td>
           <td><textarea style="width:300px; height:100px;" name="detail_game"> <?php echo @$game_edit['detail_game']; ?></textarea></td>
       </tr>

       <tr>
             <td>FOTO GAME</td>
        <td>:</td>
        <td>
            <?php
                if(isset($_REQUEST['id_game']))
                {
                    echo "<img src='$game_edit[foto_game]' width=100 height=100>";
                }
            ?>
            </br>
            <input type="file" name="foto_game">
            <?php
                if(isset($_REQUEST['id_game']))
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
                <input type = "button" value = "BATAL" onclick="window.location.href='index.php?page=game_tampil'">  
            </td>
        </tr>
    </table>
</form>