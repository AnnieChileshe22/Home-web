<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public const MANAGEMENT_ROLES = [
        'VICE CHANCELLOR',
        'DEPUTY VICE CHANCELLOR - ACADEMIC',
        'DEPUTY VICE CHANCELLOR - RESEARCH AND INNOVATIONS',
        'REGISTRAR',
        'CHIEF FINANCIAL OFFICER',
        'CHIEF LIBRARIAN',
        'DEAN OF STUDENTS',
    ];

    public function index(): View
    {
        return view('admin.index', [
            'currentSection' => 'profiles',
            'profiles' => Profile::orderByRaw("CASE management_role " . $this->roleOrderSql() . ' ELSE 99 END')->orderBy('last_name')->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('admin.index', ['currentSection' => 'profiles', 'profile' => new Profile(), 'profileFormView' => 'admin.profiles.create']);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProfile($request);
        $path = $request->file('profile_pic')->store('profiles', 'public');

        try {
            Profile::create([...$validated, 'profile_pic' => $path]);
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($path);
            throw $exception;
        }

        return redirect()->route('admin.profiles.index')->with('status', 'Profile created successfully.');
    }

    public function show(Profile $profile): View
    {
        return view('profiles.show', ['profile' => $profile]);
    }

    public function adminShow(Profile $profile): RedirectResponse
    {
        return redirect()->route('admin.profiles.edit', $profile);
    }

    public function publicIndex(): View
    {
        return view('management', ['profiles' => Profile::all()]);
    }

    public function edit(Profile $profile): View
    {
        return view('admin.index', ['currentSection' => 'profiles', 'profile' => $profile, 'profileFormView' => 'admin.profiles.edit']);
    }

    public function update(Request $request, Profile $profile): RedirectResponse
    {
        $validated = $this->validateProfile($request, $profile);
        $oldPath = null;
        $newPath = $request->file('profile_pic')?->store('profiles', 'public');

        try {
            DB::transaction(function () use ($validated, $profile, $newPath, &$oldPath): void {
                $profile->update([...$validated, ...($newPath ? ['profile_pic' => $newPath] : [])]);
                if ($newPath) {
                    $oldPath = $profile->getOriginal('profile_pic');
                }
            });
        } catch (\Throwable $exception) {
            if ($newPath) Storage::disk('public')->delete($newPath);
            throw $exception;
        }

        if ($oldPath) Storage::disk('public')->delete($oldPath);

        return redirect()->route('admin.profiles.index')->with('status', 'Profile updated successfully.');
    }

    public function destroy(Profile $profile): RedirectResponse
    {
        $path = $profile->profile_pic;
        $profile->delete();
        Storage::disk('public')->delete($path);

        return redirect()->route('admin.profiles.index')->with('status', 'Profile deleted successfully.');
    }

    private function validateProfile(Request $request, ?Profile $profile = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'first_name' => ['required', 'string', 'max:30'],
            'middle_name' => ['nullable', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:30'],
            'management_role' => ['required', 'string', Rule::in(self::MANAGEMENT_ROLES), Rule::unique('profiles', 'management_role')->ignore($profile?->id)],
            'profile_pic' => [$profile ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'biography' => ['required', 'string', 'max:30000'],
        ]);
    }

    private function roleOrderSql(): string
    {
        return implode(' ', array_map(
            fn ($role, $index) => "WHEN '" . str_replace("'", "''", $role) . "' THEN {$index}",
            self::MANAGEMENT_ROLES,
            array_keys(self::MANAGEMENT_ROLES),
        ));
    }
}
