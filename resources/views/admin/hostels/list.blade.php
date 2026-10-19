<section aria-labelledby="hostels-title">
    @if (session('status'))<p class="success-box" role="status">{{ session('status') }}</p>@endif
    <div class="page-heading">
        <div><p class="eyebrow">Student housing</p><h1 id="hostels-title" tabindex="-1">Hostels</h1><p class="page-description">Manage hostel descriptions, features, photos and semester prices.</p></div>
        <a class="button button-primary" href="{{ route('admin.hostels.create') }}">+ Add hostel</a>
    </div>
    <div class="admin-panel content-panel">
        <div class="content-toolbar"><label class="search-box"><input type="search" id="hostel-search" placeholder="Search hostels" aria-label="Search hostels"></label><span>{{ $hostels->total() }} hostel(s)</span></div>
        <div class="table-container"><table class="content-table"><thead><tr><th scope="col">Hostel</th><th scope="col">Type and features</th><th scope="col">Price</th><th scope="col">Updated</th><th scope="col"><span class="sr-only">Actions</span></th></tr></thead><tbody id="hostel-rows">
            @forelse ($hostels as $hostel)
                <tr data-hostel-row data-name="{{ mb_strtolower($hostel->name) }}"><td><div class="content-cell">@if ($hostel->images->first())<img class="content-thumbnail" src="{{ Storage::disk('public')->url($hostel->images->first()->path) }}" alt="">@else<span class="content-thumbnail recent-icon">⌂</span>@endif<div><strong>{{ $hostel->name }}</strong><p>{{ \Illuminate\Support\Str::limit($hostel->description, 110) }}</p></div></div></td><td>{{ ucfirst($hostel->gender) }}<small class="content-detail">{{ implode(', ', $hostel->features ?? []) }} · {{ $hostel->images->count() }} photo(s)</small></td><td>ZMW {{ number_format((float) $hostel->price, 2) }}<small class="content-detail">per semester</small></td><td>{{ $hostel->updated_at->format('M j, Y') }}</td><td><a class="row-button" href="{{ route('admin.hostels.edit', $hostel) }}">Edit</a><form method="POST" action="{{ route('admin.hostels.destroy', $hostel) }}" style="display:inline" data-confirm-delete="Delete this hostel and its photos?">@csrf @method('DELETE')<button class="row-button delete" type="submit">Delete</button></form></td></tr>
            @empty
                <tr><td class="empty-state" colspan="5"><strong>No hostels added yet</strong><p>Add a hostel to display it on the public accommodation page.</p></td></tr>
            @endforelse
        </tbody></table></div>
        <div class="table-footer"><span>Hostels and images are saved to the website database.</span>{{ $hostels->links() }}</div>
    </div>
</section>
<script>
document.getElementById('hostel-search')?.addEventListener('input', event => {
    const query = event.target.value.trim().toLowerCase();
    document.querySelectorAll('[data-hostel-row]').forEach(row => { row.hidden = !row.dataset.name.includes(query); });
});
</script>
