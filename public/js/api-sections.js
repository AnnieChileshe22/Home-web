(() => {
    async function loadSection(section) {
        const controller = new AbortController();
        const timeout = setTimeout(() => controller.abort(), 15000);
        try {
            if (navigator.onLine === false) throw new Error('Offline');
            const response = await fetch(section.dataset.apiSection, {
                signal: controller.signal,
                cache: 'no-store',
                headers: { Accept: 'text/html', 'X-Requested-With': 'XMLHttpRequest' },
            });
            if (!response.ok || !response.headers.get('content-type')?.includes('text/html')) {
                throw new Error('Unavailable');
            }
            const html = await response.text();
            if (!html.trim()) throw new Error('Empty response');
            section.innerHTML = html;
        } catch {
            const message = document.createElement('p');
            message.className = 'api-section-status';
            message.setAttribute('role', 'status');
            message.textContent = 'No data to show';
            section.replaceChildren(message);
        } finally {
            clearTimeout(timeout);
            section.setAttribute('aria-busy', 'false');
            section.dispatchEvent(new CustomEvent('api-section-loaded', { bubbles: true }));
        }
    }

    function start() {
        // Give the browser a paint before starting the independent section requests.
        requestAnimationFrame(() => setTimeout(() => {
            document.querySelectorAll('[data-api-section]').forEach(loadSection);
        }, 0));
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', start, { once: true });
    } else {
        start();
    }
})();
