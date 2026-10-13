import './bootstrap';

const headerSearch = document.querySelector('.header-search');
if (headerSearch) {
    const input = headerSearch.querySelector('input');
    const results = headerSearch.querySelector('.header-search-results');
    const pages = Array.from(document.querySelectorAll('.site-nav a[href]'))
        .filter((link) => new URL(link.href).origin === window.location.origin)
        .map((link) => ({ title: link.textContent.trim(), href: link.href }));
    pages.push({ title: 'Programmes', href: new URL('programmes', document.querySelector('.brand').href).href });

    const searchPages = () => {
        const query = input.value.trim().toLowerCase();
        results.replaceChildren();
        results.hidden = !query;
        if (!query) return;
        const matches = pages.filter((page) => page.title.toLowerCase().includes(query));
        matches.forEach((page) => {
            const link = document.createElement('a');
            link.href = page.href;
            link.textContent = page.title;
            results.append(link);
        });
        if (!matches.length) {
            const message = document.createElement('p');
            message.textContent = 'No matching pages. Try schools, fees or accommodation.';
            results.append(message);
        }
    };
    input.addEventListener('input', searchPages);
    input.addEventListener('focus', searchPages);
    headerSearch.addEventListener('submit', (event) => {
        event.preventDefault();
        searchPages();
        results.querySelector('a')?.focus();
    });
    headerSearch.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            results.hidden = true;
            input.focus();
            results.hidden = true;
        }
    });
    document.addEventListener('click', (event) => {
        if (!headerSearch.contains(event.target)) results.hidden = true;
    });
    headerSearch.addEventListener('focusout', (event) => {
        if (!headerSearch.contains(event.relatedTarget)) results.hidden = true;
    });
}

const menuToggle = document.querySelector('.menu-toggle');
const siteNav = document.querySelector('.site-nav');

if (menuToggle && siteNav) {
	menuToggle.addEventListener('click', () => {
		const open = siteNav.classList.toggle('open');
		menuToggle.setAttribute('aria-expanded', open);
	});
}

const gallery = document.querySelector('.hostel-page .gallery');
const galleryLightbox = document.querySelector('.gallery-lightbox');

if (gallery && galleryLightbox instanceof HTMLDialogElement) {
	const lightboxImage = galleryLightbox.querySelector('.gallery-lightbox-image');
	const closeButton = galleryLightbox.querySelector('.gallery-lightbox-close');
	const previousButton = galleryLightbox.querySelector('.gallery-lightbox-previous');
	const nextButton = galleryLightbox.querySelector('.gallery-lightbox-next');
	const counter = galleryLightbox.querySelector('.gallery-lightbox-counter');
	const thumbnails = [...gallery.querySelectorAll('.gallery-trigger img')];
	let currentIndex = 0;

	const showImage = (index) => {
		currentIndex = (index + thumbnails.length) % thumbnails.length;
		const thumbnail = thumbnails[currentIndex];

		lightboxImage.src = thumbnail.src;
		lightboxImage.alt = thumbnail.alt;
		counter.textContent = `${currentIndex + 1} / ${thumbnails.length}`;
	};

	gallery.addEventListener('click', (event) => {
		const clickedElement = event.target instanceof Element ? event.target : null;
		const trigger = clickedElement?.closest('.gallery-trigger');
		const thumbnail = trigger?.querySelector('img');

		if (!thumbnail || !lightboxImage) {
			return;
		}

		currentIndex = thumbnails.indexOf(thumbnail);
		showImage(currentIndex);
		galleryLightbox.showModal();
	});

	closeButton?.addEventListener('click', () => galleryLightbox.close());
	previousButton?.addEventListener('click', () => showImage(currentIndex - 1));
	nextButton?.addEventListener('click', () => showImage(currentIndex + 1));

	galleryLightbox.addEventListener('click', (event) => {
		if (event.target === galleryLightbox) {
			galleryLightbox.close();
		}
	});

	window.addEventListener('keydown', (event) => {
		if (!galleryLightbox.open) {
			return;
		}

		if (event.key === 'ArrowLeft') {
			event.preventDefault();
			showImage(currentIndex - 1);
		} else if (event.key === 'ArrowRight') {
			event.preventDefault();
			showImage(currentIndex + 1);
		} else if (event.key === 'Escape') {
			event.preventDefault();
			galleryLightbox.close();
		}
	});
}
