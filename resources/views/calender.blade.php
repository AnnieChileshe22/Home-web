@extends('layouts.app')
@section('content')
<main class="academic-calendar-page">
    <section class="academic-calendar-section" aria-labelledby="academic-calendar-title">
        <div class="page-width">
            <header class="academic-calendar-heading">
                <div>
                    <p class="academic-calendar-kicker">Mukuba University</p>
                    <h1 id="academic-calendar-title">Academic Calendar</h1>
                    <p>Important academic dates, deadlines and university activities.</p>
                </div>
                <button class="calendar-download" type="button" data-calendar-download>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v12m0 0 4-4m-4 4-4-4M5 17v3h14v-3"/></svg>
                    Download PDF
                </button>
            </header>

            <section class="academic-calendar-card" aria-labelledby="calendar-card-title">
                <div class="academic-calendar-card-header">
                    <span class="academic-calendar-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 3v4m10-4v4M3 10h18"/></svg></span>
                    <div>
                        <h2 id="calendar-card-title">University schedule</h2>
                        <p id="calendar-entry-count">Loading calendar dates…</p>
                    </div>
                </div>
                <div class="academic-month-calendar" aria-label="Monthly calendar">
                    <div class="academic-month-toolbar">
                        <button type="button" class="academic-month-control" data-month-previous aria-label="Show previous month"><span aria-hidden="true">&#8249;</span></button>
                        <h3 id="academic-month-label" aria-live="polite"></h3>
                        <button type="button" class="academic-month-control" data-month-next aria-label="Show next month"><span aria-hidden="true">&#8250;</span></button>
                    </div>
                    <div class="academic-month-weekdays" aria-hidden="true">
                        <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                    </div>
                    <div class="academic-month-days" id="academic-month-days" role="grid" aria-labelledby="academic-month-label"></div>
                </div>
                <div class="academic-calendar-list" id="academic-calendar-list" aria-live="polite"></div>
                <p class="academic-calendar-empty" id="academic-calendar-empty" hidden>No academic dates are available yet.</p>
                <p class="academic-calendar-source-note">Dates are subject to change. Please check this page for updates.</p>
            </section>
        </div>
    </section>
