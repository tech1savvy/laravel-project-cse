@extends('layouts.app')
@section('title', 'Our Services')
@section('content')
<!-- ... header ... -->
<div class="container-fluid services py-5 my-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Our Services</h5>
            <h1>Services Built Specifically For Your Business</h1>
        </div>
        <div class="row g-5 services-inner">
            @foreach($services as $service)
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="{{ $service->icon }} fa-7x mb-4 text-primary"></i>
                                <h4 class="mb-3">{{ $service->title }}</h4>
                                <p class="mb-4">{{ $service->description }}</p>
                                @if($service->button_text && $service->button_link)
                                    <a href="{{ $service->button_link }}" class="btn btn-secondary text-white px-5 py-3 rounded-pill">{{ $service->button_text }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
