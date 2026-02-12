<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timun Mas - Board Game</title>
    <link rel="stylesheet" href="frontend-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <nav class="navbar">
        <div class="container">
            <div class="nav-logo">
                <h2>TIMUN MAS</h2>
            </div>
            <ul class="nav-menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#game">Game</a></li>
                <li><a href="#merchandise">Merchandise</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <section id="home" class="hero">
        <div class="hero-content">
            <div class="hero-logo">
                <i class="fas fa-dice-d20"></i>
            </div>
            <h1 class="hero-title">PELARIAN TIMUN MAS</h1>
            <p class="hero-description">Petualangan seru dalam dunia board game tradisional Indonesia. Bantu Timun Mas melarikan diri dari raksasa jahat!</p>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">About Developer</h2>
            <div class="about-card">
                <div class="about-image">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="about-content">
                    <h3>Tim Pengembang Timun Mas</h3>
                    <p>Kami adalah tim developer yang bersemangat menciptakan board game edukatif berbasis cerita rakyat Indonesia. Misi kami adalah melestarikan budaya melalui permainan yang menyenangkan dan mendidik untuk segala usia.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="game" class="game">
        <div class="container">
            <h2 class="section-title">Our Games</h2>
            <div class="game-grid">
                <?php
                $game_query = mysqli_query($koneksi, "SELECT * FROM tb_game ORDER BY tanggal_game DESC");
                if(mysqli_num_rows($game_query) > 0) {
                    while($game = mysqli_fetch_array($game_query)) {
                        echo "<div class='game-card'>";
                        echo "<div class='game-image'>";
                        if(!empty($game['foto_game'])) {
                            echo "<img src='" . $game['foto_game'] . "' alt='" . htmlspecialchars($game['judul_game']) . "'>";
                        } else {
                            echo "<div class='game-placeholder'><i class='fas fa-gamepad'></i></div>";
                        }
                        echo "</div>";
                        echo "<div class='game-content'>";
                        echo "<h3>" . htmlspecialchars($game['judul_game']) . "</h3>";
                        echo "<p class='game-date'><i class='far fa-calendar'></i> " . date('d M Y', strtotime($game['tanggal_game'])) . "</p>";
                        echo "<p class='game-desc'>" . nl2br(htmlspecialchars($game['detail_game'])) . "</p>";
                        echo "<button class='btn btn-primary' onclick='showGameDetail(" . $game['id_game'] . ")'>Detail Game</button>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p class='no-data'>Belum ada game tersedia.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <section id="merchandise" class="merchandise">
        <div class="container">
            <h2 class="section-title">Merchandise</h2>
            <div class="merchandise-grid">
                <?php
                $merch_query = mysqli_query($koneksi, "SELECT * FROM tb_merchandise WHERE stock_merchandise > 0 ORDER BY id_merchandise DESC");
                if(mysqli_num_rows($merch_query) > 0) {
                    while($merch = mysqli_fetch_array($merch_query)) {
                        echo "<div class='merch-card'>";
                        echo "<div class='merch-image'>";
                        if(!empty($merch['foto_merchandise'])) {
                            echo "<img src='" . $merch['foto_merchandise'] . "' alt='" . htmlspecialchars($merch['judul_merchandise']) . "'>";
                        } else {
                            echo "<div class='merch-placeholder'><i class='fas fa-tshirt'></i></div>";
                        }
                        echo "</div>";
                        echo "<div class='merch-content'>";
                        echo "<h3>" . htmlspecialchars($merch['judul_merchandise']) . "</h3>";
                        echo "<p class='merch-price'>Rp " . number_format($merch['harga_merchandise'], 0, ',', '.') . "</p>";
                        echo "<p class='merch-stock'>Stock: " . $merch['stock_merchandise'] . "</p>";
                        echo "<button class='btn btn-success'>Beli Sekarang</button>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p class='no-data'>Belum ada merchandise tersedia.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <section id="contact" class="comment">
        <div class="container">
            <h2 class="section-title">Tinggalkan Komentar</h2>
            <div class="comment-wrapper">
                <form action="comment_submit.php" method="POST" class="comment-form">
                    <div class="form-group">
                        <label for="nama">Nama Anda</label>
                        <input type="text" id="nama" name="nama_penulis" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="komentar">Komentar</label>
                        <textarea id="komentar" name="detail_komentar" rows="5" placeholder="Tulis komentar Anda di sini..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-submit">Kirim Komentar</button>
                </form>

                <div class="comments-list">
                    <h3>Komentar Terbaru</h3>
                    <?php
                    $comment_query = mysqli_query($koneksi, "SELECT * FROM tb_komentar ORDER BY tanggal_komentar DESC LIMIT 5");
                    if(mysqli_num_rows($comment_query) > 0) {
                        while($comment = mysqli_fetch_array($comment_query)) {
                            echo "<div class='comment-item'>";
                            echo "<div class='comment-header'>";
                            echo "<strong>" . htmlspecialchars($comment['nama_penulis']) . "</strong>";
                            echo "<span class='comment-date'>" . date('d M Y', strtotime($comment['tanggal_komentar'])) . "</span>";
                            echo "</div>";
                            echo "<p class='comment-text'>" . nl2br(htmlspecialchars($comment['detail_komentar'])) . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='no-data'>Belum ada komentar.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Timun Mas Board Game. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        function showGameDetail(gameId) {
            alert('Detail game akan ditampilkan. ID: ' + gameId);
        }
    </script>

</body>
</html>
