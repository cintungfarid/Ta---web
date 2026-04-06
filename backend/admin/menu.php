<?php
include "../config/koneksi.php";

$total_notifikasi_komentar = 0;
$hasStatusColumn = mysqli_query($koneksi, "SHOW COLUMNS FROM tb_komentar LIKE 'status_notifikasi'");

if ($hasStatusColumn && mysqli_num_rows($hasStatusColumn) > 0) {
    $notifikasiResult = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tb_komentar WHERE status_notifikasi='unread'");
    if ($notifikasiResult) {
        $notifikasiRow = mysqli_fetch_assoc($notifikasiResult);
        $total_notifikasi_komentar = (int) $notifikasiRow['total'];
    }
}
?>

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

    <div class="comment-notification-panel">
        <button type="button" class="comment-notification-trigger" id="commentNotificationTrigger">
            <span>Notifikasi Komentar</span>
            <span class="comment-notification-badge <?php echo $total_notifikasi_komentar > 0 ? '' : 'is-hidden'; ?>" id="commentNotificationBadge">
                <?php echo $total_notifikasi_komentar; ?>
            </span>
        </button>
        <div class="comment-notification-dropdown" id="commentNotificationDropdown">
            <div class="comment-notification-header">
                <strong>Komentar Masuk</strong>
                <button type="button" class="comment-notification-action" id="markCommentNotificationRead">
                    Tandai dibaca
                </button>
            </div>
            <div class="comment-notification-list" id="commentNotificationList">
                <p class="comment-notification-empty">Memuat notifikasi komentar...</p>
            </div>
        </div>
    </div>
</div>

<div class="nav-container">
    <ul>
        <li>
            <a href="index.php?page=dashboard">
                <svg class="menu-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" fill="currentColor"/>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="index.php?page=merchandise_tampil">
                <svg class="menu-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6h-2c0-2.21-1.79-4-4-4S8 3.79 8 6H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-6-2c1.1 0 2 .9 2 2h-4c0-1.1.9-2 2-2zm6 16H6V8h2v2c0 .55.45 1 1 1s1-.45 1-1V8h4v2c0 .55.45 1 1 1s1-.45 1-1V8h2v12z" fill="currentColor"/>
                </svg>
                Merchandise
            </a>
        </li>
        <li>
            <a href="index.php?page=komentar_tampil">
                <svg class="menu-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z" fill="currentColor"/>
                </svg>
                Komentar
                <span class="menu-comment-badge <?php echo $total_notifikasi_komentar > 0 ? '' : 'is-hidden'; ?>" id="menuCommentBadge">
                    <?php echo $total_notifikasi_komentar; ?>
                </span>
            </a>
        </li>
        <li>
            <a href="index.php?page=admin_tampil">
                <svg class="menu-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.98 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" fill="currentColor"/>
                </svg>
                Kelola Admin
            </a>
        </li>
    </ul>

    <div class="sidebar-logout">
        <a href="#" onclick="confirmLogout(event)" class="logout-btn-sidebar">
            <svg class="logout-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" fill="currentColor"/>
            </svg>
            Logout
        </a>
    </div>
</div>
