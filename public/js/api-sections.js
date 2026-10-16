(() => {
    const programmeState = { qualification: '', page: 1 };
    const sectionControllers = new WeakMap();

    async function loadSection(section) {
        sectionControllers.get(section)?.abort();
        const controller = new AbortController();
        sectionControllers.set(section, controller);
        const timeout = setTimeout(() => controller.abort(), 15000);
        try {
            if (navigator.onLine === false) throw new Error('Offline');
            const url = new URL(section.dataset.apiSection, window.location.href);
            if (section.hasAttribute('data-programmes-list')) {
                if (programmeState.qualification) url.searchParams.set('qualification', programmeState.qualification);
                else url.searchParams.delete('qualification');
                url.searchParams.set('page', programmeState.page);
            }
            const response = await fetch(url, {
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
            if (sectionControllers.get(section) === controller) section.setAttribute('aria-busy', 'false');
        } catch {
            if (sectionControllers.get(section) !== controller) return;
            const message = document.createElement('p');
            message.className = 'api-section-status';
            message.setAttribute('role', 'status');
            message.textContent = 'No data to show';
            section.replaceChildren(message);
        } finally {
            clearTimeout(timeout);
            if (sectionControllers.get(section) === controller) {
                section.setAttribute('aria-busy', 'false');
                section.dispatchEvent(new CustomEvent('api-section-loaded', { bubbles: true }));
            }
        }
    }

    function start() {
        // Give the browser a paint before starting the independent section requests.
        requestAnimationFrame(() => setTimeout(() => {
            document.querySelectorAll('[data-api-section]').forEach(loadSection);
        }, 0));

        const filters = document.querySelector('[data-programme-filters]');
        const list = document.querySelector('[data-programmes-list]');
        if (filters && list) {
            programmeState.qualification = filters.dataset.initialQualification || '';
            filters.querySelectorAll('button[data-qualification]').forEach(button => {
                const active = button.dataset.qualification === programmeState.qualification;
                button.classList.toggle('is-active', active);
                button.setAttribute('aria-pressed', String(active));
            });
            filters.addEventListener('click', event => {
                const button = event.target.closest('button[data-qualification]');
                if (!button) return;
                programmeState.qualification = button.dataset.qualification;
                programmeState.page = 1;
                filters.querySelectorAll('button').forEach(item => {
                    const active = item === button;
                    item.classList.toggle('is-active', active);
                    item.setAttribute('aria-pressed', String(active));
                });
                list.setAttribute('aria-busy', 'true');
                loadSection(list);
            });
            list.addEventListener('click', event => {
                const button = event.target.closest('button[data-page]');
                if (!button || button.disabled) return;
                programmeState.page = Number(button.dataset.page);
                list.setAttribute('aria-busy', 'true');
                loadSection(list);
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', start, { once: true });
    } else {
        start();
    }
})();
