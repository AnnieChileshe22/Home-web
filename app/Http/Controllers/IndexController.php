<?php

namespace App\Http\Controllers;

use App\Models\Posts;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'announcements' => Posts::with('images')->where('status', 'published')->where('category', 'announcement')->latest()->get(),
            'posts' => Posts::with('images')->where('status', 'published')->whereIn('category', ['news', 'event'])->latest()->take(8)->get(),
        ]);
    }
}
