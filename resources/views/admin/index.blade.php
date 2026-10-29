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
        'posts' => ['Posts', 'news'],
        'news' => ['News', 'news'],
        'events' => ['Events', 'calendar'],
        'hostels' => ['Hostels', 'home'],
        'profiles' => ['Management profiles', 'book'],
        'calendar' => ['Academic Calendar', 'calendar'],
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
    <script>(()=>{let t;try{t=localStorage.getItem("mukuba-theme")}catch{}document.documentElement.dataset.theme=t==="dark"||(t!=="light"&&matchMedia("(prefers-color-scheme: dark)").matches)?"dark":"light"})()</script>
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
            <span><strong>Mukuba University</strong></span>
        </a>
        <button class="icon-button sidebar-close" type="button" data-close-sidebar aria-label="Close navigation"><svg
                class="icon">
                <use href="#icon-close" />
            </svg></button>
        <p class="nav-label">Your workspace</p>
        <nav class="admin-navigation" aria-label="Content sections">
            @foreach ($sections as $key => [$label, $icon])
                <a class="nav-item {{ $key === $currentSection ? 'active' : '' }}"
                    href="{{ $key === 'overview' ? route('admin.index') : ($key === 'posts' ? route('admin.posts.index') : ($key === 'announcements' ? route('admin.announcements.index') : route('admin.section', $key))) }}"
                    @if ($key === $currentSection) aria-current="page" @endif>
                    <svg class="icon" aria-hidden="true">
                        <use href="#icon-{{ $icon }}" />
                    </svg>
                    <span>{{ $label }}</span>
                    @if ($key === 'posts') <span class="nav-count">{{ \App\Models\Posts::count() }}</span> @endif
                    @if ($key === 'announcements') <span class="nav-count">{{ \App\Models\Announcement::count() }}</span> @endif
                    @if ($key === 'hostels') <span class="nav-count">{{ \App\Models\Hostels::count() }}</span> @endif
                    @if ($key === 'profiles') <span class="nav-count">{{ \App\Models\Profile::count() }}</span> @endif
                    @if (in_array($key, ['news', 'events']))
                        <span class="nav-count" data-count="{{ $key }}">0</span>
                    @endif
                </a>
            @endforeach
        </nav>
        <div class="sidebar-footer">
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
                        id="breadcrumb">{{ $currentSection === 'overview' ? 'Overview' : ($currentSection === 'posts' ? 'Posts' : $sections[$currentSection][0] ?? 'Overview') }}</strong></span>
            </div>
            <div class="header-actions">
                <button class="admin-theme-toggle" type="button" data-admin-theme-toggle aria-pressed="false" aria-label="Switch to dark mode" title="Switch color theme"><svg class="theme-icon theme-moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 13A8.5 8.5 0 0 1 11 3.5 8.5 8.5 0 1 0 20.5 13Z"/></svg><svg class="theme-icon theme-sun" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.5 1.5m11 11L19 19M5 19l1.5-1.5m11-11L19 5"/></svg><span class="sr-only">Toggle color theme</span></button>
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
                        <span>Signed in to Mukuba University</span>
                        <form method="POST" action="{{ route('logout') }}" style="margin-top: 12px">@csrf<button type="submit" class="text-button">Sign out</button></form>
                    </div>
                </details>
            </div>
        </header>
        <main class="admin-main" id="admin-main" tabindex="-1">
            @if ($currentSection === 'overview')
            <section id="overview-view" aria-labelledby="overview-title">
                <div class="page-heading">
                    <div>
                        <h1 id="overview-title">Your website, at a glance.</h1>
                        <p class="page-description">Keep your university community informed, connected and up to date.
                        </p>
                    </div><a class="button button-primary" href="{{ route('admin.posts.create') }}"><svg
                            class="icon" aria-hidden="true">
                            <use href="#icon-plus" />
                        </svg>Create a post</a>
                </div>
                <div class="welcome-panel">
                    <div><span class="welcome-kicker">A little update makes a big difference</span>
                        <h2>What is happening at Mukuba?</h2>
                        <p>Share the latest news, announce an event or help students find their home on campus.</p>
                        <a class="button button-gold" href="{{ route('admin.posts.create', ['category' => 'event']) }}">Add an event <svg
                                class="icon" aria-hidden="true">
                                <use href="#icon-arrow" />
                            </svg></a>
                    </div>
                    
                </div>
                <div class="stat-grid" aria-label="Content overview">
                    @foreach (['news' => ['News posts', 'news'], 'announcements' => ['Announcements', 'news'], 'events' => ['Events', 'calendar'], 'drafts' => ['Draft posts', 'book']] as $key => [$label, $icon])
                        <article class="stat-card">
                            <div class="stat-top"><span>{{ $label }}</span><svg class="icon"
                                    aria-hidden="true">
                                    <use href="#icon-{{ $icon }}" />
                                </svg></div><strong
                                data-stat="{{ $key }}">{{ $key === 'drafts' ? \App\Models\Posts::where('status', 'draft')->count() : ($key === 'announcements' ? \App\Models\Announcement::count() : \App\Models\Posts::where('category', ['events' => 'event'][$key] ?? $key)->count()) }}</strong><small>In your content workspace</small>
                        </article>
                    @endforeach
                </div>
                <div class="overview-columns">
                    <section class="admin-panel">
                        <div class="panel-heading">
                            <div>
                                <h2>Recent content</h2>
                                <p>Your latest posts and updates</p>
                            </div><a class="text-button" href="{{ route('admin.posts.index') }}">Manage posts
                                &#8594;</a>
                        </div>
                        <div id="recent-content" class="recent-content" data-server-recent>
                            @forelse (\App\Models\Posts::latest()->take(4)->get() as $post)
                                <a class="recent-item" href="{{ route('admin.posts.show', $post) }}"><span class="recent-icon"><svg class="icon"><use href="#icon-news" /></svg></span><span class="recent-item-text"><strong>{{ $post->title }}</strong><small>{{ ucfirst($post->category) }} · {{ $post->updated_at->format('M j, Y') }}</small></span></a>
                            @empty
                                <p class="page-description">No content yet. Create your first post to get started.</p>
                            @endforelse
                        </div>
                    </section>
                    <section class="admin-panel">
                        <div class="panel-heading">
                            <div>
                                <h2>Make something new</h2>
                                <p>Choose where to start</p>
                            </div>
                        </div>
                        <div class="quick-actions">
                            @foreach (['news' => ['Post university news', 'Updates, stories and achievements', 'news'], 'event' => ['Announce an event', 'Dates, venues and what to expect', 'calendar'], 'announcement' => ['Create an announcement', 'Important notices for students and staff', 'news']] as $key => [$label, $description, $icon])
                                <a class="quick-action" href="{{ $key === 'announcement' ? route('admin.announcements.create') : route('admin.posts.create', ['category' => $key]) }}"><span
                                        class="quick-icon"><svg class="icon" aria-hidden="true">
                                            <use href="#icon-{{ $icon }}" />
                                        </svg></span><span><strong>{{ $label }}</strong><small>{{ $description }}</small></span><span
                                    aria-hidden="true">&#8594;</span></a>
                            @endforeach
                        </div>
                    </section>
                </div>
               
            </section>
            @elseif ($currentSection === 'calendar')
            <section aria-labelledby="calendar-title" class="calendar-admin-page">
                <div class="page-heading">
                    <div>
                        <p class="eyebrow">Institution schedule</p>
                        <h1 id="calendar-title" tabindex="-1">Academic Calendar</h1>
                        <p class="page-description">Add key academic dates and activities for the university community.</p>
                    </div>
                </div>
                <div class="calendar-admin-grid">
                    <form class="admin-panel calendar-form" id="calendar-form">
                        <h2>Add a calendar entry</h2>
                        <p class="calendar-form-intro">Enter an important date, deadline, or academic activity.</p>
                        <label class="form-field"><span>Activity title <b>*</b></span><input name="title" required maxlength="140" placeholder="e.g. Semester one begins"></label>
                        <div class="form-grid">
                            <label class="form-field"><span>Activity type</span><select name="category"><option>Academic dates</option><option>Registration</option><option>Examinations</option><option>University event</option><option>Holiday / closure</option></select></label>
                            <label class="form-field"><span>Start date <b>*</b></span><input name="startDate" type="date" required></label>
                        </div>
                        <div class="form-grid">
                            <label class="form-field"><span>End date</span><input name="endDate" type="date"></label>
                            <label class="form-field"><span>Venue (optional)</span><input name="venue" maxlength="140" placeholder="e.g. Main campus"></label>
                        </div>
                        <label class="form-field"><span>Additional details</span><textarea name="description" rows="4" maxlength="1200" placeholder="Add any information students and staff need"></textarea></label>
                        <button class="button button-primary" type="submit">Add to calendar</button>
                        <p class="calendar-preview-note">This page is a front-end preview. Entries are saved in this browser only.</p>
                        <p class="calendar-form-error" id="calendar-form-error" role="alert" hidden></p>
                    </form>
                    <section class="admin-panel calendar-list-panel" aria-labelledby="calendar-entries-title">
                        <div class="panel-heading"><div><h2 id="calendar-entries-title">Calendar entries</h2><p id="calendar-entry-count">0 dates added</p></div></div>
                        <div id="calendar-entries" class="calendar-entry-list" aria-live="polite"></div>
                    </section>
                </div>
            </section>
            @elseif ($currentSection === 'posts')
                @include('admin.posts.dashboard-list')
            @elseif ($currentSection === 'hostels')
                @if (!empty($hostelForm))
                    @include('admin.hostels.form')
                @else
                    @include('admin.hostels.list')
                @endif
            @elseif ($currentSection === 'profiles')
                @if (!empty($profileFormView))
                    @include($profileFormView)
                @else
                    @include('admin.profiles.list')
                @endif
            @elseif ($currentSection === 'announcements')
                @if (!empty($announcementForm))
                    @include('admin.announcements.form')
                @else
                    @include('admin.announcements.dashboard-list')
                @endif
            @else
            @php
                $categoryFilter = ['news' => 'news', 'events' => 'event'][$currentSection] ?? null;
                $sectionPosts = $categoryFilter ? \App\Models\Posts::with('images')->where('category', $categoryFilter)->latest()->get() : collect();
                $publishedCount = $sectionPosts->where('status', 'published')->count();
                $draftCount = $sectionPosts->where('status', 'draft')->count();
                $archivedCount = $sectionPosts->where('status', 'archived')->count();
            @endphp
            <section id="content-view" aria-labelledby="content-title">
                @if (session('status'))<p class="success-box" role="status">{{ session('status') }}</p>@endif
                <div class="page-heading">
                    <div>
                        <p class="eyebrow" id="content-eyebrow">Website content</p>
                        <h1 id="content-title" tabindex="-1">News</h1>
                        <p class="page-description" id="content-description"></p>
                    </div><a class="button button-primary" id="add-content" href="{{ $currentSection === 'announcements' ? route('admin.announcements.create') : route('admin.posts.create', ['category' => ['news' => 'news', 'events' => 'event'][$currentSection] ?? 'news']) }}"><svg class="icon"
                            aria-hidden="true">
                            <use href="#icon-plus" />
                        </svg><span id="add-label">Add {{ $currentSection === 'events' ? 'event' : ($currentSection === 'announcements' ? 'announcement' : 'news') }}</span></a>
                </div>
                <div class="content-tabs" aria-label="Content status"><button type="button" class="content-tab active" data-status="all" aria-pressed="true">All content <span id="total-count">{{ $sectionPosts->count() }}</span></button><button type="button" class="content-tab" data-status="published" aria-pressed="false">Published <span id="published-count">{{ $publishedCount }}</span></button><button type="button" class="content-tab" data-status="draft" aria-pressed="false">Drafts <span id="draft-count">{{ $draftCount }}</span></button><button type="button" class="content-tab" data-status="archived" aria-pressed="false">Archived <span id="archived-count">{{ $archivedCount }}</span></button>
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
                            <tbody id="content-rows">
                                @forelse ($sectionPosts as $post)
                                    <tr data-post-row data-title="{{ mb_strtolower($post->title) }}" data-category="{{ $post->category }}" data-status="{{ $post->status }}" data-date="{{ $post->updated_at->timestamp }}">
                                        <td><div class="content-cell">
                                            @if ($post->images->first())<img class="content-thumbnail" src="{{ Storage::disk('public')->url($post->images->first()->path) }}" alt="">@else<span class="content-thumbnail recent-icon"><svg class="icon"><use href="#icon-{{ $currentSection === 'events' ? 'calendar' : 'news' }}"/></svg></span>@endif
                                            <div><strong>{{ $post->title }}</strong><p>{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 150) }}</p></div>
                                        </div></td>
                                        <td>{{ ucfirst($post->category) }}<small class="content-detail">{{ $post->images->count() }} image(s)</small></td>
                                        <td><span class="status-badge {{ $post->status === 'draft' ? 'draft' : '' }}">{{ ucfirst($post->status) }}</span></td>
                                        <td>{{ $post->updated_at->format('M j, Y') }}</td>
                                        <td><a class="row-button" href="{{ route('admin.posts.edit', $post) }}">Edit</a><form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display:inline" data-confirm-delete="Delete this post?">@csrf @method('DELETE')<button class="row-button delete" type="submit">Delete</button></form></td>
                                    </tr>
                                @empty
                                    <tr data-empty-row><td class="empty-state" colspan="5"><strong>A fresh start</strong><p>Add your first {{ $currentSection === 'events' ? 'event' : ($currentSection === 'announcements' ? 'announcement' : 'news post') }} to get started.</p><a class="button button-secondary" href="{{ route('admin.posts.create', ['category' => $categoryFilter ?? 'news']) }}">Add post</a></td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="table-footer"><span id="results-count" aria-live="polite">Showing {{ $sectionPosts->count() }} of {{ $sectionPosts->count() }} items</span><span>Posts saved to the website database</span></div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('status'))
        <script>if (window.Swal) Swal.fire({ icon: 'success', title: @json(session('status')), timer: 2600, showConfirmButton: false });</script>
    @endif
    <script>
        document.querySelectorAll('form[data-confirm-delete]').forEach(form => {
            form.addEventListener('submit', event => {
                if (form.dataset.confirmed === 'true') return;
                event.preventDefault();
                Swal.fire({ title: 'Delete this post?', text: form.dataset.confirmDelete, icon: 'warning', showCancelButton: true, confirmButtonText: 'Delete', cancelButtonText: 'Cancel', confirmButtonColor: '#b42318' }).then(result => {
                    if (result.isConfirmed) { form.dataset.confirmed = 'true'; form.requestSubmit(); }
                });
            });
        });
    </script>
    <script id="admin-config" type="application/json">{!! json_encode(['imageBase' => asset('images'), 'profileName' => $profileName, 'section' => $currentSection], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
    @if ($currentSection === 'calendar')
    <script>
        (() => {
            const storageKey = 'mukuba.academic-calendar.preview.v1';
            const form = document.querySelector('#calendar-form');
            const list = document.querySelector('#calendar-entries');
            const count = document.querySelector('#calendar-entry-count');
            const error = document.querySelector('#calendar-form-error');
            let entries = [];
            try {
                const saved = JSON.parse(localStorage.getItem(storageKey) || '[]');
                if (Array.isArray(saved)) entries = saved.filter(entry => entry && typeof entry.id === 'string' && typeof entry.title === 'string');
            } catch { error.textContent = 'Saved entries could not be read from this browser.'; error.hidden = false; }

            const formatDate = value => new Intl.DateTimeFormat('en-ZM', { day: 'numeric', month: 'short', year: 'numeric', timeZone: 'Africa/Lusaka' }).format(new Date(value + 'T12:00:00'));
            const render = () => {
                list.replaceChildren();
                entries.sort((a, b) => a.startDate.localeCompare(b.startDate));
                count.textContent = entries.length + (entries.length === 1 ? ' date added' : ' dates added');
                if (!entries.length) {
                    const empty = document.createElement('p'); empty.className = 'calendar-empty'; empty.textContent = 'Your calendar entries will appear here.'; list.append(empty); return;
                }
                entries.forEach(entry => {
                    const item = document.createElement('article'); item.className = 'calendar-entry';
                    const date = document.createElement('time'); date.className = 'calendar-entry-date'; date.dateTime = entry.startDate;
                    date.textContent = entry.endDate && entry.endDate !== entry.startDate ? formatDate(entry.startDate) + ' – ' + formatDate(entry.endDate) : formatDate(entry.startDate);
                    const details = document.createElement('div'); details.className = 'calendar-entry-details';
                    const title = document.createElement('h3'); title.textContent = entry.title;
                    const meta = document.createElement('p'); meta.textContent = entry.category + (entry.venue ? ' · ' + entry.venue : '');
                    details.append(title, meta);
                    if (entry.description) { const description = document.createElement('p'); description.className = 'calendar-entry-description'; description.textContent = entry.description; details.append(description); }
                    const remove = document.createElement('button'); remove.className = 'row-button delete'; remove.type = 'button'; remove.textContent = 'Remove'; remove.setAttribute('aria-label', 'Remove ' + entry.title);
                    remove.addEventListener('click', () => { entries = entries.filter(existing => existing.id !== entry.id); save(); });
                    item.append(date, details, remove); list.append(item);
                });
            };
            const save = () => {
                try { localStorage.setItem(storageKey, JSON.stringify(entries)); error.hidden = true; render(); }
                catch { error.textContent = 'This browser could not save the entry. Check available browser storage and try again.'; error.hidden = false; }
            };
            form.addEventListener('submit', event => {
                event.preventDefault(); error.hidden = true;
                const data = Object.fromEntries(new FormData(form));
                if (data.endDate && data.endDate < data.startDate) { error.textContent = 'The end date must be on or after the start date.'; error.hidden = false; return; }
                entries.push({ ...data, id: crypto.randomUUID() });
                save(); form.reset();
            });
            render();
        })();
    </script>
    @endif
    @if ($currentSection === 'overview') <script type="module" src="{{ Vite::asset('resources/js/admin.js') }}"></script> @endif
            @if (in_array($currentSection, ['news', 'events'], true))
    <script>
        const postRows=[...document.querySelectorAll('[data-post-row]')];
        const searchInput=document.querySelector('#content-search');
        const sortSelect=document.querySelector('#content-sort');
        const countLabel=document.querySelector('#results-count');
        const statusTabs=[...document.querySelectorAll('[data-status]')];
        let activeStatus='all';
        function filterPosts(){
            const query=searchInput.value.trim().toLowerCase();
            const matching=postRows.filter(row=>{
                const matchesQuery=row.textContent.toLowerCase().includes(query);
                const matchesStatus=activeStatus==='all'||row.dataset.status===activeStatus;
                row.hidden=!(matchesQuery&&matchesStatus);
                return !row.hidden;
            });
            const tbody=document.querySelector('#content-rows');
            const empty=tbody.querySelector('[data-empty-row]');
            if(empty) empty.hidden=postRows.length>0;
            if(sortSelect.value==='title') matching.sort((a,b)=>a.dataset.title.localeCompare(b.dataset.title));
            else matching.sort((a,b)=>Number(b.dataset.date)-Number(a.dataset.date));
            matching.forEach(row=>tbody.append(row));
            countLabel.textContent='Showing '+matching.length+' of '+postRows.length+' items';
        }
        searchInput.addEventListener('input',filterPosts);
        sortSelect.addEventListener('change',filterPosts);
        statusTabs.forEach(tab=>tab.addEventListener('click',()=>{
            activeStatus=tab.dataset.status;
            statusTabs.forEach(item=>{const selected=item===tab;item.classList.toggle('active',selected);item.setAttribute('aria-pressed',String(selected));});
            filterPosts();
        }));
        filterPosts();
    </script>
    @endif
</body>

</html>
