@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Create New Project</h2>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <textarea class="form-control @error('short_description') is-invalid @enderror" 
                      id="short_description" name="short_description" rows="3" required></textarea>
            @error('short_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                   id="image" name="image" required>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror" 
                   id="category" name="category">
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary rounded-pill px-4">Create Project</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary rounded-pill px-4 ms-2">Cancel</a>
    </form>
</div>
@endsection
