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
    <div class="sidebar-brand">
        <img src="../uploads/Teks paragraf Anda (2).png" alt="Logo Admin" class="sidebar-brand-image">
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
    </ul>

    <div class="admin-profile sidebar-admin-profile">
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
