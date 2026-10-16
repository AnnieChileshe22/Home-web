@extends('layouts.app')
@section('content')
@php
    $semesters = [
        '2026/2027 Academic Year Semester I' => [
            ['1', 'Sun 4 Oct 2026', 'Arrival of New Full-time Students – Main Campus', ''],
            ['2', 'Mon 5 to Fri 9 Oct 2026', 'Registration & Orientation – Main Campus', ''],
            ['3', 'Mon 12 Oct to Fri 20 Nov 2026', 'Commencement of Classes – Full-time', ''],
            ['4', 'Wed 7 Oct 2026', 'Senate Meeting', ''],
            ['5', 'Fri 6 Nov 2026', '12th Graduation Ceremony', ''],
            ['6', 'Mon 9 Nov to Fri 15 Jan 2027', 'Industrial Attachment for Agriculture', ''],
            ['7', 'Mon 23 to Fri 27 Nov 2026', 'Mid-Semester Tests / Assessments', ''],
            ['8', 'Fri 27 Nov 2026', 'End of Classes – Full-time', ''],
            ['9', 'Mon 7 to Fri 18 Dec 2026', 'Postgraduate & ODL Residential School & Classes', ''],
            ['10', 'Fri 18 Dec 2026', 'End of Classes – ODL', ''],
            ['11', 'Friday 18th to Wed 23rd Dec 2026', 'Postgraduate Examinations', ''],
            ['12', 'Sat 19 Dec 2026 to Mon 18 Jan 2027', 'Vacation Period (All Students)', ''],
            ['13', 'Mon 21 Dec 2026 to Wed 6 Jan 2027', 'Recess for All Staff', ''],
            ['14', 'Mon 11 to Fri 15 Jan 2027', 'Deferred Examinations – Postgraduate', ''],
            ['15', 'Mon 18 Jan 2027', 'Arrival of Returning Students', ''],
            ['16', 'Tue 19 Jan 2027', 'Classes begin', ''],
            ['17', 'Jan to Mar 2027', 'Nursing Clinical Practice (Years 1 3, repeats)', ''],
            ['18', 'Mon 1 Mar to Fri 5 Mar 2027', 'Mid-Semester break ( Returning Students)', ''],
            ['19', 'Mon 1 Mar to Fri 5 Mar 2027', 'Study Break 1st Year Students', ''],
            ['20', 'Mon 8 Mar to Fri 19 Mar 2027', 'Semester Exams ( First Years)', ''],
            ['21', 'Mon 8 Mar to Fri 16 April 2027', 'Classes resume for Returning Students', ''],
            ['22', 'Mon 12th April to Fri 7th May 2027', 'Postgraduate Sessions and Examinations', ''],
            ['23', 'Mon 19 to Fri 23 April 2027', 'Study Break for Returning Students', ''],
            ['24', 'Mon 26 April to Fri 7 May 2027', 'Semester Exams for returning Students', ''],
            ['25', 'May to July 2027', 'Teaching Practice – 3rd & 4th Year Students', ''],
            ['26', '19 May 2027', 'All Results to be Submitted', ''],
            ['27', 'Fri 21 May 2027', 'Board of Examiners – Semester I', ''],
            ['28', 'Wed 26 May 2027', 'Senate Examinations Committee (Semester I Results)', ''],
            ['29', 'Fri 28 May 2027', 'Publication of Semester and Postgraduate Results', ''],
        ],
        '2026/2027 Academic Year Semester II' => [
            ['30', 'June & Dec 2027', 'Nursing End-of-Semester Exams (Years 1–3) & NMCZ Competence Exam', ''],
            ['31', 'Sun 8 Aug to Fri 13 Aug 2027', 'Arrival of Returning Students', ''],
            ['32', 'Mon 9th August to Fri 10th September 2027', 'Postgraduate sessions', ''],
            ['33', 'Tue 9 Aug 2027', 'Classes Resume – Full-time', ''],
            ['34', 'Wed 25 Aug 207', 'Senate Meeting', ''],
            ['35', 'Mon 6 Sept to Fri 10 Sept 2027', 'Mid- Semester Break', ''],
            ['36', 'Mon 13 Sept to Fri 22 Oct 2027', 'Classes begin After break', ''],
            ['37', 'Fri 22 Oct 2027', 'End of Semester 2 – Full-time', ''],
            ['38', 'Mon 25 Oct to Fri 29 Oct 2027', 'Study Break – Full-time', ''],
            ['39', 'Mon 1 Nov to Fri 12 Nov 2027', 'Semester 2 Examinations – Full-time', ''],
            ['40', '26th Nov 2027', 'Results Submission', ''],
            ['41', 'Mon 22 Nov to Fri 3 Dec 2027', 'Sessional Examinations – ODL and Postgraduate Examniantion Semester II', ''],
            ['42', 'Fri 10 Dec 2027', 'Board of Examiners', ''],
            ['43', 'Wed 15 Dec 2027', 'Senate Examinations Committee (Semester II Results)', ''],
            ['44', 'Fri 17 Dec 2027', 'Publication of Results', ''],
            ['45', 'Mon 20 Dec to Wed 5 Jan 2028', 'Recess for All Staff', ''],
            ['46', 'Mon 17 Jan 2028', '2028 Semester I Begins', ''],
            ['47', 'Fri 25 Feb 2028', '13th Graduation Ceremony', ''],
        ],
    ];
