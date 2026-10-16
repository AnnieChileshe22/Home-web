<section aria-labelledby="announcements-title">
    @if (session('status'))<p class="success-box" role="status">{{ session('status') }}</p>@endif
    <div class="page-heading">
        <div><p class="eyebrow">Website content</p><h1 id="announcements-title">Announcements</h1><p class="page-description">Manage public notices and their PDF or image attachments.</p></div>
        <a class="button button-primary" href="{{ route('admin.announcements.create') }}"><svg class="icon" aria-hidden="true"><use href="#icon-plus"/></svg>Create announcement</a>
    </div>
    <div class="admin-panel content-panel">
        <div class="table-container"><table class="content-table"><thead><tr><th scope="col">Announcement</th><th scope="col">Attachments</th><th scope="col">Status</th><th scope="col">Updated</th><th scope="col"><span class="sr-only">Actions</span></th></tr></thead><tbody>
            @forelse ($announcements as $item)
                <tr><td><div class="content-cell">@if ($item->attachments->first() && str_starts_with($item->attachments->first()->mime_type, 'image/'))<img class="content-thumbnail" src="{{ Storage::disk('public')->url($item->attachments->first()->path) }}" alt="">@else<span class="content-thumbnail recent-icon"><svg class="icon"><use href="#icon-news"/></svg></span>@endif<div><strong>{{ $item->title }}</strong><p>{{ \Illuminate\Support\Str::limit(strip_tags($item->body), 100) }}</p></div></div></td>
                    <td>{{ $item->attachments->count() }} file(s)</td><td>{{ ucfirst($item->status) }}</td><td>{{ $item->updated_at->format('M j, Y') }}</td><td><a class="row-button" href="{{ route('admin.announcements.edit', $item) }}">Edit</a><form method="POST" action="{{ route('admin.announcements.destroy', $item) }}" style="display:inline" data-confirm-delete="Delete this announcement and its files?">@csrf @method('DELETE')<button class="row-button delete" type="submit">Delete</button></form></td></tr>
            @empty <tr><td class="empty-state" colspan="5"><strong>No announcements yet</strong><p>Create a notice for all website visitors.</p><a class="button button-secondary" href="{{ route('admin.announcements.create') }}">Create announcement</a></td></tr>@endforelse
        </tbody></table></div>
        <div style="padding:16px 22px">{{ $announcements->links() }}</div>
    </div>
</section>
