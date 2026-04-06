<?php
include "../config/koneksi.php";

$user_name = "";
$nama_admin = "";

if (isset($_REQUEST['user_name'])) {
    $user_name = $_REQUEST['user_name'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE user_name = '$user_name'") or die(mysqli_error($koneksi));
    $admin_edit = mysqli_fetch_array($query);

    $user_name = $admin_edit['user_name'];
    $nama_admin = $admin_edit['nama_admin'];
}
?>
<form action="admin_proses.php" method="POST">
    <h2>DATA ADMIN</h2>
    <input type="hidden" name="status" value="<?php echo isset($_REQUEST['user_name']) ? 'edit' : 'tambah'; ?>">

    <table>
        <?php if (isset($_REQUEST['user_name'])): ?>
        <input type="hidden" name="user_name_lama" value="<?php echo $admin_edit['user_name']; ?>">
        <?php endif; ?>

        <tr>
            <td>NAMA ADMIN</td>
            <td>:</td>
            <td><input type="text" maxlength="52" size="50" name="nama_admin" value="<?php echo isset($admin_edit) ? htmlspecialchars($admin_edit['nama_admin'], ENT_QUOTES, 'UTF-8') : ''; ?>" required></td>
        </tr>

        <tr>
            <td>USERNAME</td>
            <td>:</td>
            <td><input type="text" maxlength="50" size="50" name="user_name" value="<?php echo isset($admin_edit) ? htmlspecialchars($admin_edit['user_name'], ENT_QUOTES, 'UTF-8') : ''; ?>" required></td>
        </tr>

        <tr>
            <td>PASSWORD <?php echo isset($_REQUEST['user_name']) ? '(Kosongkan jika tidak diubah)' : ''; ?></td>
            <td>:</td>
            <td><input type="password" maxlength="20" size="50" name="password" <?php echo isset($_REQUEST['user_name']) ? '' : 'required'; ?>></td>
        </tr>

        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="SIMPAN">
                <input type="button" value="BATAL" onclick="window.location.href='index.php?page=admin_tampil'">
            </td>
        </tr>
    </table>
</form>
