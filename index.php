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
                <img src="asset/Teks paragraf Anda (2).png" alt="Logo Pelarian Timun Mas">
            </div>
            <ul class="nav-menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#game">Game</a></li>
                <li><a href="#merchandise">Merchandise</a></li>
                <li><a href="#contact">Coment</a></li>
            </ul>
        </div>
    </nav>

    <section id="home" class="hero">
        <div class="hero-content">
            <div class="hero-logo">
                <img src="asset/Teks paragraf Anda (2).png" alt="Logo Timun Mas">
            </div>
            <h1 class="hero-title">PELARIAN TIMUN MAS</h1>
            <p class="hero-description">Petualangan seru dalam dunia board game. Bantu Timun Mas melarikan diri kejaran sang Buto Ijo!</p>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">About</h2>
            <div class="about-card">
                <div class="about-image">
                    <img src="asset/WhatsApp Image 2026-02-02 at 11.19.54.jpeg" alt="Valensia Chiko Varianto">
                </div>
                <div class="about-content">
                    <h3>VALENSIA CHIKO VARIANTO</h3>
                    <p>Tentang:</p>
                    <p>Saya adalah pembuat Board Game dengan tema "Pelarian Timun Mas"</p>
                </div>
            </div>
        </div>
    </section>

    <section id="game" class="game">
        <div class="container">
            <h2 class="section-title">Game</h2>
            <div class="game-grid">
                <div class="game-card">
                    <div class="game-image">
                        <img src="asset/Teks paragraf Anda (2).png" alt="Pelarian Timun Mas">
                    </div>
                    <div class="game-content">
                        <h3>Pelarian Timun Mas</h3>
                        <p class="game-date"><i class="fas fa-users"></i> 2-4 Pemain | <i class="far fa-clock"></i> 30-45 Menit</p>
                        <p class="game-desc">Board game petualangan yang menceritakan kisah klasik Indonesia. Bantu Timun Mas melarikan diri dari kejaran Buto Ijo menggunakan item-item magis seperti terasi, garam, jarum, dan mentimun. Pemain pertama yang mencapai tempat aman adalah pemenangnya!</p>
                        <a href="cara_bermain.php" class="btn btn-primary">Cara Bermain</a>
                    </div>
                </div>
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
                        $nama_produk = htmlspecialchars($merch['judul_merchandise']);
                        $harga = number_format($merch['harga_merchandise'], 0, ',', '.');
                        $stock = $merch['stock_merchandise'];
                        
                        $pesan_wa = "Halo, saya tertarik membeli produk *" . $nama_produk . "* dengan harga Rp " . $harga . ". Apakah masih tersedia?";
                        $pesan_wa_encoded = urlencode($pesan_wa);
                        $nomor_wa = "6282131266756";
                        $link_wa = "https://wa.me/" . $nomor_wa . "?text=" . $pesan_wa_encoded;
                        
                        echo "<div class='merch-card'>";
                        echo "<div class='merch-image'>";
                        if(!empty($merch['foto_merchandise']) && file_exists($merch['foto_merchandise'])) {
                            echo "<img src='" . htmlspecialchars($merch['foto_merchandise']) . "' alt='" . $nama_produk . "'>";
                        } else {
                            echo "<div class='merch-placeholder'><i class='fas fa-tshirt'></i></div>";
                        }
                        echo "</div>";
                        echo "<div class='merch-content'>";
                        echo "<h3>" . $nama_produk . "</h3>";
                        echo "<p class='merch-price'>Rp " . $harga . "</p>";
                        echo "<p class='merch-stock'>Stock: " . $stock . "</p>";
                        echo "<a href='" . $link_wa . "' target='_blank' class='btn btn-success'><i class='fab fa-whatsapp'></i> Beli Sekarang</a>";
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
    </script>

</body>
</html>
