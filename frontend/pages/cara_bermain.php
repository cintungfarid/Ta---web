<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pelajari cara bermain board game Pelarian Timun Mas, aturan permainan, dan komponen yang digunakan.">
    <title>Cara Bermain - Pelarian Timun Mas</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .how-to-play-aturan {
            border-top: 2px solid var(--lighter-green);
            padding-top: 25px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-logo">
                <img src="../asset/Rule Book TAN.png" alt="Logo Pelarian Timun Mas">
            </div>
            <button class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false" aria-controls="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li><a href="../index.php#home">Home</a></li>
                <li><a href="../index.php#about">About</a></li>
                <li><a href="../index.php#game" class="active">Game</a></li>
                <li><a href="../index.php#merchandise">Merchandise</a></li>
                <li><a href="../index.php#contact">Komentar</a></li>
            </ul>
        </div>
    </nav>
    <div class="nav-overlay" id="navOverlay"></div>

    <section class="game-detail-section">
        <div class="container">
            <div class="back-button-wrapper">
                <a href="../index.php#game" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Home
                </a>
            </div>

            <div class="game-detail-container">
                <div class="game-detail-image">
                    <img src="../asset/Teks paragraf Anda (2).png" alt="Board game Pelarian Timun Mas">
                </div>

                <div class="game-detail-content">
                    <h1 class="game-detail-title">Pelarian Timun Mas</h1>

                    <div class="game-meta">
                        <div class="meta-item">
                            <i class="fas fa-users"></i>
                            <span>2-4 Pemain</span>
                        </div>
                        <div class="meta-item">
                            <i class="far fa-clock"></i>
                            <span>30-45 Menit</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-puzzle-piece"></i>
                            <span>Strategi & Keberuntungan</span>
                        </div>
                    </div>

                    <div class="game-description">
                        <h2>Tentang Game</h2>
                        <p>Pelarian Timun Mas adalah board game petualangan bertema cerita rakyat Nusantara tentang Timun Mas yang berusaha melarikan diri dari kejaran Buto Ijo. Pemain akan berperan sebagai Timun Mas atau Buto Ijo dan menggunakan pion, tembok, serta kartu spesial untuk menyusun strategi terbaik.</p>
                    </div>

                    <div class="how-to-play">
                        <h2>Cara Bermain</h2>
                        <div class="rules-section">
                            <ol>
                                <li>Permainan dimainkan oleh dua pemain, yaitu satu sebagai Timun Mas dan satu sebagai Buto Ijo.</li>
                                <li>Pada awal permainan, pion Timun Mas dan Buto Ijo diletakkan pada petak yang telah disiapkan.</li>
                                <li>Permainan diawali dengan suit (gunting, batu, kertas) untuk menentukan siapa yang mendapat giliran pertama.</li>
                                <li>Dalam satu giliran, pemain hanya boleh melakukan satu aksi:
                                    <ul>
                                        <li>Menggerakkan pion.</li>
                                        <li>Memasang block lawan.</li>
                                        <li>Menggunakan kartu spesial berupa Biji Mentimun, Jarum, Garam, atau Terasi khusus Timun Mas.</li>
                                    </ul>
                                </li>
                                <li>Tujuan masing-masing pemain berbeda:
                                    <ul>
                                        <li><strong>Timun Mas</strong>: mencapai rumah ibunya yang berada pada kotak teratas.</li>
                                        <li><strong>Buto Ijo</strong>: mengejar dan menangkap Timun Mas.</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="how-to-play how-to-play-aturan">
                        <h2>Aturan Bermain</h2>
                        <div class="rules-section">
                            <ol>
                                <li>Dalam satu giliran, pemain hanya boleh melakukan satu aksi saja.</li>
                                <li>Pergerakan pion dibedakan berdasarkan peran pemain:
                                    <ul>
                                        <li>Timun Mas hanya boleh bergerak 1 langkah dalam satu giliran.</li>
                                        <li>Buto Ijo dapat bergerak 1 atau 2 langkah dalam satu giliran.</li>
                                    </ul>
                                </li>
                                <li>Khusus Buto Ijo, apabila jalur di depan terdapat tembok, maka Buto Ijo tetap dapat bergerak, namun hanya diperbolehkan 1 langkah pada giliran tersebut.</li>
                                <li>Block digunakan untuk menghalangi atau memperlambat pergerakan lawan, baik untuk Timun Mas maupun Buto Ijo.</li>
                                <li>Pemasangan tembok tidak boleh sampai menutup seluruh jalur permainan, sehingga lawan tetap memiliki setidaknya satu jalur untuk bergerak.</li>
                                <li>Setiap kartu spesial memiliki fungsi tertentu yang dapat memberikan keuntungan bagi Timun Mas dalam situasi tertentu.</li>
                                <li>Kartu spesial hanya dapat digunakan oleh pemain yang berperan sebagai Timun Mas dan penggunaannya dihitung sebagai satu aksi dalam satu giliran.</li>
                                <li>Timun Mas dinyatakan menang apabila berhasil mencapai rumah ibunya pada kotak teratas papan permainan.</li>
                                <li>Buto Ijo dinyatakan menang apabila berhasil menangkap Timun Mas sebelum Timun Mas mencapai tujuan akhir.</li>
                                <li>Permainan berakhir ketika salah satu kondisi kemenangan telah tercapai.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="game-components-section">
                <h2 class="components-title">Komponen Permainan</h2>
                <div class="components-slider-wrapper">
                    <button class="slider-btn slider-btn-prev" id="compPrev" aria-label="Sebelumnya">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="components-slider-viewport">
                        <div class="components-slider-track" id="compTrack">
                            <div class="component-card">
                                <div class="component-image">
                                    <img src="../asset/WhatsApp Image 2026-02-17 at 06.56.19.jpeg" alt="Papan arena" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="component-placeholder">
                                        <i class="fas fa-chess-board"></i>
                                    </div>
                                </div>
                                <h3>Papan Arena</h3>
                            </div>

                            <div class="component-card">
                                <div class="component-image">
                                    <img src="../asset/WhatsApp Image 2026-02-18 at 13.55.08.jpeg" alt="Pion pemain" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="component-placeholder">
                                        <i class="fas fa-chess-pawn"></i>
                                    </div>
                                </div>
                                <h3>Pion Pemain</h3>
                            </div>

                            <div class="component-card">
                                <div class="component-image">
                                    <img src="../asset/WhatsApp Image 2026-02-18 at 13.55.08 (1).jpeg" alt="Pion Buto Ijo" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="component-placeholder">
                                        <i class="fas fa-chess-pawn"></i>
                                    </div>
                                </div>
                                <h3>Pion Buto</h3>
                            </div>

                            <div class="component-card">
                                <div class="component-image">
                                    <img src="../asset/WhatsApp Image 2026-02-17 at 13.32.07.jpeg" alt="Tembok penghalang" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="component-placeholder">
                                        <i class="fas fa-square"></i>
                                    </div>
                                </div>
                                <h3>Tembok Penghalang</h3>
                            </div>

                            <div class="component-card">
                                <div class="component-image">
                                    <img src="../asset/3.png" alt="Kartu spesial 1" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="component-placeholder">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                </div>
                                <h3>Kartu Spesial 1</h3>
                            </div>

                            <div class="component-card">
                                <div class="component-image">
                                    <img src="../asset/6.png" alt="Kartu spesial 2" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="component-placeholder">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                </div>
                                <h3>Kartu Spesial 2</h3>
                            </div>

                            <div class="component-card">
                                <div class="component-image">
                                    <img src="../asset/9.png" alt="Kartu spesial 3" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="component-placeholder">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                </div>
                                <h3>Kartu Spesial 3</h3>
                            </div>

                            <div class="component-card">
                                <div class="component-image">
                                    <img src="../asset/12.png" alt="Kartu spesial 4" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="component-placeholder">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                </div>
                                <h3>Kartu Spesial 4</h3>
                            </div>

                            <div class="component-card">
                                <div class="component-image">
                                    <img src="../asset/components/panduan.jpg" alt="Buku panduan" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="component-placeholder">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <h3>Buku Panduan</h3>
                            </div>
                        </div>
                    </div>
                    <button class="slider-btn slider-btn-next" id="compNext" aria-label="Berikutnya">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div class="slider-dots" id="compDots"></div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Timun Mas Board Game. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="../js/main.js"></script>
</body>
</html>
