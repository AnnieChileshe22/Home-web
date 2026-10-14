const config = JSON.parse(document.getElementById('admin-config').textContent);
const storageKey = 'mukuba.admin.preview.v2';
const sectionInfo = {
    news: { label: 'News', singular: 'news post', icon: 'news', description: 'Share university stories, achievements and the latest campus updates.' },
    events: { label: 'Events', singular: 'event', icon: 'calendar', description: 'Manage university events, dates, venues and information for attendees.' },
    accommodation: { label: 'Accommodation', singular: 'accommodation', icon: 'home', description: 'Manage residence listings, facilities, fees and available spaces.' },
    programmes: { label: 'Programmes', singular: 'programme', icon: 'book', description: 'Prepare programme information. Public programme data is currently managed through ECMS.' },
    study: { label: 'Study modes', singular: 'study mode', icon: 'layers', description: 'Describe full-time, distance and other learning opportunities.' },
    announcements: { label: 'Announcements', singular: 'announcement', icon: 'news', description: 'Prepare academic notices and important information for students and staff.' },
};
const today = new Date().toISOString();
function example(section, title, summary, category, image, extra = {}) {
    return { id: crypto.randomUUID(), section, title, summary, category, image: image ? config.imageBase + '/' + image : '', body: '', status: 'Published', updatedAt: today, ...extra };
}
const seedItems = [
    example('news', 'Applications are now open', 'Start your Mukuba University journey and apply for the next intake.', 'Admissions', 'app.jpg'),
    example('news', 'Student leadership forum', 'Students and staff come together to shape a stronger campus community.', 'Campus life', 'library.jpg', { status: 'Draft' }),
    example('events', '12th graduation ceremony', 'Celebrate the achievements of our graduating class and their families.', 'Graduation', 'grad.jpg', { status: 'Draft', eventDate: '', eventTime: '', venue: 'University main campus' }),
    example('events', 'International Women\'s Day', 'Recognising the contributions of women in our university community.', 'Campus event', 'events/womens day.jpeg', { status: 'Draft', eventDate: '', eventTime: '', venue: 'University main campus' }),
    ...[
        ['Bangweulu Hostel', 'Female', 'kariba.png'], ['Kafue Hostel', 'Female', 'kafue.jpg'],
        ['Zambezi Hostel', 'Female', 'zambezi.jpg'], ['Kariba Hostel', 'Male', 'kariba.png'],
        ['Luangwa Hostel', 'Male', 'luangwa.jpg'], ['Luapula Hostel', 'Male', 'luangwa.jpg'],
        ['Mansion', 'Combined', 'mansion.png'], ['Lecturers Compound', 'Combined', 'lectures.jpg'],
    ].map(([title, gender, image]) => example('accommodation', title, 'Safe and comfortable accommodation with access to campus facilities.', 'Student residence', 'to use/' + image, { gender, availability: 'Available', facilities: 'Wi-Fi, Security, Water', price: '', spaces: '' })),
    example('programmes', 'Bachelor of Science in Computer Science', 'Explore computing, software development and practical technology skills.', 'Undergraduate', '', { qualification: "Bachelor's degree", duration: '4 years', status: 'Draft' }),
    example('study', 'Full-time learning', 'On-campus learning for students studying full time.', 'On campus', 'Full-time.jpg'),
    example('study', 'Distance learning', 'Flexible study opportunities for students learning at a distance.', 'Distance', 'home.jpg'),
    example('announcements', 'Publication of results', 'Review examination results through the academic office.', 'Academic notice', '', { status: 'Draft' }),
];
let items = seedItems;
let storageWarning = '';
try {
    const saved = localStorage.getItem(storageKey);
    if (saved) {
        const parsed = JSON.parse(saved);
        if (!Array.isArray(parsed) || !parsed.every(item => item && typeof item.id === 'string' && sectionInfo[item.section] && typeof item.title === 'string' && typeof item.summary === 'string' && ['Published', 'Draft'].includes(item.status))) throw new Error('Invalid saved content');
        items = parsed;
    }
} catch {
    storageWarning = 'Saved preview data could not be loaded. Example content is shown; saving may be unavailable in this browser.';
}
let section = config.section || 'overview';
let statusFilter = 'all';
let editingId = null;
let editingSection = 'news';
let uploadedImage = '';
let toastTimer;
const form = document.getElementById('editor-form');
const dialog = document.getElementById('editor-dialog');
const sidebar = document.getElementById('admin-sidebar');
const scrim = document.getElementById('sidebar-scrim');
const sidebarToggle = document.getElementById('sidebar-toggle');
const search = document.getElementById('content-search');
const sort = document.getElementById('content-sort');
const preview = document.getElementById('cover-preview');
const coverFile = document.getElementById('cover-file');
const removeImage = document.getElementById('remove-image');
function element(tag, className, text) {
    const node = document.createElement(tag);
    if (className) node.className = className;
    if (text !== undefined) node.textContent = text;
    return node;
}
function icon(name) {
    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.classList.add('icon'); svg.setAttribute('aria-hidden', 'true');
    const use = document.createElementNS('http://www.w3.org/2000/svg', 'use');
    use.setAttribute('href', '#icon-' + name); svg.append(use); return svg;
}
function badge(status) { return element('span', 'status-badge' + (status === 'Draft' ? ' draft' : ''), status); }
function safeImage(value) {
    if (typeof value !== 'string' || !value) return '';
    if (/^data:image\/(png|jpeg|webp);base64,[a-z0-9+/=]+$/i.test(value)) return value;
    try { const url = new URL(value); return ['http:', 'https:'].includes(url.protocol) ? url.href : ''; } catch { return ''; }
}
function formattedDate(value) {
    const date = new Date(value);
    return Number.isNaN(date.getTime()) ? 'Not set' : new Intl.DateTimeFormat('en-ZA', { day: 'numeric', month: 'short', year: 'numeric', timeZone: 'Africa/Johannesburg' }).format(date);
}
function notify(message) {
    const toast = document.getElementById('admin-toast');
    toast.textContent = message; toast.hidden = false;
    clearTimeout(toastTimer); toastTimer = setTimeout(() => { toast.hidden = true; }, 5000);
}
function persist(next) {
    try { localStorage.setItem(storageKey, JSON.stringify(next)); }
    catch { throw new Error('Your browser could not save this content. Try a smaller cover image or enable browser storage.'); }
    items = next;
}
function updateOverview() {
    document.querySelectorAll('[data-count]').forEach(node => { node.textContent = items.filter(item => item.section === node.dataset.count).length; });
    document.querySelectorAll('[data-stat]').forEach(node => { node.textContent = items.filter(item => node.dataset.stat === 'drafts' ? item.status === 'Draft' : item.section === node.dataset.stat).length; });
    const recent = document.getElementById('recent-content'); recent.replaceChildren();
    [...items].sort((a, b) => String(b.updatedAt).localeCompare(String(a.updatedAt))).slice(0, 4).forEach(item => {
        const row = element('button', 'recent-item'); row.type = 'button';
        const symbol = element('span', 'recent-icon'); symbol.append(icon(sectionInfo[item.section].icon));
        const text = element('span', 'recent-item-text'); text.append(element('strong', '', item.title), element('small', '', sectionInfo[item.section].label + ' · ' + formattedDate(item.updatedAt)));
        row.append(symbol, text, badge(item.status)); row.addEventListener('click', () => openEditor(item.section, item.id)); recent.append(row);
    });
    if (!items.length) recent.append(element('p', 'page-description', 'No content yet. Create your first post to get started.'));
}
function closeSidebar(returnFocus = false) {
    sidebar.classList.remove('open'); scrim.hidden = true;
    sidebarToggle.setAttribute('aria-expanded', 'false'); document.body.style.overflow = '';
    sidebar.inert = window.innerWidth <= 850;
    if (returnFocus) sidebarToggle.focus();
}
function navigate(key, focus = true) {
    if (key !== 'overview' && !sectionInfo[key]) return;
    section = key; statusFilter = 'all'; search.value = ''; sort.value = 'newest';
    document.querySelectorAll('.nav-item').forEach(button => {
        const active = button.dataset.section === key;
        button.classList.toggle('active', active);
        if (active) button.setAttribute('aria-current', 'page'); else button.removeAttribute('aria-current');
    });
    document.getElementById('breadcrumb').textContent = key === 'overview' ? 'Overview' : sectionInfo[key].label;
    if (key !== 'overview') {
        const info = sectionInfo[key];
        document.getElementById('content-title').textContent = info.label;
        document.getElementById('content-description').textContent = info.description;
        document.getElementById('content-eyebrow').textContent = key === 'accommodation' ? 'Student life' : 'Website content';
        document.getElementById('add-label').textContent = 'Add ' + info.singular;
        document.getElementById('title-column').textContent = key === 'accommodation' ? 'Residence' : 'Content';
        if (document.getElementById('content-rows')) renderContent();
    }
    closeSidebar();
    if (focus) document.getElementById(key === 'overview' ? 'admin-main' : 'content-title').focus({ preventScroll: true });
    window.scrollTo({ top: 0 });
}
function renderContent() {
    const sectionItems = items.filter(item => item.section === section);
    document.getElementById('total-count').textContent = sectionItems.length;
    document.getElementById('published-count').textContent = sectionItems.filter(item => item.status === 'Published').length;
    document.getElementById('draft-count').textContent = sectionItems.filter(item => item.status === 'Draft').length;
    document.querySelectorAll('[data-status]').forEach(button => { const active = button.dataset.status === statusFilter; button.classList.toggle('active', active); button.setAttribute('aria-pressed', String(active)); });
    const query = search.value.trim().toLowerCase();
    const filtered = sectionItems.filter(item => (statusFilter === 'all' || item.status === statusFilter) && [item.title, item.summary, item.category, item.venue, item.gender].some(value => String(value || '').toLowerCase().includes(query)));
    filtered.sort(sort.value === 'title' ? (a, b) => a.title.localeCompare(b.title) : (a, b) => String(b.updatedAt).localeCompare(String(a.updatedAt)));
    const rows = document.getElementById('content-rows'); rows.replaceChildren();
    filtered.forEach(item => {
        const row = element('tr');
        const titleCell = element('td'); const content = element('div', 'content-cell');
        const imageUrl = safeImage(item.image);
        if (imageUrl) {
            const img = element('img', 'content-thumbnail'); img.src = imageUrl; img.alt = ''; img.loading = 'lazy';
            img.addEventListener('error', () => { const fallback = element('span', 'content-thumbnail recent-icon'); fallback.append(icon(sectionInfo[section].icon)); img.replaceWith(fallback); }, { once: true });
            content.append(img);
        } else { const fallback = element('span', 'content-thumbnail recent-icon'); fallback.append(icon(sectionInfo[section].icon)); content.append(fallback); }
        const text = element('div'); text.append(element('strong', '', item.title), element('p', '', item.summary)); content.append(text); titleCell.append(content);
        const categoryCell = element('td', '', section === 'accommodation' ? (item.gender || 'Not specified') + ' residence' : item.category || 'General');
        if (section === 'events') categoryCell.append(element('small', 'content-detail', (item.eventDate ? formattedDate(item.eventDate + 'T12:00:00') : 'Date to be confirmed') + (item.venue ? ' · ' + item.venue : '')));
        if (section === 'accommodation') categoryCell.append(element('small', 'content-detail', (item.availability || 'Not specified') + (item.price !== '' && item.price != null ? ' · ZMW ' + Number(item.price).toLocaleString('en-ZA') : '')));
        const statusCell = element('td'); statusCell.append(badge(item.status));
        const updatedCell = element('td', '', formattedDate(item.updatedAt));
        const actionCell = element('td');
        const edit = element('button', 'row-button', 'Edit'); edit.type = 'button'; edit.setAttribute('aria-label', 'Edit ' + item.title); edit.addEventListener('click', () => openEditor(section, item.id));
        const del = element('button', 'row-button delete', 'Delete'); del.type = 'button'; del.setAttribute('aria-label', 'Delete ' + item.title); del.addEventListener('click', () => {
            if (!window.confirm('Delete "' + item.title + '" from your saved preview?')) return;
            try { persist(items.filter(existing => existing.id !== item.id)); updateOverview(); renderContent(); notify('Content deleted from this browser.'); } catch (error) { notify(error.message); }
        });
        actionCell.append(edit, del); row.append(titleCell, categoryCell, statusCell, updatedCell, actionCell); rows.append(row);
    });
    if (!filtered.length) {
        const row = element('tr'); const cell = element('td', 'empty-state'); cell.colSpan = 5;
        cell.append(element('strong', '', query || statusFilter !== 'all' ? 'No matching content' : 'A fresh start'), element('p', '', query || statusFilter !== 'all' ? 'Try another search or choose a different status.' : 'Add your first ' + sectionInfo[section].singular + ' to get started.'));
        const button = element('button', 'button button-secondary', query || statusFilter !== 'all' ? 'Clear filters' : 'Add ' + sectionInfo[section].singular); button.type = 'button';
        button.addEventListener('click', () => { if (query || statusFilter !== 'all') { search.value = ''; statusFilter = 'all'; renderContent(); } else openEditor(section); }); cell.append(button); row.append(cell); rows.append(row);
    }
    document.getElementById('results-count').textContent = 'Showing ' + filtered.length + ' of ' + sectionItems.length + ' items';
}
function showPreview(value) {
    const url = safeImage(value); preview.hidden = !url; removeImage.hidden = !url;
    if (url) preview.src = url; else preview.removeAttribute('src');
}
function showError(message) { const node = document.getElementById('editor-error'); node.textContent = message; node.hidden = !message; }
function openEditor(key, id = null) {
    editingSection = key; editingId = id; uploadedImage = ''; form.reset(); showError('');
    const item = id ? items.find(existing => existing.id === id) : null;
    document.getElementById('editor-title').textContent = (item ? 'Edit ' : 'New ') + sectionInfo[key].singular;
    document.getElementById('editor-eyebrow').textContent = sectionInfo[key].label;
    document.querySelectorAll('[data-fields]').forEach(fieldset => { const active = fieldset.dataset.fields === key; fieldset.hidden = !active; fieldset.disabled = !active; });
    if (item) {
        for (const [name, value] of Object.entries(item)) { const control = form.elements.namedItem(name); if (control) control.value = value ?? ''; }
        if (item.image?.startsWith('data:')) { uploadedImage = safeImage(item.image); form.elements.image.value = ''; }
    }
    showPreview(item?.image || ''); closeSidebar(); dialog.showModal();
    form.elements.title.focus();
}
form.elements.image.addEventListener('input', () => { uploadedImage = ''; coverFile.value = ''; showPreview(form.elements.image.value); });
preview.addEventListener('error', () => { preview.hidden = true; showError('The cover image could not load. Check its URL or choose another image.'); });
coverFile.addEventListener('change', async () => {
    const file = coverFile.files[0]; if (!file) return;
    if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type) || file.size > 500 * 1024) { showError('Choose a JPG, PNG or WebP image no larger than 500 KB.'); coverFile.value = ''; return; }
    const sessionSection = editingSection; const sessionId = editingId;
    try {
        const value = await new Promise((resolve, reject) => { const reader = new FileReader(); reader.onload = () => resolve(reader.result); reader.onerror = reject; reader.readAsDataURL(file); });
        if (!dialog.open || editingSection !== sessionSection || editingId !== sessionId || coverFile.files[0] !== file) return;
        uploadedImage = safeImage(value); form.elements.image.value = ''; showError(''); showPreview(uploadedImage);
    } catch { showError('This image could not be read. Please choose another file.'); }
});
removeImage.addEventListener('click', () => { uploadedImage = ''; coverFile.value = ''; form.elements.image.value = ''; showPreview(''); showError(''); });
form.addEventListener('submit', event => {
    event.preventDefault(); showError('');
    const data = Object.fromEntries(new FormData(form));
    for (const key of Object.keys(data)) if (typeof data[key] === 'string') data[key] = data[key].trim();
    if (!data.title || !data.summary) { showError('Please enter a title and short description.'); return; }
    if (editingSection === 'events' && (!data.eventDate || !data.venue)) { showError('Please enter the event date and venue.'); return; }
    const image = uploadedImage || safeImage(data.image);
    if (data.image && !image) { showError('Enter an image URL starting with http:// or https://.'); return; }
    const previous = editingId ? items.find(item => item.id === editingId) : null;
    const item = { ...previous, ...data, image, id: editingId || crypto.randomUUID(), section: editingSection, updatedAt: new Date().toISOString() };
    try {
        persist(editingId ? items.map(existing => existing.id === editingId ? item : existing) : [item, ...items]);
        updateOverview(); if (section !== 'overview') renderContent(); dialog.close();
        notify('Content saved in this browser.');
    } catch (error) { showError(error.message); }
});
document.querySelectorAll('[data-close-editor]').forEach(button => button.addEventListener('click', () => dialog.close()));
dialog.addEventListener('click', event => { if (event.target !== dialog) return; const rect = dialog.getBoundingClientRect(); if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom) dialog.close(); });
document.querySelectorAll('[data-create]').forEach(button => button.addEventListener('click', () => openEditor(button.dataset.create)));
if (document.getElementById('add-content')) document.getElementById('add-content').addEventListener('click', () => openEditor(section));
document.querySelectorAll('[data-status]').forEach(button => button.addEventListener('click', () => { statusFilter = button.dataset.status; renderContent(); }));
if (search) search.addEventListener('input', renderContent);
if (sort) sort.addEventListener('change', renderContent);
sidebarToggle.addEventListener('click', () => { const open = !sidebar.classList.contains('open'); sidebar.classList.toggle('open', open); sidebar.inert = !open; scrim.hidden = !open; sidebarToggle.setAttribute('aria-expanded', String(open)); document.body.style.overflow = open ? 'hidden' : ''; if (open) sidebar.querySelector('[data-close-sidebar]').focus(); });
scrim.addEventListener('click', () => closeSidebar(true));
document.querySelector('[data-close-sidebar]').addEventListener('click', () => closeSidebar(true));
document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && !dialog.open && sidebar.classList.contains('open')) closeSidebar(true);
    if (event.key === 'Tab' && sidebar.classList.contains('open') && !dialog.open) {
        const focusable = [...sidebar.querySelectorAll('a,button')].filter(node => !node.disabled);
        const first = focusable[0], last = focusable[focusable.length - 1];
        if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
        else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
    }
});
window.addEventListener('resize', () => { if (window.innerWidth > 850 || !sidebar.classList.contains('open')) closeSidebar(); });
window.addEventListener('storage', event => {
    if (event.key !== storageKey || !event.newValue) return;
    try { const parsed = JSON.parse(event.newValue); if (Array.isArray(parsed) && parsed.every(item => item && typeof item.id === 'string' && sectionInfo[item.section] && typeof item.title === 'string' && typeof item.summary === 'string' && ['Published', 'Draft'].includes(item.status))) { items = parsed; updateOverview(); if (section !== 'overview') renderContent(); } } catch { /* Keep the current valid preview when another tab contains invalid data. */ }
});
closeSidebar(); updateOverview();
if (section !== 'overview') navigate(section, false);
if (storageWarning) notify(storageWarning);
