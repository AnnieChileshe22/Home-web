<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index()
    {
        //Fetch Schools from API
        $schools = [];

        try {
            $response = Http::acceptJson()
                ->withHeaders([
                    'X-API-KEY' => config('services.ecms.api_key'),
                    'Cache-Control' => 'no-cache, no-store, max-age=0',
                    'Pragma' => 'no-cache',
                ])
                ->connectTimeout(5)->timeout(10)
                ->get(config('services.ecms.base_url') . '/api/schools');

            $response->throw(); // Throw an exception if the response status code is not 2xx
            $schools = $response->json() ?? [];

        } catch (RequestException $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }

        //Fetch Programs from API
        $programs = [];

        try {
            $response = Http::acceptJson()
                ->withHeaders([
                    'X-API-KEY' => config('services.ecms.api_key'),
                    'Cache-Control' => 'no-cache, no-store, max-age=0',
                    'Pragma' => 'no-cache',
                ])
                ->connectTimeout(5)->timeout(10)
                ->get(config('services.ecms.base_url') . '/api/programs');

            $response->throw(); // Throw an exception if the response status code is not 2xx
            $programs = $response->json() ?? [];

        } catch (RequestException $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $resolveThumbnail = function (array $item): array {
            $thumbnail = trim($item['thumbnail'] ?? '');

            if ($thumbnail === '') {
                $item['thumbnail'] = asset('images/Mukuba-Hero.jpg');
            } elseif (! str_starts_with($thumbnail, 'http://') && ! str_starts_with($thumbnail, 'https://') && ! str_starts_with($thumbnail, '//')) {
                $path = ltrim($thumbnail, '/');
                $item['thumbnail'] = rtrim(config('services.ecms.base_url'), '/') . '/'
                    . (str_starts_with($path, 'storage/') ? $path : 'storage/' . $path);
            } else {
                $item['thumbnail'] = $thumbnail;
            }

            return $item;
        };

        $schools = array_map($resolveThumbnail, $schools);
        $programs = array_map($resolveThumbnail, $programs);

        return response()->view('index', compact('schools', 'programs'));
    }
}
