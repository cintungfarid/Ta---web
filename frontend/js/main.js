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

function loadMerchandise() {
    fetch('../backend/api/get_merchandise.php')
        .then(response => response.json())
        .then(data => {
            const merchandiseGrid = document.querySelector('.merchandise-grid');
            if (data.success && data.data.length > 0) {
                merchandiseGrid.innerHTML = '';
                data.data.forEach(merch => {
                    const harga = new Intl.NumberFormat('id-ID').format(merch.harga_merchandise);
                    const pesanWa = `Halo, saya tertarik membeli produk *${merch.judul_merchandise}* dengan harga Rp ${harga}. Apakah masih tersedia?`;
                    const linkWa = `https://wa.me/6282131266756?text=${encodeURIComponent(pesanWa)}`;
                    
                    const merchCard = `
                        <div class='merch-card'>
                            <div class='merch-image'>
                                ${merch.foto_merchandise ? `<img src='../backend/${merch.foto_merchandise}' alt='${merch.judul_merchandise}'>` : `<div class='merch-placeholder'><i class='fas fa-tshirt'></i></div>`}
                            </div>
                            <div class='merch-content'>
                                <h3>${merch.judul_merchandise}</h3>
                                <p class='merch-price'>Rp ${harga}</p>
                                <p class='merch-stock'>Stock: ${merch.stock_merchandise}</p>
                                <a href='${linkWa}' target='_blank' class='btn btn-success'><i class='fab fa-whatsapp'></i> Beli Sekarang</a>
                            </div>
                        </div>
                    `;
                    merchandiseGrid.innerHTML += merchCard;
                });
            } else {
                merchandiseGrid.innerHTML = "<p class='no-data'>Belum ada merchandise tersedia.</p>";
            }
        })
        .catch(error => {
            console.error('Error loading merchandise:', error);
        });
}

function loadComments() {
    fetch('../backend/api/get_comments.php?limit=5')
        .then(response => response.json())
        .then(data => {
            const commentsList = document.querySelector('.comments-list');
            const commentsContainer = commentsList.querySelector('.comments-container') || commentsList;
            
            if (data.success && data.data.length > 0) {
                let html = '<h3>Komentar Terbaru</h3>';
                data.data.forEach(comment => {
                    const tanggal = new Date(comment.tanggal_komentar);
                    const options = { day: '2-digit', month: 'short', year: 'numeric' };
                    const tanggalFormat = tanggal.toLocaleDateString('id-ID', options);
                    
                    html += `
                        <div class='comment-item'>
                            <div class='comment-header'>
                                <strong>${comment.nama_penulis}</strong>
                                <span class='comment-date'>${tanggalFormat}</span>
                            </div>
                            <p class='comment-text'>${comment.detail_komentar.replace(/\n/g, '<br>')}</p>
                        </div>
                    `;
                });
                commentsList.innerHTML = html;
            } else {
                commentsList.innerHTML = "<h3>Komentar Terbaru</h3><p class='no-data'>Belum ada komentar.</p>";
            }
        })
        .catch(error => {
            console.error('Error loading comments:', error);
        });
}

if (document.querySelector('.merchandise-grid')) {
    loadMerchandise();
}

if (document.querySelector('.comments-list')) {
    loadComments();
}

const commentForm = document.querySelector('.comment-form');
if (commentForm) {
    commentForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        fetch('../backend/api/comment_submit.php', {
            method: 'POST',
            body: formData
        })
        .then(() => {
            alert('Komentar berhasil dikirim! Terima kasih atas feedback Anda.');
            this.reset();
            loadComments();
        })
        .catch(error => {
            alert('Gagal mengirim komentar. Silakan coba lagi.');
            console.error('Error:', error);
        });
    });
}
