const { test } = require('node:test');
const assert = require('node:assert/strict');
const vm = require('node:vm');
const fs = require('node:fs');
const script = fs.readFileSync('public/js/api-sections.js', 'utf8');

async function run({ online = true, fetchResult, reject = false }) {
    const events = [];
    const section = {
        dataset: { apiSection: '/data/schools' },
        innerHTML: 'Loading...',
        setAttribute: (key, value) => events.push([key, value]),
        dispatchEvent: event => events.push(event.type),
        replaceChildren: message => { section.innerHTML = message.textContent; },
    };
    let paint;
    let start;
    let calls = 0;
    let done;
    const finished = new Promise(resolve => done = resolve);
    const context = {
        document: {
            readyState: 'complete',
            querySelectorAll: () => [section],
            createElement: () => ({ setAttribute() {} }),
        },
        navigator: { onLine: online },
        requestAnimationFrame: callback => { paint = callback; },
        setTimeout: (callback, delay) => { if (delay === 0) start = callback; return 1; },
        clearTimeout: () => done(),
        AbortController,
        CustomEvent: class { constructor(type) { this.type = type; } },
        fetch: async () => {
            calls++;
            if (reject) throw new Error('Network failure');
            return fetchResult;
        },
    };
    vm.runInNewContext(script, context);
    assert.equal(calls, 0);
    assert.equal(section.innerHTML, 'Loading...');
    paint();
    assert.equal(calls, 0);
    start();
    await finished;
    assert.deepEqual(events, [['aria-busy', 'false'], 'api-section-loaded']);
    return { section, calls };
}

test('waits for page paint and inserts fetched cards', async () => {
    const result = await run({ fetchResult: {
        ok: true, headers: { get: () => 'text/html' }, text: async () => '<article>Science</article>',
    } });
    assert.equal(result.section.innerHTML, '<article>Science</article>');
    assert.equal(result.calls, 1);
});

test('offline and failed requests clear loaders and show the empty message', async () => {
    for (const options of [
        { online: false }, { reject: true },
        { fetchResult: { ok: false } },
        { fetchResult: { ok: true, headers: { get: () => 'application/json' } } },
    ]) {
        const result = await run(options);
        assert.equal(result.section.innerHTML, 'No data to show');
        if (options.online === false) assert.equal(result.calls, 0);
    }
});
