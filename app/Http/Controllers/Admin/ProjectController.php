<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->all();
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

        // New file upload: Move image to public/img/
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('img'), $filename);
        $data['image_path'] = 'img/'.$filename;
        
        $this->projectService->create($data);
        return redirect()->route('admin.projects.index');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists in public/img/
            if ($project->image_path && file_exists(public_path($project->image_path))) {
                unlink(public_path($project->image_path));
            }
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $data['image_path'] = 'img/'.$filename;
        }

        $this->projectService->update($project, $data);
        return redirect()->route('admin.projects.index');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
            Storage::disk('public')->delete($project->image_path);
        }
        $this->projectService->delete($project);
        return redirect()->route('admin.projects.index');
    }
}
