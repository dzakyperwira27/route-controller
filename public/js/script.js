// =====================================================
// 🔹 AMBIL DATA ARTIKEL DARI JSON + PAGINATION & SEARCH
// =====================================================

let semuaArtikel = [];
let artikelTampil = [];
let halamanAktif = 1;
const artikelPerHalaman = 4;

// 🔹 Fungsi Menampilkan Artikel
function tampilkanArtikel() {
    const container = document.getElementById('articles-container');
    if (!container) return;
    container.innerHTML = '';

    const mulai = (halamanAktif - 1) * artikelPerHalaman;
    const akhir = mulai + artikelPerHalaman;
    const artikelSaatIni = artikelTampil.slice(mulai, akhir);

    artikelSaatIni.forEach((article, index) => {
        const card = document.createElement('div');
        card.className = 'article-card';
        card.innerHTML = `
            <img src="${article.gambar}" alt="${article.judul}">
            <div class="content">
                <h3>${article.judul}</h3>
                <p><strong>${article.author}</strong> | ${article.tanggal}</p>
                <p>${article.isi.substring(0, 80)}...</p>
                <button class="read-btn" data-index="${index}">Read More</button>
            </div>
        `;
        container.appendChild(card);
    });

    tampilkanPagination();
    aktifkanModal(artikelSaatIni);
}

// =====================================================
// 🔹 FUNGSI PAGINATION DENGAN AUTO-SCROLL KE ARTIKEL
// =====================================================
function tampilkanPagination() {
    const pagination = document.querySelector('.pagination');
    if (!pagination) return;
    pagination.innerHTML = '';

    const totalHalaman = Math.ceil(artikelTampil.length / artikelPerHalaman);

    const prevBtn = document.createElement('button');
    prevBtn.textContent = '← Sebelumnya';
    prevBtn.disabled = halamanAktif === 1;
    prevBtn.addEventListener('click', () => {
        if (halamanAktif > 1) {
            halamanAktif--;
            tampilkanArtikel();
            document.getElementById('articles').scrollIntoView({ behavior: 'smooth' });
        }
    });
    pagination.appendChild(prevBtn);

    const info = document.createElement('span');
    info.textContent = `Halaman ${halamanAktif} dari ${totalHalaman}`;
    pagination.appendChild(info);

    const nextBtn = document.createElement('button');
    nextBtn.textContent = 'Berikutnya →';
    nextBtn.disabled = halamanAktif === totalHalaman;
    nextBtn.addEventListener('click', () => {
        if (halamanAktif < totalHalaman) {
            halamanAktif++;
            tampilkanArtikel();
            document.getElementById('articles').scrollIntoView({ behavior: 'smooth' });
        }
    });
    pagination.appendChild(nextBtn);
}

// =====================================================
// 🔹 LOAD DATA DARI JSON
// =====================================================
fetch('data/articles.json')
    .then(response => response.json())
    .then(data => {
        semuaArtikel = data;
        artikelTampil = data;
        tampilkanArtikel();
    })
    .catch(error => console.error('⚠️ oomak gagal dia!', error));

// =====================================================
// 🔹 FITUR SEARCH (REALTIME FILTER)
// =====================================================
const searchInput = document.getElementById('search-input');
if (searchInput) {
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase().trim();
        artikelTampil = semuaArtikel.filter(art =>
            art.judul.toLowerCase().includes(query)
        );
        halamanAktif = 1;
        tampilkanArtikel();
    });
}

// =====================================================
// 🔹 MODAL DETAIL ARTIKEL
// =====================================================
function aktifkanModal(data) {
    const modal = document.getElementById('article-modal');
    const closeModal = document.getElementById('close-modal');

    document.querySelectorAll('.read-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const index = btn.dataset.index;
            const art = data[index];

            document.getElementById('modal-img').src = art.gambar;
            document.getElementById('modal-title').textContent = art.judul;
            document.getElementById('modal-meta').textContent = `${art.author} | ${art.tanggal}`;
            document.getElementById('modal-body').textContent = art.isi;

            modal.style.display = 'flex';
        });
    });

    if (closeModal) {
        closeModal.addEventListener('click', () => modal.style.display = 'none');
    }

    window.addEventListener('click', (e) => {
        if (e.target === modal) modal.style.display = 'none';
    });
}

// =====================================================
// 🔹 DARK MODE (DENGAN SIMPANAN LOCALSTORAGE)
// =====================================================
const themeToggle = document.getElementById('theme-toggle');
if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        themeToggle.textContent = isDark ? '☀️' : '🌙';
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
}

window.addEventListener('load', () => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        if (themeToggle) themeToggle.textContent = '☀️';
    } else {
        if (themeToggle) themeToggle.textContent = '🌙';
    }
});