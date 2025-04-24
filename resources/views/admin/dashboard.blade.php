@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Welcome, Admin!</h1>

    <!-- Quick Stats -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card bg-primary text-white shadow rounded mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title mb-2">Total Services</h5>
                    <h2 class="display-4">{{ \App\Models\Service::count() }}</h2>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-light btn-sm rounded-pill mt-3">Manage Services</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white shadow rounded mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title mb-2">Create New Service</h5>
                    <i class="fa fa-plus fa-2x mb-2"></i>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-light btn-sm rounded-pill mt-3">Add Service</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light text-primary shadow rounded mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title mb-2">Back to Website</h5>
                    <i class="fa fa-home fa-2x mb-2"></i>
                    <a href="{{ url('/') }}" class="btn btn-primary btn-sm rounded-pill mt-3">View Site</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Services Table -->
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Recently Added Services</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Service::latest()->take(5)->get() as $service)
                        <tr>
                            <td>{{ $service->title }}</td>
                            <td><i class="{{ $service->icon }} fa-lg text-primary"></i></td>
                            <td>{{ $service->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning rounded-pill">Edit</a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this service?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger rounded-pill">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if(\App\Models\Service::count() === 0)
                        <tr>
                            <td colspan="4" class="text-center text-muted">No services found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
