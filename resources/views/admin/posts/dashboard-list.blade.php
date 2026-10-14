<section aria-labelledby="posts-title">
    <div class="page-heading">
        <div>
            <p class="eyebrow">Website content</p>
            <h1 id="posts-title">Posts</h1>
            <p class="page-description">Manage announcements, university news and events.</p>
        </div>
        <a class="button button-primary" href="{{ route('admin.posts.create') }}"><svg class="icon" aria-hidden="true"><use href="#icon-plus"/></svg>Create a post</a>
    </div>

    @if (session('status'))<p class="success-box" role="status">{{ session('status') }}</p>@endif

    <nav class="content-tabs" aria-label="Filter by category">
        <a class="content-tab {{ request()->filled('category') ? '' : 'active' }}" href="{{ route('admin.posts.index', request()->only('status')) }}">All categories</a>
        @foreach (\App\Models\Posts::CATEGORIES as $category)
            <a class="content-tab {{ request('category') === $category ? 'active' : '' }}" href="{{ route('admin.posts.index', array_merge(request()->only('status'), ['category' => $category])) }}">{{ ucfirst($category) }}</a>
        @endforeach
    </nav>
    <nav class="content-tabs" aria-label="Filter by status">
        <a class="content-tab {{ request()->filled('status') ? '' : 'active' }}" href="{{ route('admin.posts.index', request()->only('category')) }}">All statuses</a>
        @foreach (\App\Models\Posts::STATUSES as $status)
            <a class="content-tab {{ request('status') === $status ? 'active' : '' }}" href="{{ route('admin.posts.index', array_merge(request()->only('category'), ['status' => $status])) }}">{{ ucfirst($status) }} <span>{{ $countsByStatus[$status] ?? 0 }}</span></a>
        @endforeach
    </nav>

    <div class="admin-panel content-panel">
        <div class="content-toolbar">
            <span class="page-description">{{ $posts->total() }} post(s)</span>
            <a class="text-button" href="{{ route('admin.section', 'news') }}">News section →</a>
        </div>
        <div class="table-container">
            <table class="content-table">
                <thead><tr><th scope="col">Post</th><th scope="col">Category</th><th scope="col">Status</th><th scope="col">Updated</th><th scope="col"><span class="sr-only">Actions</span></th></tr></thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td><div class="content-cell">
                                @if ($post->images->first())<img class="content-thumbnail" src="{{ Storage::disk('public')->url($post->images->first()->path) }}" alt="">@else<span class="content-thumbnail recent-icon"><svg class="icon"><use href="#icon-news"/></svg></span>@endif
                                <div><strong>{{ $post->title }}</strong><p>{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 160) }}</p></div>
                            </div></td>
                            <td>{{ ucfirst($post->category) }}<small class="content-detail">{{ $post->images->count() }} image(s)</small></td>
                            <td><span class="status-badge {{ $post->status === 'draft' ? 'draft' : '' }}">{{ ucfirst($post->status) }}</span></td>
                            <td>{{ $post->updated_at->format('M j, Y') }}</td>
                            <td><a class="row-button" href="{{ route('admin.posts.show', $post) }}">View</a><a class="row-button" href="{{ route('admin.posts.edit', $post) }}">Edit</a><form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display:inline" data-confirm-delete="Delete this post and its images?">@csrf @method('DELETE')<button class="row-button delete" type="submit">Delete</button></form></td>
                        </tr>
                    @empty
                        <tr><td class="empty-state" colspan="5"><strong>No posts yet</strong><p>Posts you create will appear here.</p><a class="button button-secondary" href="{{ route('admin.posts.create') }}">Create your first post</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="table-footer"><span>Showing {{ $posts->firstItem() ?? 0 }}–{{ $posts->lastItem() ?? 0 }} of {{ $posts->total() }} posts</span><span>Posts saved to the website database</span></div>
        <div style="padding:0 22px 18px">{{ $posts->links() }}</div>
    </div>
</section>
