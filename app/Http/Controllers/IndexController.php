<?php

namespace App\Http\Controllers;

use App\Models\Posts;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'posts' => Posts::with('images')->where('status', 'published')->latest()->take(8)->get(),
        ]);
    }
}
