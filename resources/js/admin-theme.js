const themeToggle = document.querySelector('[data-admin-theme-toggle]');
const systemTheme = window.matchMedia('(prefers-color-scheme: dark)');
let savedTheme;
try { savedTheme = localStorage.getItem('mukuba-theme'); } catch {}

function applyTheme(dark) {
    document.documentElement.dataset.theme = dark ? 'dark' : 'light';
    if (!themeToggle) return;
    themeToggle.setAttribute('aria-pressed', String(dark));
    themeToggle.setAttribute('aria-label', dark ? 'Switch to light mode' : 'Switch to dark mode');

}

applyTheme(savedTheme === 'dark' || (savedTheme !== 'light' && systemTheme.matches));
themeToggle?.addEventListener('click', () => {
    savedTheme = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
    applyTheme(savedTheme === 'dark');
    try { localStorage.setItem('mukuba-theme', savedTheme); } catch {}
});
systemTheme.addEventListener('change', event => {
    if (savedTheme !== 'dark' && savedTheme !== 'light') applyTheme(event.matches);
});