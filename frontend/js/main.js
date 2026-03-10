function initComponentsSlider() {
    const track = document.getElementById('compTrack');
    const prevBtn = document.getElementById('compPrev');
    const nextBtn = document.getElementById('compNext');
    const dotsContainer = document.getElementById('compDots');

    if (!track || !prevBtn || !nextBtn) return;

    const cards = track.querySelectorAll('.component-card');
    const totalCards = cards.length;

    function getVisible() {
        if (window.innerWidth <= 480) return 1;
        if (window.innerWidth <= 992) return 2;
        return 3;
    }

    let current = 0;

    function maxIndex() {
        return Math.max(0, totalCards - getVisible());
    }

    function buildDots() {
        dotsContainer.innerHTML = '';
        const pages = maxIndex() + 1;
        for (let i = 0; i < pages; i++) {
            const dot = document.createElement('button');
            dot.className = 'slider-dot' + (i === current ? ' active' : '');
            dot.setAttribute('aria-label', 'Slide ' + (i + 1));
            dot.addEventListener('click', () => goTo(i));
            dotsContainer.appendChild(dot);
        }
    }

    function goTo(index) {
        const visible = getVisible();
        current = Math.max(0, Math.min(index, maxIndex()));

        const cardWidth = cards[0].getBoundingClientRect().width;
        const gap = parseInt(getComputedStyle(track).gap) || 24;
        const offset = current * (cardWidth + gap);
        track.style.transform = `translateX(-${offset}px)`;

        prevBtn.disabled = current === 0;
        nextBtn.disabled = current >= maxIndex();

        dotsContainer.querySelectorAll('.slider-dot').forEach((d, i) => {
            d.classList.toggle('active', i === current);
        });
    }

    prevBtn.addEventListener('click', () => goTo(current - 1));
    nextBtn.addEventListener('click', () => goTo(current + 1));

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            current = Math.min(current, maxIndex());
            buildDots();
            goTo(current);
        }, 150);
    });

    buildDots();
    goTo(0);
}

document.addEventListener('DOMContentLoaded', function () {
    initComponentsSlider();
    initScrollReveal();
});

function initScrollReveal() {
    const revealTargets = [
        { selector: '.section-title', cls: 'reveal' },
        { selector: '.about-image', cls: 'reveal-left' },
        { selector: '.about-content', cls: 'reveal-right' },
        { selector: '.game-card', cls: 'reveal' },
        { selector: '.merch-card', cls: 'reveal' },
        { selector: '.comment-form', cls: 'reveal-left' },
        { selector: '.comments-list', cls: 'reveal-right' },
        { selector: '.game-detail-image', cls: 'reveal-left' },
        { selector: '.game-detail-content', cls: 'reveal-right' },
        { selector: '.game-components-section', cls: 'reveal' },
    ];

    revealTargets.forEach(({ selector, cls }) => {
        document.querySelectorAll(selector).forEach((el, i) => {
            el.classList.add(cls);
            if (cls === 'reveal' && selector === '.merch-card') {
                el.style.transitionDelay = `${i * 0.1}s`;
            }
        });
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(el => {
        observer.observe(el);
    });
}

function closeCommentModal() {
    const modal = document.getElementById('comment-success-modal');
    if (modal) modal.style.display = 'none';
}

window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    updateActiveNavLink();
});

function updateActiveNavLink() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-menu li a[href^="#"]');
    const scrollY = window.scrollY + 100;

    let currentId = '';
    sections.forEach(section => {
        if (scrollY >= section.offsetTop) {
            currentId = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + currentId) {
            link.classList.add('active');
        }
    });
}

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
    fetch('../backend/api/get_comments.php?limit=50')
        .then(response => response.json())
        .then(data => {
            const commentsList = document.querySelector('.comments-list');

            if (data.success && data.data.length > 0) {
                let items = '';
                data.data.forEach(comment => {
                    const tanggal = new Date(comment.tanggal_komentar);
                    const options = { day: '2-digit', month: 'short', year: 'numeric' };
                    const tanggalFormat = tanggal.toLocaleDateString('id-ID', options);

                    items += `
                        <div class='comment-item'>
                            <div class='comment-header'>
                                <strong>${comment.nama_penulis}</strong>
                                <span class='comment-date'>${tanggalFormat}</span>
                            </div>
                            <p class='comment-text'>${comment.detail_komentar.replace(/\n/g, '<br>')}</p>
                        </div>
                    `;
                });
                commentsList.innerHTML = `<h3>Komentar Terbaru</h3><div class='comments-scroll-area'>${items}</div>`;
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
            this.reset();
            loadComments();
            const modal = document.getElementById('comment-success-modal');
            if (modal) modal.style.display = 'flex';
        })
        .catch(error => {
            alert('Gagal mengirim komentar. Silakan coba lagi.');
            console.error('Error:', error);
        });
    });
}