</main>
<script>
    (() => {
        const key = 'mukuba.academic-calendar.preview.v1';
        const list = document.querySelector('#academic-calendar-list');
        const empty = document.querySelector('#academic-calendar-empty');
        const count = document.querySelector('#calendar-entry-count');
        const formatDate = value => new Intl.DateTimeFormat('en-ZM', {
            day: 'numeric', month: 'long', year: 'numeric', timeZone: 'Africa/Lusaka'
        }).format(new Date(value + 'T12:00:00'));

        let entries = [];
        try {
            const saved = JSON.parse(localStorage.getItem(key) || '[]');
            if (Array.isArray(saved)) entries = saved.filter(entry => entry && typeof entry.title === 'string' && typeof entry.startDate === 'string');
        } catch {
            empty.textContent = 'Calendar dates could not be loaded in this browser.';
        }

        entries.sort((a, b) => a.startDate.localeCompare(b.startDate));
        count.textContent = entries.length + (entries.length === 1 ? ' scheduled activity' : ' scheduled activities');
        empty.hidden = entries.length > 0;

        const monthLabel = document.querySelector('#academic-month-label');
        const monthDays = document.querySelector('#academic-month-days');
        let displayedMonth = new Date();
        displayedMonth.setDate(1);
        displayedMonth.setHours(12, 0, 0, 0);
        const dateKey = date => [date.getFullYear(), String(date.getMonth() + 1).padStart(2, '0'), String(date.getDate()).padStart(2, '0')].join('-');
        const renderMonth = () => {
            monthLabel.textContent = new Intl.DateTimeFormat('en-ZM', { month: 'long', year: 'numeric' }).format(displayedMonth);
            monthDays.replaceChildren();
            const firstOfMonth = new Date(displayedMonth.getFullYear(), displayedMonth.getMonth(), 1, 12);
            const mondayOffset = (firstOfMonth.getDay() + 6) % 7;
            const today = dateKey(new Date());
            for (let week = 0; week < 6; week++) {
                const row = document.createElement('div');
                row.className = 'academic-month-week';
                row.setAttribute('role', 'row');
                for (let weekday = 0; weekday < 7; weekday++) {
                    const date = new Date(displayedMonth.getFullYear(), displayedMonth.getMonth(), week * 7 + weekday - mondayOffset + 1, 12);
                    const keyForDay = dateKey(date);
                    const dayEntries = entries.filter(entry => entry.startDate <= keyForDay && (entry.endDate || entry.startDate) >= keyForDay);
                    const cell = document.createElement('div');
                    cell.className = 'academic-month-day';
                    cell.setAttribute('role', 'gridcell');
                    const inMonth = date.getMonth() === displayedMonth.getMonth();
                    if (!inMonth) cell.classList.add('is-outside-month');
                    if (keyForDay === today) {
                        cell.classList.add('is-today');
                        cell.setAttribute('aria-current', 'date');
                    }
                    if (dayEntries.length) cell.classList.add('has-activity');
                    const dayNumber = document.createElement('span');
                    dayNumber.className = 'academic-day-number';
                    dayNumber.textContent = String(date.getDate());
                    cell.append(dayNumber);
                    if (dayEntries.length) {
                        const marker = document.createElement('span');
                        marker.className = 'academic-day-marker';
                        marker.setAttribute('aria-hidden', 'true');
                        cell.append(marker);
                        const label = document.createElement('small');
                        label.className = 'academic-day-activity';
                        label.textContent = dayEntries[0].title + (dayEntries.length > 1 ? ' +' + (dayEntries.length - 1) : '');
                        cell.append(label);
                    }
                    cell.setAttribute('aria-label', formatDate(keyForDay) + (dayEntries.length ? ': ' + dayEntries.map(entry => entry.title).join(', ') : ''));
                    row.append(cell);
                }
                monthDays.append(row);
            }
        };
        document.querySelector('[data-month-previous]').addEventListener('click', () => {
            displayedMonth.setMonth(displayedMonth.getMonth() - 1);
            renderMonth();
        });
        document.querySelector('[data-month-next]').addEventListener('click', () => {
            displayedMonth.setMonth(displayedMonth.getMonth() + 1);
            renderMonth();
        });
        renderMonth();

        entries.forEach(entry => {
            const item = document.createElement('article');
            item.className = 'academic-calendar-entry';

            const dateBlock = document.createElement('div');
            dateBlock.className = 'academic-calendar-date';
            const startDate = document.createElement('time');
            startDate.dateTime = entry.startDate;
            startDate.textContent = formatDate(entry.startDate);
            dateBlock.append(startDate);
            if (entry.endDate && entry.endDate !== entry.startDate) {
                const endDate = document.createElement('time');
                endDate.dateTime = entry.endDate;
                endDate.textContent = 'to ' + formatDate(entry.endDate);
                dateBlock.append(endDate);
            }

            const details = document.createElement('div');
            details.className = 'academic-calendar-details';
            const category = document.createElement('span');
            category.className = 'academic-calendar-category';
            category.textContent = entry.category || 'Academic dates';
            const title = document.createElement('h3');
            title.textContent = entry.title;
            details.append(category, title);
            if (entry.description) {
                const description = document.createElement('p');
                description.textContent = entry.description;
                details.append(description);
            }
            if (entry.venue) {
                const venue = document.createElement('p');
                venue.className = 'academic-calendar-venue';
                venue.textContent = entry.venue;
                details.append(venue);
            }

            item.append(dateBlock, details);
            list.append(item);
        });

        document.querySelector('[data-calendar-download]').addEventListener('click', () => window.print());
    })();
</script>
@endsection
