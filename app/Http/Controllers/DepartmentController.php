<?php

namespace App\Http\Controllers;

class DepartmentController extends Controller
{
    public function show($id)
    {
        return view('departments.show', compact('id'));
    }
}
