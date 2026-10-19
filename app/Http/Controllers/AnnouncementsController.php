<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AnnouncementsController extends Controller
{
    public function publicIndex(): View
    {
        return view('announcements.index', [
            'announcements' => Announcement::with('attachments')->where('status', 'published')->latest()->paginate(12),
        ]);
    }

    public function publicShow(Announcement $announcement): View
    {
        abort_unless($announcement->status === 'published', 404);
        return view('announcements.show', ['announcement' => $announcement->load('attachments')]);
    }

    public function index(): View
    {
        return view('admin.index', [
            'currentSection' => 'announcements',
            'announcements' => Announcement::with('attachments')->latest()->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.index', ['currentSection' => 'announcements', 'announcement' => new Announcement(), 'announcementForm' => true]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateAnnouncement($request);
        $storedPaths = [];
        try {
            DB::transaction(function () use ($request, $validated, &$storedPaths): void {
                $announcement = Announcement::create(collect($validated)->only(['title', 'body', 'status'])->all());
                $this->storeAttachments($request, $announcement, $storedPaths);
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($storedPaths);
            throw $exception;
        }
        return redirect()->route('admin.announcements.index')->with('status', 'Announcement created successfully.');
    }

    public function edit(Announcement $announcement): View
    {
        return view('admin.index', ['currentSection' => 'announcements', 'announcement' => $announcement->load('attachments'), 'announcementForm' => true]);
    }

    public function update(Request $request, Announcement $announcement): RedirectResponse
    {
        $validated = $this->validateAnnouncement($request, $announcement);
        $storedPaths = [];
        $removedPaths = [];
        try {
            DB::transaction(function () use ($request, $announcement, $validated, &$storedPaths, &$removedPaths): void {
                $announcement->update(collect($validated)->only(['title', 'body', 'status'])->all());
                foreach ($announcement->attachments()->whereIn('id', $validated['remove_attachments'] ?? [])->get() as $attachment) {
                    $removedPaths[] = $attachment->path;
                    $attachment->delete();
                }
                $this->storeAttachments($request, $announcement, $storedPaths);
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($storedPaths);
            throw $exception;
        }
        Storage::disk('public')->delete($removedPaths);
        return redirect()->route('admin.announcements.index')->with('status', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement): RedirectResponse
    {
        $paths = $announcement->attachments()->pluck('path')->all();
        $announcement->delete();
        Storage::disk('public')->delete($paths);
        return redirect()->route('admin.announcements.index')->with('status', 'Announcement deleted successfully.');
    }

    private function validateAnnouncement(Request $request, ?Announcement $announcement = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'body' => ['nullable', 'string', 'max:50000', Rule::requiredIf(fn () => !$request->hasFile('attachments') && (!$announcement || $announcement->attachments()->count() === 0))],
            'status' => ['required', Rule::in(Announcement::STATUSES)],
            'attachments' => ['nullable', 'array', 'max:10'],
            'attachments.*' => ['file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:15360'],
            'remove_attachments' => ['nullable', 'array'],
            'remove_attachments.*' => ['integer', 'distinct', Rule::exists('announcement_attachments', 'id')->where('announcement_id', $announcement?->id)],
        ]);
    }

    private function storeAttachments(Request $request, Announcement $announcement, array &$storedPaths): void
    {
        foreach ($request->file('attachments', []) as $file) {
            $path = $file->store('announcements', 'public');
            $storedPaths[] = $path;
            $announcement->attachments()->create([
                'path' => $path,
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType() ?: 'application/octet-stream',
            ]);
        }
    }
}
