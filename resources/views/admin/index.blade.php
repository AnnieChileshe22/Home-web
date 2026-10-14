@php
    $profile = auth()->user();
    $profileName = $profile?->name ?? 'Site Administrator';
    $profileInitials = collect(explode(' ', $profileName))
        ->filter()
        ->take(2)
        ->map(fn($part) => mb_substr($part, 0, 1))
        ->implode('');
    $sections = [
        'overview' => ['Overview', 'dashboard'],
        'news' => ['News', 'news'],
        'events' => ['Events', 'calendar'],
        'accommodation' => ['Accommodation', 'home'],
        'programmes' => ['Programmes', 'book'],
        'study' => ['Study modes', 'layers'],
        'announcements' => ['Announcements', 'news'],
    ];
    $currentSection = $currentSection ?? request()->route('section', 'overview');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#064b2a">
    <title>Website Administration | Mukuba University</title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>

<body class="content-admin">
    <svg class="icon-library" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <symbol id="icon-dashboard" viewBox="0 0 24 24">
            <rect x="3" y="3" width="7" height="7" rx="1" />
            <rect x="14" y="3" width="7" height="7" rx="1" />
            <rect x="3" y="14" width="7" height="7" rx="1" />
            <rect x="14" y="14" width="7" height="7" rx="1" />
        </symbol>
        <symbol id="icon-news" viewBox="0 0 24 24">
            <rect x="3" y="4" width="18" height="16" rx="2" />
            <path d="M7 8h10M7 12h4M7 16h10M15 12h2" />
        </symbol>
        <symbol id="icon-calendar" viewBox="0 0 24 24">
            <rect x="3" y="5" width="18" height="16" rx="2" />
            <path d="M7 3v4M17 3v4M3 10h18M7 14h3M14 14h3M7 17h3" />
        </symbol>
        <symbol id="icon-home" viewBox="0 0 24 24">
            <path d="m3 10 9-7 9 7M5 9v12h14V9M9 21v-8h6v8" />
        </symbol>
        <symbol id="icon-book" viewBox="0 0 24 24">
            <path d="M12 5v16M12 5C9 3 6 3 3 4v15c3-1 6-1 9 2 3-3 6-3 9-2V4c-3-1-6-1-9 1Z" />
        </symbol>
        <symbol id="icon-layers" viewBox="0 0 24 24">
            <path d="m12 3 10 5-10 5L2 8l10-5Zm-10 9 10 5 10-5M2 16l10 5 10-5" />
        </symbol>
        <symbol id="icon-arrow" viewBox="0 0 24 24">
            <path d="M7 17 17 7M7 7h10v10" />
        </symbol>
        <symbol id="icon-plus" viewBox="0 0 24 24">
            <path d="M12 5v14M5 12h14" />
        </symbol>
        <symbol id="icon-search" viewBox="0 0 24 24">
            <circle cx="10" cy="10" r="6" />
            <path d="m15 15 6 6" />
        </symbol>
        <symbol id="icon-menu" viewBox="0 0 24 24">
            <path d="M4 6h16M4 12h16M4 18h16" />
        </symbol>
        <symbol id="icon-close" viewBox="0 0 24 24">
            <path d="m6 6 12 12M6 18 18 6" />
        </symbol>
    </svg>
    <a class="skip-link" href="#admin-main">Skip to content</a>
    <aside class="admin-sidebar" id="admin-sidebar" aria-label="Website administration">
        <a class="admin-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Mukuba University crest">
            <span><strong>Mukuba University</strong><small>Website administration</small></span>
        </a>
        <button class="icon-button sidebar-close" type="button" data-close-sidebar aria-label="Close navigation"><svg
                class="icon">
                <use href="#icon-close" />
            </svg></button>
        <p class="nav-label">Your workspace</p>
        <nav class="admin-navigation" aria-label="Content sections">
            @foreach ($sections as $key => [$label, $icon])
                <a class="nav-item {{ $key === $currentSection ? 'active' : '' }}"
                    href="{{ $key === 'overview' ? route('admin.index') : route('admin.section', $key) }}"
                    @if ($key === $currentSection) aria-current="page" @endif>
                    <svg class="icon" aria-hidden="true">
                        <use href="#icon-{{ $icon }}" />
                    </svg>
                    <span>{{ $label }}</span>
                    @if (in_array($key, ['news', 'events', 'accommodation']))
                        <span class="nav-count" data-count="{{ $key }}">0</span>
                    @endif
                </a>
            @endforeach
        </nav>
        <div class="sidebar-footer">
            <span class="sidebar-status"><i></i> Content workspace</span>
            <p>Education. Freedom.<br>Responsibility.</p>
            <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer">View university website <svg
                    class="icon" aria-hidden="true">
                    <use href="#icon-arrow" />
                </svg></a>
        </div>
    </aside>
    <button class="sidebar-scrim" id="sidebar-scrim" type="button" aria-label="Close navigation" hidden></button>
    <div class="admin-workspace">
        <header class="admin-header">
            <div class="header-location">
                <button class="icon-button mobile-menu" id="sidebar-toggle" type="button" aria-label="Open navigation"
                    aria-expanded="false" aria-controls="admin-sidebar"><svg class="icon" aria-hidden="true">
                        <use href="#icon-menu" />
                    </svg></button>
                <span class="header-label">Website <span class="breadcrumb-divider">/</span> <strong
                        id="breadcrumb">Overview</strong></span>
            </div>
            <div class="header-actions">
                <a class="website-button" href="{{ url('/') }}" target="_blank" rel="noopener noreferrer">View
                    website <svg class="icon" aria-hidden="true">
                        <use href="#icon-arrow" />
                    </svg></a>
                <details class="profile-menu">
                    <summary aria-label="Profile for {{ $profileName }}"><span
                            class="profile-avatar">{{ mb_strtoupper($profileInitials) }}</span><span
                            class="profile-text"><strong>{{ $profileName }}</strong><small>{{ $profile ? 'Website administrator' : 'Preview profile' }}</small></span><span
                            class="profile-chevron" aria-hidden="true">&#8964;</span></summary>
                    <div class="profile-dropdown"><strong>{{ $profileName }}</strong>
                        <p>{{ $profile?->email ?? 'No user is currently signed in.' }}</p>
                        <span>{{ $profile ? 'Signed in to Mukuba University' : 'Login will be connected in the next stage.' }}</span>
                    </div>
                </details>
            </div>
        </header>
        <main class="admin-main" id="admin-main" tabindex="-1">
            <div class="preview-banner"><span class="preview-tag">Design preview</span>
                <p>Edits are saved in this browser. Publishing to the university website and login are not connected
                    yet.</p>
            </div>
            @if ($currentSection === 'overview')
            <section id="overview-view" aria-labelledby="overview-title">
                <div class="page-heading">
                    <div>
                        <p class="eyebrow">Mukuba University / Administration</p>
                        <h1 id="overview-title">Your website, at a glance.</h1>
                        <p class="page-description">Keep your university community informed, connected and up to date.
                        </p>
                    </div><button class="button button-primary" type="button" data-create="news"><svg
                            class="icon" aria-hidden="true">
                            <use href="#icon-plus" />
                        </svg>Create a post</button>
                </div>
                <div class="welcome-panel">
                    <div><span class="welcome-kicker">A little update makes a big difference</span>
                        <h2>What is happening at Mukuba?</h2>
                        <p>Share the latest news, announce an event or help students find their home on campus.</p>
                        <button class="button button-gold" type="button" data-create="events">Add an event <svg
                                class="icon" aria-hidden="true">
                                <use href="#icon-arrow" />
                            </svg></button>
                    </div>
                    <div class="welcome-emblem" aria-hidden="true"><img src="{{ asset('images/logo.png') }}"
                            alt=""><span>Education &bull; Freedom &bull; Responsibility</span></div>
                </div>
                <div class="stat-grid" aria-label="Content overview">
                    @foreach (['news' => ['News posts', 'news'], 'events' => ['Events', 'calendar'], 'accommodation' => ['Accommodation', 'home'], 'drafts' => ['Drafts', 'book']] as $key => [$label, $icon])
                        <article class="stat-card">
                            <div class="stat-top"><span>{{ $label }}</span><svg class="icon"
                                    aria-hidden="true">
                                    <use href="#icon-{{ $icon }}" />
                                </svg></div><strong
                                data-stat="{{ $key }}">0</strong><small>{{ $key === 'drafts' ? 'Ready when you are' : 'In your content workspace' }}</small>
                        </article>
                    @endforeach
                </div>
                <div class="overview-columns">
                    <section class="admin-panel">
                        <div class="panel-heading">
                            <div>
                                <h2>Recent content</h2>
                                <p>Your latest posts and updates</p>
                            </div><a class="text-button" href="{{ route('admin.section', 'news') }}">Manage news
                                &#8594;</a>
                        </div>
                        <div id="recent-content" class="recent-content"></div>
                    </section>
                    <section class="admin-panel">
                        <div class="panel-heading">
                            <div>
                                <h2>Make something new</h2>
                                <p>Choose where to start</p>
                            </div>
                        </div>
                        <div class="quick-actions">
                            @foreach (['news' => ['Post university news', 'Updates, stories and achievements', 'news'], 'events' => ['Announce an event', 'Dates, venues and what to expect', 'calendar'], 'accommodation' => ['Add accommodation', 'Hostels, facilities and availability', 'home']] as $key => [$label, $description, $icon])
                                <button class="quick-action" type="button" data-create="{{ $key }}"><span
                                        class="quick-icon"><svg class="icon" aria-hidden="true">
                                            <use href="#icon-{{ $icon }}" />
                                        </svg></span><span><strong>{{ $label }}</strong><small>{{ $description }}</small></span><span
                                        aria-hidden="true">&#8594;</span></button>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="ecms-note"><svg class="icon" aria-hidden="true">
                        <use href="#icon-book" />
                    </svg>
                    <p><strong>Academic content</strong> Schools and programmes on the public website currently come
                        from ECMS. Programme edits here are previews.</p><a href="{{ url('/schools') }}"
                        target="_blank" rel="noopener noreferrer">View schools &#8599;</a>
                </div>
            </section>
            @else
            <section id="content-view" aria-labelledby="content-title">
                <div class="page-heading">
                    <div>
                        <p class="eyebrow" id="content-eyebrow">Website content</p>
                        <h1 id="content-title" tabindex="-1">News</h1>
                        <p class="page-description" id="content-description"></p>
                    </div><button class="button button-primary" id="add-content" type="button"><svg class="icon"
                            aria-hidden="true">
                            <use href="#icon-plus" />
                        </svg><span id="add-label">Add news</span></button>
                </div>
                <div class="content-tabs" aria-label="Content status"><button type="button"
                        class="content-tab active" data-status="all" aria-pressed="true">All content <span
                            id="total-count">0</span></button><button type="button" class="content-tab"
                        data-status="Published" aria-pressed="false">Published <span
                            id="published-count">0</span></button><button type="button" class="content-tab"
                        data-status="Draft" aria-pressed="false">Drafts <span id="draft-count">0</span></button>
                </div>
                <div class="admin-panel content-panel">
                    <div class="content-toolbar"><label class="search-box"><svg class="icon" aria-hidden="true">
                                <use href="#icon-search" />
                            </svg><input type="search" id="content-search" placeholder="Search content..."
                                aria-label="Search content"></label><label class="sort-control">Sort by <select
                                id="content-sort">
                                <option value="newest">Latest updated</option>
                                <option value="title">Title A to Z</option>
                            </select></label></div>
                    <div class="table-container">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th scope="col" id="title-column">Content</th>
                                    <th scope="col">Category / Details</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col"><span class="sr-only">Actions</span></th>
                                </tr>
                            </thead>
                            <tbody id="content-rows"></tbody>
                        </table>
                    </div>
                    <div class="table-footer"><span id="results-count" aria-live="polite"></span><span>Changes saved
                            on this device</span></div>
                </div>
            </section>
            @endif
            <footer class="admin-footer"><span>&copy; {{ now()->year }} Mukuba University</span><span>Website
                    administration</span></footer>
        </main>
    </div>
    <dialog class="editor-dialog" id="editor-dialog" aria-labelledby="editor-title">
        <form id="editor-form">
            <div class="editor-heading">
                <div>
                    <p class="eyebrow" id="editor-eyebrow">Create content</p>
                    <h2 id="editor-title">New post</h2>
                </div><button class="icon-button" type="button" data-close-editor aria-label="Close editor"><svg
                        class="icon" aria-hidden="true">
                        <use href="#icon-close" />
                    </svg></button>
            </div>
            <div class="editor-body">
                <p class="editor-error" id="editor-error" role="alert" hidden></p>
                <label class="form-field"><span>Title <b>*</b></span><input name="title" required maxlength="120"
                        placeholder="Give your content a clear title"></label>
                <label class="form-field"><span>Short description <b>*</b></span>
                    <textarea name="summary" required maxlength="280" rows="2" placeholder="A short summary for the website card"></textarea><small>Maximum 280 characters.</small>
                </label>
                <label class="form-field"><span>Full description</span>
                    <textarea name="body" maxlength="15000" rows="4" placeholder="Add the details your readers need"></textarea>
                </label>
                <div class="form-grid"><label class="form-field"><span>Category</span><input name="category"
                            maxlength="80" placeholder="e.g. Campus news"></label><label
                        class="form-field"><span>Status</span><select name="status">
                            <option value="Draft">Draft</option>
                            <option value="Published">Published (preview)</option>
                        </select></label></div>
                <fieldset class="section-fields" data-fields="events" hidden>
                    <legend>Event details</legend>
                    <div class="form-grid"><label class="form-field"><span>Event date <b>*</b></span><input
                                name="eventDate" type="date" required></label><label
                            class="form-field"><span>Start time</span><input name="eventTime" type="time"></label>
                    </div><label class="form-field"><span>Venue <b>*</b></span><input name="venue" maxlength="150"
                            required placeholder="e.g. University main hall"></label>
                </fieldset>
                <fieldset class="section-fields" data-fields="accommodation" hidden>
                    <legend>Accommodation details</legend>
                    <div class="form-grid"><label class="form-field"><span>Residence type</span><select
                                name="gender">
                                <option>Female</option>
                                <option>Male</option>
                                <option>Combined</option>
                            </select></label><label class="form-field"><span>Availability</span><select
                                name="availability">
                                <option>Available</option>
                                <option>Limited spaces</option>
                                <option>Full</option>
                            </select></label><label class="form-field"><span>Fee per semester (ZMW)</span><input
                                name="price" type="number" min="0" step="0.01"
                                placeholder="Optional"></label><label class="form-field"><span>Available
                                spaces</span><input name="spaces" type="number" min="0" step="1"
                                placeholder="Optional"></label></div><label
                        class="form-field"><span>Facilities</span><input name="facilities" maxlength="250"
                            placeholder="Wi-Fi, Security, Laundry, Study area"><small>Separate each facility with a
                            comma.</small></label>
                </fieldset>
                <fieldset class="section-fields" data-fields="programmes" hidden>
                    <legend>Programme details</legend>
                    <div class="form-grid"><label class="form-field"><span>Qualification</span><select
                                name="qualification">
                                <option>Diploma</option>
                                <option>Bachelor's degree</option>
                                <option>Master's degree</option>
                                <option>Doctorate</option>
                            </select></label><label class="form-field"><span>Duration</span><input name="duration"
                                maxlength="50" placeholder="e.g. 4 years"></label></div>
                </fieldset>
                <label class="form-field"><span>Cover image URL</span><input name="image" type="url"
                        maxlength="2048" placeholder="https://..."><small>Use a publicly accessible image link, or
                        choose a small image below.</small></label>
                <label class="image-upload"><input id="cover-file" type="file"
                        accept="image/jpeg,image/png,image/webp"><span>Choose cover image</span><small>JPG, PNG or WebP
                        &middot; up to 500 KB</small></label>
                <img class="cover-preview" id="cover-preview" alt="Cover image preview" hidden>
                <button class="text-button" id="remove-image" type="button" hidden>Remove cover image</button>
                <p class="editor-note">This preview saves content in your browser. It does not publish to the
                    university website.</p>
            </div>
            <div class="editor-footer"><button class="button button-secondary" type="button"
                    data-close-editor>Cancel</button><button class="button button-primary" type="submit">Save
                    content</button></div>
        </form>
    </dialog>
    <div class="admin-toast" id="admin-toast" role="status" hidden></div>
    <script id="admin-config" type="application/json">{!! json_encode(['imageBase' => asset('images'), 'profileName' => $profileName, 'section' => $currentSection], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
</body>

</html>
