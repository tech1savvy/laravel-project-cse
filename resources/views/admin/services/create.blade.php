@extends('layouts.app')

@section('title', 'Add Service')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Add New Service</h2>
    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="icon" class="form-label">FontAwesome Icon Class <small>(e.g. fa fa-code)</small></label>
            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ old('icon') }}" required>
            @error('icon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Service Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Service Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="button_text" class="form-label">Button Text (optional)</label>
            <input type="text" class="form-control @error('button_text') is-invalid @enderror" id="button_text" name="button_text" value="{{ old('button_text') }}">
            @error('button_text')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="button_link" class="form-label">Button Link (optional)</label>
            <input type="url" class="form-control @error('button_link') is-invalid @enderror" id="button_link" name="button_link" value="{{ old('button_link') }}">
            @error('button_link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary rounded-pill px-4">Create Service</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary rounded-pill px-4 ms-2">Cancel</a>
    </form>
</div>
@endsection
