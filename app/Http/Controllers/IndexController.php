<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Announcement;
use App\Models\Hostels;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'announcements' => Announcement::with('attachments')->where('status', 'published')->latest()->get(),
            'posts' => Posts::with('images')->where('status', 'published')->whereIn('category', ['news', 'event'])->latest()->take(8)->get(),
            'hostels' => Hostels::with('images')->orderBy('name')->get(),
        ]);
    }
}