@endphp
<main class="academic-calendar-page">
    <section class="academic-calendar-section" aria-labelledby="academic-calendar-title">
        <div class="page-width">
            <header class="academic-calendar-heading">
                <div>
                    <p class="academic-calendar-kicker">Mukuba University</p>
                    <h1 id="academic-calendar-title">University Academic Calendar</h1>
                    <p>Academic dates, activities, and important university events.</p>
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
                        <h2 id="calendar-card-title">Academic Calendar 2026/2027</h2>
                        <p>Sessional Dates for Postgraduate, Degree &amp; Diploma Programmes of the University (Full-time / ODL)</p>
                    </div>
                </div>
                <div class="academic-calendar-table-wrap" tabindex="0" aria-label="Scrollable academic calendar table">
                    <table class="academic-calendar-table">
                        <caption class="visually-hidden">Mukuba University Academic Calendar 2026/2027</caption>
                        <thead><tr><th scope="col">Item</th><th scope="col">Date(s)</th><th scope="col">Calendar Activity</th><th scope="col">Details</th></tr></thead>
                        <tbody>
                            @foreach ($semesters as $semester => $events)
                                <tr class="academic-calendar-semester"><th colspan="4" scope="colgroup">{{ $semester }}</th></tr>
                                @foreach ($events as [$number, $dates, $activity, $details])
                                    <tr>
                                        <td class="academic-calendar-number">{{ $number }}</td>
                                        <td class="academic-calendar-dates">{{ $dates }}</td>
                                        <td>{{ $activity }}</td>
                                        <td>{{ $details }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="academic-calendar-source-note">Dates and event wording are reproduced from the supplied 2026/2027 calendar.</p>
            </section>
        </div>
    </section>
</main>
<script>
    (() => {
        const button = document.querySelector('[data-calendar-download]');
        const table = document.querySelector('.academic-calendar-table');
        if (!button || !table) return;

        const pdfText = value => value.normalize('NFKD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[–—]/g, '-')
            .replace(/[’‘]/g, "'")
            .replace(/[“”]/g, '"')
            .replace(/[^\x20-\x7E]/g, '?');
        const escapePdf = value => pdfText(value).replace(/\\/g, '\\\\').replace(/\(/g, '\\(').replace(/\)/g, '\\)');
        const wrap = (value, max) => {
            const words = pdfText(value).split(/\s+/);
            const lines = [];
            let line = '';
            words.forEach(word => {
                while (word.length > max) {
                    if (line) { lines.push(line); line = ''; }
                    lines.push(word.slice(0, max));
                    word = word.slice(max);
                }
                if (line && (line + ' ' + word).length > max) { lines.push(line); line = word; }
                else line = line ? line + ' ' + word : word;
            });
            if (line) lines.push(line);
            return lines.length ? lines : [''];
        };

        button.addEventListener('click', () => {
            const pageW = 842, pageH = 595, margin = 32, widths = [38, 168, 390, 182];
            const rows = [...table.rows].map(row => ({
                section: row.classList.contains('academic-calendar-semester'),
                cells: [...row.cells].map(cell => cell.innerText.trim())
            }));
            const pages = [];
            let commands = [];
            let y = pageH - margin;
            const beginPage = () => {
                commands = ['BT', '/F1 16 Tf', `${margin} ${y} Td`, '(Mukuba University - Academic Calendar 2026/2027) Tj', 'ET'];
                y -= 27;
            };
            const finishPage = () => {
                commands.push('BT', '/F1 8 Tf', `${pageW - margin - 72} ${margin / 2} Td`, `(Page ${pages.length + 1}) Tj`, 'ET');
                pages.push(commands.join('\n'));
            };
            const drawRow = (cells, isSection = false, isHeader = false) => {
                const cellLines = isSection ? [wrap(cells[0], 110)] : cells.map((cell, index) => wrap(cell, Math.max(10, Math.floor(widths[index] / (isHeader ? 5.1 : 4.5)))));
                const rowHeight = Math.max(20, Math.max(...cellLines.map(lines => lines.length)) * 9 + 8);
                if (y - rowHeight < margin + 16) { finishPage(); y = pageH - margin; beginPage(); drawRow(['Item', 'Date(s)', 'Calendar Activity', 'Details'], false, true); }
                if (isSection || isHeader) {
                    commands.push(`0.92 g ${margin} ${y - rowHeight + 2} ${pageW - margin * 2} ${rowHeight} re f 0 g`);
                }
                commands.push('0.75 w', `${margin} ${y - rowHeight + 2} ${pageW - margin * 2} ${rowHeight} re S`);
                if (isSection) {
                    commands.push('BT', '/F1 10 Tf', `${margin + 7} ${y - 13} Td`, `(${escapePdf(cells[0])}) Tj`, 'ET');
                } else {
                    let x = margin;
                    cellLines.forEach((lines, index) => {
                        commands.push('BT', `${isHeader || isSection ? '/F1 9' : '/F1 8'} Tf`, `${x + 5} ${y - 12} Td`);
                        lines.forEach((line, lineIndex) => {
                            if (lineIndex) commands.push('0 -9 Td');
                            commands.push(`(${escapePdf(line)}) Tj`);
                        });
                        commands.push('ET');
                        x += widths[index];
                        if (index < widths.length - 1) commands.push(`${x} ${y - rowHeight + 2} m ${x} ${y} l S`);
                    });
                }
                y -= rowHeight;
            };

            beginPage();
            rows.forEach((row, index) => {
                if (row.section) drawRow(row.cells, true);
                else drawRow(row.cells, false, index === 0);
            });
            finishPage();

            const objects = [];
            const addObject = value => { objects.push(value); return objects.length; };
            const catalogId = addObject('');
            const pagesId = addObject('');
            const fontId = addObject('<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>');
            const pageIds = pages.map(content => {
                const streamId = addObject(`<< /Length ${content.length} >>\nstream\n${content}\nendstream`);
                return addObject(`<< /Type /Page /Parent ${pagesId} 0 R /MediaBox [0 0 ${pageW} ${pageH}] /Resources << /Font << /F1 ${fontId} 0 R >> >> /Contents ${streamId} 0 R >>`);
            });
            objects[catalogId - 1] = `<< /Type /Catalog /Pages ${pagesId} 0 R >>`;
            objects[pagesId - 1] = `<< /Type /Pages /Kids [${pageIds.map(id => `${id} 0 R`).join(' ')}] /Count ${pageIds.length} >>`;
            let pdf = '%PDF-1.4\n';
            const offsets = [0];
            objects.forEach((object, index) => { offsets.push(pdf.length); pdf += `${index + 1} 0 obj\n${object}\nendobj\n`; });
            const xrefOffset = pdf.length;
            pdf += `xref\n0 ${objects.length + 1}\n0000000000 65535 f \n`;
            offsets.slice(1).forEach(offset => { pdf += `${String(offset).padStart(10, '0')} 00000 n \n`; });
            pdf += `trailer\n<< /Size ${objects.length + 1} /Root ${catalogId} 0 R >>\nstartxref\n${xrefOffset}\n%%EOF`;
            const blob = new Blob([new TextEncoder().encode(pdf)], { type: 'application/pdf' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'mukuba-university-academic-calendar-2026-2027.pdf';
            link.click();
            setTimeout(() => URL.revokeObjectURL(link.href), 1000);
        });
    })();
</script>
@endsection
