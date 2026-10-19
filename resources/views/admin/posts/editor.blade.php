@php
    $profile = auth()->user();
    $profileName = $profile?->name ?? 'Site Administrator';
    $profileInitials = collect(explode(' ', $profileName))->filter()->take(2)->map(fn ($part) => mb_substr($part, 0, 1))->implode('');
    $category = old('category', $post->category ?? request('category', 'news'));
    $status = old('status', $post->status ?? 'draft');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#064b2a">
    <script>(()=>{let t;try{t=localStorage.getItem("mukuba-theme")}catch{}document.documentElement.dataset.theme=t==="dark"||(t!=="light"&&matchMedia("(prefers-color-scheme: dark)").matches)?"dark":"light"})()</script><title>{{ $editing ? 'Edit post' : 'Create post' }} | Mukuba University</title>
    @vite(['resources/css/admin.css', 'resources/js/admin-theme.js'])
    <style>
        .post-editor{max-width:1180px;margin:0 auto;padding:34px 0 60px}
        .editor-breadcrumb{display:flex;align-items:center;gap:9px;margin-bottom:22px;color:#718078;font-size:12px}
        .editor-breadcrumb a{color:#087b42;font-weight:600}
        .editor-titlebar{display:flex;justify-content:space-between;align-items:flex-end;gap:20px;margin-bottom:26px}
        .editor-titlebar h1{margin:0;color:#173429;font:400 clamp(30px,4vw,40px)/1.15 Georgia,serif}
        .editor-titlebar p{margin:8px 0 0;color:#718078;font-size:13px}
        .editor-layout{display:grid;grid-template-columns:minmax(0,1fr) 300px;gap:22px;align-items:start}
        .editor-card,.editor-sidecard{border:1px solid #e2e8e2;border-radius:10px;background:#fff;box-shadow:0 5px 20px #17342908}
        .editor-card{padding:26px}
        .editor-card h2,.editor-sidecard h2{margin:0 0 20px;color:#173429;font:600 15px/1.3 Inter,system-ui,sans-serif}
        .post-field{display:grid;gap:8px;margin-bottom:23px}
        .post-field>span,.post-side-label{color:#33483d;font-size:12px;font-weight:650}
        .post-field input,.post-field select{width:100%;min-height:46px;padding:11px 13px;border:1px solid #dce4dc;border-radius:6px;background:#fff;color:#173429;font:inherit;font-size:13px}
        .post-field input:focus,.post-field select:focus{outline:2px solid #b5d9c0;border-color:#087b42}
        .post-field small,.side-hint{color:#718078;font-size:11px;line-height:1.55}
        .post-field-title input{font-size:17px;font-weight:550}
        .editor-label-row{display:flex;align-items:center;justify-content:space-between;gap:12px}
        .editor-label-row small{color:#829087;font-size:10px}
        .ck.ck-editor{width:100%}.ck.ck-toolbar{border-color:#dce4dc!important;border-radius:6px 6px 0 0!important;background:#f8faf7!important}
        .ck.ck-editor__main>.ck-editor__editable{min-height:340px;border-color:#dce4dc!important;border-radius:0 0 6px 6px!important;font-size:14px;line-height:1.7}
        .ck.ck-editor__main>.ck-editor__editable:focus{border-color:#087b42!important;box-shadow:0 0 0 1px #087b42!important}
        .editor-side{display:grid;gap:16px}.editor-sidecard{padding:21px}
        .category-options{display:grid;gap:9px}.category-option{display:flex;align-items:center;gap:10px;padding:11px 12px;border:1px solid #e2e8e2;border-radius:6px;color:#46594e;font-size:12px;cursor:pointer}
        .category-option:has(input:checked){border-color:#68a77d;background:#f2f8f2;color:#075b30;font-weight:650}.category-option input{accent-color:#087b42}
        .upload-zone{display:grid;place-items:center;gap:7px;padding:23px 14px;border:1px dashed #b9cbbd;border-radius:7px;background:#f8faf7;text-align:center;cursor:pointer}
        .upload-zone:hover{border-color:#087b42;background:#f2f8f2}.upload-symbol{display:grid;place-items:center;width:38px;height:38px;border-radius:50%;background:#e8f1e8;color:#087b42;font-size:22px}
        .upload-zone strong{color:#245038;font-size:12px}.upload-zone small{color:#718078;font-size:10px}.upload-zone input{width:100%;font-size:11px}
        .image-preview-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:9px;margin-top:12px}.image-preview{position:relative;overflow:hidden;border-radius:6px;background:#edf2ed;aspect-ratio:1.3}.image-preview img{width:100%;height:100%;object-fit:cover}.image-preview button{position:absolute;top:5px;right:5px;width:25px;height:25px;border:0;border-radius:50%;background:#fff;color:#a33c32;cursor:pointer;box-shadow:0 1px 5px #0002}
        .existing-image{position:relative}.existing-image input{position:absolute;top:8px;left:8px;accent-color:#b33b31}.existing-image:has(input:checked){outline:2px solid #b33b31;outline-offset:1px}
        .error-box{margin-bottom:20px;padding:13px 15px;border:1px solid #efd0ca;border-radius:6px;background:#fff6f3;color:#9d3f33;font-size:12px}.error-box ul{margin:0;padding-left:18px}
        .success-box{margin-bottom:20px;padding:13px 15px;border:1px solid #c8e2ce;border-radius:6px;background:#f0f8f1;color:#245b32;font-size:12px}
        .client-error{margin-bottom:18px;padding:13px 15px;border:1px solid #efd0ca;border-radius:6px;background:#fff6f3;color:#9d3f33;font-size:12px}
        .editor-actions{display:flex;justify-content:flex-end;gap:10px;padding-top:20px;border-top:1px solid #edf1ed}.editor-actions .button{cursor:pointer}
        @media(max-width:900px){.editor-layout{grid-template-columns:minmax(0,1fr) 260px}.post-editor{padding-top:25px}}
        @media(max-width:700px){.editor-layout{grid-template-columns:1fr}.editor-side{grid-template-columns:1fr 1fr}.editor-titlebar{align-items:flex-start}.editor-card{padding:19px}.editor-sidecard{padding:17px}}
        @media(max-width:520px){.editor-side{grid-template-columns:1fr}.editor-titlebar{display:block}.editor-titlebar>.button{margin-top:16px}}
    </style>
</head>
<body class="content-admin">
    <svg class="icon-library" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <symbol id="icon-dashboard" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></symbol>
        <symbol id="icon-news" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h10M7 12h4M7 16h10M15 12h2"/></symbol>
        <symbol id="icon-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 3v4M17 3v4M3 10h18"/></symbol>
        <symbol id="icon-home" viewBox="0 0 24 24"><path d="m3 10 9-7 9 7M5 9v12h14V9"/></symbol>
        <symbol id="icon-book" viewBox="0 0 24 24"><path d="M12 5v16M12 5C9 3 6 3 3 4v15c3-1 6-1 9 2 3-3 6-3 9-2V4c-3-1-6-1-9 1Z"/></symbol>
        <symbol id="icon-layers" viewBox="0 0 24 24"><path d="m12 3 10 5-10 5L2 8l10-5Zm-10 9 10 5 10-5M2 16l10 5 10-5"/></symbol>
        <symbol id="icon-arrow" viewBox="0 0 24 24"><path d="M7 17 17 7M7 7h10v10"/></symbol>
        <symbol id="icon-menu" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></symbol>
        <symbol id="icon-close" viewBox="0 0 24 24"><path d="m6 6 12 12M6 18 18 6"/></symbol>
    </svg>
    <a class="skip-link" href="#admin-main">Skip to content</a>
    <aside class="admin-sidebar" id="admin-sidebar" aria-label="Website administration">
        <a class="admin-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="Mukuba University crest"><span><strong>Mukuba University</strong><small>Website administration</small></span></a>
        <button class="icon-button sidebar-close" type="button" data-close-sidebar aria-label="Close navigation"><svg class="icon"><use href="#icon-close"/></svg></button>
        <p class="nav-label">Your workspace</p>
        <nav class="admin-navigation" aria-label="Administration">
            <a class="nav-item" href="{{ route('admin.index') }}"><svg class="icon"><use href="#icon-dashboard"/></svg><span>Overview</span></a>
            <a class="nav-item active" href="{{ route('admin.posts.index') }}" aria-current="page"><svg class="icon"><use href="#icon-news"/></svg><span>Posts</span><span class="nav-count">{{ \App\Models\Posts::count() }}</span></a>
            <a class="nav-item" href="{{ route('admin.hostels.index') }}"><svg class="icon"><use href="#icon-home"/></svg><span>Hostels</span></a>
            <a class="nav-item" href="{{ route('admin.section', 'calendar') }}"><svg class="icon"><use href="#icon-calendar"/></svg><span>Academic Calendar</span></a>
        </nav>
        <div class="sidebar-footer"><span class="sidebar-status"><i></i> Content workspace</span><p>Education. Freedom.<br>Responsibility.</p><a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer">View university website <svg class="icon"><use href="#icon-arrow"/></svg></a></div>
    </aside>
    <button class="sidebar-scrim" id="sidebar-scrim" type="button" aria-label="Close navigation" hidden></button>
    <div class="admin-workspace">
        <header class="admin-header">
            <div class="header-location"><button class="icon-button mobile-menu" id="sidebar-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="admin-sidebar"><svg class="icon"><use href="#icon-menu"/></svg></button><span class="header-label">Website <span class="breadcrumb-divider">/</span> <strong>{{ $editing ? 'Edit post' : 'Create post' }}</strong></span></div>
            <div class="header-actions"><button class="admin-theme-toggle" type="button" data-admin-theme-toggle aria-pressed="false" aria-label="Switch to dark mode" title="Switch color theme"><svg class="theme-icon theme-moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 13A8.5 8.5 0 0 1 11 3.5 8.5 8.5 0 1 0 20.5 13Z"/></svg><svg class="theme-icon theme-sun" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.5 1.5m11 11L19 19M5 19l1.5-1.5m11-11L19 5"/></svg><span class="sr-only">Toggle color theme</span></button><a class="website-button" href="{{ route('admin.posts.index') }}">All posts</a><details class="profile-menu"><summary aria-label="Profile for {{ $profileName }}"><span class="profile-avatar">{{ mb_strtoupper($profileInitials) }}</span><span class="profile-text"><strong>{{ $profileName }}</strong><small>Website administrator</small></span><span class="profile-chevron">⌄</span></summary><div class="profile-dropdown"><strong>{{ $profileName }}</strong><p>{{ $profile?->email }}</p><form method="POST" action="{{ route('logout') }}">@csrf<button class="text-button" type="submit">Sign out</button></form></div></details></div>
        </header>
        <main class="post-editor">
            <nav class="editor-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('admin.index') }}">Dashboard</a><span>/</span><a href="{{ route('admin.posts.index') }}">Posts</a><span>/</span><span>{{ $editing ? 'Edit post' : 'New post' }}</span></nav>
            <div class="editor-titlebar"><div><h1>{{ $editing ? 'Edit post' : 'Create a post' }}</h1><p>Prepare a clear update for the Mukuba University community.</p></div><a class="button button-secondary" href="{{ route('admin.posts.index') }}">Cancel</a></div>
            @if (session('status'))<div class="success-box" role="status">{{ session('status') }}</div>@endif
            <form method="POST" action="{{ $editing ? route('admin.posts.update', $post) : route('admin.posts.store') }}" enctype="multipart/form-data" id="post-form">
                @if ($editing) @method('PUT') @endif
                <div class="editor-layout">
                    <section class="editor-card" aria-labelledby="post-content-heading">
                        <h2 id="post-content-heading">Post content</h2>
                        @csrf
                        @if ($errors->any())<div class="error-box" role="alert"><strong>The post could not be saved. Please fix these issues:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
                        <div class="client-error" id="client-error" role="alert" hidden></div>
                        <label class="post-field post-field-title"><span>Title</span><input name="title" value="{{ old('title', $post->title ?? '') }}" required maxlength="100" placeholder="Write a clear, descriptive title" autofocus><small>Keep it concise and easy to scan.</small></label>
                        <label class="post-field"><span class="editor-label-row"><span>Body</span><small>Use the toolbar to format your post</small></span><textarea id="post-body" name="body">{{ old('body', $post->body ?? '') }}</textarea><small>A post body is required.</small></label>
                        <div class="editor-actions"><a class="button button-secondary" href="{{ route('admin.posts.index') }}">Cancel</a><button class="button button-primary" type="submit">{{ $editing ? 'Save changes' : 'Publish post' }}</button></div>
                    </section>
                    <aside class="editor-side" aria-label="Post settings">
                        <section class="editor-sidecard"><h2>Post status</h2><label class="post-field"><span>Status</span><select name="status" required>@foreach (\App\Models\Posts::STATUSES as $option)<option value="{{ $option }}" @selected($status === $option)>{{ ucfirst($option) }}</option>@endforeach</select></label><p class="side-hint">Only published posts are visible on the public website.</p></section>
                        <section class="editor-sidecard"><h2>Post category</h2><div class="category-options">
                            @foreach (\App\Models\Posts::CATEGORIES as $option)<label class="category-option"><input type="radio" name="category" value="{{ $option }}" @checked($category === $option) required><span>{{ ucfirst($option) }}</span></label>@endforeach
                        </div><p class="side-hint">Choose the section where readers will find this post.</p></section>
                        <section class="editor-sidecard"><h2>Images</h2><label class="upload-zone"><span class="upload-symbol" aria-hidden="true">＋</span><strong>Choose images</strong><small>JPG, PNG or WebP · up to 15 MB each</small><input id="post-images" type="file" name="images[]" accept="image/jpeg,image/png,image/webp" multiple></label><p class="side-hint">You can attach up to 10 images at a time.</p>
                            <div class="image-preview-grid" id="new-image-previews" aria-live="polite"></div>
                            @if ($editing && $post->images->isNotEmpty())<p class="post-side-label" style="margin:18px 0 9px">Current images</p><div class="image-preview-grid">@foreach ($post->images as $image)<label class="image-preview existing-image"><img src="{{ Storage::disk('public')->url($image->path) }}" alt="{{ $image->alt_text ?: 'Post image' }}"><input type="checkbox" name="remove_images[]" value="{{ $image->id }}" aria-label="Remove image"></label>@endforeach</div><small class="side-hint">Select an image to remove it when you save.</small>@endif
                        </section>
                    </aside>
                </div>
            </form>
        </main>
    </div>
    <script>
        const sidebar = document.querySelector('#admin-sidebar');
        const toggle = document.querySelector('#sidebar-toggle');
        const scrim = document.querySelector('#sidebar-scrim');
        function closeSidebar(){sidebar.classList.remove('open');scrim.hidden=true;toggle.setAttribute('aria-expanded','false');document.body.style.overflow='';}
        toggle.addEventListener('click',()=>{const open=!sidebar.classList.contains('open');sidebar.classList.toggle('open',open);scrim.hidden=!open;toggle.setAttribute('aria-expanded',String(open));document.body.style.overflow=open?'hidden':'';});
        scrim.addEventListener('click',closeSidebar);
        document.querySelector('[data-close-sidebar]').addEventListener('click',closeSidebar);
        window.addEventListener('resize',()=>{if(window.innerWidth>850)closeSidebar();});
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js" referrerpolicy="no-referrer"></script>
    <script>
        const bodyTextarea = document.querySelector('#post-body');
        const postForm = document.querySelector('#post-form');
        const clientError = document.querySelector('#client-error');
        let editorInstance = null;
        let editorReady = false;
        ClassicEditor.create(bodyTextarea, { toolbar: ['heading', '|', 'bold', 'italic', 'link', '|', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo'] })
            .then(editor => {
                editorInstance = editor;
                editorReady = true;
            })
            .catch(error => {
                console.error('CKEditor failed to load; using the text area instead.', error);
                editorReady = true;
            });
        postForm.addEventListener('submit', event => {
            clientError.hidden = true;
            const body = editorInstance ? editorInstance.getData() : bodyTextarea.value;
            bodyTextarea.value = body;
            if (!body.replace(/<[^>]*>/g, '').trim()) {
                event.preventDefault();
                clientError.textContent = 'Please enter the post body before publishing.';
                clientError.hidden = false;
                editorInstance?.editing.view.focus();
                return;
            }
            if (!editorReady) {
                event.preventDefault();
                clientError.textContent = 'The text editor is still loading. Please wait a moment and try again.';
                clientError.hidden = false;
            }
        });
        const picker = document.querySelector('#post-images');
        const previewGrid = document.querySelector('#new-image-previews');
        picker.addEventListener('change', () => {
            previewGrid.replaceChildren();
            clientError.hidden = true;
            const oversized = [...picker.files].filter(file => file.size > 15 * 1024 * 1024);
            if (oversized.length) {
                clientError.textContent = 'Each image must be 15 MB or smaller. Remove oversized image(s): ' + oversized.map(file => file.name).join(', ');
                clientError.hidden = false;
            }
            if (picker.files.length > 10) {
                clientError.textContent = 'Select no more than 10 images per post.';
                clientError.hidden = false;
            }
            [...picker.files].slice(0, 10).forEach(file => {
                if (!file.type.startsWith('image/')) return;
                const tile = document.createElement('div'); tile.className = 'image-preview';
                const image = document.createElement('img'); image.alt = file.name; image.src = URL.createObjectURL(file);
                tile.append(image); previewGrid.append(tile);
            });
        });
    </script>
</body>
</html>
