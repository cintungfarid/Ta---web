<div class="sidebar-header">
    <div class="admin-profile">
        <div class="profile-avatar">
            <svg class="profile-icon" width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2"/>
                <path d="M5 20C5 16.134 8.134 13 12 13C15.866 13 19 16.134 19 20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="profile-info">
            <span class="admin-name"><?php echo $_SESSION['nama_admin']; ?></span>
            <span class="admin-role">Admin</span>
        </div>
    </div>
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