<section aria-labelledby="announcement-form-title">
    <div class="page-heading"><div><p class="eyebrow"><a href="{{ route('admin.announcements.index') }}">Announcements</a></p><h1 id="announcement-form-title">{{ $announcement->exists ? 'Edit announcement' : 'Create announcement' }}</h1><p class="page-description">Published announcements are visible to all website visitors.</p></div><a class="button button-secondary" href="{{ route('admin.announcements.index') }}">Cancel</a></div>
    <div class="admin-panel" style="padding:24px;max-width:900px">
        @if ($errors->any())<div class="error-box" role="alert"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form method="POST" enctype="multipart/form-data" action="{{ $announcement->exists ? route('admin.announcements.update', $announcement) : route('admin.announcements.store') }}">
            @csrf @if ($announcement->exists) @method('PUT') @endif
            <label class="form-field" style="display:block;margin-bottom:20px"><span>Title</span><input name="title" value="{{ old('title', $announcement->title) }}" maxlength="100" required></label>
            <label class="form-field" style="display:block;margin-bottom:20px"><span>Message (optional when adding files)</span><textarea name="body" rows="8">{{ old('body', $announcement->body) }}</textarea></label>
            <label class="form-field" style="display:block;margin-bottom:20px"><span>Status</span><select name="status">@foreach (\App\Models\Announcement::STATUSES as $status)<option value="{{ $status }}" @selected(old('status', $announcement->status ?: 'draft') === $status)>{{ ucfirst($status) }}</option>@endforeach</select></label>
            <label class="form-field" style="display:block;margin-bottom:20px"><span>Images and PDF files (up to 15 MB each, 10 per upload)</span><input type="file" name="attachments[]" accept="image/jpeg,image/png,image/webp,application/pdf" multiple></label>
            @if ($announcement->attachments?->isNotEmpty())<fieldset style="padding:16px;margin-bottom:20px"><legend>Existing attachments (select any to remove)</legend>@foreach ($announcement->attachments as $attachment)<label style="display:block;margin:8px 0"><input type="checkbox" name="remove_attachments[]" value="{{ $attachment->id }}"> Remove {{ $attachment->original_name }}</label>@endforeach</fieldset>@endif
            <button class="button button-primary" type="submit">{{ $announcement->exists ? 'Save changes' : 'Create announcement' }}</button>
        </form>
    </div>
</section>
