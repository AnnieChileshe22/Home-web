<?php

namespace App\Http\Controllers;

class ProgramController extends Controller
{
    public function index()
    {
        return view('programs.index');
    }

    public function show($id)
    {
        return view('programs.show', compact('id'));
    }
}
