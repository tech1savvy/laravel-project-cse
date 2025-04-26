<?php

namespace App\Services;

use App\Models\Project;

class ProjectService
{
    public function all()
    {
        return Project::all();
    }

    public function create(array $data)
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data)
    {
        return $project->update($data);
    }

    public function delete(Project $project)
    {
        return $project->delete();
    }
}