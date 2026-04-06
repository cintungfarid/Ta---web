<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timun Mas - Board Game</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <nav class="navbar">
        <div class="container">
            <div class="nav-logo">
                <img src="asset/Rule Book TAN.png" alt="Logo Pelarian Timun Mas">
            </div>
            <button class="nav-toggle" id="navToggle" aria-label="Buka menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#game">Game</a></li>
                <li><a href="#merchandise">Merchandise</a></li>
                <li><a href="#contact">Coment</a></li>
            </ul>
        </div>
    </nav>
    <div class="nav-overlay" id="navOverlay"></div>

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
                    <p><i class="fas fa-envelope"></i> <a href="mailto:cintungfarid@gmail.com">cintungfarid@gmail.com</a></p>
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
                        <a href="pages/cara_bermain.php" class="btn btn-primary">Cara Bermain</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="merchandise" class="merchandise">
        <div class="container">
            <h2 class="section-title">Merchandise</h2>
            <div class="merchandise-grid">
                <p class='no-data'>Loading...</p>
            </div>
        </div>
    </section>

    <section id="contact" class="comment">
        <div class="container">
            <h2 class="section-title">Tinggalkan Komentar</h2>
            <div class="comment-wrapper">
                <form action="../backend/api/comment_submit.php" method="POST" class="comment-form">
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
                    <p class='no-data'>Loading...</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Timun Mas Board Game. All Rights Reserved.</p>
        </div>
    </footer>

    <div id="comment-success-modal" class="modal-overlay" style="display:none;">
        <div class="modal-box">
            <div class="modal-icon">
                <svg viewBox="0 0 52 52" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="26" cy="26" r="24" fill="none" stroke="#4CAF50" stroke-width="3"/>
                    <path d="M14 27 l9 9 l16-17" fill="none" stroke="#4CAF50" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <p class="modal-text">Komentar Terkirim</p>
            <button class="btn btn-modal-ok" onclick="closeCommentModal()">Ok</button>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>
