@extends('layouts.app')

@section('title', 'Manage Services')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Services</h2>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary rounded-pill px-4">Add New Service</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Button</th>
                    <th width="160">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><i class="{{ $service->icon }} fa-2x text-primary"></i></td>
                        <td>{{ $service->title }}</td>
                        <td>{{ Str::limit($service->description, 60) }}</td>
                        <td>
                            @if($service->button_text && $service->button_link)
                                <a href="{{ $service->button_link }}" class="btn btn-secondary btn-sm rounded-pill" target="_blank">{{ $service->button_text }}</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning rounded-pill">Edit</a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this service?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-pill">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No services found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
