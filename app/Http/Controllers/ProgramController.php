<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class ProgramController extends Controller
{
    private function cacheHeaders(): array
    {
        return [
            'Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ];
    }

    public function index()
    {
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

        if (! view()->exists('programs.index')) {
            return response()->json($programs)->withHeaders($this->cacheHeaders());
        }

        return response()->view('programs.index', compact('programs'))->withHeaders($this->cacheHeaders());
    }

    public function show($id)
    {
        $program = null;

        try {
            $response = Http::acceptJson()
                ->withHeaders([
                    'X-API-KEY' => config('services.ecms.api_key'),
                    'Cache-Control' => 'no-cache, no-store, max-age=0',
                    'Pragma' => 'no-cache',
                ])
                ->connectTimeout(5)->timeout(10)
                ->get(config('services.ecms.base_url') . '/api/programs/' . $id);

            $response->throw(); // Throw an exception if the response status code is not 2xx
            $program = $response->json() ?? [];

        } catch (RequestException $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }

        if (! view()->exists('programs.show')) {
            return response()->json($program)->withHeaders($this->cacheHeaders());
        }

        return response()->view('programs.show', compact('program'))->withHeaders($this->cacheHeaders());
    }
}
