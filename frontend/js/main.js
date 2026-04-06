function initNavToggle() {
    const toggle = document.getElementById('navToggle');
    const menu = document.getElementById('navMenu');
    const overlay = document.getElementById('navOverlay');
    if (!toggle || !menu) return;

    function setExpanded(isExpanded) {
        toggle.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
    }

    function openNav() {
        toggle.classList.add('active');
        menu.classList.add('open');
        if (overlay) overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        setExpanded(true);
    }

    function closeNav() {
        toggle.classList.remove('active');
        menu.classList.remove('open');
        if (overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
        setExpanded(false);
    }

    toggle.addEventListener('click', function () {
        menu.classList.contains('open') ? closeNav() : openNav();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && menu.classList.contains('open')) {
            closeNav();
            toggle.focus();
        }
    });

    if (overlay) overlay.addEventListener('click', closeNav);

    menu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', closeNav);
    });

    setExpanded(false);
}

function initComponentsSlider() {
    const track = document.getElementById('compTrack');
    const prevBtn = document.getElementById('compPrev');
    const nextBtn = document.getElementById('compNext');
    const dotsContainer = document.getElementById('compDots');

    if (!track || !prevBtn || !nextBtn || !dotsContainer) return;

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

    let touchStartX = 0;
    track.addEventListener('touchstart', function (e) {
        touchStartX = e.touches[0].clientX;
    }, { passive: true });

    track.addEventListener('touchend', function (e) {
        const diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) {
            diff > 0 ? goTo(current + 1) : goTo(current - 1);
        }
    }, { passive: true });

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
    if (modal) {
        modal.style.display = 'none';
        modal.setAttribute('aria-hidden', 'true');
    }
}

function escapeHtml(value) {
    const temp = document.createElement('div');
    temp.textContent = value == null ? '' : String(value);
    return temp.innerHTML;
}

function renderStatusMessage(message, type = '') {
    const className = type ? `no-data ${type}` : 'no-data';
    return `<p class="${className}">${message}</p>`;
}

function createRetryButton(handlerName, label = 'Coba Lagi') {
    return `<button type="button" class="btn btn-primary btn-retry" onclick="${handlerName}()">${label}</button>`;
}

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

window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
    updateActiveNavLink();
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const targetSelector = this.getAttribute('href');
        const target = document.querySelector(targetSelector);
        if (!target) return;

        e.preventDefault();
        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
});

function loadMerchandise() {
    const merchandiseGrid = document.querySelector('.merchandise-grid');
    if (!merchandiseGrid) return;

    merchandiseGrid.innerHTML = renderStatusMessage('Sedang memuat merchandise...', 'loading-state');

    fetch('../backend/api/get_merchandise.php')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data.length > 0) {
                merchandiseGrid.innerHTML = '';
                data.data.forEach(merch => {
                    const harga = new Intl.NumberFormat('id-ID').format(merch.harga_merchandise);
                    const judul = escapeHtml(merch.judul_merchandise);
                    const foto = merch.foto_merchandise ? `../backend/${encodeURI(merch.foto_merchandise)}` : '';
                    const stock = escapeHtml(merch.stock_merchandise);
                    const pesanWa = `Halo, saya tertarik membeli produk *${merch.judul_merchandise}* dengan harga Rp ${harga}. Apakah masih tersedia?`;
                    const linkWa = `https://wa.me/6281914866694?text=${encodeURIComponent(pesanWa)}`;

                    const merchCard = `
                        <div class="merch-card">
                            <div class="merch-image">
                                ${foto ? `<img src="${foto}" alt="${judul}">` : `<div class="merch-placeholder"><i class="fas fa-tshirt"></i></div>`}
                            </div>
                            <div class="merch-content">
                                <h3>${judul}</h3>
                                <p class="merch-price">Rp ${harga}</p>
                                <p class="merch-stock">Stock: ${stock}</p>
                                <a href="${linkWa}" target="_blank" rel="noopener noreferrer" class="btn btn-success"><i class="fab fa-whatsapp"></i> Beli Sekarang</a>
                            </div>
                        </div>
                    `;
                    merchandiseGrid.innerHTML += merchCard;
                });

                initScrollReveal();
            } else {
                merchandiseGrid.innerHTML = renderStatusMessage('Belum ada merchandise tersedia.');
            }
        })
        .catch(error => {
            console.error('Error loading merchandise:', error);
            merchandiseGrid.innerHTML = renderStatusMessage('Gagal memuat merchandise.', 'error-state') + createRetryButton('loadMerchandise');
        });
}

function loadComments() {
    const commentsList = document.querySelector('.comments-list');
    if (!commentsList) return;

    commentsList.innerHTML = `<h3>Komentar Terbaru</h3>${renderStatusMessage('Sedang memuat komentar...', 'loading-state')}`;

    fetch('../backend/api/get_comments.php?limit=50')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data.length > 0) {
                let items = '';
                data.data.forEach(comment => {
                    const tanggal = new Date(comment.tanggal_komentar);
                    const options = { day: '2-digit', month: 'short', year: 'numeric' };
                    const tanggalFormat = tanggal.toLocaleDateString('id-ID', options);
                    const nama = escapeHtml(comment.nama_penulis);
                    const detailKomentar = escapeHtml(comment.detail_komentar).replace(/\n/g, '<br>');

                    items += `
                        <div class="comment-item">
                            <div class="comment-header">
                                <strong>${nama}</strong>
                                <span class="comment-date">${tanggalFormat}</span>
                            </div>
                            <p class="comment-text">${detailKomentar}</p>
                        </div>
                    `;
                });
                commentsList.innerHTML = `<h3>Komentar Terbaru</h3><div class="comments-scroll-area">${items}</div>`;
                initScrollReveal();
            } else {
                commentsList.innerHTML = `<h3>Komentar Terbaru</h3>${renderStatusMessage('Belum ada komentar.')}`;
            }
        })
        .catch(error => {
            console.error('Error loading comments:', error);
            commentsList.innerHTML = `<h3>Komentar Terbaru</h3>${renderStatusMessage('Gagal memuat komentar.', 'error-state')}${createRetryButton('loadComments')}`;
        });
}

document.addEventListener('DOMContentLoaded', function () {
    initNavToggle();
    initComponentsSlider();
    initScrollReveal();
    updateActiveNavLink();

    if (document.querySelector('.merchandise-grid')) {
        loadMerchandise();
    }

    if (document.querySelector('.comments-list')) {
        loadComments();
    }

    const commentForm = document.querySelector('.comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const submitButton = commentForm.querySelector('.btn-submit');
            const formData = new FormData(this);

            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'Mengirim...';
            }

            fetch('../backend/api/comment_submit.php', {
                method: 'POST',
                body: formData
            })
                .then(() => {
                    this.reset();
                    loadComments();
                    const modal = document.getElementById('comment-success-modal');
                    if (modal) {
                        modal.style.display = 'flex';
                        modal.setAttribute('aria-hidden', 'false');
                    }
                })
                .catch(error => {
                    alert('Gagal mengirim komentar. Silakan coba lagi.');
                    console.error('Error:', error);
                })
                .finally(() => {
                    if (submitButton) {
                        submitButton.disabled = false;
                        submitButton.textContent = 'Kirim Komentar';
                    }
                });
        });
    }
});

window.loadMerchandise = loadMerchandise;
window.loadComments = loadComments;
window.closeCommentModal = closeCommentModal;
