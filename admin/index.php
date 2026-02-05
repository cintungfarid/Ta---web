<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin BOARD GAME</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <?php if(isset($_SESSION['user_name'])): ?>
        <div class="main-wrapper">
            
            <div id="kiri">
                <?php include "menu.php"; ?>
            </div>

            <div id="kanan">
                <?php include "isi.php"; ?>
            </div>

        </div> <?php else: ?>
        <div class="login-container">
            <?php include "login.php"; ?>
        </div>
    <?php endif; ?>

</body>
</html>