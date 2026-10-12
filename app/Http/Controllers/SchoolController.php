<?php

namespace App\Http\Controllers;

class SchoolController extends Controller
{
    public function index()
    {
        return view('schools.index');
    }

    public function show($id)
    {
        return view('schools.show', compact('id'));
    }
}
