const galleryFiles = [1, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19];
const galleryUrl = (number) => `/images/astrol/${number}.jpg`; 

document.addEventListener('DOMContentLoaded', () => {
    const languageSelect = document.querySelector('#language-select');
    window.googleTranslateElementInit = () => {
        if (!window.google?.translate?.TranslateElement || !document.querySelector('#google_translate_element')) return;
        new window.google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,ta,hi,te,kn,ml',
            autoDisplay: false,
        }, 'google_translate_element');
    };
    const translateScript = document.createElement('script');
    translateScript.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
    translateScript.async = true;
    document.head.appendChild(translateScript);
    languageSelect?.addEventListener('change', () => {
        let attempts = 0;
        const applyLanguage = () => {
            const translateSelect = document.querySelector('.goog-te-combo');
            if (translateSelect) {
                translateSelect.value = languageSelect.value;
                translateSelect.dispatchEvent(new Event('change', { bubbles: true }));
                return;
            }
            if (attempts++ < 20) window.setTimeout(applyLanguage, 250);
        };
        applyLanguage();
    });

    const nav = document.querySelector('.main-nav');
    const dropdowns = document.querySelectorAll('.nav-dropdown');
    dropdowns.forEach((dropdown) => {
        const trigger = dropdown.querySelector('button');
        trigger?.addEventListener('click', (event) => {
            event.stopPropagation();
            dropdowns.forEach((item) => { if (item !== dropdown) item.classList.remove('is-open'); });
            dropdown.classList.toggle('is-open');
        });
    });
    document.addEventListener('click', () => dropdowns.forEach((dropdown) => dropdown.classList.remove('is-open')));
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') dropdowns.forEach((dropdown) => dropdown.classList.remove('is-open'));
    });
    const menu = document.querySelector('.mobile-menu');
    const menuButton = document.querySelector('.menu-button');
    window.addEventListener('scroll', () => nav?.classList.toggle('scrolled', window.scrollY > 50));
    menuButton?.addEventListener('click', () => { menu?.classList.toggle('open'); menuButton.textContent = menu?.classList.contains('open') ? '×' : '☰'; });
    document.querySelectorAll('[data-close-menu]').forEach((link) => link.addEventListener('click', () => menu?.classList.remove('open')));

    document.querySelectorAll('[data-size]').forEach((button) => button.addEventListener('click', () => {
        const action = button.dataset.size;
        const root = document.documentElement;
        const current = parseFloat(getComputedStyle(root).fontSize);
        root.style.fontSize = `${action === 'increase' ? Math.min(current + 1, 20) : action === 'decrease' ? Math.max(current - 1, 14) : 16}px`;
    }));

    const track = document.querySelector('.gallery-track');
    const left = document.querySelector('.gallery-arrow.left');
    const right = document.querySelector('.gallery-arrow.right');
    const updateArrows = () => { if (!track) return; left.style.display = track.scrollLeft > 0 ? 'block' : 'none'; right.style.display = track.scrollLeft < track.scrollWidth - track.clientWidth - 1 ? 'block' : 'none'; };
    track?.addEventListener('scroll', updateArrows); window.addEventListener('resize', updateArrows); updateArrows();
    left?.addEventListener('click', () => track.scrollBy({ left: -320, behavior: 'smooth' })); right?.addEventListener('click', () => track.scrollBy({ left: 320, behavior: 'smooth' }));

    const modal = document.querySelector('.modal'); const modalImage = modal?.querySelector('img'); let selected = 0;
    const openModal = (index) => { selected = index; modalImage.src = galleryUrl(galleryFiles[selected]); modal.classList.remove('hidden'); document.body.classList.add('no-scroll'); };
    const closeModal = () => { modal?.classList.add('hidden'); document.body.classList.remove('no-scroll'); };
    document.querySelectorAll('.gallery-item').forEach((item, index) => item.addEventListener('click', () => openModal(index)));
    modal?.addEventListener('click', (event) => { if (event.target === modal) closeModal(); }); modal?.querySelector('.modal-close')?.addEventListener('click', closeModal);
    modal?.querySelector('.modal-next')?.addEventListener('click', () => { selected = (selected + 1) % galleryFiles.length; modalImage.src = galleryUrl(galleryFiles[selected]); });
    modal?.querySelector('.modal-prev')?.addEventListener('click', () => { selected = (selected - 1 + galleryFiles.length) % galleryFiles.length; modalImage.src = galleryUrl(galleryFiles[selected]); });
    document.addEventListener('keydown', (event) => { if (event.key === 'Escape') closeModal(); });

    document.querySelector('[data-speak]')?.addEventListener('click', () => { if (!('speechSynthesis' in window)) return; speechSynthesis.cancel(); const message = new SpeechSynthesisUtterance('Vaitheeswaran Koil. Fifth generation Siva Nadi Astrologer GURUJI SIVA MARIMUTHU - CHIEF NADI ASTROLOGY. Agastya Gurupeedam.'); message.lang = 'en-US'; message.rate = .85; speechSynthesis.speak(message); });
    document.querySelector('[data-contact-form]')?.addEventListener('submit', (event) => { event.preventDefault(); alert('Thank you. We will contact you shortly.'); });

    if (window.L && document.querySelector('#map')) { const position = [11.2368, 79.7245]; const map = L.map('map', { scrollWheelZoom: false }).setView(position, 15); L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; OpenStreetMap contributors' }).addTo(map); L.marker(position).addTo(map).bindPopup('<strong>Sri Agastyar Peedam</strong><br>Vaitheeswaran Koil, Tamil Nadu'); }
});
