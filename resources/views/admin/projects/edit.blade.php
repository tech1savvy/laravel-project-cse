@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Edit Project</h2>
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                   id="title" name="title" value="{{ old('title', $project->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <textarea class="form-control @error('short_description') is-invalid @enderror" 
                      id="short_description" name="short_description" rows="3" required>{{ old('short_description', $project->short_description) }}</textarea>
            @error('short_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                   id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if($project->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$project->image_path) }}" alt="Current image" class="img-thumbnail" width="150">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror" 
                   id="category" name="category" value="{{ old('category', $project->category) }}">
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary rounded-pill px-4">Update Project</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary rounded-pill px-4 ms-2">Cancel</a>
    </form>
</div>
@endsection
