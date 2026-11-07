var MainOption = '';
var SelectOPtions = 'All';
var reqId = 0;
var searchTimer = null;
var lastWidth = window.innerWidth;

const $ = (s, r = document) => r.querySelector(s);
const $$ = (s, r = document) => [...r.querySelectorAll(s)];

/* ---------- Data loading ---------- */
function GetData(Dir, Search) {
    const box = $('#JavaCodes');
    const id = ++reqId;
    if (box.querySelector('.card')) box.classList.add('loading');
    else box.innerHTML = '<div class="code-main">' + '<div class="skel"></div>'.repeat(8) + '</div>';

    fetch('FilesDetails.php?Dir=' + encodeURIComponent(Dir) + '&Search=' + encodeURIComponent(Search))
        .then(r => { if (!r.ok) throw new Error(r.statusText); return r.text(); })
        .then(html => { if (id === reqId) box.innerHTML = html; })
        .catch(err => {
            console.error('Error:', err);
            if (id === reqId) box.innerHTML = "<div class='code-main'><div class='empty'>Network Error</div></div>";
        })
        .finally(() => { if (id === reqId) box.classList.remove('loading'); });
}

/* ---------- Navigation ---------- */
function closeDropdowns() {
    $$('.menu-item.open').forEach(li => {
        li.classList.remove('open');
        $('.dropdown', li)?.classList.remove('show');
        $('.chip', li)?.setAttribute('aria-expanded', 'false');
    });
}

function openDropdown(li) {
    const chip = $('.chip', li), dd = $('.dropdown', li);
    const wasOpen = li.classList.contains('open');
    closeDropdowns();
    if (wasOpen) return;

    const vw = document.documentElement.clientWidth;
    const vh = window.innerHeight;
    const r = chip.getBoundingClientRect();
    const top = r.bottom + 8;

    // never taller than the space below the chip (long lists scroll inside the menu)
    dd.style.maxHeight = Math.max(140, vh - top - 12) + 'px';
    dd.style.top = top + 'px';
    // keep fully inside the screen on narrow phones
    const width = Math.min(dd.offsetWidth, vw - 24);
    dd.style.left = Math.max(12, Math.min(r.left, vw - width - 12)) + 'px';

    li.classList.add('open');
    dd.classList.add('show');
    chip.setAttribute('aria-expanded', 'true');
}

// accepts the chip, a dropdown link, or the menu item
function ActiveSelector(object) {
    const li = object.closest('.menu-item') || object;
    $$('.chip').forEach(c => c.classList.remove('active'));
    const chip = $('.chip', li);
    chip.classList.add('active');
    SelectOPtions = chip.getAttribute('data-label');
    chip.scrollIntoView({ inline: 'center', block: 'nearest', behavior: 'smooth' });
}

function selectOption(object, Path) {
    ActiveSelector(object);
    closeDropdowns();
    MainOption = Path;
    $('#SearchDataInput').value = '';
    GetData(MainOption, '');
    history.replaceState(null, '', Path ? '?OpenFolder=' + encodeURIComponent(Path).replace(/%2F/g, '/') : location.pathname);
    setTimeout(() => $('.codeData').scrollIntoView({ behavior: 'smooth' }), 10);
}

/* ---------- Share ---------- */
function toast(msg) {
    const t = $('#Toast');
    t.textContent = msg;
    t.classList.add('show');
    clearTimeout(t._h);
    t._h = setTimeout(() => t.classList.remove('show'), 2200);
}

async function shareLink() {
    const link = `https://mrabhin03.github.io/Codes-Hub/${MainOption === '' ? '' : '?OpenFolder=' + MainOption}`;
    if (navigator.share) {
        try { await navigator.share({ title: document.title, url: link }); return; }
        catch (e) { if (e.name === 'AbortError') return; }
    }
    try { await navigator.clipboard.writeText(link); }
    catch (e) {
        const temp = document.createElement('input');
        temp.value = link;
        document.body.appendChild(temp);
        temp.select();
        document.execCommand('copy');
        temp.remove();
    }
    toast('Link copied!');
}

/* ---------- Init ---------- */
function initHub(openFolder) {
    $$('.menu-item').forEach(li => {
        if (!$('.dropdown', li)) return;
        const chip = $('.chip', li);
        chip.addEventListener('click', e => { e.stopPropagation(); openDropdown(li); });
        chip.addEventListener('keydown', e => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openDropdown(li); } });
    });
    $('.chip[data-folder=""]').addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); e.target.click(); }
    });
    document.addEventListener('click', closeDropdowns);
    $('#menu').addEventListener('scroll', closeDropdowns, { passive: true });
    // mobile browsers fire "resize" when the address bar hides/shows while scrolling,
    // so only close when the WIDTH really changes (rotation, window resize)
    window.addEventListener('resize', () => {
        if (window.innerWidth !== lastWidth) { lastWidth = window.innerWidth; closeDropdowns(); }
    });
    window.addEventListener('orientationchange', closeDropdowns);
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDropdowns(); });

    // search: wait until typing pauses
    $('#SearchDataInput').addEventListener('input', function () {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => GetData(MainOption, this.value), 220);
    });

    // card spotlight follows the cursor (mouse only; touch has no hover)
    $('#JavaCodes').addEventListener('mousemove', e => {
        const card = e.target.closest('.card');
        if (!card) return;
        const r = card.getBoundingClientRect();
        card.style.setProperty('--x', (e.clientX - r.left) + 'px');
        card.style.setProperty('--y', (e.clientY - r.top) + 'px');
    });

    // navbar shadow + back to top
    const nav = $('#Nav'), top = $('#ToTop');
    const onScroll = () => {
        nav.classList.toggle('scrolled', scrollY > 10);
        top.classList.toggle('show', scrollY > 500);
    };
    addEventListener('scroll', onScroll, { passive: true });
    top.addEventListener('click', () => scrollTo({ top: 0, behavior: 'smooth' }));
    onScroll();

    // open requested folder
    if (openFolder) {
        const chip = $$('.chip').find(c => c.dataset.folder === openFolder.split('/')[0]);
        if (chip) ActiveSelector(chip);
        MainOption = openFolder;
    }
    GetData(MainOption, '');
}