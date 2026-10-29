<section aria-labelledby="profile-form-title">
    <div class="page-heading">
        <div><p class="eyebrow">University management</p><h1 id="profile-form-title">Edit profile</h1><p class="page-description">Update this staff member's photo, role and biography.</p></div>
        <a class="button button-secondary" href="{{ route('admin.profiles.index') }}">Back to profiles</a>
    </div>
    @if ($errors->any())<div class="success-box" role="alert"><strong>Please review the highlighted fields and try again.</strong><ul style="margin:8px 0 0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    <form class="admin-panel profile-admin-form" method="POST" action="{{ route('admin.profiles.update', $profile) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <label class="form-field"><span>Title <b>*</b></span><input name="title" required maxlength="20" value="{{ old('title', $profile->title) }}" placeholder="Professor, Dr, Mr">@error('title')<small role="alert">{{ $message }}</small>@enderror</label>
            <label class="form-field"><span>First name <b>*</b></span><input name="first_name" required maxlength="30" value="{{ old('first_name', $profile->first_name) }}">@error('first_name')<small role="alert">{{ $message }}</small>@enderror</label>
            <label class="form-field"><span>Middle name</span><input name="middle_name" maxlength="30" value="{{ old('middle_name', $profile->middle_name) }}">@error('middle_name')<small role="alert">{{ $message }}</small>@enderror</label>
            <label class="form-field"><span>Last name <b>*</b></span><input name="last_name" required maxlength="30" value="{{ old('last_name', $profile->last_name) }}">@error('last_name')<small role="alert">{{ $message }}</small>@enderror</label>
        </div>
        <label class="form-field"><span>Management role <b>*</b></span><select name="management_role" required><option value="">Choose a management role</option>@foreach (\App\Http\Controllers\ProfileController::MANAGEMENT_ROLES as $role)<option value="{{ $role }}" @selected(old('management_role', $profile->management_role) === $role)>{{ $role }}</option>@endforeach</select><small>Each role has one place in the established hierarchy.</small>@error('management_role')<small role="alert">{{ $message }}</small>@enderror</label>
        <label class="form-field"><span>Replace profile picture</span><input type="file" name="profile_pic" accept="image/jpeg,image/png,image/webp"><small>Leave empty to keep the current picture.</small>@error('profile_pic')<small role="alert">{{ $message }}</small>@enderror</label>
        <img src="{{ Storage::disk('public')->url($profile->profile_pic) }}" alt="Current profile picture" style="width:140px;height:140px;object-fit:cover;border-radius:8px;margin-bottom:18px">
        <div class="form-field"><label for="profile-biography"><span>Biography <b>*</b></span></label><textarea id="profile-biography" name="biography" rows="12">{{ old('biography', $profile->biography) }}</textarea>@error('biography')<small role="alert">{{ $message }}</small>@enderror</div>
        <div class="profile-form-actions"><button class="button button-primary" type="submit">Save changes</button><a class="button button-secondary" href="{{ route('admin.profiles.index') }}">Cancel</a></div>
    </form>
</section>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js" referrerpolicy="no-referrer"></script>
<script>
    (() => {
        const textarea = document.querySelector('#profile-biography');
        const form = textarea?.form;
        if (!textarea || !form || !window.ClassicEditor) return;

        ClassicEditor.create(textarea, {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo']
        }).then(editor => {
            form.addEventListener('submit', () => {
                textarea.value = editor.getData();
            });
        }).catch(error => console.error('Biography editor could not be initialized.', error));
    })();
</script>
<style>
    .profile-admin-form{overflow:visible;padding:24px}
    .profile-form-actions{position:relative;z-index:5;display:flex;gap:12px;padding-top:12px}
    .profile-form-actions button,.profile-form-actions a{pointer-events:auto}
</style>
