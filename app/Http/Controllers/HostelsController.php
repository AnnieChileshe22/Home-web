<?php

namespace App\Http\Controllers;

use App\Models\Hostels;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class HostelsController extends Controller
{
    public function index(): View
    {
        return view('admin.index', [
            'currentSection' => 'hostels',
            'hostels' => Hostels::with('images')->latest()->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.index', ['currentSection' => 'hostels', 'hostel' => new Hostels(), 'hostelForm' => true]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateHostel($request);
        $storedPaths = [];

        try {
            DB::transaction(function () use ($request, $validated, &$storedPaths): void {
                $hostel = Hostels::create(collect($validated)->only(['name', 'gender', 'features', 'description', 'price'])->all());
                $this->storeImages($request, $hostel, $storedPaths);
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($storedPaths);
            throw $exception;
        }

        return redirect()->route('admin.hostels.index')->with('status', 'Hostel created successfully.');
    }

    public function show(Hostels $hostel): View
    {
        return redirect()->route('admin.hostels.edit', $hostel);
    }

    public function edit(Hostels $hostel): View
    {
        return view('admin.index', ['currentSection' => 'hostels', 'hostel' => $hostel->load('images'), 'hostelForm' => true]);
    }

    public function update(Request $request, Hostels $hostel): RedirectResponse
    {
        $validated = $this->validateHostel($request, $hostel);
        $storedPaths = [];
        $removedPaths = [];

        try {
            DB::transaction(function () use ($request, $hostel, $validated, &$storedPaths, &$removedPaths): void {
                $hostel->update(collect($validated)->only(['name', 'gender', 'features', 'description', 'price'])->all());
                foreach ($hostel->images()->whereIn('id', $validated['remove_images'] ?? [])->get() as $image) {
                    $removedPaths[] = $image->path;
                    $image->delete();
                }
                $this->storeImages($request, $hostel, $storedPaths);
            });
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($storedPaths);
            throw $exception;
        }

        Storage::disk('public')->delete($removedPaths);

        return redirect()->route('admin.hostels.index')->with('status', 'Hostel updated successfully.');
    }

    public function destroy(Hostels $hostel): RedirectResponse
    {
        $paths = $hostel->images()->pluck('path')->all();
        $hostel->delete();
        Storage::disk('public')->delete($paths);

        return redirect()->route('admin.hostels.index')->with('status', 'Hostel deleted successfully.');
    }

    public function publicIndex(): View
    {
        return view('accommodation.index', ['hostels' => Hostels::with('images')->orderBy('gender')->orderBy('name')->get()]);
    }

    public function publicShow(Hostels $hostel): View
    {
        return view('accommodation.show', ['hostel' => $hostel->load('images')]);
    }

    private function validateHostel(Request $request, ?Hostels $hostel = null): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'gender' => ['required', Rule::in(['male', 'female', 'combined'])],
            'features' => ['required', 'array', 'min:1', 'max:30'],
            'features.*' => ['required', 'string', 'max:80', 'distinct'],
            'custom_feature' => ['nullable', 'string', 'max:80'],
            'description' => ['nullable', 'string', 'max:10000'],
            'price' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'images' => ['nullable', 'array', 'max:20'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
            'remove_images' => ['nullable', 'array'],
            'remove_images.*' => ['integer', 'distinct', Rule::exists('hostel_images', 'id')->where('hostel_id', $hostel?->id)],
        ], [
            'images.max' => 'You can upload up to 20 photos at a time.',
            'images.*.max' => 'Each photo must be 15 MB or smaller. Please choose a smaller photo and try again.',
        ]);

        $features = collect($validated['features'])->map(fn ($feature) => trim($feature))->filter();
        if (!empty($validated['custom_feature'])) {
            $features->push(trim($validated['custom_feature']));
        }
        $validated['features'] = $features->unique(fn ($feature) => mb_strtolower($feature))->values()->all();

        return $validated;
    }

    private function storeImages(Request $request, Hostels $hostel, array &$storedPaths): void
    {
        foreach ($request->file('images', []) as $image) {
            $path = $image->store('hostels', 'public');
            $storedPaths[] = $path;
            $hostel->images()->create(['path' => $path]);
        }
    }
}
