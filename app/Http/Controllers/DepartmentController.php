<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DepartmentController extends Controller
{
    public function show($id){
        $department = null;

        try {
            $response = Http::acceptJson()
                ->withHeaders([
                    'X-API-KEY' => config('services.ecms.api_key'),
                    'Cache-Control' => 'no-cache, no-store, max-age=0',
                    'Pragma' => 'no-cache',
                ])
                ->connectTimeout(5)->timeout(10)
                ->get(config('services.ecms.base_url') . '/api/departments/' . $id);

            $response->throw(); // Throw an exception if the response status code is not 2xx
            $department = $response->json() ?? [];

        } catch (\Illuminate\Http\Client\RequestException $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }

        if (! view()->exists('departments.show')) {
            return response()->json($department);
        }

        return view('departments.show', compact('department'));
    }
}
