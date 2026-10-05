<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class SchoolController extends Controller
{
    public function index()
    {
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

        if (! view()->exists('schools.index')) {
            return response()->json($schools)->withHeaders($this->cacheHeaders());
        }

        return response()->view('schools.index', compact('schools'))->withHeaders($this->cacheHeaders());
    }

    public function show($id)
    {
        $school = null;

        try {
            $response = Http::acceptJson()
                ->withHeaders([
                    'X-API-KEY' => config('services.ecms.api_key'),
                    'Cache-Control' => 'no-cache, no-store, max-age=0',
                    'Pragma' => 'no-cache',
                ])
                ->connectTimeout(5)->timeout(10)
                ->get(config('services.ecms.base_url') . '/api/schools/' . $id);

            $response->throw(); // Throw an exception if the response status code is not 2xx
            $school = $response->json() ?? [];

        } catch (RequestException $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }

        if (! view()->exists('schools.show')) {
            return response()->json($school)->withHeaders($this->cacheHeaders());
        }

        return response()->view('schools.show', compact('school'))->withHeaders($this->cacheHeaders());
    }

    private function cacheHeaders(): array
    {
        return [
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ];
    }
}
