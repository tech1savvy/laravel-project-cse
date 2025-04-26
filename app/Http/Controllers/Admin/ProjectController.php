<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string'
        ]);

        $imagePath = $request->file('image')->store('projects', 'public');
        
        Project::create([
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'image_path' => $imagePath,
            'category' => $data['category']
        ]);

        return redirect()->route('admin.projects.index');
    }

    // Add edit, update, delete methods
}
