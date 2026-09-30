import './bootstrap';

const menuToggle = document.querySelector('.menu-toggle');
const siteNav = document.querySelector('.site-nav');

if (menuToggle && siteNav) {
	menuToggle.addEventListener('click', () => {
		const open = siteNav.classList.toggle('open');
		menuToggle.setAttribute('aria-expanded', open);
	});
}
