<?php 
    $page_titles = [
        'dashboard' => 'Dashboard',
        'game_tampil' => 'Data Game',
        'game_input' => 'Tambah/Edit Game',
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
</div>

<div class="content-body">
    <?php 
        if(isset($_GET['page']))
        {
            switch($_GET['page'])
            {
                case 'dashboard':
                    include "dashboard.php";
                break;
                case 'game_input':
                    include "game_input.php";
                break;
                case 'game_tampil':
                    include "game_tampil.php";
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
        }
        else
        {
            include "dashboard.php";
        }
    ?>
</div>