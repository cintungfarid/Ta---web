<div class="sidebar-header">
    <span class="halaman_admin-text">ADMIN</span>
</div>

<div class="nav-container">
    <ul>
        <li>
            <a href="index.php?page=dashboard">Dashboard</a>
        </li>
        <li>
            <a href="index.php?page=game_tampil">Data Game</a>
        </li>
        <li>
            <a href="index.php?page=merchandise_tampil">Merchandise</a>
        </li>
        <li>
            <a href="index.php?page=komentar_tampil">Komentar</a>
        </li>
        <li>
            <a href="index.php?page=log_tampil">Log Aktivitas</a>
        </li>
    </ul>
    
    <div class="sidebar-logout">
        <a href="#" onclick="confirmLogout(event)" class="logout-btn-sidebar">Logout</a>
    </div>
</div>

<script>
function confirmLogout(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Konfirmasi Logout',
        text: 'Apakah Anda yakin ingin keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'logout.php';
        }
    });
}
</script>