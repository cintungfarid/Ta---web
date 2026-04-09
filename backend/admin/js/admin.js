function confirmLogout(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Konfirmasi Logout',
        text: 'Apakah Anda yakin ingin keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'logout.php';
        }
    });
}

function escapeNotificationHtml(value) {
    const temp = document.createElement('div');
    temp.textContent = value == null ? '' : String(value);
    return temp.innerHTML;
}

function formatNotificationDate(value) {
    if (!value) return '';
    const date = new Date(value.replace(' ', 'T'));
    if (Number.isNaN(date.getTime())) return value;

    return date.toLocaleString('id-ID', {
        day: '2-digit',
        month: 'short',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

function initProfileMenu() {
    const trigger = document.getElementById('headerProfileTrigger');
    const dropdown = document.getElementById('headerProfileDropdown');
    const modal = document.getElementById('profileModal');
    const openModalButton = document.getElementById('openProfileModal');
    const closeModalButtons = document.querySelectorAll('[data-close-profile-modal]');

    if (!trigger || !dropdown || !modal || !openModalButton) {
        return;
    }

    function closeDropdown() {
        dropdown.classList.remove('show');
        trigger.setAttribute('aria-expanded', 'false');
    }

    function openModal() {
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        closeDropdown();
    }

    function closeModal() {
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    trigger.addEventListener('click', function (event) {
        event.stopPropagation();
        const isOpen = dropdown.classList.toggle('show');
        trigger.setAttribute('aria-expanded', String(isOpen));
    });

    openModalButton.addEventListener('click', function (event) {
        event.preventDefault();
        openModal();
    });

    closeModalButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            closeModal();
        });
    });

    document.addEventListener('click', function (event) {
        if (!dropdown.contains(event.target) && !trigger.contains(event.target)) {
            closeDropdown();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeDropdown();
            closeModal();
        }
    });
}

function initCommentNotifications() {
    const trigger = document.getElementById('commentNotificationTrigger');
    const dropdown = document.getElementById('commentNotificationDropdown');
    const badge = document.getElementById('commentNotificationBadge');
    const menuBadge = document.getElementById('menuCommentBadge');
    const list = document.getElementById('commentNotificationList');
    const markReadButton = document.getElementById('markCommentNotificationRead');

    if (!trigger || !dropdown || !badge || !menuBadge || !list || !markReadButton) {
        return;
    }

    function setBadgeCount(count) {
        const text = String(count);
        badge.textContent = text;
        menuBadge.textContent = text;

        badge.classList.toggle('is-hidden', count <= 0);
        menuBadge.classList.toggle('is-hidden', count <= 0);
        markReadButton.disabled = count <= 0;
    }

    function renderNotifications(notifications) {
        if (!notifications || notifications.length === 0) {
            list.innerHTML = '<p class="comment-notification-empty">Belum ada komentar baru.</p>';
            return;
        }

        list.innerHTML = notifications.map(function (item) {
            const nama = escapeNotificationHtml(item.nama_penulis);
            const detail = escapeNotificationHtml(item.detail_komentar);
            const waktu = escapeNotificationHtml(formatNotificationDate(item.tanggal_komentar));

            return `
                <a class="comment-notification-item" href="index.php?page=komentar_tampil">
                    <strong>${nama}</strong>
                    <span>${detail.length > 80 ? detail.slice(0, 80) + '...' : detail}</span>
                    <small>${waktu}</small>
                </a>
            `;
        }).join('');
    }

    function fetchNotifications() {
        fetch('../api/comment_notifications.php')
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (!data.success) {
                    throw new Error(data.message || 'Gagal memuat notifikasi komentar.');
                }

                setBadgeCount(data.total_unread || 0);
                renderNotifications(data.notifications || []);
            })
            .catch(function (error) {
                console.error('Error loading comment notifications:', error);
                list.innerHTML = '<p class="comment-notification-empty">Gagal memuat notifikasi komentar.</p>';
            });
    }

    function markNotificationsAsRead() {
        fetch('../api/comment_notifications.php?action=mark_read')
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (!data.success) {
                    throw new Error(data.message || 'Gagal menandai notifikasi komentar.');
                }

                setBadgeCount(0);
                renderNotifications([]);
                window.location.href = 'index.php?page=komentar_tampil';
            })
            .catch(function (error) {
                console.error('Error marking notifications as read:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Notifikasi komentar gagal ditandai dibaca.'
                });
            });
    }

    trigger.addEventListener('click', function (event) {
        event.stopPropagation();
        dropdown.classList.toggle('show');
    });

    document.addEventListener('click', function (event) {
        if (!dropdown.contains(event.target) && !trigger.contains(event.target)) {
            dropdown.classList.remove('show');
        }
    });

    markReadButton.addEventListener('click', function (event) {
        event.preventDefault();
        markNotificationsAsRead();
    });

    fetchNotifications();
    setInterval(fetchNotifications, 15000);
}

document.addEventListener('DOMContentLoaded', function () {
    initProfileMenu();
    initCommentNotifications();
});
