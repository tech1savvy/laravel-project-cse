<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller // ← Correct name
{
    public function index()
    {
        $projects = Project::all(); // ← Plural variable
        return view('pages.project', compact('projects')); // ← Plural variable
    }
}
