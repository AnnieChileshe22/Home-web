<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Throwable;

class ApiSectionController extends Controller
{
    public function index(Request $request, string $resource)
    {
        return $this->section($resource, null, false, $request);
    }

    public function home(string $resource)
    {
        return $this->section($resource, null, true);
    }

    public function show(string $resource, string $id)
    {
        return $this->section($resource, $id, false);
    }

    private function section(string $resource, ?string $id, bool $home, ?Request $request = null)
    {
        abort_unless(in_array($resource, ['schools', 'programs', 'departments']), 404);
        abort_if($resource === 'departments' && $id === null, 404);

        try {
            $data = Http::acceptJson()->withHeaders([
                'X-API-KEY' => config('services.ecms.api_key'),
                'Cache-Control' => 'no-cache, no-store, max-age=0',
                'Pragma' => 'no-cache',
            ])->connectTimeout(5)->timeout(10)
                ->get(rtrim(config('services.ecms.base_url'), '/') . '/api/' . $resource
                    . ($id === null ? '' : '/' . rawurlencode($id)))
                ->throw()->json();

            if (! is_array($data) || empty($data)) {
                return $this->emptySection();
            }

            if ($id === null) {
                if (! array_is_list($data)) {
                    return $this->emptySection();
                }
                $variables = [$resource => $data];
                if ($resource === 'programs') {
                    $data = array_values(array_filter($data, 'is_array'));
                    $qualification = $request?->query('qualification');
                    if (in_array($qualification, ['BSc', 'MSc', 'Diploma'], true)) {
                        $data = array_values(array_filter($data, fn (array $item) => ($item['qualification_type'] ?? null) === $qualification));
                    }
                    $page = max(1, (int) ($request?->query('page', 1) ?? 1));
                    $hasNextPage = count($data) > $page * 20;
                    $data = array_slice($data, ($page - 1) * 20, 20);
                    $variables['hasNextPage'] = $hasNextPage;
                    $variables['page'] = $page;
                }
                $data = array_map(fn (array $item) => $this->thumbnail($item), $data);
                $view = $home ? 'home-' . $resource : $resource . '-index';
                $variables[$resource] = $data;
            } else {
                if (empty($data['name'])) {
                    return $this->emptySection();
                }
                $view = $resource . '-show';
                $variables = [substr($resource, 0, -1) => $this->thumbnail($data)];
            }

            return response()->view('partials.api.' . $view, $variables)
                ->header('Cache-Control', 'no-store');
        } catch (Throwable $exception) {
            report($exception);

            return $this->emptySection();
        }
    }

    private function thumbnail(array $item): array
    {
        $thumbnail = trim($item['thumbnail'] ?? '');
        if ($thumbnail === '') {
            $item['thumbnail'] = asset('images/library.jpg');
        } elseif (! preg_match('#^(https?://|//)#i', $thumbnail)) {
            $path = ltrim($thumbnail, '/');
            $item['thumbnail'] = rtrim(config('services.ecms.base_url'), '/') . '/'
                . (str_starts_with($path, 'storage/') ? $path : 'storage/' . $path);
        } else {
            $item['thumbnail'] = $thumbnail;
        }

        return $item;
    }

    private function emptySection()
    {
        return response()->view('partials.no-data')->header('Cache-Control', 'no-store');
    }
}
