<section aria-labelledby="profiles-title">
    @if (session('status'))<p class="success-box" role="status">{{ session('status') }}</p>@endif
    <div class="page-heading"><div><p class="eyebrow">University management</p><h1 id="profiles-title" tabindex="-1">Management profiles</h1><p class="page-description">Manage the staff profiles shown on the public management page.</p></div><a class="button button-primary" href="{{ route('admin.profiles.create') }}">+ Add profile</a></div>
    <div class="admin-panel content-panel"><div class="content-toolbar"><label class="search-box"><input type="search" id="profile-search" placeholder="Search profiles" aria-label="Search profiles"></label><span>{{ $profiles->total() }} profile(s)</span></div>
        <div class="table-container"><table class="content-table"><thead><tr><th scope="col">Staff member</th><th scope="col">Management role</th><th scope="col">Updated</th><th scope="col"><span class="sr-only">Actions</span></th></tr></thead><tbody>
            @forelse ($profiles as $profile)
                <tr data-profile-row data-name="{{ mb_strtolower($profile->full_name . ' ' . $profile->management_role) }}"><td><div class="content-cell"><img class="content-thumbnail" src="{{ Storage::disk('public')->url($profile->profile_pic) }}" alt=""><div><strong>{{ $profile->full_name }}</strong><p>{{ \Illuminate\Support\Str::limit(strip_tags($profile->biography), 100) }}</p></div></div></td><td>{{ $profile->management_role }}</td><td>{{ $profile->updated_at->format('M j, Y') }}</td><td><a class="row-button" href="{{ route('admin.profiles.edit', $profile) }}">Edit</a><form method="POST" action="{{ route('admin.profiles.destroy', $profile) }}" style="display:inline" data-confirm-delete="Delete this staff profile and its photo?">@csrf @method('DELETE')<button class="row-button delete" type="submit">Delete</button></form></td></tr>
            @empty
                <tr><td class="empty-state" colspan="4"><strong>No profiles added yet</strong><p>Add a management profile to display it on the public page.</p></td></tr>
            @endforelse
        </tbody></table></div><div class="table-footer"><span>Profiles are ordered according to the management hierarchy.</span>{{ $profiles->links() }}</div>
    </div>
</section>
<script>document.getElementById('profile-search')?.addEventListener('input', event => { const query = event.target.value.trim().toLowerCase(); document.querySelectorAll('[data-profile-row]').forEach(row => { row.hidden = !row.dataset.name.includes(query); }); }); document.querySelectorAll('form[data-confirm-delete]').forEach(form => form.addEventListener('submit', event => { if (!confirm(form.dataset.confirmDelete)) event.preventDefault(); }));</script>
