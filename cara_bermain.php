<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara Bermain - Pelarian Timun Mas</title>
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
                <li><a href="index.php#home">Home</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#game">Game</a></li>
                <li><a href="index.php#merchandise">Merchandise</a></li>
                <li><a href="index.php#contact">Coment</a></li>
            </ul>
        </div>
    </nav>

    <section class="game-detail-section">
        <div class="container">
            <div class="back-button-wrapper">
                <a href="index.php#game" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Home
                </a>
            </div>

            <div class="game-detail-container">
                <div class="game-detail-image">
                    <img src="asset/Teks paragraf Anda (2).png" alt="Pelarian Timun Mas">
                </div>

                <div class="game-detail-content">
                    <h1 class="game-detail-title">Pelarian Timun Mas</h1>
                    
                    <div class="game-detail-meta">
                        <div class="meta-item">
                            <i class="fas fa-users"></i>
                            <span>2 Pemain</span>
                        </div>
                        <div class="meta-item">
                            <i class="far fa-clock"></i>
                            <span>30-45 Menit</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-star"></i>
                            <span>Usia 8+</span>
                        </div>
                    </div>

                    <div class="game-detail-description">
                        <h3>Tentang Game</h3>
                        <p>Pelarian Timun Mas adalah board game petualangan yang bertema cerita rakyat Nusantara tentang Timun Mas yang berusaha melarikan diri dari kejaran Buto Ijo. Pemain akan berperan sebagai Timun Mas yang berusaha mencapai rumah ibu sambil menggunakan berbagai tembok dan kartu untuk menghadapi kejaran Sang Buto Ijo.</p>
                        
                        <h3>Cara Bermain</h3>
                        <p><strong>Persiapan:</strong></p>
                        <ul>
                            <li>Letakkan papan permainan di tengah.</li>
                            <li>Tata tembok, kartu dan pion ditempat yang sudah disiapkan.</li>
                        </ul>

                        <p><strong>Aturan Main:</strong></p>
                        <ol>
                            <li>Permainan dimainkan oleh dua orang pemain, satu pemain berperan sebagai  timun mas dan yang satunya berperan sebagai buto ijo.</li>
                            <li>Permainan diawali dengan kedua pemain melakukan suit (gunting, batu, kertas) untuk menentukan giliran pemain dan selanjutnya, kedua pemain saling bergiliran melakukan aksi sampai permainan akhir.</li>
                            <li>Pada awal permainan, Pion Timun Mas dan Buto Ijo diletakan dimasing - masing petak yang sudah disiapkan.</li>
                            <li>Setiap pemain memiliki tujuan yang berbeda, Timun Mas harus mencapai rumah ibunya yang berada pada pojok kanan atas petak, sedangkan Buto ijo harus mengejar dan menangkap Timun Mas. </li>
                            <li>Dalam satu giliran, Pemain hanya boleh melakukan satu aksi. Aksi yang didapat adalah: Menggerakan pion, Memasang block lawan, Menggunakan kartu spesial berupa Biji Mentimun, Jarum, Garam, Terasi (khusus Timun Mas)</li>
                            <li>Untuk penggerakan pion dibedakan sesuai dengaan peran pemain yaitu: Timun mas hanya boleh bergerak 1 petak, Buto Ijo dapat bergerak 2 petak dalam satu giliran, Namun jika jalur didepan terdapat tembok Buto ijo tetep bisa bergerak tetapi hanya 1 petak.</li>
                            <li>Block digunakan untuk menghalangi atau memperlambat pergerakan lawan. Block tidak boleh dipasang hingga menutup seluruh jalur permainan, sehingga lawan tetap memiliki jalan untuk bergerak.</li>
                            <li>Permainan terus berlangsung secara begantian hingga salah satu pemain mencapai kondisi menang. Timun Mas menang apabila berhasil mencapai rumah ibunya tanpa tertangkap Buto Ijo. Sedangkan Buto Ijo menang apabila berhasil menangkap timun mas sebelum timun mas sampai keruma ibunya.</li>
                        </ol>

                        <p><strong>Fungsi Kartu:</strong></p>
                        <ul>
                            <li><strong>Garam:</strong> Membuka jalan bagi Timun Mas untuk maju 3x langkah.</li>
                            <li><strong>Terasi:</strong> Membuat Buto Ijo terhenti dan kehilangan 1x giliran.</li>
                            <li><strong>Jarum:</strong> Membuat Timun Mas dapat menerobos salah satu tembok yang menghalangi dan mendapatkan 1x kesempatan untuk maju 1 langka.</li>
                            <li><strong>Biji Mentimun:</strong> Membuat Buto Ijo terhenti dan kehilangan 1x giliran.</li>
                        </ul>

                        <h3>Tujuan Permainan</h3>
                        <p>Menjadi pemain pertama yang berhasil membawa Timun Mas ke tempat aman dan menyelamatkannya dari Buto Ijo!</p>
                    </div>
                </div>
            </div>

            <div class="game-components-section">
                <h2 class="components-title">Komponen Permainan</h2>
                <div class="components-grid">
                    <div class="component-card">
                        <div class="component-image">
                            <img src="asset/WhatsApp Image 2026-02-17 at 06.56.19.jpeg" alt="Papan Arena" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="component-placeholder">
                                <i class="fas fa-chess-board"></i>
                            </div>
                        </div>
                        <h3>Papan Arena</h3>
                    </div>

                    <div class="component-card">
                        <div class="component-image">
                            <img src="asset/WhatsApp Image 2026-02-18 at 13.55.08.jpeg" alt="Pion Pemain" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="component-placeholder">
                                <i class="fas fa-chess-pawn"></i>
                            </div>
                        </div>
                        <h3>Pion Pemain</h3>
                    </div>

                    <div class="component-card">
                        <div class="component-image">
                            <img src="asset/WhatsApp Image 2026-02-18 at 13.55.08 (1).jpeg" alt="Pion Buto" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="component-placeholder">
                                <i class="fas fa-chess-pawn"></i>
                            </div>
                        </div>
                        <h3>Pion Buto</h3>
                    </div>

                    <div class="component-card">
                        <div class="component-image">
                            <img src="asset/WhatsApp Image 2026-02-17 at 13.32.07.jpeg" alt="Tembok Penghalang" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="component-placeholder">
                                <i class="fas fa-square"></i>
                            </div>
                        </div>
                        <h3>Tembok Penghalang</h3>
                    </div>

                    <div class="component-card">
                        <div class="component-image">
                            <img src="asset/WhatsApp Image 2026-02-18 at 13.55.09.jpeg" alt="Kartu Spesial" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="component-placeholder">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                        <h3>Kartu Spesial</h3>
                    </div>

                    <div class="component-card">
                        <div class="component-image">
                            <img src="asset/components/panduan.jpg" alt="Buku Panduan" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="component-placeholder">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                        <h3>Buku Panduan</h3>
                    </div>
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
    </script>

</body>
</html>
