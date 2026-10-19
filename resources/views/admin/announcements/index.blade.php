@extends('layouts.app')
@section('content')
<main class="page-width" style="padding:48px 0 72px;max-width:1120px">
    <p class="eyebrow">Website administration</p><h1>Announcements</h1>
    @if (session('status'))<p role="status">{{ session('status') }}</p>@endif
    <p><a href="{{ route('admin.announcements.create') }}">Create announcement</a></p>
    <div style="overflow-x:auto"><table style="width:100%;text-align:left;border-collapse:collapse"><thead><tr><th>Title</th><th>Files</th><th>Status</th><th>Updated</th><th>Actions</th></tr></thead><tbody>
        @forelse ($announcements as $announcement)
            <tr><td>{{ $announcement->title }}</td><td>{{ $announcement->attachments->count() }}</td><td>{{ ucfirst($announcement->status) }}</td><td>{{ $announcement->updated_at->format('M j, Y') }}</td><td><a href="{{ route('admin.announcements.edit', $announcement) }}">Edit</a> <form method="POST" action="{{ route('admin.announcements.destroy', $announcement) }}" style="display:inline" onsubmit="return confirm('Delete this announcement and its files?')">@csrf @method('DELETE')<button type="submit">Delete</button></form></td></tr>
        @empty <tr><td colspan="5">No announcements yet.</td></tr> @endforelse
    </tbody></table></div>
    {{ $announcements->links() }}
</main>
@endsection
