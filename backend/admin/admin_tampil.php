<div style="text-align: right; margin-bottom: 20px;">
    <?php
        echo "<a href='index.php?page=admin_input' class='btn btn-add'>+ Tambah Admin</a>";
    ?>
</div>

<table>
    <thead>
        <tr>
            <th width="5%">No.</th>
            <th>Nama Admin</th>
            <th>Username</th>
            <th width="18%">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include "../config/koneksi.php";
        $no = 1;
        $admin_tampil = mysqli_query($koneksi, "SELECT * FROM tb_admin ORDER BY nama_admin ASC");
        while ($hasil = mysqli_fetch_array($admin_tampil))
        {
            $nama_admin = htmlspecialchars($hasil['nama_admin'], ENT_QUOTES, 'UTF-8');
            $user_name = htmlspecialchars($hasil['user_name'], ENT_QUOTES, 'UTF-8');

            echo "<tr>";
            echo "<td align='center'>$no</td>";
            echo "<td>{$nama_admin}</td>";
            echo "<td>{$user_name}</td>";
            echo "<td align='center'>";
            echo "<a href='index.php?page=admin_input&status=edit&user_name={$hasil['user_name']}' class='btn btn-edit btn-sm'>Edit</a> ";
            echo "<a href='#' onclick=\"confirmDeleteAdmin('{$hasil['user_name']}', '{$nama_admin}')\" class='btn btn-delete btn-sm'>Hapus</a>";
            echo "</td>";
            echo "</tr>";

            $no++;
        }
    ?>
    </tbody>
</table>

<?php
if (isset($_SESSION['swal'])) {
    $swal = $_SESSION['swal'];
    unset($_SESSION['swal']);
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: '{$swal['icon']}',
            title: '{$swal['title']}',
            text: '{$swal['text']}',
            timer: 2000,
            showConfirmButton: false
        });
    });
    </script>";
}
?>
<script src="js/admin_manage.js"></script>
