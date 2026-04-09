<?php 
$current_admin_name = isset($_SESSION['nama_admin']) ? $_SESSION['nama_admin'] : 'Admin';
$current_admin_username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';

$page_titles = [
    'dashboard' => 'Dashboard',
    'admin_tampil' => 'Kelola Admin',
    'admin_input' => 'Tambah/Edit Admin',
    'komentar_tampil' => 'Komentar',
    'komentar_input' => 'Tambah/Edit Komentar',
    'merchandise_tampil' => 'Merchandise',
    'merchandise_input' => 'Tambah/Edit Merchandise'
];

$current_page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$page_title = isset($page_titles[$current_page]) ? $page_titles[$current_page] : 'Dashboard';
?>

<div class="content-header">
    <h1><?php echo $page_title; ?></h1>

    <div class="header-profile-menu">
        <button type="button" class="header-profile-trigger" id="headerProfileTrigger" aria-expanded="false">
            <span class="header-profile-chevron" aria-hidden="true">▾</span>
            <span class="header-profile-avatar">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2"/>
                    <path d="M5 20C5 16.134 8.134 13 12 13C15.866 13 19 16.134 19 20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </span>
        </button>

        <div class="header-profile-dropdown" id="headerProfileDropdown">
            <button type="button" class="header-profile-action" id="openProfileModal">
                Setting Profil
            </button>
            <a href="#" class="header-profile-action header-profile-action-danger" onclick="confirmLogout(event)">
                Log Out
            </a>
        </div>
    </div>
</div>

<div class="profile-modal" id="profileModal" aria-hidden="true">
    <div class="profile-modal-backdrop" data-close-profile-modal></div>
    <div class="profile-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="profileModalTitle">
        <div class="profile-modal-header">
            <h2 id="profileModalTitle">Setting Profil</h2>
            <button type="button" class="profile-modal-close" data-close-profile-modal aria-label="Tutup modal">&times;</button>
        </div>

        <form action="admin_proses.php" method="POST" class="profile-modal-form">
            <input type="hidden" name="status" value="edit">
            <input type="hidden" name="user_name_lama" value="<?php echo htmlspecialchars($current_admin_username, ENT_QUOTES, 'UTF-8'); ?>">
            <input type="hidden" name="redirect_page" value="<?php echo htmlspecialchars($current_page, ENT_QUOTES, 'UTF-8'); ?>">

            <div class="profile-form-group">
                <label for="profile_nama_admin">Nama Admin</label>
                <input type="text" id="profile_nama_admin" name="nama_admin" maxlength="52" value="<?php echo htmlspecialchars($current_admin_name, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="profile-form-group">
                <label for="profile_user_name">Username</label>
                <input type="text" id="profile_user_name" name="user_name" maxlength="50" value="<?php echo htmlspecialchars($current_admin_username, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="profile-form-group">
                <label for="profile_password">Password Baru <span>(kosongkan jika tidak diubah)</span></label>
                <input type="password" id="profile_password" name="password" maxlength="20">
            </div>

            <div class="profile-modal-actions">
                <button type="button" class="profile-btn profile-btn-secondary" data-close-profile-modal>Batal</button>
                <button type="submit" class="profile-btn profile-btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<div class="content-body">
    <?php 
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'dashboard':
                    include "dashboard.php";
                    break;
                case 'admin_input':
                    include "admin_input.php";
                    break;
                case 'admin_tampil':
                    include "admin_tampil.php";
                    break;
                case 'komentar_input':
                    include "komentar_input.php";
                    break;
                case 'komentar_tampil':
                    include "komentar_tampil.php";
                    break;
                case 'merchandise_input':
                    include "merchandise_input.php";
                    break;
                case 'merchandise_tampil':
                    include "merchandise_tampil.php";
                    break;
                default:
                    include "dashboard.php";
                    break;
            }
        } else {
            include "dashboard.php";
        }
    ?>
</div>
