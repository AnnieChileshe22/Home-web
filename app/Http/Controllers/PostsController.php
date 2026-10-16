<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostsController extends Controller
{
    public function publicIndex(Request $request): View
    {
        $query = Posts::with('images')->where('status', 'published')->latest();

        if ($request->filled('category') && in_array($request->category, Posts::CATEGORIES, true)) {
            $query->where('category', $request->category);
        }

        return view('posts.index', ['posts' => $query->paginate(12)->withQueryString()]);
    }

    public function publicShow(Posts $post): View
    {
        abort_unless($post->status === 'published', 404);

        return view('posts.show', ['post' => $post->load('images')]);
    }

    public function index(Request $request): View
    {
        $query = Posts::with('images')->latest();

        if ($request->filled('category') && in_array($request->category, Posts::CATEGORIES, true)) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status') && in_array($request->status, Posts::STATUSES, true)) {
            $query->where('status', $request->status);
        }

        return view('admin.index', [
            'currentSection' => 'posts',
            'posts' => $query->paginate(12)->withQueryString(),
            'counts' => Posts::query()->selectRaw('category, count(*) as aggregate')->groupBy('category')->pluck('aggregate', 'category'),
            'countsByStatus' => Posts::query()->selectRaw('status, count(*) as aggregate')->groupBy('status')->pluck('aggregate', 'status'),
        ]);
    }

    public function create(): View
    {
        return view('admin.posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        if ($request->server('CONTENT_LENGTH') > $this->maxPostBytes()) {
            return back()->withInput()->withErrors(['images' => 'The upload is larger than the server allows. Reduce the total upload size and try again.']);
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:50000'],
            'category' => ['required', Rule::in(Posts::CATEGORIES)],
            'status' => ['required', Rule::in(Posts::STATUSES)],
            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
        ]);

        $storedPaths = [];
        try {
            DB::transaction(function () use ($request, $validated, &$storedPaths): void {
                $post = Posts::create(collect($validated)->only(['title', 'body', 'category', 'status'])->all());
                foreach ($request->file('images', []) as $image) {
                    $path = $image->store('posts', 'public');
                    $storedPaths[] = $path;
                    $post->images()->create(['path' => $path]);
                }
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($storedPaths);
            throw $exception;
        }

        return redirect()->route('admin.section', ['section' => $this->sectionFor($validated['category'])])->with('status', 'Post created successfully.');
    }

    public function show(Posts $post): View
    {
        return view('admin.posts.show', ['post' => $post->load('images')]);
    }

    public function edit(Posts $post): View
    {
        return view('admin.posts.edit', ['post' => $post->load('images')]);
    }

    public function update(Request $request, Posts $post): RedirectResponse
    {
        if ($request->server('CONTENT_LENGTH') > $this->maxPostBytes()) {
            return back()->withInput()->withErrors(['images' => 'The upload is larger than the server allows. Reduce the total upload size and try again.']);
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:50000'],
            'category' => ['required', Rule::in(Posts::CATEGORIES)],
            'status' => ['required', Rule::in(Posts::STATUSES)],
            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
            'remove_images' => ['nullable', 'array'],
            'remove_images.*' => ['integer', 'distinct', Rule::exists('post_images', 'id')->where('post_id', $post->id)],
        ]);

        $storedPaths = [];
        $removedImages = [];
        try {
            DB::transaction(function () use ($request, $post, $validated, &$storedPaths, &$removedImages): void {
                $post->update(collect($validated)->only(['title', 'body', 'category', 'status'])->all());

                foreach ($post->images()->whereIn('id', $validated['remove_images'] ?? [])->get() as $image) {
                    $removedImages[] = $image->path;
                    $image->delete();
                }

                foreach ($request->file('images', []) as $image) {
                    $path = $image->store('posts', 'public');
                    $storedPaths[] = $path;
                    $post->images()->create(['path' => $path]);
                }
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($storedPaths);
            throw $exception;
        }

        Storage::disk('public')->delete($removedImages);

        return redirect()->route('admin.section', ['section' => $this->sectionFor($validated['category'])])->with('status', 'Post updated successfully.');
    }

    public function destroy(Posts $post): RedirectResponse
    {
        $paths = $post->images()->pluck('path')->all();
        $post->delete();
        Storage::disk('public')->delete($paths);

        return redirect()->route('admin.posts.index')->with('status', 'Post deleted successfully.');
    }

    private function maxPostBytes(): int
    {
        $toBytes = static function (string $value): int {
            $value = trim($value);
            $unit = strtolower(substr($value, -1));
            $number = (int) $value;

            return match ($unit) {
                'g' => $number * 1024 * 1024 * 1024,
                'm' => $number * 1024 * 1024,
                'k' => $number * 1024,
                default => $number,
            };
        };

        return $toBytes((string) ini_get('post_max_size'));
    }

    private function sectionFor(string $category): string
    {
        return match ($category) {
            'news' => 'news',
            'event' => 'events',
            default => 'news',
        };
    }
}
