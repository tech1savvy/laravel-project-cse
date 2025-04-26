@extends('layouts.app')
@section('title', 'Manage Projects')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary rounded-pill px-4">Add New Project</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th width="160">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}" style="width:50px;">
                        </td>
                        <td>{{ $project->title }}</td>
                        <td>{{ Str::limit($project->short_description, 60) }}</td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning rounded-pill">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-pill">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">No projects found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
